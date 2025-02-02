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
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'password' => 'nullable|min:6',
            ]);

            $user = Auth::user();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            if($request->password){
                $user->password = Hash::make($request->password);
            }
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
