<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VendorsType;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function getVendorTypes(){
        
        $vendorTypes = VendorsType::query()->with('users')->get();
        return response([
            'vendorTypes' => $vendorTypes,
        ], 200);
    }
    public function getVendorDetail($id){
        $user = User::find($id);
        $user->load('gallery');
        $user->load('pricings');
        $user->load('services');
        foreach($user->services as $service){
            $service->load('pricings');
        }
        $user->profile = $user->get_vendor;
        return response([
            'user' => $user,
        ], 200);
    }
}
