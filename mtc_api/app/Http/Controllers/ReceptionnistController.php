<?php

namespace App\Http\Controllers;

use App\Receptionnist;
use Illuminate\Http\Request;
use App\APIError;

class ReceptionnistController extends Controller
{
    
    public function index(Request $req)
    {
        $data = Receptionnist::select('receptionnists.*', 'receptionnists.id as receptionnist_id', 'users.*', 'users.id as user_id')
            ->join('users', 'receptionnists.user_id', '=', 'users.id')
            ->simplePaginate($req->has('limit') ? $req->limit : 15);
        return response()->json($data);
    }

    
    public function find($id, Request $req){

        $receptionnist = Receptionnist::find($id);
        if($receptionnist == null){
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("receptionnist_NOT_FOUND");
            $unauthorized->setMessage("receptionnist id not found.");

            return response()->json($unauthorized, 404);
        }

        $data = Receptionnist::select('receptionnists.*', 'receptionnists.id as receptionnist_id', 'users.*', 'users.id as user_id')
            ->join('users', 'receptionnists.user_id', '=', 'users.id')
            ->where('receptionnists.id', '=', $id)
            ->simplePaginate($req->has('limit') ? $req->limit : 15);
        return response()->json($data);
    }


    public function destroy($id)
    {
        $receptionnist = Receptionnist::find($id);
        if($receptionnist == null) {
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("receptionnist_NOT_FOUND");
            $unauthorized->setMessage("receptionnist id not found");

            return response()->json($unauthorized, 404);
        }
        $receptionnist->delete($receptionnist);
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
     * @param  \App\Receptionnist  $receptionnist
     * @return \Illuminate\Http\Response
     */
    public function show(Receptionnist $receptionnist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receptionnist  $receptionnist
     * @return \Illuminate\Http\Response
     */
    public function edit(Receptionnist $receptionnist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receptionnist  $receptionnist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receptionnist $receptionnist)
    {
        //
    }

  
}
