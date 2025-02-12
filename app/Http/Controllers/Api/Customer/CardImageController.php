<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\CardImage;
use App\Models\Category;
use App\Models\Event;
use App\Models\EventLikeDislike;
use App\Models\RecentEvent;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CardImageController extends Controller
{
    public function index(Request $request){

        $query = CardImage::query();
        if($request->category_name){
            $query->where('category_name',$request->category_name);
        }
        $cardImages = $query->get();
        return response([
            'cardImages' => $cardImages,
            'base_url' => 'https://einvie.com/admin/images/uploads/card/',
        ], 200);
    }
}
