<?php

namespace App\Http\Controllers\Api\Vendor;

use App\Http\Controllers\Controller;
use App\Models\ServicePricing;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicePricingController extends Controller
{
    public function index(){
        $servicePricings = ServicePricing::where('user_id', Auth::user()->id)->get();
        return response([
            'servicePricings' => $servicePricings,
        ], 200);
    }
    public function store(Request $request){
        try{
            $request->validate([
                'service_id' => 'required',
                'price' => 'required',
            ]);
            foreach ($request->service_id as $key => $service_id) {
                $store = new ServicePricing();
                $store->user_id = Auth::user()->id;
                $store->service_id = $service_id;
                $store->price = $request->price[$key];
                $store->save();
            }
            return response([
                'message' => 'Service Pricing Added Successfully!',
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
            $service = ServicePricing::find($id);
            $service->delete();
            return response([
                'message' => 'Service Pricing Deleted Successfully!',
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
