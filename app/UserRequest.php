<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function request(){
    	return $this->belongsTo('App\RequestCertificate', 'request_certificate_id', 'id');
    }
}
