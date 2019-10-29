<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $guarded=[];

    public function plannings(){
    	return $this->hasMany('App\Models\Planning');
    }

    public function conges(){
    	return $this->hasMany('App\Models\Conge');
    }
}
