<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\EventImage;
use App\Models\EventImageLikeDislike;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventImageController extends Controller
{
    public function storeEventImage(Request $request)
    {
        try{        
            $validator = Validator::make($request->all(), [
                'event_id' => 'required|integer',
                'image' => 'required|image|mimes:jpg,png,jpeg',
            ]);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response([
                    "success" => false,
                    "message" => $messages->first(),
                ], 500);
            }
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagePath = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('admin/images/uploads/event'), $imagePath);
            };
            EventImage::create([
                'event_id' => $request->event_id,
                'image' => $imagePath,
                'user_id' => Auth::user()->id,
            ]);
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
    public function getEventImages(Request $request){
        try{        
            $validator = Validator::make($request->all(), [
                'event_id' => 'nullable|integer',
            ]);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response([
                    "success" => false,
                    "message" => $messages->first(),
                ], 500);
            }
            $query = EventImage::where('user_id',Auth::user()->id);
            if($request->event_id){
                $query->where('event_id',$request->event_id);
            }
            $eventImages = $query->orderBy('created_at','DESC')->with('user')->get();
            foreach($eventImages as $eventImage){
                $eventImage->likes = EventImageLikeDislike::where('is_like',1)
                        ->where('event_image_id',$eventImage->id)->count();
                $eventImage->dislikes = EventImageLikeDislike::where('is_like',0)
                        ->where('event_image_id',$eventImage->id)->count();
                $eventLiked = EventImageLikeDislike::where('user_id',Auth::user()->id)
                            ->where('event_image_id',$eventImage->id)
                            ->first();
                if($eventLiked){
                    $eventImage->is_like = $eventLiked->is_like;
                }else{
                    $eventImage->is_like = null;
                }
            }
            return response([
                'eventImages' => $eventImages,
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
    public function destroy($id){
        try{        
            $eventImage = EventImage::find($id);
            $eventImage->delete();
            return response([
                'message' => 'Event Image Deleted Successfully!',
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
