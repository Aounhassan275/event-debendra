<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(8);
        return view('admin.category.manage_category', compact('categories'));
    }

    public function create()
{
    return view('admin.category.add_category');
}
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_icon' => 'image|mimes:png|max:1024',
            'category_image' => 'image|mimes:jpeg,png|max:1024',
            'category_bg_color' => 'required|string'
        ]);
        $store = new Category;
        $store->name = $request->category_name;
        if($request->hasFile('category_icon')){
            $image = $request->file('category_icon');
            $imageName = time(). $image->getClientOriginalName();
            $image->move(public_path('Category/icon_image'), $imageName);
            $store->icon_path = $imageName;
        }
        if($request->hasFile('category_image')){
            $image = $request->file('category_image');
            $imageName = time(). $image->getClientOriginalName();
            $image->move(public_path('Category/background_image'), $imageName);
            $store->background_image_path = $imageName;
        }
        $store->background_color = $request->category_bg_color;
        $store->save();
        return redirect()->route('category.index')->with('success', 'Category added successfully!');
    }
    public function edit($id){
        $edit = Category::find($id);
        return view('admin.category.edit', compact('edit'));
    }
    public function update(Request $request){
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_icon' => 'image|mimes:png|max:1024',
            'category_image' => 'image|mimes:jpeg,png|max:1024',
            'category_bg_color' => 'required|string'
        ]);
        $update = Category::find($request->id);
        $update->name = $request->category_name;
        if($request->hasFile('category_icon')){
            if($update->category_icon && file_exists(public_path('Category/icon_image/'.$update->category_icon))){
                unlink(public_path('Category/icon_image/'.$update->category_icon));
            }
            $image = $request->file('category_icon');
            $imageName = time(). $image->getClientOriginalName();
            $image->move(public_path('Category/icon_image'), $imageName);
            $update->icon_path = $imageName;
        }
        if($request->hasFile('category_image')){
            if($update->category_image && file_exists(public_path('Category/background_image/'.$update->category))){
                unlink(public_path('Category/background_image/'.$update->category));
            }
            $image = $request->file('category_image');
            $imageName = time(). $image->getClientOriginalName();
            $image->move(public_path('Category/background_image'), $imageName);
            $update->background_image_path = $imageName;
        }
        $update->background_color = $request->category_bg_color;
        $update->save();
        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }
    public function delete($id){
        $delete = Category::find($id);
        if ($delete) {
            if ($delete->icon_path && file_exists(public_path('Category/icon_image/' . $delete->icon_path))) {
                unlink(public_path('Category/icon_image/' . $delete->icon_path));
            }
            if ($delete->background_image_path && file_exists(public_path('Category/background_image/' . $delete->background_image_path))) {
                unlink(public_path('Category/background_image/' . $delete->background_image_path));
            }
            $delete->delete();
            return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
        }
        return redirect()->route('category.index')->with('error', 'Category not found!');
    }
}

