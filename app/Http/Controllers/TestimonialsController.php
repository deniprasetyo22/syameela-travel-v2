<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    public function index()
    {
        $title = 'Testimonials';
        return view('pages.guest.testimonials', ['title' => $title]);
    }
}