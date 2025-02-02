<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VendorsType;
use Illuminate\Http\Request;

class VendorTypeController extends Controller
{
    public function list(){
        $all_data = VendorsType::all();
        return view('admin.vendors-type.list', compact('all_data'));
    }

    public function add(){
        return view('admin.vendors-type.add');
    }

    public function store(Request $request){
        $store = new VendorsType();
        $store->name = $request->name;
        if($request->hasFile('image')){
            $img = $request->file('image');
            $imgName = $img->getClientOriginalName();
            $img->move(public_path('admin/vendors'), $imgName);
            $store->image = $imgName;
        }
        $store->save();
        return redirect()->route('vendors.list')->with('success','Added successfully');
    }

    public function edit($id){
        $edit = VendorsType::find($id);
        return view('admin.vendors-type.edit', compact('edit'));
    }

    public function update(Request $request){
        $update = VendorsType::find($request->id);
        $update->name = $request->name;

        if($request->hasFile('image')){
            if($update->image && file_exists(public_path('admin/vendors/' . $update->image))){
                unlink(public_path('admin/vendors/' . $update->image));
            }
            $img = $request->file('image');
            $imgName = $img->getClientOriginalName();
            $img->move(public_path('admin/vendors/'), $imgName);
            $update->image = $imgName;
        }
        $update->save();
        return redirect()->route('vendors.list')->with('success','Updated successfully');
    }

    public function delete($id){
        $delete = VendorsType::find($id);
        if($delete){
            if($delete->image && file_exists(public_path('admin/vendors/' . $delete->image))){
                unlink(public_path('admin/vendors/' . $delete->image));
            }
            $delete->delete();
            return redirect()->back()->with('success','Deleted successfully');
        }
        return redirect()->back()->with('error', 'Somthings wents wrong!!');
    }

    public function vendorList(){
        $all_vendors = User::where('user_type', 1)->get();
        return view('admin.vendors.list', compact('all_vendors'));
    }
}
