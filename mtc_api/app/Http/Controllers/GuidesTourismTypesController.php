<?php

namespace App\Http\Controllers;

use App\GuidesTourismTypes;
use Illuminate\Http\Request;
use App\APIError;

class GuidesTourismTypesController extends Controller
{
    public function index(Request $req)
    {
        $data = GuidesTourismTypes::select('guides_tourism_types.*', 
        'guides.name as guide_name', 'guides.status as guide_status', 'guides.id as guide_id',
         'tourism_types.name as tourism_type_name', 'tourism_types.id as tourism_type_id')
            ->join('guides', 'guides_tourism_types.guide_id', '=', 'guides.id')
            ->join('tourism_types', 'guides_tourism_types.tourism_type_id', '=', 'tourism_types.id')
            ->simplePaginate($req->has('limit') ? $req->limit : 15);
        return response()->json($data);
    }

    
    public function find($id, Request $req){

        $guidesTourismTypes = GuidesTourismTypes::find($id);
        if($guidesTourismTypes == null){
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("GUIDES_TOURISM_TYPE_NOT_FOUND");
            $unauthorized->setMessage("guides tourism types id not found.");

            return response()->json($unauthorized, 404);
        }

        $data = GuidesTourismTypes::select('guides_tourism_types.*', 
        'guides.name as guide_name', 'guides.status as guide_status', 'guides.id as guide_id',
         'tourism_types.name as tourism_type_name', 'tourism_types.id as tourism_type_id')
            ->join('guides', 'guides_tourism_types.guide_id', '=', 'guides.id')
            ->join('tourism_types', 'guides_tourism_types.tourism_type_id', '=', 'tourism_types.id')
            ->where('guides_tourism_types.id', '=', $id)
            ->simplePaginate($req->has('limit') ? $req->limit : 15);
        return response()->json($data);
    }


    public function destroy($id)
    {
        $guidesTourismTypes = GuidesTourismTypes::find($id);
        if($guidesTourismTypes == null) {
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("GUIDES_TOURISM_TYPE_NOT_FOUND");
            $unauthorized->setMessage("guides tourism types id not found");

            return response()->json($unauthorized, 404);
        }
        $guidesTourismTypes->delete($guidesTourismTypes);
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
     * @param  \App\GuidesTourismTypes  $guidesTourismTypes
     * @return \Illuminate\Http\Response
     */
    public function show(GuidesTourismTypes $guidesTourismTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GuidesTourismTypes  $guidesTourismTypes
     * @return \Illuminate\Http\Response
     */
    public function edit(GuidesTourismTypes $guidesTourismTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GuidesTourismTypes  $guidesTourismTypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GuidesTourismTypes $guidesTourismTypes)
    {
        //
    }

    
}
