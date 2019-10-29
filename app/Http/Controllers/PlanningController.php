<?php

namespace App\Http\Controllers;

use Validator;
use Carbon\Carbon;
use App\Models\Site;
use App\Models\Agent;
use App\Models\Planning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $plannings =Planning::select(DB::raw('agent_id,sum(heure_total_jour) as heure_total_jour,sum(heure_total_nuit) as heure_total_nuit'))
            ->where('statut','provisoire')
            ->whereMonth('date_debut',Carbon::now()->format('m'))
            ->groupBy('agent_id')
            ->get();

        $agents=$this->listPlannings($plannings);
        $title='Provisoires';
        $action=route('planning.search_planning');
        $statut='provisoire';

        if($request->ajax()){
            return response()->json(['content'=>view('pages.plannings.index',compact('agents','action','title','statut'))->renderSections()['content']],200);
        }

        return view('pages.plannings.index',compact('agents','action','title','statut'));
    }

    public function search_planning(Request $request)
    {
        // dd('Bonjour');
        $this->validate($request,[
            'annee'=>'required|date_format:Y'
        ]);
        $annee=$request->annee;
        $mois=$request->mois;
        $word=$request->word;
        $statut=$request->statut;

        // dd($annee,$mois);
        // dd(Carbon::parse($annee)->format('y'),Carbon::parse($mois)->format('m'));
        $plannings =Planning::select(DB::raw('agent_id,sum(heure_total_jour) as heure_total_jour,sum(heure_total_nuit) as heure_total_nuit'))
            ->where('statut',$statut)
            ->whereYear('date_debut',$annee)
            ->whereMonth('date_debut',Carbon::parse($mois)->format('m'))
            // ->where(function($query) use ($word) {
            //     return $query->Where('heure_total_nuit','LIKE','%'.$word.'%')
            //     ->orWhere('heure_total_jour','LIKE','%'.$word.'%');
            // })
            ->groupBy('agent_id')
            ->get();

        $agents=$this->listPlannings($plannings);

        $table_provisoire=view('pages.plannings.table_planning',compact('agents'))->render();

        return response()->json(['statut'=>'succes','table_provisoire'=>$table_provisoire],200);
    }

    public function index_definitives(Request $request){
        $plannings =Planning::select(DB::raw('agent_id,sum(heure_total_jour) as heure_total_jour,sum(heure_total_nuit) as heure_total_nuit'))
            ->where('statut','definitif')
            ->whereMonth('date_debut',Carbon::now()->format('m'))
            ->groupBy('agent_id')
            ->get();

        $agents=$this->listPlannings($plannings);
        $title='Définitives';
        $action=route('planning.search_planning');
        $statut='definitive';

        if($request->ajax()){
            return response()->json(['content'=>view('pages.plannings.index',compact('agents','action','title','statut'))->renderSections()['content']],200);
        }

        return view('pages.plannings.index',compact('agents','action','title','statut'));
    }

    public function index_archive(Request $request){
        $plannings =Planning::select(DB::raw('agent_id,sum(heure_total_jour) as heure_total_jour,sum(heure_total_nuit) as heure_total_nuit'))
            ->where('statut','arcihve')
            ->whereMonth('date_debut',Carbon::now()->format('m'))
            ->groupBy('agent_id')
            ->get();

        $agents=$this->listPlannings($plannings);
        $title='Archivés';
        $action=route('planning.search_planning');
        $statut='archive';

        if($request->ajax()){
            return response()->json(['content'=>view('pages.plannings.index',compact('agents','action','title','statut'))->renderSections()['content']],200);
        }

        return view('pages.plannings.index',compact('agents','action','title','statut'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $agents=Agent::all();
        $sites=Site::all();

        if($request->ajax()){
            return response()->json(['content'=>view('pages.plannings.create2',compact('sites','agents'))->renderSections()],200);
        }
        return view('pages.plannings.create2',compact('sites','agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($this->heure_total_jour($request),$this->heure_total_nuit($request));
        // dd($request->all());
        //Validation des données

        $v=$this->validationPlanning($request);

        if($v->fails()){
            if ($request->ajax()) {    
                return response()->json($v->errors(),422);
            }
          return redirect()
                ->back()
                ->withErrors($v)
                ->withInput();
        }
        //Enregistrements
        //Creation des plannings
        $plannings=$this->planningsArray($request);
        // Planning::create([
        //     'site_id'=>$request->site,
        //     'agent_id'=>$request->agent,
        //     'date_debut'=>$request->date_debut,
        //     'date_fin'=>$request->date_fin,
        //     'heure_debut'=>$request->heure_debut,
        //     'heure_fin'=>$request->heure_fin,
        //     'heure_total_jour'=>$this->heure_total_jour($request),
        //     'heure_total_nuit'=>$this->heure_total_nuit($request),
        //     'statut'=>'provisoire',
        // ]);
        DB::table('plannings')->insert($plannings);


        if($request->ajax()){
            $plannings=Planning::where('agent_id',$request->agent)->get();
            $calendar_view=view('pages.plannings.calendar',compact('plannings'))->render();
            return response()->json(['statut'=>'succes','msg'=>'Planning Supprimé','calendar_view'=>$calendar_view]);
        }
        return redirect()->route('planning.show',$request->agent);
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $agent=Agent::where('id',$id)->firstOrFail();
        $sites=Site::all();
        $plannings=$agent->plannings;
        // foreach ($plannings as $key => $planning) {
        //     dd($planning->site->nom);
        //     // dd(Carbon::create($planning->date_debut)->format('d'));
        // }
        if($request->ajax()){
            $form_edit_view=view('pages.plannings.planning_form_create',compact('sites','agent'))->render();
            return response()->json(['form_edit_view'=>$form_edit_view]);
        }
        return view('pages.plannings.show',compact('sites','agent','plannings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $planning=Planning::where('id',$id)->firstOrFail();

        $sites=Site::all();
        $agent=$planning->agent;

        $form_edit_view=view('pages.plannings.planning_form_edit',compact('planning','sites','agent'))->render();

        return response()->json(['statut'=>'succes','msg'=>'Planning Supprimé','form_edit_view'=>$form_edit_view]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v=$this->validationPlanning($request);

        if($v->fails()){
            if ($request->ajax()) {    
                return response()->json($v->errors(),422);
            }
          return redirect()
                ->back()
                ->withErrors($v)
                ->withInput();
        }

        $planning=Planning::where('id',$id)->firstOrFail();
        //Enregistrements
        $planning->update([
            'site_id'=>$request->site,
            'agent_id'=>$request->agent,
            'date_debut'=>$request->date_debut,
            'date_fin'=>$request->date_fin,
            'heure_debut'=>Carbon::parse($request->heure_debut)->toTimeString(),
            'heure_fin'=>Carbon::parse($request->heure_fin)->toTimeString(),
            'heure_total_jour'=>$this->heure_total_jour($request),
            'heure_total_nuit'=>$this->heure_total_nuit($request),
            'statut'=>'provisoire',
        ]);

        if($request->ajax()){
            $plannings=Planning::where('agent_id',$request->agent)->get();
            $calendar_view=view('pages.plannings.calendar',compact('plannings'))->render();
            return response()->json(['statut'=>'succes','calendar_view'=>$calendar_view],200);
        }

        return redirect()->route('planning.show',$request->agent);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $planning=Planning::where('id',$id)->firstOrFail();
        $agent_id=$planning->agent_id;
        $result=$planning->delete();
        
        $plannings=Planning::where('agent_id',$agent_id)->get();
        $calendar_view=view('pages.plannings.calendar',compact('plannings'))->render();

        if($result){
            return response()->json(['statut'=>'succes','msg'=>'Planning Supprimé','calendar_view'=>$calendar_view]);
        }
        else{
            return response()->json(['statut'=>'echec','msg'=>'Erreur, veuillez réessayer svp !','calendar_view'=>$calendar_view]);
        }
    }

    public function validationPlanning(REquest $request){
        $v=Validator::make($request->all(),[
            'site'=>'required|exists:sites,id',
            'agent'=>'required|exists:agents,id',
            'date_debut'=>'required|date',
            'date_fin'=>'required|date',
            'heure_debut'=>'required',
            'heure_fin'=>'required'
            // 'heure_fin'=>'required|date_format:H:i'
        ]);

        return $v;
    }

    public function listPlannings($collection){
        $agentArray=[];
        $planningsArray=[];
        //Onrecuperes les info de l'agent et le nombre total d'heure en jour
        foreach ($collection as $key => $planning) {
            if($planning->heure_total_jour!=0){
                $agentArray[$key]['agent_id']=$planning->agent_id;
                $agentArray[$key]['nom']=$planning->agent->nom;
                $agentArray[$key]['prenoms']=$planning->agent->prenoms;
                $agentArray[$key]['numeromobile']=$planning->agent->numeromobile;
                $agentArray[$key]['statut']=$planning->agent->statut;
                $agentArray[$key]['heure_total_jour']=$planning->heure_total_jour; 
                $agentArray[$key]['heure_total_nuit']=$planning->heure_total_nuit; 
            }
        }

        // dd($agentArray);
        // //Onrecurepe le nombre ttal heure en nuit
        // foreach ($collection as $key => $planning) {
        //     if($planning->heure_total_nuit!=0){
        //         $planningsArray[]['heure_total_nuit']=$planning->heure_total_nuit;
        //     }
        // }
        // //On ajoute le nombre total d'heure en nuit de chaque agent
        // foreach ($agentArray as $key => $agent) {
        //     $agentArray[$key]['heure_total_nuit']=abs($planningsArray[$key]['heure_total_nuit']);
        // }

        return $agentArray;
    }

    public function heure_total_jour(Request $request){
        //difference between two dates
        $date_debut = date_create($request->date_debut);
        $date_fin = date_create($request->date_fin);            
        //Nombre de jours
        $nbrJours= date_diff($date_debut,$date_fin)->format("%a")+1;
        $heure_debut = Carbon::parse($request->heure_debut);
        $heure_fin = Carbon::parse($request->heure_fin);
        //Nombre d'heure
        $hours = $heure_fin->diffInHours($heure_debut);
        if($request->jourferie==='on'){
            $hours = $heure_fin->diffInHours($heure_debut)*2;
        }
        // dd($hours);
        // dd($nbrJours);
        if($heure_debut->toTimeString()>='21:00:00' || ($heure_debut->toTimeString()>='00:00:00' && $heure_debut->toTimeString()<'06:00:00')){
            return 0;
            // return ($hours>14 ? abs($hours-14)*$nbrJours : 0);
        }else{
            //Nombre total heure de jour
            $nbreTotalHeure=$nbrJours*$hours;
            //count days
            return $nbreTotalHeure;
        }

    }

    public function heure_total_nuit(Request $request){
        //difference between two dates
        $date_debut = date_create($request->date_debut);
        $date_fin = date_create($request->date_fin);            
        //Nombre de jours
        $nbrJours= date_diff($date_debut,$date_fin)->format("%a")+1;
        $heure_debut = Carbon::parse($request->heure_debut);
        $heure_fin = Carbon::parse($request->heure_fin);
        //Nombre d'heure
        $hours = $heure_fin->diffInHours($heure_debut);
        if($request->jourferie==='on'){
            $hours = $heure_fin->diffInHours($heure_debut)*2;
        }
        // dd($nbrJours);
        // dd($heure_debut->toTimeString()>='06:00:00' && $heure_debut->toTimeString()<='21:00:00');
        if($heure_debut->toTimeString()>='21:00:00' || ($heure_debut->toTimeString()>='00:00:00' && $heure_debut->toTimeString()<'06:00:00')){
            //Nombre ttal heure de jour
            $nbreTotalHeure=$nbrJours*$hours;
            //count days
            return $nbreTotalHeure;
        }else{
            // return ($hours>14 ? abs($hours-14)*$nbrJours : 0);
            return 0;
        }
    }

    //Fonction de planning
    function planningsArray(Request $request){
        //Recuperer les dates
        $dateDeb=Carbon::parse($request->date_debut);
        $dateFin=Carbon::parse($request->date_fin);
        //Caluculer le nombre de mois entre ces deux dates
        $nbrMois=$dateDeb->diffInMonths($dateFin)+1;

        //Declaration variable
        $plannings=[];
        //Initialisation de i qui va permetre de avoir si nous somme au debut de l'itération
        $i=0;
        while (strtotime($dateDeb)<=strtotime($dateFin)) {
            // print_r($dateDeb."<br/>");

            $debut=Carbon::parse($dateDeb);
            $fin=Carbon::parse($dateDeb);
            //Remplissage du tablau de planing
            $plannings[$i]['site_id']=$request->site;
            $plannings[$i]['agent_id']=$request->agent;
            //On choisie la date de dept si on est a la premiere iteration sinon on 
            //prend le dernier jour de la date
            if($i==0){
                $plannings[$i]['date_debut']=$dateDeb->toDateString();
                $request['date_debut']=$dateDeb->toDateString();
            }else{
                $plannings[$i]['date_debut']=Carbon::parse($dateDeb)->startOfMonth()->toDateString();
                $request['date_debut']=Carbon::parse($dateDeb)->startOfMonth()->toDateString();
            }
            //On choisi la date de fin saisie si on est a la derniere itération sinon on prend le dernier
            //jour de la date
            if($debut->format('m')==$dateFin->format('m')){
                $plannings[$i]['date_fin']=$dateFin->toDateString();
            }else{
                $plannings[$i]['date_fin']=$fin->endOfMonth()->toDateString();
            }
            $plannings[$i]['heure_debut']=$request->heure_debut;
            $plannings[$i]['heure_fin']=$request->heure_fin;
            $plannings[$i]['heure_total_jour']=$this->heure_total_jour($request);
            $plannings[$i]['heure_total_nuit']=$this->heure_total_nuit($request);
            $plannings[$i]['statut']='provisoire';
            $i++;
            //On passe au mois prochain
            $dateDeb=date('Y-m-d',strtotime('+1 month',strtotime($dateDeb)));
        }

        return $plannings;
    }
}
