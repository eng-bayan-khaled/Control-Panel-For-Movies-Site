<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Http\Request;
use App\DataTables\AdminsDatatable;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
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
    public function index(AdminsDatatable $dataTable)
    {
        //
        return $dataTable->render('control.admins.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('control.admins.create');
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
        if (request()->ajax()) {
            return $editor->process(request());
        }
        $data = $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string|unique:admins,email',
            'password' => 'required|string',
        ]);

        $pass = Hash::make($data['password']);

        $admin = Admins::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $pass,
        ]);
        return redirect('/control/admins');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function show(Admins $admins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $admin = \App\Models\Admins::find($id);
        return view('control.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string|unique:admins,email,'.$id,
            'password' => 'required|string',
        ]);

        $pass = Hash::make($data['password']);

        $admin = Admins::where('id', $id)
        ->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $pass,
        ]);

        return redirect('/control/admins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Admins::destroy($id);
        return redirect('/control/admins');
    }

    public function multiDestroy(Request $request)
    {
        //
        $ids = $request->ids;
        
        
        if (is_array($ids)) 
        {
            Admins::destroy($ids);
        }
        else
        {
            $pars = explode(",",$ids);
            foreach ($pars as $par){
                Admins::destroy($par);
            }
        }

        return response()->json(['success'=>"Products Deleted successfully."]);
        
    }
}
