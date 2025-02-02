<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditSliderController extends Controller
{
    public function index(){
        return view('admin.slider.edit_slider');
    }
}
