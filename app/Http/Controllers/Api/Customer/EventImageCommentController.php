<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\EventImageComment;
use App\Models\EventImageCommentLikeDislike;
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
                'comment_id' => 'nullable|integer',
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
                'comment_id' => $request->comment_id ?? null,
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
    public function delete(Request $request)
    {
        try{        
            $validator = Validator::make($request->all(), [
                'comment_id' => 'required|integer',
            ]);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response([
                    "success" => false,
                    "message" => $messages->first(),
                ], 500);
            }
            $comment = EventImageComment::find($request->comment_id);
            $comment->comments()->delete();
            $comment->delete();
            return response([
                'message' => 'Event Image Comment Deleted Successfully!',
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
                        ->whereNull('comment_id')
                        ->orderBy('created_at','DESC')->with('user','comments')->get();
            foreach($comments as $comment){
                $commentLiked = EventImageCommentLikeDislike::where('user_id',Auth::user()->id)
                ->where('event_image_comment_id',$comment->id)->first();
                if($commentLiked){
                    $comment->is_like = $commentLiked->is_like;
                }else{
                    $comment->is_like = null;
                }
                foreach($comment->comments as $subComment){
                    $subCommentLiked = EventImageCommentLikeDislike::where('user_id',Auth::user()->id)
                        ->where('event_image_comment_id',$subComment->id)->first();
                    if($commentLiked){
                        $subComment->is_like = $subCommentLiked->is_like;
                    }else{
                        $subComment->is_like = null;
                    }
                }
            }
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
    public function getSubComments(Request $request){
        try{        
            $validator = Validator::make($request->all(), [
                'comment_id' => 'required|integer',
            ]);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response([
                    "success" => false,
                    "message" => $messages->first(),
                ], 500);
            }
            $comments = EventImageComment::where('comment_id',$request->comment_id)
                        ->orderBy('created_at','DESC')->with('user')->get();
            foreach($comments as $comment){
                $commentLiked = EventImageCommentLikeDislike::where('user_id',Auth::user()->id)
                ->where('event_image_comment_id',$comment->id)->first();
                if($commentLiked){
                    $comment->is_like = $commentLiked->is_like;
                }else{
                    $comment->is_like = null;
                }
            }
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
