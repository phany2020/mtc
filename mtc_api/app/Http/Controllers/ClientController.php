<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use App\Hotel;
use App\APIError;
use Illuminate\Http\Request;
use SoftDeletes;

class ClientController extends Controller
{
    
    public function index(Request $req)
    {
        $data = Client::select('clients.*', 'clients.id as client_id', 'users.*', 'users.id as user_id', 'hotels.*',
        'hotels.id as hotel_id')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->join('hotels', 'clients.hotel_id', '=', 'hotels.id')
            ->simplePaginate($req->has('limit') ? $req->limit : 15);
        return response()->json($data);
    }

    
    public function find($id, Request $req){

        $client = Client::find($id);
        if($client == null){
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("CLIENT_NOT_FOUND");
            $unauthorized->setMessage("client id not found.");

            return response()->json($unauthorized, 404);
        }

        $data = Client::select('clients.*', 'clients.id as client_id', 'users.*', 'users.id as user_id', 'hotels.*',
        'hotels.id as hotel_id')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->join('hotels', 'clients.hotel_id', '=', 'hotels.id')
            ->where('clients.id', '=', $id)
            ->simplePaginate($req->has('limit') ? $req->limit : 15);
        return response()->json($data);
    }


    public function destroy($id)
    {
        $client = Client::find($id);
        if($client == null) {
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("CLIENT_NOT_FOUND");
            $unauthorized->setMessage("client id not found");

            return response()->json($unauthorized, 404);
        }
        $client->delete($client);
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

 
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }


}
