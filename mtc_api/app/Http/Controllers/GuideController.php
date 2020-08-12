<?php

namespace App\Http\Controllers;

use App\Guide;
use Illuminate\Http\Request;
use App\APIError;

class GuideController extends Controller
{
    
    public function index(Request $req)
    {
        $data = Guide::simplePaginate($req->has('limit') ? $req->limit : 15);
        return response()->json($data);
    }

    public function destroy($id)
    {
        $guide = Guide::find($id);
        if($guide == null) {
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("GUIDE_NOT_FOUND");
            $unauthorized->setMessage("guide id not found");

            return response()->json($unauthorized, 404);
        }
        $guide->delete($guide);
        return response(null);
    }


    public function find($id){
        $guide = Guide::find($id);
        if($guide == null) {
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("GUIDE_NOT_FOUND");
            $unauthorized->setMessage("guide id not found");

            return response()->json($unauthorized, 404);
        }
        return response()->json($guide);
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
     * @param  \App\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function show(Guide $guide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function edit(Guide $guide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guide $guide)
    {
        //
    }

   
}
