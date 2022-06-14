<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
class UserController extends Controller
{

    public function register(){
        return view('register');
    }
    public function register_process(Request $request){

         $validatedData = $request->validate([
                'name' => 'required',
                'password' => 'required|min:5|required_with:confirmpassword|same:confirmpassword',
                'email' => 'required|email|unique:users',   
                'confirmpassword' => 'min:6'
            ], [
                'name.required' => 'Name is required',
                'password.required' => 'Password is required',
            ]);

         $data = array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('confirmpassword'))
         );

        $insert = User::insert($data);
        if($insert){
          return redirect('login')->with('success','User Added Successfully.now you can login');
        }else{
            return redirect()->back()->with('success','Something went wrong');
        }




    }
    public function login(){

    return view('login');
    }
    public function login_process(Request $request){


         $validatedData = $request->validate([
                
                'password' => 'required|min:5',
                'email' => 'required|email',   
            ], [
                'password.required' => 'Password is required',
            ]);

         $data = array(
            'email' => $request->input('email'),
            'password' => $request->input('password')
         );
         if(Auth::attempt($data)){
          
            return redirect('admin/dashboard');
         }else{
            return redirect()->back();
         }

    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
