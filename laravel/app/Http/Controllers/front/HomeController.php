<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request){

        if($request->has('q')){
            $q=$request->q;
            $post= Post::where('title','like','%'.$q.'%')->orderBy('id','desc')->paginate(4);
        }else{
            $post= Post::orderBy('id','desc')->paginate(4);

        }
        return view('index',['posts'=>$post]);
    }

    function postDetails($id){
        $data= Post::find($id);
        return view('front.post_details',['data'=>$data]);
    }

}
