<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Order;
use App\Models\User;
use App\Models\Verificaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the dashboard page.
     *
     * @return View
     */


    public function index(): View
    {
        if (Auth::check() && Auth::user()->role == 'Admin') {

            $admins = User::where('role', 'Admin')->count();
            $pending = Order::where('status', 'Pending')->count();
            $completed = Order::where('status', 'Completed')->count();
            $cancelled = Order::where('status', 'Cancelled')->count();

            return view('backend.layouts.dashboard.index', compact('admins', 'pending', 'completed', 'cancelled'));
        }else{
            return redirect()->back();
        }
    }
}
