<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\APIError;

class MessageController extends Controller
{
    
    public function index(Request $req)
    {
        $data = Message::select('messages.*', 'users.id as user_id', 'users.name as user_name')
            ->join('users', 'messages.user_id', '=', 'users.id')
            ->simplePaginate($req->has('limit') ? $req->limit : 15);
        return response()->json($data);
    }

    
    public function find($id, Request $req){

        $message = Message::find($id);
        if($message == null){
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("NEWS_SITE_NOT_FOUND");
            $unauthorized->setMessage("message id not found.");

            return response()->json($unauthorized, 404);
        }

        $data = Message::select('messages.*', 'users.id as user_id', 'users.name as user_name')
            ->join('users', 'messages.user_id', '=', 'users.id')
            ->where('messages.id', '=', $id)
            ->simplePaginate($req->has('limit') ? $req->limit : 15);
        return response()->json($data);
    }


    public function destroy($id)
    {
        $message = Message::find($id);
        if($message == null) {
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("Message_NOT_FOUND");
            $unauthorized->setMessage("message id not found");

            return response()->json($unauthorized, 404);
        }
        $message->delete($message);
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
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

}
