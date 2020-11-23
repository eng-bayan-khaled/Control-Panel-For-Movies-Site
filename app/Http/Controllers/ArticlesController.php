<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use App\DataTables\ArticlesDatatable;


class ArticlesController extends Controller
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
    public function index(ArticlesDatatable $dataTable)
    {
        //
        return $dataTable->render('control.articles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('control.articles.create');
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
            'title' => 'required|string',
            'content' => 'required|string',
            'auther_id' => 'required|integer',
        ]);

        $article = Articles::create($data);

        $article = \App\models\Articles::find($article->id);
        if ($request->keywords){
            foreach ($request->keywords as $keyword) {
                $keyword = \App\models\Keywords::find($keyword);
                $article->keywords()->attach($keyword);
            }
        }

        return redirect('/control/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show(Articles $articles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $article = \App\Models\Articles::find($id);

        $keywords = array();
        foreach ($article->keywords as $keyword) {
            array_push($keywords,$keyword->pivot->keyword_id);
        }

        return view('control.articles.edit', compact('article', 'keywords'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string',
            'auther_id' => 'required|integer',
        ]);

        $article = Articles::where('id', $id)
        ->update($data);

        $articles = \App\models\Articles::find($id);

        if ($request->keywords) {
            $articles->keywords()->detach();
            foreach ($request->keywords as $keyword) {
                $keyword = \App\models\Keywords::find($keyword);
                $articles->keywords()->attach($keyword);
            }
        }elseif (!$request->keywords){
            $articles->keywords()->detach();
        }

        return redirect('/control/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Articles::destroy($id);
        return redirect('/control/articles');
    }

    public function multiDestroy(Request $request)
    {
        //
        $ids = $request->ids;
        
        
        if (is_array($ids)) 
        {
            Articles::destroy($ids);
        }
        else
        {
            $pars = explode(",",$ids);
            foreach ($pars as $par){
                Articles::destroy($par);
            }
        }

        return response()->json(['success'=>"Products Deleted successfully."]);
        
    }
}
