<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\EventImage;
use App\Models\EventImageLikeDislike;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventImageLikeDislikeController extends Controller
{
    public function store(Request $request)
    {
        try{        
            $validator = Validator::make($request->all(), [
                'event_image_id' => 'required|integer',
                'is_like' => 'required|integer',
            ]);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response([
                    "success" => false,
                    "message" => $messages->first(),
                ], 500);
            }
            $eventLiked = EventImageLikeDislike::where('user_id',Auth::user()->id)
                        ->where('event_image_id',$request->event_image_id)->first();
            if($eventLiked){
                $eventLiked->update([
                    'is_like' => $request->is_like
                ]);
            }else{
                EventImageLikeDislike::create([
                    'event_image_id' => $request->event_image_id,
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
    public function getLikedEventImages(){
        $eventIds = EventImageLikeDislike::where('is_like',1)->get()->pluck('event_image_id')->toArray();
        $eventImages = EventImage::query()->whereIn('id',$eventIds)->orderBy('created_at','DESC')->get();;
        return response([
            'eventImages' => $eventImages,
        ], 200);
    }
    public function getDisLikedEventImages(){
        $eventIds = EventImageLikeDislike::where('is_like',0)->get()->pluck('event_image_id')->toArray();
        $eventImages = EventImage::query()->whereIn('id',$eventIds)->orderBy('created_at','DESC')->get();;
        return response([
            'eventImages' => $eventImages,
        ], 200);
    }
}
