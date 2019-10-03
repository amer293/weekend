<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Redirect;
use Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::check()){

        $user = User::get()->all();

        return view('dashboard.index')
            ->with('user', $user);
        }else{
            return Redirect::back();
        }

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
       
        $user = User::find($id);

        return view('dashboard.edit')
            ->with('user', $user);
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
        

            // logica
            $user = User::findOrFail($id);
            $user->first_name = $request->first_name;
            $user->last_name  = $request->last_name;
            $user->email = $request->email;
            $user->admin = ($request->admin) ? 1 : 0;
            $user->recruiter = ($request->recruiter) ? 1 : 0;


            if($request->password){
                $user->password = Hash::make($request->password);
            }
            
            
            $user->save();


            return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        $user->delete();
        
        return redirect('/dashboard');
    }
}
