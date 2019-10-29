<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model
{
	use SoftDeletes;
	
    protected $guarded=[];


    public function plannings(){
    	return $this->hasMany('App\Models\Planning');
    }
}
