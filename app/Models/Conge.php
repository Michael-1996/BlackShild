<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
	protected $guarded=[];
	
    public function agent(){
    	return $this->belongsTo('App\Models\Agent');
    }
}
