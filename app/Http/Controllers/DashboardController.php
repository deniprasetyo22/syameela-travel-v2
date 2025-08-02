<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\TripDetail;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function admin()
    {
        $data = [
            'title' => 'Dashboard',
            'total_users' => User::count(),
            'last_users' => User::latest()->take(5)->get(),
            'total_hajj_packages' => Package::where('type', 'Haji')->count(),
            'total_umrah_packages' => Package::where('type', 'Umroh')->count(),
            'total_galleries' => Gallery::count(),
            'total_transactions' => Registration::count(),
            'last_transactions' => Registration::latest()->take(5)->get(),
            'total_trips' => TripDetail::count(),
            'total_messages' => ContactMessage::count(),
        ];

        return view('pages.admin.dashboard', ['data' => $data]);
    }

}