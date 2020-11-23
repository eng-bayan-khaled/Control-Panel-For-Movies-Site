<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;
use App\DataTables\MoviesDatatable;


class MoviesController extends Controller
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
    public function index(MoviesDatatable $dataTable)
    {
        //
        return $dataTable->render('control.movies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('control.movies.create');
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
            'title' => 'required|unique:movies|max:255',
            'description' => 'required',
            'release_date' => 'sometimes',
            'duration' => 'sometimes|integer',
            'poster_path' => 'sometimes',
        ]);

        $movie = Movies::create($data);

        if ($request->genres){
            foreach ($request->genres as $genre) {
                $genre = \App\models\Genres::find($genre);
                $movie->genres()->attach($genre);
            }
        }
        
        if ($request->tags){
            foreach ($request->tags as $tag) {
                $tag = \App\models\Tags::find($tag);
                $movie->tags()->attach($tag);
            }
        }

        return redirect('/control/movies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function show(Movies $movies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $movies = Movies::find($id);
        return view('control.movies.edit', compact('movies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $movie = \App\models\Movies::find($id);

        $data = $this->validate($request, [
            'title' => 'required|unique:movies,title,' .$id,
            'description' => 'required',
            'release_date' => 'sometimes',
            'duration' => 'sometimes|integer',
            'poster_path' => 'sometimes',
        ]);


        $movie = Movies::where('id', $id)
        ->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'release_date' => $data['release_date'],
            'duration' => $data['duration'],
        ]);

        return redirect('/control/movies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Movies::destroy($id);
        return redirect('/control/movies');
    }

    public function multiDestroy(Request $request)
    {
        //
        $ids = $request->ids;
        
        
        if (is_array($ids)) 
        {
            Movies::destroy($ids);
        }
        else
        {
            $pars = explode(",",$ids);
            foreach ($pars as $par){
                Movies::destroy($par);
            }
        }

        return response()->json(['success'=>"Products Deleted successfully."]);
        
    }
}
