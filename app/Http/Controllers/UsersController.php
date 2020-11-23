<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use App\DataTables\UsersDatatable;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    
    // authrization middlewarw
    public function __construct()
    {

        $this->middleware('auth:admins');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDatatable $dataTable)
    {
        //
        return $dataTable->render('control.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('control.users.create');
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
        $data = $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
        ]);

        $pass = Hash::make($data['password']);

        $user = Users::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $pass,
        ]);
        return redirect('/control/users');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = \App\Models\Users::find($id);
        return view('control.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email,'.$id,
            'password' => 'required|string',
        ]);

        $pass = Hash::make($data['password']);

        $user = Users::where('id', $id)
        ->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $pass,
        ]);

        return redirect('/control/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Users::destroy($id);
        return redirect('/control/users');
    }

    public function multiDestroy(Request $request)
    {
        //
        $ids = $request->ids;
        
        
        if (is_array($ids)) 
        {
            Users::destroy($ids);
        }
        else
        {
            $pars = explode(",",$ids);
            foreach ($pars as $par){
                Users::destroy($par);
            }
        }

        return response()->json(['success'=>"Products Deleted successfully."]);
        
    }
}
