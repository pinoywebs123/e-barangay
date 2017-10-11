<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\auth\login;
use App\Barangay\Auth\Login_check;
use Auth;
class AuthController extends Controller
{
    public function main(){
    	return view('auth.main');
    }

    public function login(){
    	return view('auth.login');
    }

    public function login_check(login $login, Login_check $check){
    	if($check->checker()){
    		if(Auth::user()->status_id == 1){
    			if(Auth::user()->role_id == 1){
    				return redirect()->route('admin_home');
    			}else if(Auth::user()->role_id == 2){
    				return redirect()->route('user_main');
    			}
    		}else if(Auth::user()->status_id == 2){
    			return 'banned';
    		}
    	}else{
    		return redirect()->back()->with('error', 'please input correct username and password');
    	}
    }

    public function about(){
        return view('about');
    }
}
