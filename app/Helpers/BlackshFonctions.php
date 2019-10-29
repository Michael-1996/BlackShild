<?php 

namespace App\Helpers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
class BlackshFonctions
{
	public static function arrayToString($array=[]){
        $string='';

        if(is_null($array))
        	return '';

        foreach ($array as $value) {
            $string.=$value.',';
        }
        return $string; 
    } 

	public static function qualificationString(Request $request){
		$qualification='';
		if($request->ads==='on'){
			$qualification.='ads,';
		}
		if($request->maitrechien==='on'){
			$qualification.='maitrechien,';
		}
		if($request->ssiap1==='on'){
			$qualification.='ssiap1,';
		}
		if($request->ssiap2==='on'){
			$qualification.='ssiap2,';
		}
		if($request->chefequipe==='on'){
			$qualification.='chefequipe,';
		}
		if($request->superviseur==='on'){
			$qualification.='superviseur,';
		}
		if($request->commercial==='on'){
			$qualification.='commercial,';
		}
		if($request->agentcontrole==='on'){
			$qualification.='agentcontrole,';
		}

        return $qualification; 
    } 

    public static function upload(Request $request){
    	$file=$request->file('photo');

    	if(is_null($file))
    		return '';

    	// $filename=$file->getClientOriginalName();
    	$fileExtension=$file->getClientOriginalExtension();
    	$filename=Str::slug($request->nom).'.'.$fileExtension;

    	$path=$request->file('photo')->move(public_path('uploads/img/sites'),$filename);
    	// $photoUrl=url('/'.$filename);
    	$photoUrl='uploads/img/sites/'.$filename;

    	return $photoUrl;
    }
}