<?php

namespace App\Http\Controllers;

use App\Models\Category; // Ensure this model exists in the specified namespace
use App\Models\Event;
use App\Models\User;
use App\Models\EventBooking;
use App\Models\ContactList;
use App\Models\Report;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Count of category
        $total_category = Category::count();
        $total_events = Event::count();

        // Count of events (admin)
        // $total_event = Event::where('user_id', 0)->count();

        // // Count of user events
        // $total_user_event = Event::where('user_id', '<>', 0)->count();

        // Count of users
        $total_users = User::where('id', '<>', 0)->count();

        // Count of event bookings
        $total_booking = EventBooking::count();

        // Count of contact list
        $total_contact = ContactList::count();

        // Count of reports
        $total_report = Report::count();

        // Get users graph data
        $countStr = [];
        $no_data_status = true;

        $year = $request->input('filterByYear', date('Y'));
        for ($mon = 1; $mon <= 12; $mon++) {
            $month = date('M', mktime(0, 0, 0, $mon, 1, $year));
            $totalcount = User::whereYear('created_at', $year)->whereMonth('created_at', $mon)->count();
            $countStr[] = [$month, $totalcount];

            if ($totalcount > 0) {
                $no_data_status = false;
            }
        }

        return view('admin.dashboard', compact(
            'total_category',
            // 'total_event',
            // 'total_user_event',
            'total_users',
            'total_events',
            'total_booking',
            'total_contact',
            'total_report',
            'countStr',
            'no_data_status',
            'year'
        ));
    }
}
