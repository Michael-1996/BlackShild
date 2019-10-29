<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Site;
use Illuminate\Http\Request;
use App\Helpers\BlackshFonctions;

class SitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $sites=Site::all();
    //     return view('pages.sites.index',compact('sites'));
    // }
    public function index(Request $request)
    {
        $sites=Site::all();


        if($request->ajax()){
            return response()->json(['content'=>view('pages.sites.index',compact('sites'))->renderSections()['content']],200);
        }
        
        return view('pages.sites.index',compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax()){
            return response()->json(['content'=>view('pages.sites.create')->renderSections()['content']],200);
        }
        return view('pages.sites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation de données
        $v=$this->validationsSite($request);

        if($v->fails()){
          return redirect()
                ->back()
                ->withErrors($v)
                ->withInput();
        }
        //Enrégistrements des informations
        Site::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'ville' => $request->ville,
            'telephone' => $request->telephone,
            'site_web' => $request->site_web,
            'photo' => BlackshFonctions::upload($request),
            'nommanager' => $request->nommanager,
            'telephonemanager' => $request->telephonemanager,
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
        $site=Site::where('id',$id)->firstOrFail();

        if($request->ajax()){
            return response()->json(['content'=>view('pages.sites.edit',compact('site'))->renderSections()['content']],200);
        }
        return view('pages.sites.edit',compact('site'));
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
        // dd(BlackshFonctions::upload($request));
        // dd($request->all());
        $site=Site::where('id',$id)->firstOrFail();
        //Validation de données
        $v=$this->validationsSite($request);

        if($v->fails()){
          return redirect()
                ->back()
                ->withErrors($v)
                ->withInput();
        }
        //Enrégistrements des informations
        $site->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'ville' => $request->ville,
            'telephone' => $request->telephone,
            'site_web' => $request->site_web,
            'photo' => BlackshFonctions::upload($request),
            'nommanager' => $request->nommanager,
            'telephonemanager' => $request->telephonemanager,
        ]);

        return redirect()->route('site.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $site=Site::where('id',$id)->firstOrFail();

        $result=$site->delete();
        
        $sites=Site::all();
        $new_content=view('pages.sites.table',compact('sites'))->render();

        if($result){
            return response()->json(['statut'=>'succes','msg'=>'Planning Supprimé','new_content'=>$new_content],200);
        }
        else{
            return response()->json(['statut'=>'echec','msg'=>'Erreur, veuillez réessayer svp !','new_content'=>$new_content],422);
        }
    }
    //fonction validation de données
    public function validationsSite(Request $request){
        $v=Validator::make($request->all(),[
            'nom' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
        ]);

        // $v->sometimes('photo',['required','mimes:jpg,png'],function($input) use ($request){
        //     return !is_null($request->photo);
        // });

        $v->sometimes('telephone',['required','numeric','min:2'],function($input) use ($request){
            return !is_null($request->telephone);
        });

        $v->sometimes('nommanager',['required','min:2'],function($input) use ($request){
            return !is_null($request->nommanager);
        });

        $v->sometimes('telephonemanager',['required','numeric','min:2'],function($input) use ($request){
            return !is_null($request->telephonemanager);
        });

        return $v;  
    }
}
