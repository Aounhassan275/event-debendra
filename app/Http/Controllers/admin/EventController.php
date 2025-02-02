<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Subcategory;

class EventController extends Controller
{
    public function create()
    {


        $categories = Category::all();
        $subcategories =  Subcategory::all(); // Fetch all categories
        return view('admin.events.add_event', compact('categories', 'subcategories'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
            'start_datetime' => 'required|string', // Accept as string, no date validation
            'end_datetime' => 'required|string', // Accept as string, no date validation
            'type' => 'required|in:public,private',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg',
            'banner' => 'nullable|image|mimes:jpg,png,jpeg',
            'gallery_image' => 'nullable|image|mimes:jpg,png,jpeg',
        ]);



        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }

        // Handle file uploads
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('admin/images/uploads/event'), $logoPath);
        };
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $bannerPath = time() . '_' . $banner->getClientOriginalName();
            $banner->move(public_path('admin/images/uploads/event'), $bannerPath);
        };
        if ($request->hasFile('gallery_image')) {
            $gallery_image = $request->file('gallery_image');
            $gallery_imagePath = time() . '_' . $gallery_image->getClientOriginalName();
            $gallery_image->move(public_path('admin/images/uploads/event'), $gallery_imagePath);
        };


        Event::create([
            'title' => $request->title,
            'category' => $request->category,
            'subactegory_id' => $request->subactegory_id,
            'description' => $request->description,
            'email' => $request->email,
            'phone' => $request->phone,
            'website' => $request->website,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'event_start_date' => $request->event_start_date,
            'start_datetime' => $request->start_datetime,
            'event_end_date' => $request->event_end_date,
            'end_datetime' => $request->end_datetime,
            'type' => $request->type,
            'max_tickets' => $request->max_tickets,
            'tickets_per_person' => $request->tickets_per_person,
            'ticket_price' => $request->ticket_price,
            'registration_start_date' => $request->registration_start_date,
            'registration_start_datetime' => $request->registration_start_datetime,
            'registration_end_date' => $request->registration_end_date,
            'registration_end_datetime' => $request->registration_end_datetime,
            'logo' => $logoPath,
            'banner' => $bannerPath,
            'gallery_image' => $gallery_imagePath,
            'featured' => $request->has('featured'),
        ]);

        return redirect()->route('manage_event')->with('success', 'Event added successfully!');
    }
    public function getSubCategory(Request $request)
    {
        $get_subcategory = Subcategory::where('category_id', $request->category)->get();
        return response()->json($get_subcategory);
    }
    public function edit($id)
    {
        $event = Event::find($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.events.edit_event', compact('event','categories','subcategories'));
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $update = Event::find($request->id);
        $request->validate([
            'title' => 'required|string|max:255',

        ]);
        $update->title = $request->title;
        $update->category = $request->category;
        $update->subactegory_id = $request->subactegory_id;
        $update->description = $request->description;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->website = $request->website;
        $update->address = $request->address;
        $update->latitude = $request->latitude;
        $update->longitude = $request->longitude;
        $update->event_start_date = $request->event_start_date;
        $update->start_datetime = $request->start_datetime;
        $update->event_end_date = $request->event_end_date;
        $update->end_datetime = $request->end_datetime;
        $update->type = $request->type;
        $update->max_tickets = $request->max_tickets;
        $update->tickets_per_person = $request->tickets_per_person;
        $update->ticket_price = $request->ticket_price;
        $update->registration_start_date = $request->registration_start_date;
        $update->registration_start_datetime = $request->registration_start_datetime;
        $update->registration_end_date = $request->registration_end_date;
        $update->registration_end_datetime = $request->registration_end_datetime;

        $update->save();

        return redirect()->route('manage_event')->with('success', 'Event updated successfully');
    }
    public function delete($id){
        $delete = Event::find($id);
        if($delete){
            $delete->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
        }
        return redirect()->back()->with('error', 'Somthing went wrong!!');
    }
}


