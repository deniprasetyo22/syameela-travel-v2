<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UmrahController extends Controller
{
    public function index()
    {
        $title = 'Umrah';
        return view('pages.guest.umrah', ['title' => $title]);
    }
}