<?php

namespace App\Http\Controllers;

use App\Models\Registration;
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

}