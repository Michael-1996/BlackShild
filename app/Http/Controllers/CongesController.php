<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Agent;
use App\Models\Conge;
use Illuminate\Http\Request;

class CongesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $conges=Conge::all();   
        
        if($request->ajax()){
            return response()->json(['content'=>view('pages.conges.index',compact('conges'))->renderSections()['content']],200);
        }
        return view('pages.conges.index',compact('conges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents=Agent::all();
        return view('pages.conges.create',compact('agents'));
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
            'typeconge'=>$request->typeconge,
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
        $conge=Conge::where('id',$id)->firstOrFail();

        $agent=$conge->agent;

        return view('pages.conges.edit',compact('conge','agent'));
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
        
        $conge=Conge::where('id',$id)->firstOrFail();

        $conge->update([
            'agent_id'=>$request->agent,
            'typeconge'=>$request->typeconge,
            'date_debut'=>$request->date_debut,
            'date_fin'=>$request->date_fin,
            'motif'=>$request->motif,
        ]);

        return redirect()->route('conge.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $conge=Conge::where('id',$id)->firstOrFail();

        $result=$conge->delete();
        
        $conges=Conge::all();
        $new_content=view('pages.conges.table',compact('conges'))->render();

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
