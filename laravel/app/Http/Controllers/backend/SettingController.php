<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    function index(){
        $data=Setting::first();
        //return $data;
        return view('backend.setting.index',['data'=>$data]);
    }
    function store(Request $request){
        $request->validate([
            'comment_a_a'=>'numeric',
            'user_a_a'=>'numeric',
            'recent_p_l'=>'numeric',
            'popular_p_l'=>'numeric',
            'recent_c_l'=>'numeric',
        ]);

        $count=Setting::count();
        if($count==0){
            $model= new Setting;
            $model->comment_a_a=$request->comment_a_a;
            $model->user_a_a=$request->user_a_a;
            $model->recent_p_l=$request->recent_p_l;
            $model->popular_p_l=$request->popular_p_l;
            $model->recent_c_l=$request->recent_c_l;
            $model->save();
        }else{
            $firstData=Setting::first();
            $model=Setting::find($firstData->id);
            $model->comment_a_a=$request->comment_a_a;
            $model->user_a_a=$request->user_a_a;
            $model->recent_p_l=$request->recent_p_l;
            $model->popular_p_l=$request->popular_p_l;
            $model->recent_c_l=$request->recent_c_l;
            $model->update();
        }

        return redirect()->back()->with('message','Setting Updated!!');


    }
}
