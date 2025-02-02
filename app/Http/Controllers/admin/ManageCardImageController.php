<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CardImage;
use App\Models\Category;

class ManageCardImageController extends Controller
{
    public function index()
    {
        $cardImages = CardImage::paginate(8);
        Log::info('Card images retrieved successfully');
        return view('admin.card-image.manage_card_image', compact('cardImages'));
    }
    public function create()
    {
        $categories = Category::all();
        Log::info('Card image categories retrived successfully');
        return view('admin.card-image.add_card_image', compact('categories'));
    }
    public function edit($id)
    {
        $edit = CardImage::find($id);
        $categories = Category::all();
        return view('admin.card-image.edit', compact('edit','categories'));
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $update = CardImage::find($request->id);
        $update->category_name = $request->category_name;
        if($request->hasFile('card_image')){
            $image = $request->file('card_image');
            $image_name = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('admin/images/uploads/card'), $image_name);
            $update->image_path = $image_name;
        }
        $update->save();
        return redirect()->route('manage_card_image')->with('success','Successfully updated');
    }

    public function delete($id){
        $delete = CardImage::find($id);
        if($delete){
            $delete->delete();
            return redirect()->back()->with('success','Deleted successfully');
        }
        return redirect()->back()->with('error','Somthing wents wrong');
    }

}


// public function index()
// {
//     try {
//         $cardImages = CardImage::paginate(8); // Assuming pagination of 8 items per page
//         Log::info('Card images retrieved successfully');
//         // Show the list of uploaded images
//         return view('admin.manage_card_image', compact('cardImages'));
//     } catch (\Exception $e) {
//         Log::error('Error retrieving card images: ' . $e->getMessage());
//         return view('admin.manage_card_image', ['error' => 'Failed to retrieve card images']);
//     }
// }

// public function create()
// {
//     try {
//         $categories = \App\Models\Category::all(); // Fetch all categories
//         Log::info('Categories retrieved successfully');
//         return view('admin.add_card_image', compact('categories'));
//     } catch (\Exception $e) {
//         Log::error('Error retrieving categories: ' . $e->getMessage());
//         return view('admin.add_card_image', ['error' => 'Failed to retrieve categories']);
//     }
// }

// public function edit($id)
// {
//    try {
//         $categories = \App\Models\Category::all();//Fetch all categories
//         Log::info('Categories retrived successfully');
//         return view('admin.edit_card_image', compact('categories'));//Pass categories to the view
//         } catch (\Exception $e) {
//        Log::error('Error retrieving categories for edit: ' . $e->getMessage());
//        return view('admin.edit_card_image', ['error' => 'Failed to retrieve categories']);
//     }
//  }

// public function destroy($id)
// {
//     try {
//         $categories = \App\Models\Category::all();//Fetch all categories
//         Log::info('Categories retrieved successfully for delete');
//         return view('admin.delete_card_image', compact('categories'));//Pass categories to the view
//     } catch (\Exception $e) {
//         Log::error('Error retrieving categories for delete: ' . $e->getMessage());
//         return view('admin.delete_card_image', ['error' => 'Failed to retrieve categories']);
//     }
// }

//}
