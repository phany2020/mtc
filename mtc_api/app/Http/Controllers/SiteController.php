<?php

namespace App\Http\Controllers;

use App\Site;
use Illuminate\Http\Request;
use App\APIError;

class SiteController extends Controller
{
    public function index(Request $req)
    {
        $data = Site::select('sites.*', 'sites.id as site_id', 'cities.name as cities_name', 'cities.id as citie_id',
         'tourism_types.name as tourism_types_name', 'tourism_types.id as tourism_type_id')
            ->join('cities', 'sites.citie_id', '=', 'cities.id')
            ->join('tourism_types', 'sites.tourism_type_id', '=', 'tourism_types.id')
            ->simplePaginate($req->has('limit') ? $req->limit : 15);
        return response()->json($data);
    }

    
    public function find($id, Request $req){

        $site = Site::find($id);
        if($site == null){
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("SITE_NOT_FOUND");
            $unauthorized->setMessage("site id not found.");

            return response()->json($unauthorized, 404);
        }

        $data = Site::select('sites.*', 'sites.id as site_id', 'cities.name as cities_name', 'cities.id as citie_id',
         'tourism_types.name as tourism_types_name', 'tourism_types.id as tourism_type_id')
            ->join('cities', 'sites.citie_id', '=', 'cities.id')
            ->join('tourism_types', 'sites.tourism_type_id', '=', 'tourism_types.id')
            ->where('sites.id', '=', $id)
            ->simplePaginate($req->has('limit') ? $req->limit : 15);
        return response()->json($data);
    }


    public function destroy($id)
    {
        $site = Site::find($id);
        if($site == null) {
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("SITE_NOT_FOUND");
            $unauthorized->setMessage("site id not found");

            return response()->json($unauthorized, 404);
        }
        $site->delete($site);
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
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        //
    }

}
