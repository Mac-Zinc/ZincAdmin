<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use Auth;
use Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use DB;

class Login extends Controller{

	protected $layout = 'layouts.page_user_login_1';

	public function __construct(){
    /* Apply the jwt.auth middleware to all methods in this controller except for the authenticate method. We don't want to prevent the user from retrieving their token if they don't already have it */

    	//$this->middleware('jwt.auth', ['except' => ['authenticate','authenticatepin','Tloginpermission','loginpermission','fPWD']]);	  
   	}
  	
  	public function showLoginPage(){
  		return view($this->layout); //,compact('res')
  	}

  	public function logout(Request $request){
  		if(Auth::check()){			
			Auth::logout();
		}
		return Redirect::to('login');
  	}

  	public function fpassword(Request $request){

  	}
  	
  	public function loginValidate(Request $request){
  		$logged=false;
  		$auth = User::where('email_usr', $request->input('username'))->first();
  		//echo $request->input('username');
  		//echo $request->input('password');
  		if($auth){
            Auth::login($auth);
			
			$hashedPassword = Auth::user()->password_usr;
			$user_info=Auth::user();
			if($request->input('password')){
				if (Hash::check($request->input('password'), $hashedPassword)){
              		$logged=true;
				}
			
				if ( $request->input('password') == $hashedPassword){
            		$logged=true;
				}
			
			}
			//return $this->login($request,$logged,$user_info);
			
		}else{
        	$data=['error' => 'Login Error: Invalid Credentials'];
            //return $this->output_format($request,$data,401); 
            
		}

		if($logged){
			return Redirect::to('/');
		}else{
			return Redirect::to('login');
		}

  	}
	
}  	