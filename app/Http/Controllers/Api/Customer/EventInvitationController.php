<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\EventInvitation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventInvitationController extends Controller
{
    public function index(Request $request){
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
            $query = EventInvitation::query()->where('user_id',Auth::user()->id);
            if($request->event_id){
                $query->where('event_id',$request->event_id);
            }
            $eventInvitations =  $query->orderBy('created_at','DESC')->get();
            return response([
                'eventInvitations' => $eventInvitations,
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
    public function store(Request $request)
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
            EventInvitation::create([
                'event_id' => $request->event_id,
                'user_id' => Auth::user()->id,
                'image' => $imagePath,
            ]);
            return response([
                'message' => 'Event Invitation Added Successfully!',
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
