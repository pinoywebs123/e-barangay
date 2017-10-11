<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMissing extends Model
{
    public function missing(){
    	return $this->belongsTo('App\Missing');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
