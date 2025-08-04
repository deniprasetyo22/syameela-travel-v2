<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $title = 'Contact';
        return view('pages.guest.contact', ['title' => $title]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'phone.required' => 'Subjek wajib diisi.',
            'message.required' => 'Pesan wajib diisi.',
        ]);

        ContactMessage::create($validated);

        return redirect()->route('contact')->with('success', 'Pesan Anda berhasil dikirim.');
    }

    public function dashboard(Request $request)
    {
        $search = $request->query('search');
        $contacts = ContactMessage::search($search)->latest()->paginate(10);

        $data = [
            'title' => 'Contact Dashboard',
            'contacts' => $contacts
        ];

        return view('pages.admin.contact.index', ['data' => $data]);
    }

    public function show(string $id)
    {
        $contact = ContactMessage::find($id);

        $data = [
            'title' => 'Detail Contact',
            'contact' => $contact,
        ];

        return view('pages.admin.contact.show', ['data' => $data]);
    }

    public function destroy(string $id)
    {
        ContactMessage::find($id)->delete();
        return redirect()->route('contact-dashboard')->with('success', 'Pesan berhasil dihapus.');
    }
}