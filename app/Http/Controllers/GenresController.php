<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use Illuminate\Http\Request;
use App\DataTables\GenresDatatable;

class GenresController extends Controller
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
    public function index(GenresDatatable $dataTable)
    {
        //
        return $dataTable->render('control.genres.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $options = Genres::get()->makeHidden(['created_at', 'updated_at']);
        return view('control.genres.create', compact('options'));
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
            'name' => 'required|unique:genres|max:255',
            'parent_id' => 'sometimes',
        ]);

        $Genre = Genres::create([
            'name' => $data['name'],
            'parent_id' => $data['parent_id'],
        ]);
        return redirect('/control/genres');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genres  $genres
     * @return \Illuminate\Http\Response
     */
    public function show(Genres $genres)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genres  $genres
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $genre = Genres::find($id);
        $options = Genres::get()->makeHidden(['created_at', 'updated_at']);
        return view('control.genres.edit', compact('genre', 'options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genres  $genres
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $data = $this->validate($request, [
            'name' => 'required|unique:genres,name,' .$id,
            'parent_id' => 'sometimes',
        ]);

        $actor = Genres::where('id', $id)
        ->update([
            'name' => $data['name'],
            'parent_id' => $data['parent_id'],
        ]);

        return redirect('/control/genres');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genres  $genres
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Genres::destroy($id);
        return redirect()->back();
    }

    public function multiDestroy(Request $request)
    {
        //
        $ids = $request->ids;
        
        
        if (is_array($ids)) 
        {
            Genres::destroy($ids);
        }
        else
        {
            $pars = explode(",",$ids);
            foreach ($pars as $par){
                Genres::destroy($par);
            }
        }

        return response()->json(['success'=>"Products Deleted successfully."]);
        
    }
}
