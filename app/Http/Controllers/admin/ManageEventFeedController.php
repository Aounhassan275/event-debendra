<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageEventFeedController extends Controller
{
    public function index(){
        return view('admin.events.manage_event_feed');
    }
}
