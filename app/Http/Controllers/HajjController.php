<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'name'             => 'required|string|max:255|unique:packages,name',
            'description'      => 'required|string|max:5000',
            'image'            => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price'            => 'required|numeric|min:0',
            'quota'            => 'required|integer|min:1',
            'departure_date'   => 'required|date_format:Y-m-d\TH:i',
            'return_date'      => 'required|date|after_or_equal:departure_date',
            'facilities'       => 'required|string|max:5000',
        ], [
            'name.required'         => 'Nama paket wajib diisi.',
            'name.max'              => 'Nama paket tidak boleh lebih dari 255 karakter.',
            'name.unique'           => 'Nama paket sudah digunakan.',
            'description.required'  => 'Deskripsi paket wajib diisi.',
            'description.max'       => 'Deskripsi paket tidak boleh lebih dari 5000 karakter.',
            'image.required'        => 'Gambar paket wajib diisi.',
            'image.image'           => 'File yang diunggah bukan gambar.',
            'image.mimes'           => 'Format gambar harus JPEG, PNG, JPG, atau GIF.',
            'image.max'             => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'price.required'           => 'Harga wajib diisi.',
            'quota.required'           => 'Kuota wajib diisi.',
            'departure_date.required'  => 'Tanggal keberangkatan wajib diisi.',
            'return_date.required'     => 'Tanggal kepulangan wajib diisi.',
            'return_date.after_or_equal' => 'Tanggal kepulangan tidak boleh sebelum tanggal keberangkatan.',
            'facilities.required'      => 'Fasilitas wajib diisi.',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(30) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('images/packages', $imageName, 'public');
            $validated['image'] = '/storage/' . $path; // hasil: /storage/images/packages/namafile.jpg
        }

        Package::create([
            'name'            => $validated['name'],
            'description'     => $validated['description'],
            'image'           => $validated['image'],
            'type'            => 'Haji',
            'price'           => $validated['price'],
            'quota'           => $validated['quota'],
            'departure_date'  => $validated['departure_date'],
            'return_date'     => $validated['return_date'],
            'facilities'      => $validated['facilities'],
        ]);

        return redirect()->route('hajj-dashboard')->with('success', 'Paket Haji berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $data = [
            'title' => 'Detail Hajj',
            'package' => Package::findOrFail($id),
        ];

        return view('pages.admin.hajj.show', ['data' => $data]);
    }

    public function edit(string $id)
    {
        $data = [
            'title' => 'Edit Paket Haji',
            'package' => Package::findOrFail($id),
        ];

        return view('pages.admin.hajj.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $validated = $request->validate([
            'name'             => 'required|string|max:255|unique:packages,name,' . $id,
            'description'      => 'required|string|max:5000',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price'            => 'required|numeric|min:0',
            'quota'            => 'required|integer|min:1',
            'departure_date'   => 'required|date_format:Y-m-d\TH:i',
            'return_date'      => 'required|date|after_or_equal:departure_date',
            'facilities'       => 'required|string|max:5000',
        ]);

        // Jika gambar baru diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($package->image) {
                $oldImagePath = str_replace('/storage/', '', $package->image); // contoh: images/packages/nama.jpg
                if (Storage::disk('public')->exists($oldImagePath)) {
                    Storage::disk('public')->delete($oldImagePath);
                }
            }

            // Upload gambar baru
            $image = $request->file('image');
            $imageName = Str::random(30) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('images/packages', $imageName, 'public');
            $validated['image'] = '/storage/' . $path;
        } else {
            $validated['image'] = $package->image;
        }

        $package->update([
            'name'            => $validated['name'],
            'description'     => $validated['description'],
            'image'           => $validated['image'],
            'price'           => $validated['price'],
            'quota'           => $validated['quota'],
            'departure_date'  => $validated['departure_date'],
            'return_date'     => $validated['return_date'],
            'facilities'      => $validated['facilities'],
        ]);

        return redirect()->route('hajj-dashboard')->with('success', 'Paket Haji berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $package = Package::findOrFail($id);

        if ($package->image) {
            $imagePath = str_replace('/storage/', '', $package->image);
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
        }

        $package->delete();

        return redirect()->route('hajj-dashboard')->with('success', 'Paket Haji berhasil dihapus.');
    }

}