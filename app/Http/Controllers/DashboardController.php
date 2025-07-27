<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        $data = [
            'title' => 'Dashboard',
            'users' => User::latest()->take(5)->get(),
        ];

        return view('pages.admin.dashboard', ['data' => $data]);
    }

    public function user()
    {
        $title = 'Dashboard';
        return view('pages.user.dashboard', ['title' => $title]);
    }
}