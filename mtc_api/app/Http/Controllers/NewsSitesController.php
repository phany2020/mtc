<?php

namespace App\Http\Controllers;

use App\NewsSites;
use Illuminate\Http\Request;
use App\APIError;

class NewsSitesController extends Controller
{
    public function index(Request $req)
    {
        $data = NewsSites::select('news_sites.*', 'news_sites.id as news_sites_id', 
        'news.title as news_title', 'news.id as new_id',
         'sites.name as sites_name', 'sites.id as site_id')
            ->join('news', 'news_sites.new_id', '=', 'news.id')
            ->join('sites', 'news_sites.site_id', '=', 'sites.id')
            ->simplePaginate($req->has('limit') ? $req->limit : 15);
        return response()->json($data);
    }

    
    public function find($id, Request $req){

        $newsSites = NewsSites::find($id);
        if($newsSites == null){
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("NEWS_SITE_NOT_FOUND");
            $unauthorized->setMessage("newsSites id not found.");

            return response()->json($unauthorized, 404);
        }

        $data = NewsSites::select('news_sites.*', 'news_sites.id as news_sites_id', 
        'news.title as news_title', 'news.id as new_id',
         'sites.name as sites_name', 'sites.id as site_id')
            ->join('news', 'news_sites.new_id', '=', 'news.id')
            ->join('sites', 'news_sites.site_id', '=', 'sites.id')
            ->where('news_sites.id', '=', $id)
            ->simplePaginate($req->has('limit') ? $req->limit : 15);
        return response()->json($data);
    }


    public function destroy($id)
    {
        $newsSites = NewsSites::find($id);
        if($newsSites == null) {
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("NEWS_Sites_NOT_FOUND");
            $unauthorized->setMessage("newsSites id not found");

            return response()->json($unauthorized, 404);
        }
        $newsSites->delete($newsSites);
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
     * @param  \App\NewsSites  $newsSites
     * @return \Illuminate\Http\Response
     */
    public function show(NewsSites $newsSites)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NewsSites  $newsSites
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsSites $newsSites)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewsSites  $newsSites
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsSites $newsSites)
    {
        //
    }

}
