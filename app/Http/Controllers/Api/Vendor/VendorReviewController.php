<?php

namespace App\Http\Controllers\Api\Vendor;

use App\Http\Controllers\Controller;
use App\Models\VendorReview;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorReviewController extends Controller
{
    public function index(){
        $reviews = VendorReview::where('user_id', Auth::user()->id)->get();
        return response([
            'reviews' => $reviews,
        ], 200);
    }
    public function store(Request $request){
        try{
            $request->validate([
                'description' => 'required',
                'rating' => 'required|numeric|min:1|max:5',
                'vendor_id' => 'required|numeric',
            ]);
            $store = new VendorReview();
            $store->user_id = Auth::user()->id;
            $store->description = $request->description;
            $store->rating = $request->rating;
            $store->vendor_id = $request->vendor_id;
            $store->save();
            
            return response([
                'message' => 'Vendor Review Added Successfully!',
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
