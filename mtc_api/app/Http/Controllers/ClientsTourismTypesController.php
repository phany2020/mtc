<?php

namespace App\Http\Controllers;

use App\ClientsTourismTypes;
use Illuminate\Http\Request;
use App\APIError;

class ClientsTourismTypesController extends Controller
{
    
    public function index(Request $req)
    {
        $data = ClientsTourismTypes::select('clients_tourism_types.*', 'clients.id as client_id',
        'clients.user_id as user_id', 'users.*',
         'tourism_types.name as tourism_type_name', 'tourism_types.id as tourism_type_id')
            ->join('clients', 'clients_tourism_types.client_id', '=', 'clients.id')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->join('tourism_types', 'clients_tourism_types.tourism_type_id', '=', 'tourism_types.id')
            ->simplePaginate($req->has('limit') ? $req->limit : 15);
        return response()->json($data);
    }

    
    public function find($id, Request $req){

        $clientsTourismTypes = ClientsTourismTypes::find($id);
        if($clientsTourismTypes == null){
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("CLIENTS_TOURISM_TYPE_NOT_FOUND");
            $unauthorized->setMessage("clients tourism types id not found.");

            return response()->json($unauthorized, 404);
        }

        $data = ClientsTourismTypes::select('clients_tourism_types.*', 'clients.id as client_id',
        'clients.user_id as user_id', 'users.*', 
         'tourism_types.name as tourism_type_name', 'tourism_types.id as tourism_type_id')
            ->join('clients', 'clients_tourism_types.client_id', '=', 'clients.id')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->join('tourism_types', 'clients_tourism_types.tourism_type_id', '=', 'tourism_types.id')
            ->where('clients_tourism_types.id', '=', $id)
            ->simplePaginate($req->has('limit') ? $req->limit : 15);
        return response()->json($data);
    }


    public function destroy($id)
    {
        $clientsTourismTypes = ClientsTourismTypes::find($id);
        if($clientsTourismTypes == null) {
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("CLIENTS_TOURISM_TYPE_NOT_FOUND");
            $unauthorized->setMessage("clients tourism types id not found");

            return response()->json($unauthorized, 404);
        }
        $clientsTourismTypes->delete($clientsTourismTypes);
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
     * @param  \App\ClientsTourismTypes  $clientsTourismTypes
     * @return \Illuminate\Http\Response
     */
    public function show(ClientsTourismTypes $clientsTourismTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClientsTourismTypes  $clientsTourismTypes
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientsTourismTypes $clientsTourismTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClientsTourismTypes  $clientsTourismTypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientsTourismTypes $clientsTourismTypes)
    {
        //
    }

}
