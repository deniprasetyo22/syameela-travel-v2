<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $title = 'Gallery';
        return view('pages.guest.gallery', ['title' => $title]);
    }
}