<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\EventImageCommentLikeDislike;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventImageCommentLikeDislikeController extends Controller
{
    public function store(Request $request)
    {
        try{        
            $validator = Validator::make($request->all(), [
                'event_image_comment_id' => 'required|integer',
                'is_like' => 'required|integer',
            ]);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response([
                    "success" => false,
                    "message" => $messages->first(),
                ], 500);
            }
            $commentLikeDislike = EventImageCommentLikeDislike::where('user_id',Auth::user()->id)
                        ->where('event_image_comment_id',$request->event_image_comment_id)->first();
            if($commentLikeDislike){
                $commentLikeDislike->update([
                    'is_like' => $request->is_like
                ]);
            }else{
                EventImageCommentLikeDislike::create([
                    'event_image_comment_id' => $request->event_image_comment_id,
                    'is_like' => $request->is_like,
                    'user_id' => Auth::user()->id,
                ]);
            }
            return response([
                'message' => 'Event Image Comment Bookmarked added successfully!',
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
