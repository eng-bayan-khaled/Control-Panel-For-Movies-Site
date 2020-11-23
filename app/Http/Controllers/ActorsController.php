<?php

namespace App\Http\Controllers;

use App\Models\Actors;
use Illuminate\Http\Request;
use App\DataTables\ActorsDatatable;

class ActorsController extends Controller
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
    public function index(ActorsDatatable $dataTable)
    {
        //
        return $dataTable->render('control.actors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('control.actors.create');
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
            'name' => 'required|unique:actors|max:255',
            'description' => '',
            'role' => 'max:255',
            'country' => 'max:255',
            'DateOfBirth' => 'date ',
            'icon_path' => 'mimes:png,gif,jpeg',
            'photos' => 'array',
        ]);

        $actor = Actors::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'role' => $data['role'],
            'country' => $data['country'],
            'DateOfBirth' => $data['DateOfBirth'],
        ]);

        return redirect('/control/actors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actors  $actors
     * @return \Illuminate\Http\Response
     */
    public function show(Actors $actors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actors  $actors
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $actor = Actors::find($id);
        return view('control.actors.edit', compact('actor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actors  $actors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $this->validate($request, [
            'name' => 'required|unique:actors,name,' .$id,
            'description' => '',
            'role' => 'max:255',
            'country' => 'max:255',
            'DateOfBirth' => 'date ',
        ]);

        $actor = Actors::where('id', $id)
        ->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'role' => $data['role'],
            'country' => $data['country'],
            'DateOfBirth' => $data['DateOfBirth'],
        ]);

        return redirect('/control/actors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actors  $actors
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Actors::destroy($id);
        return redirect()->back();

    }

    public function multiDestroy(Request $request)
    {
        //
        $ids = $request->ids;
        
        
        if (is_array($ids)) 
        {
            Actors::destroy($ids);
        }
        else
        {
            $pars = explode(",",$ids);
            foreach ($pars as $par){
                Actors::destroy($par);
            }
        }

        return response()->json(['success'=>"Products Deleted successfully."]);
        
    }
}
