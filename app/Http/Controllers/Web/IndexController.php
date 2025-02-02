<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Menu;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\VendorsType;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $silders = Slider::all();
        $events = Event::all();
        $vendors_type = VendorsType::all();
        $testimonial = Testimonial::all();
        return view('web.index', compact('silders','events','vendors_type','testimonial'));
    }
    public function about(){
        return view('web.about');
    }
    public function contact(){
        return view('web.contact');
    }
    public function events(){
        $events = Event::all();
        return view('web.events', compact('events'));
    }
}
