<?php

namespace App\Http\Controllers;

use App\Application;
use App\APIError;
use Illuminate\Http\Request;
use SoftDeletes;

class ApplicationController extends Controller
{
    public function index(Request $req)
    {
        $data = Application::simplePaginate($req->has('limit') ? $req->limit : 15);
        return response()->json($data);
    }


    public function destroy($id)
    {
        $application = Application::find($id);
        if($application == null) {
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("APPLICATION_NOT_FOUND");
            $unauthorized->setMessage("application id not found");

            return response()->json($unauthorized, 404);
        }
        $application->delete($application);
        return response(null);
    }


    public function find($id){
        $application = Application::find($id);
        if($application == null) {
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("APPLICATION_NOT_FOUND");
            $unauthorized->setMessage("settings id not found");

            return response()->json($unauthorized, 404);
        }
        return response()->json($application);
    }
    
    
    public function create()
    {
        //
    }

    
    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Application $application)
    {
        //
    }

    
    public function edit(Application $application)
    {
        //
    }

    
    public function update(Request $request, Application $application)
    {
        //
    }

    
}
