<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index(){
        $events = Event::query()->where('user_id',Auth::user()->id)
                    ->with('getCategory')->get();
        return response([
            'events' => $events,
        ], 200);
    }
    public function getcategories(){
        $categories = Category::query()->get();
        return response([
            'categories' => $categories,
        ], 200);
    }
    public function store(Request $request)
    {
        try{        
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
                return response([
                    "success" => false,
                    "message" => $messages->first(),
                ], 500);
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


            $event = Event::create([
                'title' => $request->title,
                'category' => $request->category,
                'subactegory_id' => $request->subactegory_id ?? null,
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
                'user_id' => Auth::user()->id,
                'featured' => $request->has('featured'),
            ]);

            return response([
                'event' => $event,
                'message' => 'Event added successfully!',
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
