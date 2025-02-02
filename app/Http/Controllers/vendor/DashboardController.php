<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorsType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::user()->id;
        $profile = Vendor::where('user_id', $userId)->first();
        return view('vendor.dashboard', compact('profile'));
    }
    public function vendors()
    {
        $vendorstype = VendorsType::all();
        return view('vendor.vender-type.vendor_type', compact('vendorstype'));
    }
    public function vendorType(Request $request)
    {
        $request->validate([
            'vendor_type' =>'required',
        ]);
        $user = User::find(Auth::user()->id);
            $user->vendor_type = $request->vendor_type;
            $user->save();
            return redirect()->route('vendor.dashboard')->with('success', 'Vendor type updated successfully.');
    }
    public function vendorProfile(Request $request){

        $user = Auth::user()->id;
        $profile = Vendor::where('user_id',$user)->first();
        if($profile){
            $profile = Vendor::find($request->id);
            $profile->brand_name = $request->brand_name;
            $profile->name = $request->name;
            if($request->hasFile('photo')){
                if ($profile->photo && file_exists(public_path('vendor/images/profile/' . $profile->photo))) {
                    unlink(public_path('vendor/images/profile/' . $profile->photo));
                }
                $file = $request->file('photo');
                $filename = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('vendor/images/profile'), $filename);
                $profile->photo = $filename;
            }
            $profile->location = $request->location;
            $profile->website_link = $request->website_link;
            $profile->alt_email = $request->alt_email;
            $profile->instagram = $request->instagram;
            $profile->facebook = $request->facebook;
            $profile->youtube = $request->youtube;
            $profile->number = $request->number;
            $profile->save();
        }else{
            $request->validate([
                'brand_name' =>'required',
                'name' =>'required',
                'photo' =>'required',
            ]);
            $profile = new Vendor();
            $profile->user_id = $user;
            $profile->brand_name = $request->brand_name;
            $profile->name = $request->name;
            if($request->hasFile('photo')){
                $file = $request->file('photo');
                $filename = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('vendor/images/profile'), $filename);
                $profile->photo = $filename;
            }
            $profile->location = $request->location;
            $profile->website_link = $request->website_link;
            $profile->alt_email = $request->alt_email;
            $profile->instagram = $request->instagram;
            $profile->facebook = $request->facebook;
            $profile->youtube = $request->youtube;
            $profile->number = $request->number;
            $profile->save();
        }
        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }
}
