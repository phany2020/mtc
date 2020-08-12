<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;
use App\APIError;

class HotelController extends Controller
{
    public function index(Request $req)
    {
        $data = Hotel::simplePaginate($req->has('limit') ? $req->limit : 15);
        return response()->json($data);
    }



    public function find($id){
        $hotel = Hotel::find($id);
        if($hotel == null) {
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("HOTEL_NOT_FOUND");
            $unauthorized->setMessage("hotel id not found");

            return response()->json($unauthorized, 404);
        }
        return response()->json($hotel);
    }

    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        if($hotel == null) {
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("HOTEL_NOT_FOUND");
            $unauthorized->setMessage("hotel id not found");

            return response()->json($unauthorized, 404);
        }
        $hotel->delete($hotel);
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
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        //
    }

  
}
