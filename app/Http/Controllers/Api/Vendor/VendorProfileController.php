<?php

namespace App\Http\Controllers\Api\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\ServicePricing;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorsType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VendorProfileController extends Controller
{
    public function getVendorTypes(){
        
        $vendorTypes = VendorsType::query()->with('users')->get();
        return response([
            'vendorTypes' => $vendorTypes,
        ], 200);
    }
    public function getVendorDetail(){
        $user = User::find(Auth::user()->id);
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
    public function updateVendorType(Request $request){
        
        try{        
            $validator = Validator::make($request->all(), [
                'vendor_type' => 'required|numeric'
            ]);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response([
                    "success" => false,
                    "message" => $messages->first(),
                ], 500);
            }
            $user = Auth::user();
            $user->vendor_type = $request->vendor_type;
            $user->save();
            return response([
                'user' => $user,
                'message' => 'Vendor type Updated successfully!',
            ], 200);
        }catch (Exception $e)
        {
            return response([
                "success" => false,
                "message" => $e->getMessage(),
            ], 500);
        }

    }
    public function updateVendorProfile(Request $request){
        
        try{        
            $validator = Validator::make($request->all(), [
                'brand_name' => 'required',
                'name' => 'required',
                'photo' => 'required',
            ]);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response([
                    "success" => false,
                    "message" => $messages->first(),
                ], 500);
            }
            $profile = Vendor::where('user_id',Auth::user()->id)->first();
            if($profile){
                if($request->hasFile('photo')){
                    if ($profile->photo && file_exists(public_path('vendor/images/profile/' . $profile->photo))) {
                        unlink(public_path('vendor/images/profile/' . $profile->photo));
                    }
                    $file = $request->file('photo');
                    $filename = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('vendor/images/profile'), $filename);
                    $profile->photo = $filename;
                }
            }else{
                $profile = new Vendor();
                $profile->user_id = Auth::user()->id;
                if($request->hasFile('photo')){
                    $file = $request->file('photo');
                    $filename = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('vendor/images/profile'), $filename);
                    $profile->photo = $filename;
                }
            }
            $profile->brand_name = $request->brand_name;
            $profile->name = $request->name;
            $profile->location = $request->location;
            $profile->website_link = $request->website_link;
            $profile->alt_email = $request->alt_email;
            $profile->instagram = $request->instagram;
            $profile->facebook = $request->facebook;
            $profile->youtube = $request->youtube;
            $profile->number = $request->number;
            $profile->latitude = $request->latitude;
            $profile->longitude = $request->longitude;
            $profile->description = $request->description;
            $profile->travel_cost = $request->travel_cost;
            $profile->loding_cost = $request->loding_cost;
            $profile->cancelation_policy = $request->cancelation_policy;
            $profile->save();
            if($request->hasFile('galleries')){
                foreach ($request->file('galleries') as $galleryFile) {
                    $galleryFilename = time() . '_' . $galleryFile->getClientOriginalName();
                    $galleryFile->move(public_path('vendor/galleries'), $galleryFilename);
                    $gallery = new Gallery();
                    $gallery->user_id = Auth::user()->id;
                    $gallery->file = $galleryFilename;
                    $gallery->save();
                }
            }
            return response([
                'profile' => $profile,
                'message' => 'Vendor Profile Updated successfully!',
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
