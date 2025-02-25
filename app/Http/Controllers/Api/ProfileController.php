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
                $user->save();
            }
            $user->update($request->expect('password'));
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
