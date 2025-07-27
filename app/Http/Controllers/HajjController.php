<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class HajjController extends Controller
{
    public function index()
    {
        $title = 'Hajj';
        return view('pages.guest.hajj', ['title' => $title]);
    }

    public function dashboard(Request $request)
    {
        $search = $request->get('search');

        $packages = $search ? Package::search($search)->where('type', 'Haji')->paginate(10) : Package::latest()->where('type', 'Haji')->paginate(10);

        $data = [
            'title' => 'Hajj Dashboard',
            'packages' => $packages,
        ];

        return view('pages.admin.hajj.index', ['data' => $data]);
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