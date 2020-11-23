<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use Illuminate\Http\Request;
use App\DataTables\LikesDatatable;


class LikesController extends Controller
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
    public function index(LikesDatatable $dataTable)
    {
        //
        return $dataTable->render('control.likes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('control.likes.create');
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
            'like' => 'required|integer|digits_between:0,1',
            'user_id' => 'required|integer',
            'movie_id' => 'required|integer',
            'episode_id' => 'required|integer',
        ]);

        $like = Likes::create($data);

        return redirect('/control/likes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Likes  $likes
     * @return \Illuminate\Http\Response
     */
    public function show(Likes $likes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Likes  $likes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $like = \App\Models\Likes::find($id);
        return view('control.likes.edit', compact('like'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Likes  $likes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $this->validate($request, [
            'like' => 'required|integer|digits_between:0,1',
            'user_id' => 'required|integer',
            'movie_id' => 'sometimes|required|integer',
            'episode_id' => 'sometimes|required|integer',
        ]);

        $like = Likes::where('id', $id)
        ->update($data);

        return redirect('/control/likes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Likes  $likes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Likes::destroy($id);
        return redirect('/control/likes');
    }

    public function multiDestroy(Request $request)
    {
        $ids = $request->ids;
        
        if (is_array($ids)) 
        {
            Likes::destroy($ids);
        }
        else
        {
            $pars = explode(",",$ids);
            foreach ($pars as $par){
                Likes::destroy($par);
            }
        }
        return response()->json(['success'=>"Products Deleted successfully."]);
    }
    
}
