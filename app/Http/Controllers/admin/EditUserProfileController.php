<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NormalUser;

class EditUserProfileController extends Controller
{
    // App\Http\Controllers\NormalUserController.php
    public function edit($id)
    {
        $user = NormalUser::findOrFail($id);

        return view('admin.user.edit_user_profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:normal_users,email,'.$id,
            'password' => 'nullable|string|min:6|confirmed',
            'phone' => 'nullable|string|max:15',
            'city' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
        ]);

        // Find the user and update the record
        $user = NormalUser::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->input('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->phone = $request->input('phone');
        $user->city = $request->input('city');
        $user->address = $request->input('address');

        if ($request->hasFile('user_image')) {
            if ($user->user_image && file_exists(public_path('admin/images/uploads/' . $user->user_image))) {
                unlink(public_path('admin/images/uploads/' . $user->user_image));
            }
            $img = $request->file('user_image');
            $imgName = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path('admin/images/uploads'), $imgName);
            $user->user_image = $imgName;
        }
        $status = 1;

        // NormalUser::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        //     'phone' => $request->phone,
        //     'city' => $request->city,
        //     'address' => $request->address,
        //     'user_image' => $imgName,
        //     'status'=> $status
        // ]);

        $user->save();

        return redirect()->route('normal_users.index')->with('success', 'User updated successfully!');
    }

}

