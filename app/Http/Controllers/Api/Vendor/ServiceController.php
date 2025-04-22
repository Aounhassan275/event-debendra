<?php

namespace App\Http\Controllers\Api\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::where('user_id', Auth::user()->id)->get();
        return response([
            'services' => $services,
        ], 200);
    }
    public function store(Request $request){
        try{
            $request->validate([
                'name' => 'required',
                'price' => 'required',
            ]);
            $store = new Service();
            $store->user_id = Auth::user()->id;
            $store->name = $request->name;
            $store->price = $request->price;
            $store->save();
            return response([
                'message' => 'Service Added Successfully!',
            ], 200);
        }catch (Exception $e)
        {
            return response([
                "success" => false,
                "message" => $e->getMessage(),
            ], 500);
        }
    }
    public function update(Request $request){
        try{
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'service_id' => 'required',
            ]);
            $service = Service::find($request->service_id);

            $service->name = $request->name;
            $service->price = $request->price;
            $service->save();
            return response([
                'message' => 'Service Updated Successfully!',
            ], 200);
        }catch (Exception $e)
        {
            return response([
                "success" => false,
                "message" => $e->getMessage(),
            ], 500);
        }
    }
    public function destory($id){
        try{        
            $service = Service::find($id);
            $service->delete();
            return response([
                'message' => 'Service Deleted Successfully!',
            ], 200);
        }catch (Exception $e)
        {
            return response([
                "success" => false,
                "message" => $e->getMessage(),
            ], 500);
        }
    }
}
