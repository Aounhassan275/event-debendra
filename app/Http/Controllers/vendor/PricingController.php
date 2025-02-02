<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function pricing(){
        return view('vendor.pricing.index');
    }
    public function store(Request $request){
        dd($request->all());
    }
}
