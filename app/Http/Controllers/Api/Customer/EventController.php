<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\EventJoin;
use App\Models\EventLikeDislike;
use App\Models\RecentEvent;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index(Request $request){

        $query = Event::query()->where('user_id',Auth::user()->id);
        if($request->category_id){
            $query->where('category',$request->category_id);
        }
        $events = $query->orderBy('created_at','DESC')->with('getCategory','eventImages')->get();
        foreach($events as $event){
            $eventLiked = EventLikeDislike::where('user_id',Auth::user()->id)
                        ->where('event_id',$event->id)->first();
            if($eventLiked){
                $event->is_like = $eventLiked->is_like;
            }else{
                $event->is_like = null;
            }
        }
        return response([
            'events' => $events,
            'base_url' => 'https://einvie.com/admin/images/uploads/event/',
        ], 200);
    }
    public function getAllEvents(Request $request){

        $query = Event::query();
        if($request->category_id){
            $query->where('category',$request->category_id);
        }
        $events = $query->orderBy('created_at','DESC')->with('getCategory','eventImages')->get();
        
        foreach($events as $event){
            $eventLiked = EventLikeDislike::where('user_id',Auth::user()->id)
                        ->where('event_id',$event->id)->first();
            if($eventLiked){
                $event->is_like = $eventLiked->is_like;
            }else{
                $event->is_like = null;
            }
        }

        return response([
            'events' => $events,
            'base_url' => 'https://einvie.com/admin/images/uploads/event/',
        ], 200);
    }
    public function show($id){
        try{ 
            $event = Event::find($id);
            $event->load('eventImages');
            $event->load('getCategory');
            $eventLiked = EventLikeDislike::where('user_id',Auth::user()->id)
            ->where('event_id',$event->id)->first();
            if($eventLiked){
                $event->is_like = $eventLiked->is_like;
            }else{
                $event->is_like = null;
            }
            $joinedEvent = EventJoin::where('user_id',Auth::user()->id)
                        ->where('event_id',$event->id)->first();
            $event->is_joined = $joinedEvent ? true : false;
            return response([
                'event' => $event,
                'base_url' => 'https://einvie.com/admin/images/uploads/event/',
            ], 200);
        }catch (Exception $e)
        {
            return response([
                "success" => false,
                "message" => $e->getMessage(),
            ], 500);
        }

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
    public function update(Request $request)
    {
        try{        
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'event_id' => 'required',
            ]);
            $event = Event::find($request->event_id);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response([
                    "success" => false,
                    "message" => $messages->first(),
                ], 500);
            }

            // Handle file uploads
            if ($request->hasFile('logo')) {
                if ($event->logo && file_exists(public_path('admin/images/uploads/event/' . $event->logo))) {
                    unlink(public_path('admin/images/uploads/event/' . $event->logo));
                }
                $logo = $request->file('logo');
                $logoPath = time() . '_' . $logo->getClientOriginalName();
                $logo->move(public_path('admin/images/uploads/event'), $logoPath);
            };
            if ($request->hasFile('banner')) {
                if ($event->banner && file_exists(public_path('admin/images/uploads/event/' . $event->banner))) {
                    unlink(public_path('admin/images/uploads/event/' . $event->banner));
                }
                $banner = $request->file('banner');
                $bannerPath = time() . '_' . $banner->getClientOriginalName();
                $banner->move(public_path('admin/images/uploads/event'), $bannerPath);
            };
            if ($request->hasFile('gallery_image')) {
                if ($event->gallery_image && file_exists(public_path('admin/images/uploads/event/' . $event->gallery_image))) {
                    unlink(public_path('admin/images/uploads/event/' . $event->gallery_image));
                }
                $gallery_image = $request->file('gallery_image');
                $gallery_imagePath = time() . '_' . $gallery_image->getClientOriginalName();
                $gallery_image->move(public_path('admin/images/uploads/event'), $gallery_imagePath);
            };
            $event->update([
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
                'featured' => $request->has('featured'),
            ]);

            return response([
                'event' => $event,
                'message' => 'Event updated successfully!',
            ], 200);
        }catch (Exception $e)
        {
            return response([
                "success" => false,
                "message" => $e->getMessage(),
            ], 500);
        }

    }
    public function eventLikeDislike(Request $request)
    {
        try{        
            $validator = Validator::make($request->all(), [
                'event_id' => 'required|integer',
                'is_like' => 'required|integer',
            ]);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response([
                    "success" => false,
                    "message" => $messages->first(),
                ], 500);
            }
            $eventLiked = EventLikeDislike::where('user_id',Auth::user()->id)
                        ->where('event_id',$request->event_id)->first();
            if($eventLiked){
                $eventLiked->update([
                    'is_like' => $request->is_like
                ]);
            }else{
                EventLikeDislike::create([
                    'event_id' => $request->event_id,
                    'is_like' => $request->is_like,
                    'user_id' => Auth::user()->id,
                ]);
            }
            return response([
                'message' => 'Event Bookmarked added successfully!',
            ], 200);
        }catch (Exception $e)
        {
            return response([
                "success" => false,
                "message" => $e->getMessage(),
            ], 500);
        }

    }
    public function getLikedEvents(){
        $eventIds = EventLikeDislike::where('is_like',1)->get()->pluck('event_id')->toArray();
        $events = Event::query()->whereIn('id',$eventIds)->with('getCategory')->get();
        
        foreach($events as $event){
            $eventLiked = EventLikeDislike::where('user_id',Auth::user()->id)
                        ->where('event_id',$event->id)->first();
            if($eventLiked){
                $event->is_like = $eventLiked->is_like;
            }else{
                $event->is_like = null;
            }
        }
        return response([
            'events' => $events,
        ], 200);
    }
    public function getDisLikedEvents(){
        $eventIds = EventLikeDislike::where('is_like',0)->get()->pluck('event_id')->toArray();
        $events = Event::query()->whereIn('id',$eventIds)->with('getCategory')->get();
        foreach($events as $event){
            $eventLiked = EventLikeDislike::where('user_id',Auth::user()->id)
                        ->where('event_id',$event->id)->first();
            if($eventLiked){
                $event->is_like = $eventLiked->is_like;
            }else{
                $event->is_like = null;
            }
        }
        return response([
            'events' => $events,
        ], 200);
    }
    public function getRecentEvents(){
        $eventIds = RecentEvent::where('user_id',Auth::user()->id)
                    ->orderBy('created_at','DESC')->get()
                    ->pluck('event_id')->toArray();
        $events = Event::query()->whereIn('id',$eventIds)->with('getCategory')->get();
        
        foreach($events as $event){
            $eventLiked = EventLikeDislike::where('user_id',Auth::user()->id)
                        ->where('event_id',$event->id)->first();
            if($eventLiked){
                $event->is_like = $eventLiked->is_like;
            }else{
                $event->is_like = null;
            }
        }
        return response([
            'events' => $events,
        ], 200);
    }
    public function storeRecentEvent(Request $request)
    {
        try{        
            $validator = Validator::make($request->all(), [
                'event_id' => 'required|integer',
            ]);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response([
                    "success" => false,
                    "message" => $messages->first(),
                ], 500);
            }
            $event = RecentEvent::where('user_id',Auth::user()->id)
                        ->where('event_id',$request->event_id)->first();
            RecentEvent::create([
                'event_id' => $request->event_id,
                'user_id' => Auth::user()->id,
            ]);
            if($event){
                $event->delete();
            }
            return response([
                'message' => 'Event added to recent successfully!',
            ], 200);
        }catch (Exception $e)
        {
            return response([
                "success" => false,
                "message" => $e->getMessage(),
            ], 500);
        }

    }
    public function getHomeEvents(Request $request)
    {
        if($request->latitude && $request->longitude){
            $radius = 10;
            $eventIds = Event::select(
                "events.id as event_id",
                DB::raw("(6371 * acos(cos(radians(?)) * cos(radians(events.latitude)) 
                * cos(radians(events.longitude) - radians(?)) 
                + sin(radians(?)) * sin(radians(events.latitude)))) AS distance")
            )
            ->groupBy("events.id") // Group first before using HAVING
            ->having("distance", "<=", $radius)
            ->orderBy("distance", "asc")
            ->take(3)
            ->setBindings([$request->latitude, $request->longitude, $request->latitude]) // Bind values for security
            ->get()
            ->pluck('event_id')
            ->toArray();
        }else{
            $eventIds = [];
        }
        $events = Event::select(
            "events.*",
            DB::raw("COUNT(CASE WHEN event_like_dislikes.is_like = '1' THEN 1 END) as like_count"),
            DB::raw("COUNT(CASE WHEN event_like_dislikes.is_like = '0' THEN 1 END) as dislike_count")
        )
        ->leftJoin('event_like_dislikes', 'events.id', '=', 'event_like_dislikes.event_id')
        ->whereIn("id", $eventIds)
        ->groupBy("events.id") 
        ->orderByRaw("like_count DESC")
        ->take(3)
        ->get();
        return response([
            'events' => $events,
            'base_url' => 'https://einvie.com/admin/images/uploads/event/',
        ], 200);

    }
}
