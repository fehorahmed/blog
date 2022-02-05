<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;


class AdminController extends Controller
{
    public function login(){
    	return view('backend.login');
    }

    public function submitLogin(Request $request){
    	
    	$request->validate([
    		'username'=>'required',
    		'password'=>'required'
    	]);
		//return $request;
    	$count= Admin::where(['username'=>$request->username,'password'=>$request->password])->count();
    	
    	if ($count>0) {
    		return redirect()->route('admin.dashboard')->with('message','Welcome to Admin Panel');
    	}else {
    		return redirect()->back()->with('message','Username or Passeowd is incorrect.');
    	}
    }


    function dashboard(){
    	
    	return view('backend.dashboard');
    }
}
