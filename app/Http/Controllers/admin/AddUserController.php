<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NormalUser;
use Illuminate\Support\Facades\Hash;

class AddUserController extends Controller
{
    public function create()
    {
        return view('admin.user.add_user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:normal_users',
            'password' => 'required|string|min:8',
            'user_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        $userData = $request->all();
        $userData['password'] = Hash::make($request->password);

        $imgName = 'photo.jpg';

        // Check if an image was uploaded
        // if ($request->hasFile('user_image')) {
        //     $img = $request->file('user_image');
        //     $imgName = time() . '_' . $img->getClientOriginalName();
        //     $img->move(public_path('admin/images/uploads'), $imgName);
        // }

        if ($request->hasFile('user_image')) {
            $img = $request->file('user_image');
            $imgName = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path('admin/images/uploads'), $imgName);
            // $userData->img = $imgName;
        };
        $status = 1;

        NormalUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
            'user_image' => $imgName,
            'status'=> $status
        ]);

        return redirect()->route('normal_users.index')->with('success', 'User added successfully.');
    }
}
