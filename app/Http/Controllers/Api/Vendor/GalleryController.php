<?php

namespace App\Http\Controllers\Api\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function index(){
        $gallery_images = Gallery::where('user_id', Auth::user()->id)->get();
        return response([
            'gallery_images' => $gallery_images,
            'base_url' => 'https://einvie.com/vendor/galleries/',
        ], 200);
    }
    public function store(Request $request){
        try{
            $request->validate([
                'file' => 'required',
            ]);
            foreach ($request->file('file') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('vendor/galleries'), $filename);
                $store = new Gallery;
                $store->user_id = Auth::user()->id;
                $store->file = $filename;
                $store->save();
            }
            return response([
                'message' => 'Event Image Added Successfully!',
            ], 200);
        }catch (Exception $e)
        {
            return response([
                "success" => false,
                "message" => $e->getMessage(),
            ], 500);
        }
    }
    public function destory($id){
        try{        
            $gallery = Gallery::find($id);
            $gallery->delete();
            return response([
                'message' => 'Gallery Deleted Successfully!',
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
