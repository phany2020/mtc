<?php

namespace App\Http\Controllers;

use App\TourismType;
use Illuminate\Http\Request;
use App\APIError;

class TourismTypeController extends Controller
{
    public function index(Request $req)
    {
        $data = TourismType::simplePaginate($req->has('limit') ? $req->limit : 15);
        return response()->json($data);
    }



    public function find($id){
        $tourismType = TourismType::find($id);
        if($tourismType == null) {
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("TOURISM_TYPE_NOT_FOUND");
            $unauthorized->setMessage("tourismType id not found");

            return response()->json($unauthorized, 404);
        }
        return response()->json($tourismType);
    }

    public function destroy($id)
    {
        $tourismType = TourismType::find($id);
        if($tourismType == null) {
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("HOTEL_NOT_FOUND");
            $unauthorized->setMessage("hotel id not found");

            return response()->json($unauthorized, 404);
        }
        $tourismType->delete($tourismType);
        return response(null);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\TourismType  $tourismType
     * @return \Illuminate\Http\Response
     */
    public function show(TourismType $tourismType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TourismType  $tourismType
     * @return \Illuminate\Http\Response
     */
    public function edit(TourismType $tourismType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TourismType  $tourismType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TourismType $tourismType)
    {
        //
    }

}
