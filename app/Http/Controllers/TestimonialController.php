<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(9);
        $data = [
            'title' => 'Testimonials',
            'testimonials' => $testimonials
        ];
        return view('pages.guest.testimonials', ['data' => $data]);
    }

    public function dashboard(Request $request)
    {
        $search = $request->query('search');
        $testimonials = Testimonial::search($search)->latest()->paginate(10);

        $data = [
            'title' => 'Testimonials',
            'testimonials' => $testimonials
        ];

        return view('pages.admin.testimonial.index', ['data' => $data]);
    }

    public function create()
    {
        $data = [
            'title' => 'Create Testimonial'
        ];
        return view('pages.admin.testimonial.create', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'content' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'content.required' => 'Pesan wajib diisi.',
        ]);

        Testimonial::create($validated);

        return redirect()->route('testimonial-dashboard')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $testimonial = Testimonial::find($id);
        $data = [
            'title' => 'Detail Testimonial',
            'testimonial' => $testimonial
        ];
        return view('pages.admin.testimonial.show', ['data' => $data]);
    }

    public function edit(string $id)
    {
        $testimonial = Testimonial::find($id);
        $data = [
            'title' => 'Edit Testimonial',
            'testimonial' => $testimonial
        ];
        return view('pages.admin.testimonial.edit', ['data' => $data]);
    }

    public function update(Request $request, string $id)
    {
        $testimonial = Testimonial::find($id);

        $validated = $request->validate([
            'name' => 'required',
            'content' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'content.required' => 'Pesan wajib diisi.',
        ]);

        $testimonial->update($validated);

        return redirect()->route('testimonial-dashboard')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        Testimonial::find($id)->delete();
        return redirect()->route('testimonial-dashboard')->with('success', 'Testimoni berhasil dihapus.');
    }
}