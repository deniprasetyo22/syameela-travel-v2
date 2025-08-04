<?php

namespace App\Http\Controllers;

use Pest\Support\Str;
use App\Models\Payment;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function dashboard(Request $request)
    {
        $search = $request->get('search');
        $type = $request->get('type');

        $query = Registration::with(['user', 'package'])
                ->search($search)
                ->filter($type);

        $transactions = $query->latest()->paginate(10)->appends($request->all());

        $data = [
            'title' => 'Transactions',
            'transactions' => $transactions
        ];
        return view('pages.admin.transaction.index', ['data' => $data]);
    }

    public function show(string $id)
    {
        $transaction = Registration::find($id);

        $data = [
            'title' => 'Detail Transaction',
            'transaction' => $transaction,
        ];

        return view('pages.admin.transaction.show', ['data' => $data]);
    }

    public function update(Request $request, string $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->verification_status = $request->verification_status;
        $payment->save();

        $transaction = $payment->registration;

        $allPaid = $transaction->payments->every(function ($p) {
            return $p->verification_status === 'paid';
        });

        if ($allPaid) {
            $transaction->status = 'paid';
            $transaction->save();
        }

        return redirect()->route('show-transaction', ['id' => $transaction->id])
                        ->with('success', 'Status pembayaran berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $transaction = Registration::findOrFail($id);
        $transaction->delete();
        return redirect()->route('transaction-dashboard')->with('success', 'Transaction berhasil dihapus.');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $search = $request->get('search');

        $payments = Registration::where('user_id', $user->id)
            ->search($search)
            ->latest()
            ->paginate(10);

        $data = [
            'title' => 'Payments',
            'payments' => $payments
        ];

        return view('pages.user.payment.index', ['data' => $data]);
    }

    public function showMyPayment($id)
    {
        $payment = Registration::find($id);

        $data = [
            'title' => 'Detail payment',
            'payment' => $payment,
        ];

        return view('pages.user.payment.show', ['data' => $data]);
    }

    public function updateMyPayment(Request $request, string $id)
    {
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ], [
            'payment_proof.required' => 'Bukti pembayaran wajib diisi.',
            'payment_proof.image' => 'Bukti pembayaran harus berupa gambar.',
            'payment_proof.mimes' => 'Format gambar bukti pembayaran harus JPEG, PNG, JPG, GIF, atau SVG.',
            'payment_proof.max' => 'Ukuran gambar bukti pembayaran tidak boleh lebih dari 5MB.',
        ]);

        $payment = Payment::findOrFail($id);

        // Hapus file lama jika ada
        if ($payment->payment_proof) {
            $oldImagePath = str_replace('/storage/', '', $payment->payment_proof);
            if (Storage::disk('public')->exists($oldImagePath)) {
                Storage::disk('public')->delete($oldImagePath);
            }
        }

        // Simpan gambar baru
        if ($request->hasFile('payment_proof')) {
            $image = $request->file('payment_proof');
            $imageName = Str::random(30) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("images/payments/{$payment->registration->registration_number}", $imageName, 'public');
            $payment->payment_proof = '/storage/' . $path;
        }

        // Update data pembayaran
        $payment->update([
            'payment_proof' => $payment->payment_proof,
            'paid_at' => now(),
            'verification_status' => 'processing'
        ]);

        // Update status transaksi juga
        $payment = $payment->registration;
        $payment->update([
            'status' => 'processing'
        ]);

        return redirect()->route('show-payment', ['id' => $payment->id])
                        ->with('success', 'Status pembayaran berhasil diperbarui.');
    }
}