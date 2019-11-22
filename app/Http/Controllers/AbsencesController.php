<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Agent;
use App\Models\Conge;
use Illuminate\Http\Request;

class AbsencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $absences=Conge::where('typeconge',null)->get();   
        
        if($request->ajax()){
            return response()->json(['content'=>view('pages.absences.index',compact('absences'))->renderSections()['content']],200);
        }
        return view('pages.absences.index',compact('absences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents=Agent::all();
        return view('pages.absences.create',compact('agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v=$this->validationConge($request);

        if($v->fails()){
            if ($request->ajax()) {    
                return response()->json($v->errors(),422);
            }
          return redirect()
                ->back()
                ->withErrors($v)
                ->withInput();
        }

        Conge::create([
            'agent_id'=>$request->agent,
            'date_debut'=>$request->date_debut,
            'date_fin'=>$request->date_fin,
            'motif'=>$request->motif,
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
    public function edit($id)
    {
        $absence=Conge::where('id',$id)->firstOrFail();

        $agent=$absence->agent;

        return view('pages.absences.edit',compact('absence','agent'));
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
        $v=$this->validationConge($request);

        if($v->fails()){
            if ($request->ajax()) {    
                return response()->json($v->errors(),422);
            }
          return redirect()
                ->back()
                ->withErrors($v)
                ->withInput();
        }
        
        $absence=Conge::where('id',$id)->firstOrFail();

        $absence->update([
            'agent_id'=>$request->agent,
            'date_debut'=>$request->date_debut,
            'date_fin'=>$request->date_fin,
            'motif'=>$request->motif,
        ]);

        return redirect()->route('absence.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absence=Conge::where('id',$id)->firstOrFail();

        $result=$absence->delete();
        
        $absences=Conge::all();
        $new_content=view('pages.absences.table',compact('absences'))->render();

        if($result){
            return response()->json(['statut'=>'succes','msg'=>'Planning Supprimé','new_content'=>$new_content],200);
        }
        else{
            return response()->json(['statut'=>'echec','msg'=>'Erreur, veuillez réessayer svp !','new_content'=>$new_content],422);
        }
    }

    public function validationConge(Request $request){
        $v=Validator::make($request->all(),[
            'agent'=>'required|exists:agents,id',
            'date_debut'=>'required|date',
            'date_fin'=>'required|date',
        ]);

        $v->sometimes('motif','required|min:2|string',function($input) use ($request){
            return !is_null($request->motif);
        });

        return $v;
    }
}
