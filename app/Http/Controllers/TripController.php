<?php

namespace App\Http\Controllers;

use App\Models\TripDetail;
use Illuminate\Support\Str;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $trips = TripDetail::with('registration')->search($search)->latest()->paginate(10);

        $data =[
            'title' => 'Trip',
            'trips' => $trips
        ];

        return view('pages.admin.trip.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transactions = Registration::where('status', 'Paid')->latest()->get();

        $data = [
            'title' => 'Add Trip',
            'transactions' => $transactions
        ];

        return view('pages.admin.trip.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'registration_id' => 'required|exists:registrations,id',
            'departure_date' => 'required',
            'return_date' => 'required|after:departure_date',
            'guide_name' => 'required|string|max:255',
            'gathering_location' => 'required|string|max:255',
            'airline' => 'required|string|max:255',
            'flight_number' => 'required|string|max:255',
            'visa' => 'required|mimes:pdf|max:5000',
            'ticket' => 'required|mimes:pdf|max:5000',
            'hotel_info' => 'required',
            'equipment_info' => 'required',
        ], [
            'registration_id.required' => 'ID Transaksi wajib diisi.',
            'registration_id.exists' => 'ID Transaksi tidak ditemukan.',
            'departure_date.required' => 'Tanggal keberangkatan wajib diisi.',
            'return_date.required' => 'Tanggal kepulangan wajib diisi.',
            'return_date.after' => 'Tanggal kepulangan tidak boleh sebelum tanggal keberangkatan.',
            'guide_name.required' => 'Nama pemandu wajib diisi.',
            'gathering_location.required' => 'Tempat bertemu wajib diisi.',
            'airline.required' => 'Maskapai wajib diisi.',
            'flight_number.required' => 'Nomor penerbangan wajib diisi.',
            'visa.required' => 'Visa wajib diisi.',
            'ticket.required' => 'Tiket wajib diisi.',
            'hotel_info.required' => 'Informasi hotel wajib diisi.',
            'equipment_info.required' => 'Informasi alat wajib diisi.',
        ]);

        if ($request->hasFile('visa')) {
            $visa = $request->file('visa');
            $visaName = Str::random(30) . '.' . $visa->getClientOriginalExtension();
            $visaPath = $visa->storeAs('file/trip/visas', $visaName, 'public');
            $validated['visa'] = '/storage/' . $visaPath;
        }

        if ($request->hasFile('ticket')) {
            $ticket = $request->file('ticket');
            $ticketName = Str::random(30) . '.' . $ticket->getClientOriginalExtension();
            $ticketPath = $ticket->storeAs('file/trip/tickets', $ticketName, 'public');
            $validated['ticket'] = '/storage/' . $ticketPath;
        }

        TripDetail::create($validated);

        return redirect()->route('trip-dashboard')->with('success', 'Trip berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $trip = TripDetail::with('registration')->findOrFail($id);

        $data = [
            'title' => 'Detail Trip',
            'trip' => $trip,
        ];

        return view('pages.admin.trip.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $trip = TripDetail::findOrFail($id);
        $transactions = Registration::latest()->get();

        $data = [
            'title' => 'Edit Trip',
            'trip' => $trip,
            'transactions' => $transactions
        ];

        return view('pages.admin.trip.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $trip = TripDetail::findOrFail($id);

        $validated = $request->validate([
            'registration_id' => 'required|exists:registrations,id',
            'departure_date' => 'required',
            'return_date' => 'required|after:departure_date',
            'guide_name' => 'required|string|max:255',
            'gathering_location' => 'required|string|max:255',
            'airline' => 'required|string|max:255',
            'flight_number' => 'required|string|max:255',
            'visa' => 'nullable|mimes:pdf|max:5000',
            'ticket' => 'nullable|mimes:pdf|max:5000',
            'hotel_info' => 'required',
            'equipment_info' => 'required',
        ], [
            'registration_id.required' => 'ID Transaksi wajib diisi.',
            'registration_id.exists' => 'ID Transaksi tidak ditemukan.',
            'departure_date.required' => 'Tanggal keberangkatan wajib diisi.',
            'return_date.required' => 'Tanggal kepulangan wajib diisi.',
            'return_date.after' => 'Tanggal kepulangan tidak boleh sebelum tanggal keberangkatan.',
            'guide_name.required' => 'Nama pemandu wajib diisi.',
            'gathering_location.required' => 'Tempat bertemu wajib diisi.',
            'airline.required' => 'Maskapai wajib diisi.',
            'flight_number.required' => 'Nomor penerbangan wajib diisi.',
            'hotel_info.required' => 'Informasi hotel wajib diisi.',
            'equipment_info.required' => 'Informasi alat wajib diisi.',
        ]);

        if ($request->hasFile('visa')) {
            // Hapus file lama jika ada
            if ($trip->visa){
                $oldVisa = Str::replace('/storage/', '', $trip->visa);
                if(Storage::disk('public')->exists($oldVisa)){
                    Storage::disk('public')->delete($oldVisa);
                }
            };

            $visa = $request->file('visa');
            $visaName = Str::random(30) . '.' . $visa->getClientOriginalExtension();
            $visaPath = $visa->storeAs('file/trip/visas', $visaName, 'public');
            $validated['visa'] = '/storage/' . $visaPath;
        }

        if ($request->hasFile('ticket')) {
            // Hapus file lama jika ada
            if ($trip->ticket){
                $oldTicket = Str::replace('/storage/', '', $trip->ticket);
                if(Storage::disk('public')->exists($oldTicket)){
                    Storage::disk('public')->delete($oldTicket);
                }
            }

            $ticket = $request->file('ticket');
            $ticketName = Str::random(30) . '.' . $ticket->getClientOriginalExtension();
            $ticketPath = $ticket->storeAs('file/trip/tickets', $ticketName, 'public');
            $validated['ticket'] = '/storage/' . $ticketPath;
        }

        $trip->update($validated);

        return redirect()->route('trip-dashboard')->with('success', 'Trip berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trip = TripDetail::findOrFail($id);

        // Hapus file visa jika ada
        if ($trip->visa){
            $oldVisa = Str::replace('/storage/', '', $trip->visa);
            if(Storage::disk('public')->exists($oldVisa)){
                Storage::disk('public')->delete($oldVisa);
            };
        };

        // Hapus file ticket jika ada
        if ($trip->ticket){
            $oldTicket = Str::replace('/storage/', '', $trip->ticket);
            if(Storage::disk('public')->exists($oldTicket)){
                Storage::disk('public')->delete($oldTicket);
            };
        };

        $trip->delete();

        return redirect()->route('trip-dashboard')->with('success', 'Trip berhasil dihapus.');
    }

    public function myTrips(Request $request)
    {
        $type = $request->get('type');

        $trips = TripDetail::with('registration')
            ->whereHas('registration', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })
            ->filter($type)
            ->latest()
            ->paginate(10);

        $data = [
            'title' => 'My Trips',
            'trips' => $trips
        ];

        return view('pages.user.trip.index', ['data' => $data]);
    }

    public function showMytrip(string $id)
    {
        $trip = TripDetail::with('registration')->findOrFail($id);

        $data = [
            'title' => 'Detail Trip',
            'trip' => $trip
        ];

        return view('pages.user.trip.show', ['data' => $data]);
    }
}