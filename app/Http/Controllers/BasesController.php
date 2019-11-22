<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Site;
use App\Models\Agent;
use App\Models\Planning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BasesController extends Controller
{
    public function index(){
        //Nombre d'agent
        $agentTotal=Agent::all()->count();
        //Nombre de site
        $siteTotal=Site::all()->count();
        //Total heure de déploiement de tous les agents
        $moisActuel=Carbon::now()->format('m');
        $heureTotal=DB::table('plannings')
                ->select(DB::raw('SUM(heure_total_jour) as total_jour,SUM(heure_total_nuit) as total_nuit'))
                ->groupBy('agent_id')
                ->whereMonth('date_debut',$moisActuel)
                ->get();

        // dd($heureTotal);
        $sumArray = [];
        $sumArray['total_jour']=0;
        $sumArray['total_nuit']=0;
        foreach ($heureTotal as $k=>$subArray) {
          foreach ($subArray as $id=>$value) {
            $sumArray[$id]+=$value;
            // $sumArray[$id]+=$value;
          }
        }
        // dd($sumArray);
        $heureTotalJour=$sumArray['total_jour'];
        $heureTotalNuit=$sumArray['total_nuit'];

        $agentDeploye= DB::table('plannings')
            ->join('agents', 'agents.id', '=', 'plannings.agent_id')
            ->whereMonth('date_debut',$moisActuel)
            ->select('agents.*')
            ->distinct()->get()->count();

        $pourcentageDeploye=number_format((float)($agentDeploye*100)/$agentTotal, 2, '.', '');

        $agent=DB::table('agents')
                // ->selectRaw('ADDDATE(dateexpircni, -14) as dateexpirationcni')
                ->whereRaw('ADDDATE(expirationcartedesejour, -14) >= NOW()')
                ->get();
        // dd($agent);
    	return view('layouts.dashboard',compact('agentTotal','siteTotal','pourcentageDeploye','heureTotalJour','heureTotalNuit'));
    }

    // public function upload(Request $request){
    // 	// dd('Bonsoir');
    // 	$filename='user_image.png';
    // 	dd($request->all());
    // 	$path=$request->file('photo')->move(public_path('/'),$filename);
    // 	$photoUrl=url('/'.$filename);

    // 	return response()->json(['url'=>$photoUrl],200);
    // }
}
