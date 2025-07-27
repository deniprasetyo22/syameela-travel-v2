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
        $data = [
            'title' => 'Add Hajj Package',
        ];

        return view('pages.admin.hajj.create', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'package_name'     => 'required|string|max:255|unique:packages,package_name',
            'price'            => 'required|numeric|min:0',
            'quota'            => 'required|integer|min:1',
            'departure_date'   => 'required|date_format:Y-m-d\TH:i',
            'return_date'      => 'required|date|after_or_equal:departure_date',
            'facilities'       => 'required|string|max:5000',
        ], [
            'package_name.required'    => 'Nama paket wajib diisi.',
            'package_name.max'          => 'Nama paket tidak boleh lebih dari 255 karakter.',
            'package_name.unique'       => 'Nama paket sudah digunakan.',
            'price.required'           => 'Harga wajib diisi.',
            'quota.required'           => 'Kuota wajib diisi.',
            'departure_date.required'  => 'Tanggal keberangkatan wajib diisi.',
            'return_date.required'     => 'Tanggal kepulangan wajib diisi.',
            'return_date.after_or_equal' => 'Tanggal kepulangan tidak boleh sebelum tanggal keberangkatan.',
            'facilities.required'      => 'Fasilitas wajib diisi.',
        ]);

        // Simpan ke database
        Package::create([
            'package_name'    => $validated['package_name'],
            'type'            => 'Haji', // Hardcoded
            'price'           => $validated['price'],
            'quota'           => $validated['quota'],
            'departure_date'  => $validated['departure_date'],
            'return_date'     => $validated['return_date'],
            'facilities'      => $validated['facilities'],
        ]);

        return redirect()->route('hajj-dashboard')->with('success', 'Paket Haji berhasil ditambahkan.');
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