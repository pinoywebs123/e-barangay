<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBlotter extends Model
{
    public function status(){
    	return $this->belongsTo('App\Status');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
