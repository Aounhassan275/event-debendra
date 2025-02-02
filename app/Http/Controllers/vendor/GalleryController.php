<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function gallery(){
        $all_data = Gallery::where('user_id', Auth::user()->id)->get();
        return view('vendor.gallery.gallery', compact('all_data'));
    }
    public function add(){
        return view('vendor.gallery.add');
    }
    public function store(Request $request){
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
        return redirect()->route('vendor.gallery')->with('success', 'Gallery Added Successfully');
    }
    public function delete(Request $request){

        $ids = $request->ids;
        Gallery::whereIn('id', $ids)->delete();
            return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
