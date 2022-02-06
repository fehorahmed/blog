<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Post::all();
        return view('backend.post.index',['datas'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats=Category::all();
        return view('backend.post.add',['cats'=>$cats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'cat_id'=>'required',
            'title'=>'required',
            'tags'=>'required',
            'detail'=>'required',
            //'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

        if($request->hasFile('thumb')){
            $request->validate([
                'thumb'=>'image|mimes:jpeg,png,jpg,gif|max:1024'
            ]);
            $img= $request->file('thumb');
            $ThumbImgName= time().".".$img->getClientOriginalExtension();
            $path= public_path('/images/post/thumb');
            $img->move($path, $ThumbImgName);
        }else{
            $ThumbImgName="na";
        }

        if($request->hasFile('full_img')){
            $request->validate([
                'full_img'=>'image|mimes:jpeg,png,jpg,gif|max:1024'
            ]);
            $img= $request->file('full_img');
            $FullImgName= time().".".$img->getClientOriginalExtension();
            $path= public_path('/images/post');
            $img->move($path, $FullImgName);
        }else{
            $FullImgName="na";
        }

        $model = new Post();
        $model->user_id = 0;
        $model->cat_id = $request->cat_id;
        $model->title = $request->title;
        $model->thumb = $ThumbImgName;
        $model->full_img = $FullImgName;
        $model->detail = $request->detail;
        $model->tags = $request->tags;
        $model->save();

        return redirect()->back()->with('message','Post Added!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
