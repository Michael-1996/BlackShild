<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasesController extends Controller
{
    public function index(){
    	return view('layouts.dashboard');
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
