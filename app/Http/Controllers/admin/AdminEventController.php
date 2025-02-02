<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class AdminEventController extends Controller
{
    public function index(Request $request)
    {
        // Fetch events with optional filtering and searching
        $query = Event::query();

        if ($request->has('search_value')) {
            $query->where('title', 'like', '%' . $request->search_value . '%');
        }

        if ($request->has('filter')) {
            $query->where('status', $request->filter);
        }

        if ($request->has('cat_id')) {
            $query->where('category_id', $request->cat_id);
        }

        $events = $query->paginate(10); // Paginate the results

        return view('admin.events.manage_event', compact('events'));
    }
}
