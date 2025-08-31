<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\TripDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function jamaah()
    {
        $jamaah = Registration::with(['user', 'package'])
            ->where('status', 'paid')
            ->latest()
            ->paginate(10);

        $data = [
            'title' => 'Report Jamaah',
            'jamaah' => $jamaah,
        ];

        return view('pages.admin.report.jamaah.index', ['data' => $data]);
    }

    public function exportJamaah()
    {
        $jamaah = Registration::with(['user', 'package'])->where('status', 'paid')->latest()->get();

        $pdf = Pdf::loadView('pages.admin.report.jamaah.export-jamaah', ['jamaah' => $jamaah])->setPaper('a4', 'landscape');;

        return $pdf->stream('export-users-' . Carbon::now()->timestamp . '.pdf');
    }

    public function hajjDocuments(Request $request)
    {
        $search = $request->get('search');

        $jamaah = Registration::with(['user', 'package'])
            ->where('status', 'paid')
            ->whereHas('package', function ($query) {
                $query->where('type', 'Haji');
            })
            ->search($search)
            ->latest()
            ->paginate(10);

        $data = [
            'title' => 'Report Hajj Documents',
            'jamaah' => $jamaah,
        ];

        return view('pages.admin.report.hajj.hajj-documents', ['data' => $data]);
    }

    public function exportHajjDocuments($id)
    {
        $jamaah = Registration::with(['user.profile', 'user.documents', 'package'])->findOrFail($id);

        $pdf = Pdf::loadView('pages.admin.report.hajj.export-hajj-documents', ['jamaah' => $jamaah]);

        return $pdf->stream('export-dokumen-jamaah-haji-' . Carbon::now()->timestamp . '.pdf');
    }

    public function hajjPayments(Request $request)
    {
        $search = $request->get('search');

        $jamaah = Registration::with(['user', 'package'])
            ->where('status', 'paid')
            ->whereHas('package', function ($query) {
                $query->where('type', 'Haji');
            })
            ->search($search)
            ->latest()
            ->paginate(10);

        $data = [
            'title' => 'Report Hajj Payments',
            'jamaah' => $jamaah,
        ];

        return view('pages.admin.report.hajj.hajj-payments', ['data' => $data]);
    }

    public function exportHajjPayments($id)
    {
        $jamaah = Registration::with(['user.profile', 'package', 'payments'])->findOrFail($id);

        $pdf = Pdf::loadView('pages.admin.report.hajj.export-hajj-payments', ['jamaah' => $jamaah]);

        return $pdf->stream('export-pembayaran-jamaah-haji-' . Carbon::now()->timestamp . '.pdf');
    }

    public function hajjDeparture()
    {
        $years = TripDetail::whereHas('registration.package', fn($q) => $q->where('type', 'Haji'))
            ->selectRaw('YEAR(departure_date) as y')
            ->distinct()
            ->orderByDesc('y')
            ->pluck('y')
            ->toArray();

        $data = [
            'title' => 'Export Keberangkatan Jamaah Haji',
            'years' => $years,
        ];

        return view('pages.admin.report.hajj.hajj-departures', ['data' => $data]);
    }

    public function exportHajjDepartures($year)
    {
        // Validasi tahun sederhana
        if (!preg_match('/^\d{4}$/', (string) $year)) {
            abort(404);
        }

        // Ambil registrasi Haji yang punya TripDetail di tahun tsb
        $departures = Registration::with([
                'user.profile',
                'package',
                'tripDetail',
            ])
            ->whereHas('package', fn($q) => $q->where('type', 'Haji'))
            ->whereHas('tripDetail', fn($q) => $q->whereYear('departure_date', $year))
            ->orderBy('registration_number')
            ->get();

        if ($departures->isEmpty()) {
            return back()->with('warning', "Tidak ada data keberangkatan Haji tahun {$year}.");
        }

        // Render ke PDF
        $pdf = Pdf::loadView('pages.admin.report.hajj.export-hajj-departures', [
                'departures' => $departures,
                'year'       => $year,
            ])
            ->setPaper('a4', 'landscape');

        return $pdf->stream("keberangkatan-haji-{$year}.pdf");
    }

    public function umrahDocuments(Request $request)
    {
        $search = $request->get('search');

        $jamaah = Registration::with(['user', 'package'])
            ->where('status', 'paid')
            ->whereHas('package', function ($query) {
                $query->where('type', 'Umroh');
            })
            ->search($search)
            ->latest()
            ->paginate(10);

        $data = [
            'title' => 'Report Umrah Documents',
            'jamaah' => $jamaah,
        ];

        return view('pages.admin.report.umrah.umrah-documents', ['data' => $data]);
    }

    public function exportUmrahDocuments($id)
    {
        $jamaah = Registration::with(['user.profile', 'user.documents', 'package'])->findOrFail($id);

        $pdf = Pdf::loadView('pages.admin.report.umrah.export-umrah-documents', ['jamaah' => $jamaah]);

        return $pdf->stream('export-dokumen-jamaah-umroh-' . Carbon::now()->timestamp . '.pdf');
    }

    public function umrahPayments(Request $request)
    {
        $search = $request->get('search');

        $jamaah = Registration::with(['user', 'package'])
            ->where('status', 'paid')
            ->whereHas('package', function ($query) {
                $query->where('type', 'Umroh');
            })
            ->search($search)
            ->latest()
            ->paginate(10);

        $data = [
            'title' => 'Report Umrah Payments',
            'jamaah' => $jamaah,
        ];

        return view('pages.admin.report.umrah.umrah-payments', ['data' => $data]);
    }

    public function exportUmrahPayments($id)
    {
        $jamaah = Registration::with(['user.profile', 'package', 'payments'])->findOrFail($id);

        $pdf = Pdf::loadView('pages.admin.report.umrah.export-umrah-payments', ['jamaah' => $jamaah]);

        return $pdf->stream('export-pembayaran-jamaah-umroh-' . Carbon::now()->timestamp . '.pdf');
    }

    public function umrahDeparture()
    {
        $years = TripDetail::whereHas('registration.package', fn($q) => $q->where('type', 'Umroh'))
            ->selectRaw('YEAR(departure_date) as y')
            ->distinct()
            ->orderByDesc('y')
            ->pluck('y')
            ->toArray();

        $data = [
            'title' => 'Export Keberangkatan Jamaah Umroh',
            'years' => $years,
        ];

        return view('pages.admin.report.umrah.umrah-departures', ['data' => $data]);
    }

    public function exportumrahDepartures($year)
    {
        // Validasi tahun sederhana
        if (!preg_match('/^\d{4}$/', (string) $year)) {
            abort(404);
        }

        // Ambil registrasi Umroh yang punya TripDetail di tahun tsb
        $departures = Registration::with([
                'user.profile',
                'package',
                'tripDetail',
            ])
            ->whereHas('package', fn($q) => $q->where('type', 'Umroh'))
            ->whereHas('tripDetail', fn($q) => $q->whereYear('departure_date', $year))
            ->orderBy('registration_number')
            ->get();

        if ($departures->isEmpty()) {
            return back()->with('warning', "Tidak ada data keberangkatan Umroh tahun {$year}.");
        }

        // Render ke PDF
        $pdf = Pdf::loadView('pages.admin.report.umrah.export-umrah-departures', [
                'departures' => $departures,
                'year'       => $year,
            ])
            ->setPaper('a4', 'landscape');

        return $pdf->stream("keberangkatan-umroh-{$year}.pdf");
    }

}