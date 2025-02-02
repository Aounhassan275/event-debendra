<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Slider;
use Illuminate\Http\Request;

class ManageSliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.list', compact('sliders'));
    }
    public function add()
    {
        $events = Event::all();
        return view('admin.slider.add', compact('events'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'url'=>'url',
        ]);
        $store = new Slider();
        $store->event_id = $request->event_id;
        $store->title = $request->title;
        $store->url = $request->url;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('slider/images'), $filename);
            $store->image = $filename;
        }
        $store->save();
        return redirect()->route('manage_slider')->with('success', 'Slider Added Successfully');
    }
    public function edit($id)
    {
        $events = Event::all();
        $edit = Slider::find($id);
        return view('admin.slider.edit', compact('edit', 'events'));
    }
    public function update(Request $request)
    {
        $update = Slider::find($request->id);
        if ($request->slider_type == 'Event') {
            $update->event_id = $request->event_id;
            $update->title = null;
            $update->url = null;
            $update->image = null;
        } else {
            $update->event_id = null;
            $update->title = $request->title;
            $update->url = $request->url;
            if ($request->hasFile('image')) {
                if ($update->image && file_exists(public_path('slider/images/' . $update->image))) {
                    unlink(public_path('slider/images/' . $update->image));
                }
                $filename = time() . '.' . $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('slider/images'), $filename);
                $update->image = $filename;
            }
        }
        $update->save();
        return redirect()->route('manage_slider')->with('success', 'Slider Updated Successfully');
    }
    public function delete($id)
    {
        $delete = Slider::find($id);
        if ($delete) {
            $delete->delete();
            return redirect()->back()->with('success', 'Deleted Successfully');
        }
        return redirect()->back()->with('error', 'Somethings Went Wrong');
    }
}
