<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    protected $guarded= [];

    public function agent(){
    	return $this->belongsTo('App\Models\Agent');
    }

    public function site(){
    	return $this->belongsTo('App\Models\Site');
    }
}
