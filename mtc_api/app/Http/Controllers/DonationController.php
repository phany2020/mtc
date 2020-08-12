<?php

namespace App\Http\Controllers;

use App\Donation;
use Illuminate\Http\Request;
use App\APIError;

class DonationController extends Controller
{
   
    public function index(Request $req)
    {
        $data = Donation::select('donations.*', 'donations.id as donation_id', 'clients.*', 'clients.id as client_id',
        'users.name', 'users.telephone', 'users.id as user_id')
            ->join('clients', 'donations.client_id', '=', 'clients.id')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->simplePaginate($req->has('limit') ? $req->limit : 15);
        return response()->json($data);
    }


    public function find($id, Request $req){

        $donation = Donation::find($id);
        if($donation == null){
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("DONATION_NOT_FOUND");
            $unauthorized->setMessage("donation id not found.");

            return response()->json($unauthorized, 404);
        }

        $data = Donation::select('donations.*', 'donations.id as donation_id', 'clients.*', 'clients.id as client_id',
        'users.name', 'users.telephone', 'users.id as user_id')
            ->join('clients', 'donations.client_id', '=', 'clients.id')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->where('donations.id', '=', $id)
            ->simplePaginate($req->has('limit') ? $req->limit : 15);
        return response()->json($data);
    }


    public function destroy($id)
    {
        $donation = Donation::find($id);
        if($donation == null) {
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("DONATION_NOT_FOUND");
            $unauthorized->setMessage("donation id not found");

            return response()->json($unauthorized, 404);
        }
        $donation->delete($donation);
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
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Donation $donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donation $donation)
    {
        //
    }

}
