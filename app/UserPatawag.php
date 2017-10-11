<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPatawag extends Model
{
    public function blotter(){
    	return $this->belongsTo('App\UserBlotter', 'entry_number', 'entry_number');
    }

    public function status(){
    	return $this->belongsTo('App\Status');
    }
}
