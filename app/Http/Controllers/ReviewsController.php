<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;
use App\DataTables\ReviewsDatatable;


class ReviewsController extends Controller
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
    public function index(ReviewsDatatable $dataTable)
    {
        //
        return $dataTable->render('control.reviews.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('control.reviews.create');
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
            'text' => 'required',
            'user_id' => 'required|integer',
            'movie_id' => 'required|integer',
            'episode_id' => 'required|integer',
        ]);

        $like = Reviews::create($data);
        return redirect('/control/reviews');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function show(Reviews $reviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $review = \App\Models\Reviews::find($id);
        return view('control.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $this->validate($request, [
            'text' => 'required',
            'user_id' => 'required|integer',
        ]);

        $like = Reviews::where('id', $id)
        ->update($data);

        return redirect('/control/reviews');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Reviews::destroy($id);
        return redirect('/control/reviews');
    }

    public function multiDestroy(Request $request)
    {
        //
        $ids = $request->ids;
        
        
        if (is_array($ids)) 
        {
            Reviews::destroy($ids);
        }
        else
        {
            $pars = explode(",",$ids);
            foreach ($pars as $par){
                Reviews::destroy($par);
            }
        }

        return response()->json(['success'=>"Products Deleted successfully."]);
        
    }
}
