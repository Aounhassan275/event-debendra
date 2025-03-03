<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CardImage;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
class AddCardImageController extends Controller
{
    public function create()
    {
        $categories = Category::all(); // Fetch all categories
        return view('admin.add_card_image', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string',
            'card_image' => 'required|image|mimes:png|max:1024', // Ensure it's a PNG image and <=1MB
        ]);

        // Handle the image upload
        $imagePath = $request->file('card_image')->store('card_images', 'public');

        if ($request->hasFile('card_image')) {
            $image = $request->file('card_image');
            $imagePath = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('admin/images/uploads/card'), $imagePath);

        };

        // Save data to the database
        CardImage::create([
            'category_id' => @$request->category_id ?? null,
            'category_name' => $request->category_name,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('manage_card_image')->with('success', 'Card image uploaded successfully!!');
    }
}

