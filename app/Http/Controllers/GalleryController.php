<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category', '');

        $query = Gallery::query();

        if (!empty($category)) {
            $query->where('type', $category);
        }

        $galleries = $query->latest()->paginate(9)->withQueryString();

        $data = [
            'title' => 'Gallery',
            'category' => $category,
            'galleries' => $galleries,
        ];

        return view('pages.guest.gallery', ['data' => $data]);
    }

    public function dashboard(Request $request)
    {
        $search = $request->get('search');

        $galleries = $search ? Gallery::search($search)->paginate(5) : Gallery::latest()->paginate(5);

        $data = [
            'title' => 'Gallery',
            'galleries' => $galleries
        ];

        return view('pages.admin.gallery.index', ['data' => $data]);
    }

    public function create()
    {
        $data = [
            'title' => 'Gallery',
        ];

        return view('pages.admin.gallery.create', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ], [
            'title.required' => 'Judul wajib diisi.',
            'title.string' => 'Judul harus berupa teks.',
            'title.max' => 'Judul tidak boleh lebih dari 255 karakter.',
            'type.required' => 'Tipe wajib diisi.',
            'type.string' => 'Tipe harus berupa teks.',
            'type.max' => 'Tipe tidak boleh lebih dari 255 karakter.',
            'image.required' => 'Gambar wajib diisi.',
            'image.image' => 'File yang diunggah bukan gambar.',
            'image.mimes' => 'Format gambar harus JPEG, PNG, JPG, atau GIF.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 5MB.',
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(30) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('images/galleries', $imageName, 'public');
            $validated['image'] = '/storage/' . $path;
        }

        Gallery::create([
            'title' => $request->title,
            'type' => $request->type,
            'image' => $validated['image'],
        ]);

        return redirect()->route('gallery-dashboard')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $data = [
            'title' => 'Detail Gallery',
            'gallery' => Gallery::find($id),
        ];

        return view('pages.admin.gallery.show', ['data' => $data]);
    }

    public function edit(string $id)
    {
        $data = [
            'title' => 'Edit Gallery',
            'gallery' => Gallery::find($id),
        ];

        return view('pages.admin.gallery.edit', ['data' => $data]);
    }

    public function update(Request $request, string $id)
    {
        $gallery = Gallery::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ], [
            'title.required' => 'Judul wajib diisi.',
            'type.required' => 'Tipe wajib diisi.',
            'image.image' => 'File yang diunggah bukan gambar.',
            'image.mimes' => 'Format gambar harus JPEG, PNG, JPG, atau GIF.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 5MB.',
        ]);

        // Jika gambar baru diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($gallery->image) {
                $oldImagePath = str_replace('/storage/', '', $gallery->image);
                if (Storage::disk('public')->exists($oldImagePath)) {
                    Storage::disk('public')->delete($oldImagePath);
                }
            }

            // Upload gambar baru
            $image = $request->file('image');
            $imageName = Str::random(30) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('images/galleries', $imageName, 'public');
            $validated['image'] = '/storage/' . $path;
        } else {
            $validated['image'] = $gallery->image;
        }

        $gallery->update([
            'title' => $validated['title'],
            'type' => $validated['type'],
            'image' => $validated['image'],
        ]);

        return redirect()->route('gallery-dashboard')->with('success', 'Data berhasil diperbarui.');
    }


    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->image) {
            $imagePath = str_replace('/storage/', '', $gallery->image);
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
        }

        $gallery->delete();

        return redirect()->route('gallery-dashboard')->with('success', 'Data berhasil dihapus.');
    }

}