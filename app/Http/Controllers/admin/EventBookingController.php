<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventBookingController extends Controller
{
    public function index(){
        return view('admin.events.event_booking');
    }
}
