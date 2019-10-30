<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Helpers\BlackshFonctions;

class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $agents=Agent::all();

        if($request->ajax()){
            return response()->json(['content'=>view('pages.agents.index',compact('agents'))->renderSections()['content']],200);
        }
        return view('pages.agents.index',compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax()){
            return response()->json(['content'=>view('pages.agents.create')->renderSections()['content']],200);
        }

        return view('pages.agents.create2');
    }

    public function createStepOne(Request $request)
    {
        $agent = $request->session()->get('agent');
        return view('pages.agents.create.create-step-one',compact('agent', $agent));

        if($request->ajax()){
            return response()->json(['content'=>view('pages.agents.create')->renderSections()['content']],200);
        }

        return view('pages.agents.create.create-step-one');
    }
    public function createStepTwo(Request $request)
    {
        $agent = $request->session()->get('agent');
        return view('pages.agents.create.create-step-two',compact('agent', $agent));

        if($request->ajax()){
            return response()->json(['content'=>view('pages.agents.create')->renderSections()['content']],200);
        }

        return view('pages.agents.create.create-step-two');
    }
    public function createStepThree(Request $request)
    {
        $agent = $request->session()->get('agent');
        return view('pages.agents.create.create-step-three',compact('agent', $agent));

        if($request->ajax()){
            return response()->json(['content'=>view('pages.agents.create')->renderSections()['content']],200);
        }

        return view('pages.agents.create.create-step-three');
    }
    public function createStepFour(Request $request)
    {
        $agent = $request->session()->get('agent');
        return view('pages.agents.create.create-step-four',compact('agent', $agent));

        if($request->ajax()){
            return response()->json(['content'=>view('pages.agents.create')->renderSections()['content']],200);
        }

        return view('pages.agents.create.create-step-four');
    }
    public function postStepOne(Request $request)
    {
        $validatedData = $request->validate([
            'civilite'=> [
                'required',
                  Rule::in(['M', 'Mll','Mme']),
            ],
            'statutmatrimonial'=> [
                  'required',
                  Rule::in(['mar', 'cel','veuf']),
              ],
            'nom' => 'required|min:2',
            'datenaissance' => 'required',
            // 'matricule' => 'required',
            'prenoms' => 'required',
        ]);
        if(empty($request->session()->get('agent'))){
            $agent = new Agent();
            $agent->fill($validatedData);
            $request->session()->put('agent', $agent);
        }else{
            $agent = $request->session()->get('agent');
            $agent->fill($validatedData);
            $request->session()->put('agent', $agent);
        }

        return redirect()->route('agent.createStepTwo');
    }
    public function postStepTwo(Request $request)
    {
        //Validation de données
        $validatedData=Validator::make($request->all(),[

        ]);
        //Validation
        $validatedData->sometimes('numeromobile','required|numeric|min:10', function ($input) use ($request) {
            return !is_null($request->numeromobile);
        });
        $validatedData->sometimes('numerofixe','required|numeric|min:10', function ($input) use ($request) {
            return !is_null($request->numerofixe);
        });
        $validatedData->sometimes('email','required|email', function ($input) use ($request) {
            return !is_null($request->email);
        });
        if($validatedData->fails()){
          return redirect()
                ->back()
                ->withErrors($validatedData)
                ->withInput();
        }

        $validatedData=$validatedData->validate();

        if(empty($request->session()->get('agent'))){
            $agent = new Agent();
            $agent->fill($validatedData);
            $request->session()->put('agent', $agent);
        }else{
            $agent = $request->session()->get('agent');
            $agent->fill($validatedData);
            $request->session()->put('agent', $agent);
        }

        return redirect()->route('agent.createStepThree');
    }

    public function postStepThree(Request $request)
    {
        //Validation de données
        $validatedData=Validator::make($request->all(),[
            'nationalite'=> [
                  'required',
                  Rule::in(['FR', 'ET']),
            ]
        ]);
        //Validation
        $validatedData->sometimes('numerocni','required|min:5', function ($input) use ($request) {
            return $request->nationalite==='FR';
        });

        $validatedData->sometimes('dateexpircni','required|date', function ($input) use ($request) {
            return $request->nationalite==='FR';
        });

        //Validation si la nationalité est étrangère
        $validatedData->sometimes('numeroetranger','required|min:5', function ($input) use ($request) {
            return $request->nationalite==='ET';
        });

        $validatedData->sometimes('lieudelivrancecs','required|min:5', function ($input) use ($request) {
            return $request->nationalite==='ET';
        });

        $validatedData->sometimes('etablissementcartedesejour','required|date', function ($input) use ($request) {
            return $request->nationalite==='ET';
        });

        $validatedData->sometimes('expirationcartedesejour','required|date', function ($input) use ($request) {
            return $request->nationalite==='ET';
        });
        //Validation si le permis est saisie
        $validatedData->sometimes(['dateetablpermis','dateexpirpermis'],'required|date', function ($input) use ($request) {
            return !is_null($request->numeropermis);
        });
        $validatedData->sometimes('categoriepermis',['required',Rule::in(['AM','A','A1','A2','B','B1','BE','C','C1','CE','C1E','D','D1','DE','D1E'])], function ($input) use ($request) {
            return !is_null($request->numeropermis);
        });

        if($validatedData->fails()){
          return redirect()
                ->back()
                ->withErrors($validatedData)
                ->withInput();
        }

        $validatedData=$validatedData->validate();

        if(empty($request->session()->get('agent'))){
            $agent = new Agent();
            $agent->fill($validatedData);
            $request->session()->put('agent', $agent);
        }else{
            $agent = $request->session()->get('agent');
            $agent->fill($validatedData);
            $request->session()->put('agent', $agent);
        }

        return redirect()->route('agent.createStepFour');
    }
    public function postStepFour(Request $request)
    {
        //Validation de données
        $validatedData=Validator::make($request->all(),[
            'typecontrat'=> [
                  'required',
                  Rule::in(['cdi', 'cdd','interim','essai']),
            ]
        ]);

        //Validation de la durée du contrat si ce n'est pas un cdi
        $validatedData->sometimes('dureeducontrat',['required',Rule::in(['3mois', '6mois','1ans','2ans'])], function ($input) use ($request) {
            return $request->typecontrat!='cdi';
        });
        //Validation si ADS est coché
        $validatedData->sometimes('numeroads','required|min:5', function ($input) use ($request) {
            return $request->ads==='on';
        });
        //Validation si maitre chien est coché
        $validatedData->sometimes('nomchien','required|min:2', function ($input) use ($request) {
            return $request->maitrechien==='on';
        });
        $validatedData->sometimes('datevaliditevaccin','required|date', function ($input) use ($request) {
            return $request->maitrechien==='on';
        });

        if($validatedData->fails()){
          return redirect()
                ->back()
                ->withErrors($validatedData)
                ->withInput();
        }

        $validatedData=$validatedData->validate();

        if(empty($request->session()->get('agent'))){
            $agent = new Agent();
            $agent->fill($validatedData);
            $request->session()->put('agent', $agent);
        }else{
            $agent = $request->session()->get('agent');
            $agent->fill($validatedData);
            $request->session()->put('agent', $agent);
        }

        //Creation de l'agent
        if($agent->save()){
          //agent créer avec succes
          $request->session()->forget('agent');        
          return redirect()->route('agent.createStepOne');
        }else{
          dd($agent);
        }

        return redirect()->route('agent.createStepOne');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //   // dd($request->all());
    //     //Validation de données
    //     $v=$this->validationsAgent($request);

    //     if($v->fails()){
    //       return redirect()
    //             ->back()
    //             ->withErrors($v)
    //             ->withInput();
    //     }

    //     $categoriepermis=BlackshFonctions::arrayToString($request->categoriepermis);
    //     $qualification=BlackshFonctions::qualificationString($request);
    //     //Enrégistrements des informations
    //     Agent::create([
    //       'civilite'=>$request->civilite,
    //       'statutmatrimonial'=>$request->statutmatrimonial,
    //       'nom' => $request->nom,
    //       'datenaissance' => $request->datenaissance,
    //       'email' => $request->email,
    //       'codepostal' => $request->codepostal,
    //       'matricule' => $request->matricule,
    //       'prenoms' => $request->prenoms,
    //       'typecontrat' => $request->typecontrat,
    //       'dureeducontrat' => $request->dureeducontrat,
    //       'nationalite'=>$request->nationalite,
    //       'commune' => $request->commune,
    //       'departement' => $request->departement,
    //       'numeromobile' => $request->numeromobile,
    //       'numerofixe' => $request->numerofixe,
    //       'numerocni' => $request->numerocni,
    //       'dateexpircni' => $request->dateexpircni,
    //       'numeropermis' => $request->numeropermis,
    //       'categoriepermis' => $categoriepermis,
    //       'dateetablpermis' => $request->dateetablpermis,
    //       'dateexpirpermis' => $request->dateexpirpermis,
    //       'numeross' => $request->numeross,
    //       'numeroalf' => $request->numeroalf,
    //       'numeroetranger' => $request->numeroetranger,
    //       'lieudelivrancecs' => $request->lieudelivrancecs,
    //       'numeroalf' => $request->numeroalf,
    //       'etablissementcartedesejour' => $request->etablissementcartedesejour,
    //       'expirationcartedesejour' => $request->expirationcartedesejour,
    //       'qualification' => $qualification,
    //       'numeroads' => $request->numeroads,
    //       'nomchien' => $request->nomchien,
    //       'datevaliditevaccin' => $request->datevaliditevaccin,
    //     ]);

    //     return redirect()->back();
    // }
    public function store(Request $request)
    {
      // dd($request->all());
        //Validation de données
        $v=$this->validationsAgent($request);

        if($v->fails()){
          return redirect()
                ->back()
                ->withErrors($v)
                ->withInput();
        }

        $categoriepermis=BlackshFonctions::arrayToString($request->categoriepermis);
        $qualification=BlackshFonctions::qualificationString($request);
        //Enrégistrements des informations
        Agent::create([
          'civilite'=>$request->civilite,
          'statutmatrimonial'=>$request->statutmatrimonial,
          'nom' => $request->nom,
          'datenaissance' => $request->datenaissance,
          'email' => $request->email,
          'codepostal' => $request->codepostal,
          'matricule' => $request->matricule,
          'prenoms' => $request->prenoms,
          'typecontrat' => $request->typecontrat,
          'dureeducontrat' => $request->dureeducontrat,
          'nationalite'=>$request->nationalite,
          'commune' => $request->commune,
          'departement' => $request->departement,
          'numeromobile' => $request->numeromobile,
          'numerofixe' => $request->numerofixe,
          'numerocni' => $request->numerocni,
          'dateexpircni' => $request->dateexpircni,
          'numeropermis' => $request->numeropermis,
          'categoriepermis' => $categoriepermis,
          'dateetablpermis' => $request->dateetablpermis,
          'dateexpirpermis' => $request->dateexpirpermis,
          'numeross' => $request->numeross,
          'numeroalf' => $request->numeroalf,
          'numeroetranger' => $request->numeroetranger,
          'lieudelivrancecs' => $request->lieudelivrancecs,
          'numeroalf' => $request->numeroalf,
          'etablissementcartedesejour' => $request->etablissementcartedesejour,
          'expirationcartedesejour' => $request->expirationcartedesejour,
          'qualification' => $qualification,
          'numeroads' => $request->numeroads,
          'nomchien' => $request->nomchien,
          'datevaliditevaccin' => $request->datevaliditevaccin,
        ]);

        return redirect()->back();
    }
              

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $agent=Agent::where('id',$id)->firstOrFail();
        $categoriepermisArray=explode(',',$agent->categoriepermis);
        $qualificationArray=explode(',',$agent->qualification);

        if($request->ajax()){
          return response()->json(['content'=>view('pages.agents.edit',compact('agent','categoriepermisArray','qualificationArray'))->renderSections()['content']],200);
        }
        // dd($qualificationArray,in_array('ads',$qualificationArray));
        return view('pages.agents.edit',compact('agent','categoriepermisArray','qualificationArray'));
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
        //Validation de données
        $v=$this->validationsAgent($request);

        if($v->fails()){
          return redirect()
                ->back()
                ->withErrors($v)
                ->withInput();
        }
        //Enregistrement
        $agent=Agent::where('id',$id)->firstOrFail();
        $categoriepermis=BlackshFonctions::arrayToString($request->categoriepermis);
        $qualification=BlackshFonctions::qualificationString($request);
        //Enrégistrements des informations
        $agent->update([
          'civilite'=>$request->civilite,
          'statutmatrimonial'=>$request->statutmatrimonial,
          'nom' => $request->nom,
          'datenaissance' => $request->datenaissance,
          'email' => $request->email,
          'codepostal' => $request->codepostal,
          'matricule' => $request->matricule,
          'prenoms' => $request->prenoms,
          'typecontrat' => $request->typecontrat,
          'dureeducontrat' => $request->dureeducontrat,
          'nationalite'=>$request->nationalite,
          'commune' => $request->commune,
          'departement' => $request->departement,
          'numeromobile' => $request->numeromobile,
          'numerofixe' => $request->numerofixe,
          'numerocni' => $request->numerocni,
          'dateexpircni' => $request->dateexpircni,
          'numeropermis' => $request->numeropermis,
          'categoriepermis' => $categoriepermis,
          'dateetablpermis' => $request->dateetablpermis,
          'dateexpirpermis' => $request->dateexpirpermis,
          'numeross' => $request->numeross,
          'numeroalf' => $request->numeroalf,
          'numeroetranger' => $request->numeroetranger,
          'lieudelivrancecs' => $request->lieudelivrancecs,
          'numeroalf' => $request->numeroalf,
          'etablissementcartedesejour' => $request->etablissementcartedesejour,
          'expirationcartedesejour' => $request->expirationcartedesejour,
          'qualification' => $qualification,
          'numeroads' => $request->numeroads,
          'nomchien' => $request->nomchien,
          'datevaliditevaccin' => $request->datevaliditevaccin,
        ]);

        return redirect()->route('agent.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent=Agent::where('id',$id)->firstOrFail();

        $result=$agent->delete();
        
        $agents=Agent::all();
        $new_content=view('pages.agents.table',compact('agents'))->render();

        if($result){
            return response()->json(['statut'=>'succes','msg'=>'Planning Supprimé','new_content'=>$new_content],200);
        }
        else{
            return response()->json(['statut'=>'echec','msg'=>'Erreur, veuillez réessayer svp !','new_content'=>$new_content],422);
        }
    }

    //Fonction validation des données
    public function validationsAgent(Request $request){
      //Validation de données
      $v=Validator::make($request->all(),[
          'civilite'=> [
              'required',
                Rule::in(['M', 'Mll','Mme']),
          ],
          'statutmatrimonial'=> [
                'required',
                Rule::in(['mar', 'cel','veuf']),
            ],
          'nom' => 'required|min:2',
          'datenaissance' => 'required',
          'matricule' => 'required',
          'prenoms' => 'required',
          'typecontrat'=> [
                'required',
                Rule::in(['cdi', 'cdd','interim','essai']),
          ],
          'nationalite'=> [
                'required',
                Rule::in(['FR', 'ET']),
          ]
      ]);
      //Validation si la nationalité est Française
      $v->sometimes('numerocni','required|min:5', function ($input) use ($request) {
          return $request->nationalite==='FR';
      });

      $v->sometimes('dateexpircni','required|date', function ($input) use ($request) {
          return $request->nationalite==='FR';
      });

      //Validation si la nationalité est étrangère
      $v->sometimes('numeroetranger','required|min:5', function ($input) use ($request) {
          return $request->nationalite==='ET';
      });

      $v->sometimes('lieudelivrancecs','required|min:5', function ($input) use ($request) {
          return $request->nationalite==='ET';
      });

      $v->sometimes('etablissementcartedesejour','required|date', function ($input) use ($request) {
          return $request->nationalite==='ET';
      });

      $v->sometimes('expirationcartedesejour','required|date', function ($input) use ($request) {
          return $request->nationalite==='ET';
      });
      //Validation si le permis est saisie
      $v->sometimes(['dateetablpermis','dateexpirpermis'],'required|date', function ($input) use ($request) {
          return !is_null($request->numeropermis);
      });
      $v->sometimes('categoriepermis',['required',Rule::in(['AM','A','A1','A2','B','B1','BE','C','C1','CE','C1E','D','D1','DE','D1E'])], function ($input) use ($request) {
          return !is_null($request->numeropermis);
      });
      //Validation de la durée du contrat si ce n'est pas un cdi
      $v->sometimes('dureeducontrat',['required',Rule::in(['3mois', '6mois','1ans','2ans'])], function ($input) use ($request) {
          return $request->typecontrat!='cdi';
      });
      //Validation si ADS est coché
      $v->sometimes('numeroads','required|min:5', function ($input) use ($request) {
          return $request->ads==='on';
      });
      //Validation si maitre chien est coché
      $v->sometimes('nomchien','required|min:2', function ($input) use ($request) {
          return $request->maitrechien==='on';
      });
      $v->sometimes('datevaliditevaccin','required|date', function ($input) use ($request) {
          return $request->maitrechien==='on';
      });
      //Retour des erreurs
      return $v;
    }
}
        // $plannings =Planning::select(DB::raw('agent_id,sum(heure_total_jour) as heure_total_jour,sum(heure_total_nuit) as heure_total_nuit'))
        //     ->where('statut','provisoire')
        //     ->whereYear('date_debut',$annee)
        //     ->whereMonth('date_debut',Carbon::parse($mois)->format('m'))
        //     ->where(function($query) use ($word) {
        //         $query->Where('civilite','LIKE','%'.$word.'%')
        //         ->orWhere('statutmatrimonial','LIKE','%'.$word.'%')
        //         ->orWhere('nom','LIKE','%'.$word.'%')
        //         ->orWhere('datenaissance','LIKE','%'.$word.'%')
        //         ->orWhere('email','LIKE','%'.$word.'%')
        //         ->orWhere('codepostal','LIKE','%'.$word.'%')
        //         ->orWhere('matricule','LIKE','%'.$word.'%')
        //         ->orWhere('prenoms','LIKE','%'.$word.'%')
        //         ->orWhere('typecontrat','LIKE','%'.$word.'%')
        //         ->orWhere('dureeducontrat','LIKE','%'.$word.'%')
        //         ->orWhere('nationalite','LIKE','%'.$word.'%')
        //         ->orWhere('commune','LIKE','%'.$word.'%')
        //         ->orWhere('departement','LIKE','%'.$word.'%')
        //         ->orWhere('numeromobile','LIKE','%'.$word.'%')
        //         ->orWhere('numerofixe','LIKE','%'.$word.'%')
        //         ->orWhere('numerocni','LIKE','%'.$word.'%')
        //         ->orWhere('dateexpircni','LIKE','%'.$word.'%')
        //         ->orWhere('numeropermis','LIKE','%'.$word.'%')
        //         ->orWhere('categoriepermis','LIKE','%'.$word.'%')
        //         ->orWhere('dateetablpermis','LIKE','%'.$word.'%')
        //         ->orWhere('dateexpirpermis','LIKE','%'.$word.'%')
        //         ->orWhere('numeross','LIKE','%'.$word.'%')
        //         ->orWhere('numeroalf','LIKE','%'.$word.'%')
        //         ->orWhere('numeroetranger','LIKE','%'.$word.'%')
        //         ->orWhere('lieudelivrancecs','LIKE','%'.$word.'%')
        //         ->orWhere('numeroalf','LIKE','%'.$word.'%')
        //         ->orWhere('etablissementcartedesejour','LIKE','%'.$word.'%')
        //         ->orWhere('expirationcartedesejour','LIKE','%'.$word.'%')
        //         ->orWhere('qualification','LIKE','%'.$word.'%')
        //         ->orWhere('numeroads','LIKE','%'.$word.'%')
        //         ->orWhere('nomchien','LIKE','%'.$word.'%')
        //         ->orWhere('datevaliditevaccin','LIKE','%'.$word.'%');
        //     })
        //     ->groupBy('agent_id')
        //     ->get();