<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class UmrahController extends Controller
{
    public function index()
    {
        $title = 'Umrah';
        return view('pages.guest.umrah', ['title' => $title]);
    }

    public function dashboard(Request $request)
    {
        $search = $request->get('search');

        $packages = $search ? Package::search($search)->where('type', 'Umroh')->paginate(10) : Package::latest()->where('type', 'Umroh')->paginate(10);

        $data = [
            'title' => 'Umrah Dashboard',
            'packages' => $packages,
        ];

        return view('pages.admin.umrah.index', ['data' => $data]);
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}