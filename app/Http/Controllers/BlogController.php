<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Auth;
use DB;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      
        $data['blogs'] = DB::table('blog')->where('user_id',Auth::user()->id)->get();
         
        return view('admin.blogs.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $tags  = implode(',',$request->input('tags'));


        if($request->file('image')){
            $image = $request->file('image');
            $image_name =time().'.'.$image->getClientOriginalExtension();
            $destination = public_path('/images');
            $image->move($destination,$image_name);
        }
        $data = array(
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'tags' => $tags,
            'image' => $image_name,
            'user_id' => Auth::user()->id
        );
        $insert = Blog::insert($data);
        if($insert){
            return redirect('admin/blogs')->with('success','blog added successfully');
        }else{
            return redirect()->back()->with('error','something went wronf');
        }
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
        $data['blogs'] = Blog::find($id);
        return view('admin.blogs.view',$data);
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
        $data['blogs'] = Blog::find($id);
        return view('admin.blogs.edit',$data);
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
  if($request->file('image')){
   
            $image = $request->file('image');
            $image_name =time().'.'.$image->getClientOriginalExtension();
            $destination = public_path('/images');
            $image->move($destination,$image_name);
        }else{

            $image_name  = $request->input('old_image');
        }

         $tags  = implode(',',$request->input('tags'));
        $data = array(
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'tags' => $tags,
            'image' => $image_name
        );
        $update = Blog::where('id',$id)->update($data);
        if($update){
            return redirect('admin/blogs')->with('success','blog updated successfully');
        }else{
            return redirect()->back()->with('error','something went wrong');
        }



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
        $delete = Blog::where('id',$id)->delete();
        if($delete){
            return redirect('admin/blogs')->with('success','blogs deleted successfully');
        }else{
            return redirect('admin/blogs')->with('error','Something went wrong');
        }   
    }   
   
}
