<?php

namespace App\Http\Controllers\Api\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    public function index(){
        $faqs = Faq::where('user_id', Auth::user()->id)->get();
        return response([
            'faqs' => $faqs,
        ], 200);
    }
    public function store(Request $request){
        try{
            $request->validate([
                'question' => 'required',
                'answer' => 'required',
            ]);
            $store = new Faq();
            $store->user_id = Auth::user()->id;
            $store->question = $request->question;
            $store->answer = $request->answer;
            $store->save();
            return response([
                'message' => 'Faq Added Successfully!',
            ], 200);
        }catch (Exception $e)
        {
            return response([
                "success" => false,
                "message" => $e->getMessage(),
            ], 500);
        }
    }
    public function update(Request $request){
        try{
            $request->validate([
                'question' => 'required',
                'answer' => 'required',
                'faq_id' => 'required',
            ]);
            $store = Faq::findOrFail($request->faq_id);
            $store->question = $request->question;
            $store->answer = $request->answer;
            $store->save();
            return response([
                'message' => 'Faq Updated Successfully!',
            ], 200);
        }catch (Exception $e)
        {
            return response([
                "success" => false,
                "message" => $e->getMessage(),
            ], 500);
        }
    }
    public function destory($id){
        try{        
            $service = Faq::find($id);
            $service->delete();
            return response([
                'message' => 'Faq Deleted Successfully!',
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
