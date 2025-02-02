<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function list(){
        $subcategories = Subcategory::paginate(8);
        return view('admin.subcategory.list', compact('subcategories'));
    }
    public function add(){
        $categories = Category::all();
        return view('admin.subcategory.add', compact('categories'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'image' => 'required',
        ]);
        $store = new Subcategory();
        $store->name = $request->name;
        $store->category_id = $request->category_id;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalName();
            $image->move(public_path('subcategory/images'), $imagename);
            $store->image = $imagename;
        }
        $store->save();
        return redirect()->route('subcategory.list')->with('success', 'Subcategory added successfully');
    }
    public function edit($id){
        $categories = Category::all();
        $edit = Subcategory::find($id);
        return view('admin.subcategory.edit', compact('edit','categories'));
    }
    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);
        $update = Subcategory::find($request->id);
        $update->name = $request->name;
        $update->category_id = $request->category_id;
        if($request->hasFile('image')){
            if($update->image && file_exists(public_path('subcategory/images/'. $update->image))){
                unlink(public_path('subcategory/images/'. $update->image));
            }
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalName();
            $image->move(public_path('subcategory/images'), $imagename);
            $update->image = $imagename;
        }
        $update->save();
        return redirect()->route('subcategory.list')->with('success', 'Subcategory Updated successfully');
    }
    public function delete($id){
        $delete = Subcategory::find($id);
        if($delete){
            if($delete->image && file_exists(public_path('subcategory/images/'. $delete->image))){
                unlink(public_path('subcategory/images/'. $delete->image));
            }
            $delete->delete();
            return redirect()->route('subcategory.list')->with('success', 'Subcategory deleted successfully');
        }
        return redirect()->back()->with('error', 'Something wents wrong');
    }
}
