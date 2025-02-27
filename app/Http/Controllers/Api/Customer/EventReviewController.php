<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\EventReview;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventReviewController extends Controller
{
    public function store(Request $request)
    {
        try{        
            $validator = Validator::make($request->all(), [
                'event_id' => 'required|integer',
                'description' => 'required',
            ]);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response([
                    "success" => false,
                    "message" => $messages->first(),
                ], 500);
            }
            $eventReview = EventReview::create([
                'description' => $request->description,
                'event_id' => $request->event_id,
                'user_id' => Auth::user()->id,
            ]);
            return response([
                'eventReview' => $eventReview,
                'message' => 'Event Review Added successfully!',
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
        $reviews = EventReview::where('event_id',$request->event_id)->orderBy('created_at','DESC')->with('user')->get();
        return response([
            'reviews' => $reviews,
        ], 200);
    }
}
