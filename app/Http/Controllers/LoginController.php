<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\User;

use Hash;
use Session;

use DB;


class LoginController extends Controller
{
    //


    public function index(){
    		
            if(Session::has('is_loged_in') and Session::get('is_loged_in')=="3@#546354!2323"):
                return redirect('/');
            endif;

            return view("auth.login");
    }



    public function auth(Request $request){
    		$email = $request->email;
    		$password = $request->password;

    		$result = User::checkEmail($email);

    		if(count($result)==1){
    				if(Hash::check($password,$result[0]->password)):
    					Session::put('is_loged_in','3@#546354!2323');
                        Session::put('user_id', $result[0]->id);
    					return redirect('/');
    				else:
    					Session::flash('passwrod_not_match','Your  is password incorrect');
    					return view('auth.login');
    				endif;
    		}else{
    			Session::flash('email_not_match','The email does not exist in our system');
    			return view('auth.login');
    		}
    }//


    public function showCreateAccountForm(){
        return view('auth.register');
    }

    public function register(Request $request){
            
            $email = $request->email;
            $password = $request->password;
            $data['email']= $email;
            $data['password'] = bcrypt($password);
            User::register($data);
            return redirect('/login');

    }
    public function logout(){
            Session::forget("is_loged_in");
            Session::flash('successful_loguot','You have logouted successfull from your account');
            return redirect()->route('login');
    }// logout


    public function changelang($lang){
            $current_user_id = Session::get('user_id');
             $setting = DB::table("settings")->where('user_id','=',$current_user_id);

            if($setting->count()==0):
                DB::table("settings")->insert(['user_id'=> $current_user_id, 'name'=>'lang','value'=>$lang]);
            else:
                DB::table("settings")->where('user_id', $current_user_id)->update(['value'=>$lang]);
            endif;

            return back();
    }//
}
