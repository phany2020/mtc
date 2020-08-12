<?php

namespace App\Http\Controllers;

use App\News;
use App\APIError;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $req)
    {
        $data = News::simplePaginate($req->has('limit') ? $req->limit : 15);
        return response()->json($data);
    }



    public function find($id){
        $news = News::find($id);
        if($news == null) {
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("NEWS_NOT_FOUND");
            $unauthorized->setMessage("news id not found");

            return response()->json($unauthorized, 404);
        }
        return response()->json($news);
    }

    public function destroy($id)
    {
        $news = News::find($id);
        if($news == null) {
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("NEWS_NOT_FOUND");
            $unauthorized->setMessage("news id not found");

            return response()->json($unauthorized, 404);
        }
        $news->delete($news);
        return response(null);
    }



    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    
}
