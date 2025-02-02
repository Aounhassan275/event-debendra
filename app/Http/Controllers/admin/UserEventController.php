<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserEventController extends Controller
{
    public function index()
    {
        return view('admin.events.user_events');
    }
    public function edit()
    {
        
    }

}
