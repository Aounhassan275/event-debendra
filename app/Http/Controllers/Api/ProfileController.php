<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    
    public function update(Request $request) {
        try{
            $user = Auth::user();
            if($request->password){
                $user->password = Hash::make($request->password);
            }
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagePath = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('admin/images/uploads/profile'), $imagePath);
                $user->image = $imagePath;
            }
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->save();
            $response = [
                'user' => $user,
                'message' => 'Profile Update successfully!'
            ];
            return response($response, 201);
        }catch(Exception $e){
            return response([
                'message' => $e->getMessage()
            ], 401);
        }
    }
}
