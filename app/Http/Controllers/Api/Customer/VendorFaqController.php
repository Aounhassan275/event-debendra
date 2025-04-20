<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class VendorFaqController extends Controller
{
    public function index($vendor_id){
        $faqs = Faq::where('user_id', $vendor_id)->get();
        return response([
            'faqs' => $faqs,
        ], 200);
    }
}
