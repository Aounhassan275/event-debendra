<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VendorLike;
use App\Models\VendorsType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    public function getVendorTypes(){
        
        $vendorTypes = VendorsType::query()->with('users')->get();
        return response([
            'vendorTypes' => $vendorTypes,
        ], 200);
    }
    public function getVendorsByType(Request $request){
        
        $validator = Validator::make($request->all(), [
            'vendor_type' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return response([
                "success" => false,
                "message" => $messages->first(),
            ], 500);
        }
        $vendors = User::query()
                ->where('vendor_type',$request->vendor_type)->get();
        foreach($vendors as $vendor){    
            $vendor->load('gallery');
            $vendor->load('services');
            $vendor->load('payment_terms');
            $vendor->load('faqs');
            $vendor->load('reviews');
            $vendor->profile = $vendor->get_vendor;
        }
        return response([
            'vendors' => $vendors,
        ], 200);
    }
    public function getVendorDetail($id){
        $user = User::find($id);
        $user->load('gallery');
        $user->load('services');
        $user->load('payment_terms');
        $user->load('faqs');
        $user->load('reviews');
        $user->profile = $user->get_vendor;
        return response([
            'user' => $user,
        ], 200);
    }
    public function vendorLikeDislike(Request $request)
    {
        try{        
            $validator = Validator::make($request->all(), [
                'vendor_id' => 'required|integer',
                'is_like' => 'required|integer',
            ]);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response([
                    "success" => false,
                    "message" => $messages->first(),
                ], 500);
            }
            $vendorLiked = VendorLike::where('customer_id',Auth::user()->id)
                        ->where('vendor_id',$request->vendor_id)->first();
            if($vendorLiked){
                $vendorLiked->update([
                    'is_like' => $request->is_like
                ]);
            }else{
                VendorLike::create([
                    'vendor_id' => $request->vendor_id,
                    'is_like' => $request->is_like,
                    'customer_id' => Auth::user()->id,
                ]);
            }
            return response([
                'message' => 'Vendor Bookmarked added successfully!',
            ], 200);
        }catch (Exception $e)
        {
            return response([
                "success" => false,
                "message" => $e->getMessage(),
            ], 500);
        }

    }
    public function getLikedVendors(){
        $vendorIds = VendorLike::where('customer_id',Auth::user()->id)
                    ->where('is_like',1)
                    ->get()->pluck('vendor_id')->toArray();
        $vendors = User::query()
                ->whereIn('id',$vendorIds)->get();
        foreach($vendors as $vendor){    
            $vendor->load('gallery');
            $vendor->load('services');
            $vendor->load('payment_terms');
            $vendor->load('faqs');
            $vendor->load('reviews');
            $vendor->profile = $vendor->get_vendor;
            $vendor->is_like = 1;
        }
        return response([
            'vendors' => $vendors,
        ], 200);
    }
    public function getDisLikedVendors(){
        $vendorIds = VendorLike::where('customer_id',Auth::user()->id)
                    ->where('is_like',1)
                    ->get()->pluck('vendor_id')->toArray();
        $vendors = User::query()
                ->whereIn('id',$vendorIds)->get();
        foreach($vendors as $vendor){    
            $vendor->load('gallery');
            $vendor->load('services');
            $vendor->load('payment_terms');
            $vendor->load('faqs');
            $vendor->load('reviews');
            $vendor->profile = $vendor->get_vendor;
            $vendor->is_like = 1;
        }
        return response([
            'vendors' => $vendors,
        ], 200);
    }

}
