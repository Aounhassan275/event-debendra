<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function list(){
        $list = Testimonial::all();
        return view('admin.testimonial.list', compact('list'));
    }
    public function add(){
        return view('admin.testimonial.add');
    }
    public function store(Request $request){
        // dd($request->all());
        $store = new Testimonial();
        $store->name = $request->name;
        $store->designation = $request->designation;
        $store->description = $request->description;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time(). '_' . $image->getClientOriginalName();
            $image->move(public_path('admin/web/testimonial'), $imageName);
            $store->image = $imageName;
        }
        $store->save();
        return redirect()->route('testimonial.list')->with('success', 'New Testimonial Added Successfully');
    }
    public function edit($id){
        $edit = Testimonial::find($id);
        return view('admin.testimonial.edit', compact('edit'));
    }
    public function update(Request $request){
        $update = Testimonial::find($request->id);
        $update->name = $request->name;
        $update->designation = $request->designation;
        $update->description = $request->description;
        if($request->hasFile('image')){
            if($update->image && file_exists(public_path('admin/web/testimonial/' .$update->image))){
                unlink(public_path('admin/web/testimonial/' . $update->image));
            }
            $image = $request->file('image');
            $imageName  = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('admin/web/testimonial'), $imageName);
            $update->image = $imageName;
        }
        $update->save();
        return redirect()->route('testimonial.list')->with('success', 'Updated Successfully');
    }
    public function delete($id){
        $delete = Testimonial::find($id);
        $delete->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
