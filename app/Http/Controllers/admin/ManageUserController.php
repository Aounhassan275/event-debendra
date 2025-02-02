<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NormalUser;

class ManageUserController extends Controller
{ 
    public function index()
    {
        // Retrieve all normal users
        $normalUsers = NormalUser::all();

        // Return the view with the retrieved users
        return view('admin.user.manage_user', compact('normalUsers'));
    }
}
