<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventJoin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventJoinController extends Controller
{
    public function store(Request $request)
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
            $joinedEvent = EventJoin::where('user_id',Auth::user()->id)
                        ->where('event_id',$request->event_id)->first();
            if(!$joinedEvent){
                EventJoin::create([
                    'event_id' => $request->event_id,
                    'user_id' => Auth::user()->id,
                ]);
            }
            return response([
                'message' => 'Event Join added successfully!',
            ], 200);
        }catch (Exception $e)
        {
            return response([
                "success" => false,
                "message" => $e->getMessage(),
            ], 500);
        }

    }
    public function index(){
        $eventIds = EventJoin::where('user_id',Auth::user()->id)->get()->pluck('event_id')->toArray();
        $events = Event::query()->whereIn('id',$eventIds)->orderBy('created_at','DESC')->get();;
        return response([
            'events' => $events,
        ], 200);
    }
}
