<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Package;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
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

        return view('pages.user.main.home', ['data' => $data]);
    }
}