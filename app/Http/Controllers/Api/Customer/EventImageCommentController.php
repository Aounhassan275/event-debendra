<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\EventImageComment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventImageCommentController extends Controller
{
    public function store(Request $request)
    {
        try{        
            $validator = Validator::make($request->all(), [
                'event_image_id' => 'required|integer',
                'comment' => 'required',
            ]);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response([
                    "success" => false,
                    "message" => $messages->first(),
                ], 500);
            }
            EventImageComment::create([
                'event_image_id' => $request->event_image_id,
                'comment' => $request->comment,
                'user_id' => Auth::user()->id,
            ]);
            return response([
                'message' => 'Event Image Comment Added Successfully!',
            ], 200);
        }catch (Exception $e)
        {
            return response([
                "success" => false,
                "message" => $e->getMessage(),
            ], 500);
        }

    }
    public function index(Request $request){
        try{        
            $validator = Validator::make($request->all(), [
                'event_image_id' => 'required|integer',
            ]);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response([
                    "success" => false,
                    "message" => $messages->first(),
                ], 500);
            }
            $comments = EventImageComment::where('event_image_id',$request->event_image_id)
                        ->orderBy('created_at','DESC')->with('user')->get();
            return response([
                'comments' => $comments,
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
