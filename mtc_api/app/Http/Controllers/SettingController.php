<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use App\APIError;

class SettingController extends Controller
{
    
    public function index(Request $req)
    {
        $data = Setting::simplePaginate($req->has('limit') ? $req->limit : 15);
        return response()->json($data);
    }



    public function find($id){
        $setting = Setting::find($id);
        if($setting == null) {
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("SETTINGS_NOT_FOUND");
            $unauthorized->setMessage("settings id not found");

            return response()->json($unauthorized, 404);
        }
        return response()->json($setting);
    }



   /* public function create(Request $request)
    {
        $this->validate($request->all(), [
            'key' => 'required | unique:settings'
        ]);

        $data = $request->only([
            'key',
            'value',
            'description'
        ]);

        $setting = new Setting();
        $setting->key=$data['key'];
        $setting->value=$data['value'];
        $setting->description=$data['description'];
        $setting->save();

        return response()->json($setting);
    }


    */

    public function create (Request $request){
        
        $this->validate($request->all(), [
            'key' => 'required | unique:settings'
        ]);

        $data = $request->only([
            'key',
            'value',
            'description'
        ]);

        $setting = Setting::create($data);
        return response()->json($setting);
    }

    
    public function store(Request $request)
    {
       
    }

    public function show(Setting $setting)
    {
        //
    }

    public function edit(Setting $setting)
    {
        //
    }

    
    public function update(Request $request, Setting $setting)
    {
        //
    }

    
    public function destroy($id)
    {
        $setting = Setting::find($id);
        if($setting == null) {
            $unauthorized = new APIError;
            $unauthorized->setStatus("404");
            $unauthorized->setCode("SETTING_NOT_FOUND");
            $unauthorized->setMessage("setting id not found");

            return response()->json($unauthorized, 404);
        }
        $setting->delete($setting);
        return response(null);
    }
}