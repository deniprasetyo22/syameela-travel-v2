<?php

namespace App\Http\Controllers;

use App\Models\Manasik;
use App\Models\Registration;
use Illuminate\Http\Request;

class ManasikController extends Controller
{
    public function dashboard(Request $request)
    {
        $search = $request->get('search');
        $manasiks = Manasik::with(['registration', 'registration.package'])->search($search)->latest()->paginate(10);

        $data = [
            'title' => 'Manasik Dashboard',
            'manasiks' => $manasiks,
        ];

        return view('pages.admin.manasik.index', ['data' => $data]);
    }

    public function show($id)
    {
        $manasik = Manasik::with(['registration', 'registration.package'])->find($id);

        $data = [
            'title' => 'Detail Manasik',
            'manasik' => $manasik,
        ];

        return view('pages.admin.manasik.show', ['data' => $data]);
    }

    public function create()
    {
        $registrations = Registration::where('status', 'Paid')->latest()->get();

        $data = [
            'title' => 'Add Manasik Schedule',
            'registrations' => $registrations
        ];

        return view('pages.admin.manasik.create', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'registration_id' => 'required',
            'date' => 'required',
            'location' => 'required',
            'note' => 'nullable',
        ], [
            'registration_id.required' => 'Nomor Registrasi wajib diisi.',
            'date.required' => 'Tanggal wajib diisi.',
            'location.required' => 'Lokasi wajib diisi.',
        ]);

        Manasik::create($validated);

        return redirect()->route('manasik-dashboard')->with('success', 'Jadwal Manasik berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $manasik = Manasik::find($id);
        $registrations = Registration::where('status', 'Paid')->latest()->get();

        $data = [
            'title' => 'Edit Manasik Schedule',
            'manasik' => $manasik,
            'registrations' => $registrations
        ];

        return view('pages.admin.manasik.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'registration_id' => 'required',
            'date' => 'required',
            'location' => 'required',
            'note' => 'nullable',
        ], [
            'registration_id.required' => 'Nomor Registrasi wajib diisi.',
            'date.required' => 'Tanggal wajib diisi.',
            'location.required' => 'Lokasi wajib diisi.',
        ]);

        $manasik = Manasik::find($id);
        $manasik->update($validated);

        return redirect()->route('manasik-dashboard')->with('success', 'Jadwal Manasik berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Manasik::find($id)->delete();
        return redirect()->route('manasik-dashboard')->with('success', 'Jadwal Manasik berhasil dihapus.');
    }

    public function myManasik(Request $request)
    {
        $user = auth()->user();
        $search = $request->get('search');

        $manasiks = Manasik::with(['registration', 'registration.package'])
            ->whereHas('registration', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->search($search)
            ->latest()
            ->paginate(10);

        $data = [
            'title' => 'Manasik',
            'manasiks' => $manasiks
        ];

        return view('pages.user.manasik.index', ['data' => $data]);
    }

    public function showMyManasik($id)
    {
        $manasik = Manasik::with(['registration', 'registration.package'])->find($id);

        $data = [
            'title' => 'Detail Manasik',
            'manasik' => $manasik,
        ];

        return view('pages.user.manasik.show', ['data' => $data]);
    }

}