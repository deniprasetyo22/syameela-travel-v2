<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Package;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role->name === 'Admin') {
            return redirect()->route('admin-dashboard');
        }

        if (Auth::check() && Auth::user()->role->name === 'User') {
            return redirect()->route('profile');
        }

        $data = [
            'title' => 'Home',
            'hajj' => Package::where('type', 'Haji')->latest()->take(3)->get(),
            'umrah' => Package::where('type', 'Umroh')->latest()->take(3)->get(),
            'galleries' => [
                'all' => Gallery::latest()->take(6)->get(),
                'haji' => Gallery::where('type', 'Haji')->latest()->take(6)->get(),
                'umroh' => Gallery::where('type', 'Umroh')->latest()->take(6)->get(),
            ],
            'testimonials' => Testimonial::latest()->take(2)->get()
        ];

        return view('pages.guest.home', ['data' => $data]);
    }
}