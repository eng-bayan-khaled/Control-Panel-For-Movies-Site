<?php

namespace App\Http\Controllers;

use App\Models\Episodes;
use Illuminate\Http\Request;
use App\DataTables\EpisodesDatatable;


class EpisodesController extends Controller
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
    public function index(EpisodesDatatable $dataTable)
    {
        //
        return $dataTable->render('control.episodes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('control.episodes.create');
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
            'title' => 'required|unique:episodes|max:255',
            'summary' => 'required',
            'duration' => 'required|integer',
            'season_id' => 'required|integer',
        ]);

        $episode = Episodes::create([
            'title' => $data['title'],
            'summary' => $data['summary'],
            'duration' => $data['duration'],
            'season_id' => $data['season_id'],
        ]);

        return redirect('/control/episodes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Episodes  $episodes
     * @return \Illuminate\Http\Response
     */
    public function show(Episodes $episodes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Episodes  $episodes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $episode = Episodes::with('season.series')->find($id);
        $season = $episode->season->id;
        $series = $episode->season->series->id;

        return view('control.episodes.edit', compact('episode', 'season', 'series'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Episodes  $episodes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $this->validate($request, [
            'title' => 'required|unique:episodes,title,' .$id,
            'summary' => 'required',
            'duration' => 'required|integer',
            'season_id' => 'required|integer',
        ]);
        $season = Episodes::where('id', $id)
        ->update([
            'title' => $data['title'],
            'summary' => $data['summary'],
            'duration' => $data['duration'],
            'season_id' => $data['season_id'],
        ]);

        return redirect('/control/episodes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Episodes  $episodes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Episodes::destroy($id);
        return redirect()->back();
    }

    public function multiDestroy(Request $request)
    {
        //
        $ids = $request->ids;
        
        
        if (is_array($ids)) 
        {
            Episodes::destroy($ids);
        }
        else
        {
            $pars = explode(",",$ids);
            foreach ($pars as $par){
                Episodes::destroy($par);
            }
        }

        return response()->json(['success'=>"Products Deleted successfully."]);
        
    }
}
