<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Redirect;
use Auth;
use App\Assignment;

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
        // if(Auth::user()->admin)
        // {
        //     return view('dashboard.assignment');
        // } else{
        //     return Redirect::back();
        // }

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
            $assignment = new Assignment;

            $assignment->assignment = $request->assignment;
            $assignment->user_id = $request->user_id;


            if($request->hasFile('file')){

                $assignmentFile = $request->file('file');
                $filename = time() . '.' . $assignmentFile->getClientOriginalExtension();
                $destinationPath = 'public/files';
                $path = $request->file('file')->storeAs($destinationPath, $assignmentFile);
            }

            $assignment->file = $assignmentFile;
            $assignment->save();
            return Redirect::back();

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
        if(Auth::user()->admin)
        {
            $user = User::find($id);

                return view('dashboard.edit')
                ->with('user', $user);
        } else{
            return Redirect::back();
        }


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

    public function showAssignments()
    {
        if(Auth::user()->admin){


        $assignments = Assignment::get()->all();

        return view('dashboard.assignment')
            ->with('assignments', $assignments);
        }else{
            return Redirect::back();
        }
    }

    public function destroyAssignment($id)
    {
        $assignment = Assignment::findOrFail($id);

        $assignment->delete();

        return redirect::back();
    }
}
