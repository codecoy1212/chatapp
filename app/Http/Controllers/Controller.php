<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
     public function logout()
    {

        Session::flush();
        Auth::logout();
        return redirect('login');
    }
    public function login(Request $request){
if($request->admin['email']==$request->doc['email'] and $request->admin['password']==$request->doc['password']){
 Session::put('login','done');
        Session::put('username',$request->doc['username']);
        return true;
}else{
	 
        return false;
}

    }

    public function uploadPic(Request $request){
    	if (!$request->hasFile('file')) {
            $path="";
            $data['status']=false;
       }else{
          $path = $request->file('file')->store('users');  
          $data['status']=true;
       }
       	
       	$data['path']=$path;
       return $data;
    }

}
