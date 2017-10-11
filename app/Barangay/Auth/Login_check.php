<?php 

namespace App\Barangay\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login_check {
	protected $request;

	public function __construct(Request $request){
		$this->request = $request;
	}

	public function checker(){
		$data = ['username'=> $this->request['username'], 'password'=> $this->request['password']];
		if(Auth::attempt($data)){
			return true;
		}else{
			return false;
		}
	}

}