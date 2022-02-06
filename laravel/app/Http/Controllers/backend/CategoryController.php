<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Category::all();
        return view('backend.category.index',['datas'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.add');
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
            'title'=>'required',
            'detail'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

        if($request->hasFile('image')){
            $img= $request->file('image');
            $imgName= time().".".$img->getClientOriginalExtension();
            $path= public_path('/images/category');
            $img->move($path, $imgName);
        }

        $model = new Category();
        $model->title = $request->title;
        $model->detail = $request->detail;
        $model->image = $imgName;
        $model->save();

        return redirect()->back()->with('message','Category Added!!');

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
        $data=Category::find($id);

        return view('backend.category.update',['datas'=>$data]);
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
        $request->validate([
            'title'=>'required|max:50',
            'detail'=>'required|max:100',

        ]);

        if($request->hasFile('image')){
            $request->validate([
                'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:1024'
            ]);
            $img= $request->file('image');
            $imgName= time().".".$img->getClientOriginalExtension();
            $path= public_path('/images/category');
            $img->move($path, $imgName);

            // File::exists(public_path('img/dummy.jpg')
            if(File::exists(public_path('/images/category/'.$request->cat_image))){
                unlink(public_path('/images/category/'.$request->cat_image));
            }

        }else{
            $imgName=$request->cat_image;
        }

        $model = Category::find($id);
        $model->title = $request->title;
        $model->detail = $request->detail;
        $model->image = $imgName;
        $model->update();

        return redirect()->back()->with('message','Category Updated!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Category::find($id);
        if(File::exists(public_path('/images/category/'.$image->image))){
            unlink(public_path('/images/category/'.$image->image));
        }
        Category::where('id', $id)->delete();
        return redirect()->back()->with('message','Category Deleted!!');
    }
}
