<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TempUser;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function customerLogin(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])
                ->where('user_type', 2)->first();
        if(!$user)
        {
            return response([
                'message' => 'Register Your Account'
            ], 401);
        }
        // Check password
        if( !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Wrong Password'
            ], 401);
        }
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);

    }
    public function vendorLogin(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])
                ->where('user_type', 1)
                ->whereNotNull('vendor_type')->first();
        if(!$user)
        {
            return response([
                'message' => 'Register Your Account'
            ], 401);
        }
        // Check password
        if( !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Wrong Password'
            ], 401);
        }
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);

    }
    public function register(Request $request) {
        try{
            $request->validate([
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'phone' => 'required',
                'user_type' => 'required',
                'confirm_password' => 'required|same:password',
            ]);
            $user = TempUser::where('email',$request->email)->first();
            if(!$user){
                $user = new TempUser();
            }
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->user_type = $request->user_type;
            $user->password = Hash::make($request->password);
            $user->verification_code = random_int(1000, 9999);
            $user->expires_at =  Carbon::now()->addMinutes(15);
            $user->save();
            $response = [
                'verification_code' =>  '',
                'message' => 'Verfication Code Sended Successfully!'
            ];
            try{
                $response = Http::withHeaders([
                    'accept' => 'application/json',
                    'x-access-key' => '  5be32ff3f118b886d3dcd3d865cebb54',
                    'Authorization'=> "Bearer ae01d8fd3895d19e10561831b96bf489a066918c26064a39b97e288861c92f68",
                ])->post('https://api.chati.chat/v1/public/api/send-template', [
                    "contactNumber" => "+".$user->phone,
                    "templateName" => "otp_authentication",
                    "templateLanguage" => "en_US",
                    "defaultMedia" => true,
                    "parameters" => [$user->verification_code],
                    "templateId" => "656152966875424"
                ]);
            }catch(Exception $e){
                //
            }
            return response($response, 201);
        }catch(Exception $e){
            return response([
                'message' => $e->getMessage()
            ], 401);
        }
    }
    public function logout(Request $request) {
        try{
            Auth::user()->currentAccessToken()->delete();
            return response([
                "message" => 'User Logout Successfully',
            ], 200);
        }catch (Exception $e)
        {
            return response([
                "success" => false,
                "message" => $e->getMessage(),
            ], 500);
        }
       
    }
    public function verifyOtp(Request $request) {
        try{
            $fields = $request->validate([
                'verification_code' => 'required|numeric',
            ]);
            // Check email
            $tempUser = TempUser::where('verification_code', $fields['verification_code'])
                    ->where('expires_at','>=',Carbon::now())->first();
            if(!$tempUser)
            {
                return response([
                    "success" => false,
                    "message" => 'Invalid OTP',
                ], 401);
            }
            $user = new User();
            $user->email = $tempUser->email;
            $user->phone = $tempUser->phone;
            $user->password = $tempUser->password;
            $user->user_type = $tempUser->user_type;
            $user->save();
            $token = $user->createToken('myapptoken')->plainTextToken;
            $tempUser->delete();
            return response([
                'user' => $user,
                'token' => $token,
                'message' => 'OTP Verified Successfully!'
            ], 200);
        }catch(Exception $e){
            return response([
                "success" => false,
                "message" => $e->getMessage(),
            ], 500);
        }
    }
    public function sendVerificationCode(Request $request) {
        try{
            $fields = $request->validate([
                'email' => 'required|string',
            ]);
            // Check email
            $user = User::where('email', $fields['email'])->first();
            if(!$user)
            {
                return response([
                    "success" => false,
                    "message" => 'User Not Found!',
                ], 401);
            }
            $user->verification_code = random_int(10000, 99999);
            $user->code_expires_at =  Carbon::now()->addMinutes(15);
            $user->save();
            // $emailService = new EmailService();
            // $emailService->sendVerification($user);
            try{
                $response = Http::withHeaders([
                    'accept' => 'application/json',
                    'x-access-key' => '  5be32ff3f118b886d3dcd3d865cebb54',
                    'Authorization'=> "Bearer ae01d8fd3895d19e10561831b96bf489a066918c26064a39b97e288861c92f68",
                ])->post('https://api.chati.chat/v1/public/api/send-template', [
                    "contactNumber" => "+".$user->phone,
                    "templateName" => "otp_authentication",
                    "templateLanguage" => "en_US",
                    "defaultMedia" => true,
                    "parameters" => [$user->verification_code],
                    "templateId" => "656152966875424"
                ]);
            }catch(Exception $e){
                //
            }
            return response([
                'user' => $user,
                'message' => 'Verification Code Send successfully!'
            ], 200);
        }catch(Exception $e){
            return response([
                "success" => false,
                "message" => $e->getMessage(),
            ], 500);
        }
    }
    public function verifyOtpForPassword(Request $request) {
        try{
            $fields = $request->validate([
                'verification_code' => 'required|numeric',
            ]);
            // Check email
            $user = User::where('verification_code', $fields['verification_code'])
                    ->where('code_expires_at','>=',Carbon::now())->first();
            if(!$user)
            {
                return response([
                    "success" => false,
                    "message" => 'Invalid OTP',
                ], 401);
            }
            return response([
                'user' => $user,
                'message' => 'OTP Verified Successfully!'
            ], 200);
        }catch(Exception $e){
            return response([
                "success" => false,
                "message" => $e->getMessage(),
            ], 500);
        }
    }
    public function setNewPassword(Request $request) {
        try{
            $request->validate([
                'user_id' => 'required|numeric',
                'password' => 'required'
            ]);
            $user = User::findOrFail($request->user_id);
            $user->update([
                'password' => $request->password
            ]);
            $token = $user->createToken('myapptoken')->plainTextToken;
            return response([
                'user' => $user,
                'token' => $token,
                'message' => 'User Password Changed Successfully',
            ], status: 200);
        }catch (Exception $e)
        {
            return response([
                "success" => false,
                "message" => $e->getMessage(),
            ], 500);
        }
       
    }
}
