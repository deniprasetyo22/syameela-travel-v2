<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $users = $search ? User::search($search)->latest()->paginate(10) : User::latest()->paginate(10);

        $data = [
            'title' => 'User',
            'users' => $users,
        ];

        return view('pages.admin.user.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Create User',
            'roles' => Role::all(),
        ];

        return view('pages.admin.user.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'role_id' => 'required|exists:roles,id',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'full_name.required' => 'Nama lengkap wajib diisi.',
            'full_name.string' => 'Nama lengkap harus berupa teks.',
            'full_name.max' => 'Nama lengkap maksimal 255 karakter.',

            'username.required' => 'Username wajib diisi.',
            'username.string' => 'Username harus berupa teks.',
            'username.max' => 'Username maksimal 255 karakter.',
            'username.unique' => 'Username sudah digunakan.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email maksimal 255 karakter.',
            'email.unique' => 'Email sudah digunakan.',

            'role_id.required' => 'Peran wajib dipilih.',
            'role_id.exists' => 'Peran yang dipilih tidak valid.',

            'password.required' => 'Password wajib diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::create([
            'full_name' => $validated['full_name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'email_verified_at' => now(),
            'role_id' => $validated['role_id'],
            'password' => Hash::make($validated['password']),
        ]);

        UserProfile::create([
            'user_id' => $user->id
        ]);

        return redirect()->route('users-dashboard')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'title' => 'Detail User',
            'user' => User::findOrFail($id),
        ];

        return view('pages.admin.user.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'title' => 'Edit User',
            'user' => User::findOrFail($id),
            'roles' => Role::all(),
        ];

        return view('pages.admin.user.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'role_id' => 'required|exists:roles,id',
            'password' => 'nullable|string|min:8|confirmed',
        ], [
            'full_name.required' => 'Nama lengkap wajib diisi.',
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email sudah digunakan.',
            'role_id.required' => 'Peran wajib dipilih.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user->update([
            'full_name' => $validated['full_name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'role_id' => $validated['role_id'],
            'password' => $validated['password']
                ? Hash::make($validated['password'])
                : $user->password, // tetap gunakan password lama jika tidak diganti
        ]);

        return redirect()->route('users-dashboard')->with('success', 'Pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // Hapus dokumen jika ada
        if ($user->documents) {
            $documents = $user->documents;

            $fields = [
                'id_card',
                'family_card',
                'passport',
                'photo',
                'marriage_book',
                'vaccine_certificate',
            ];

            foreach ($fields as $field) {
                $path = $documents->$field;

                if ($path) {
                    $storagePath = str_replace('/storage/', '', $path);

                    if (Storage::disk('public')->exists($storagePath)) {
                        Storage::disk('public')->delete($storagePath);
                    }
                }
            }

            // Hapus folder documents/{user_id} sekaligus (jika masih ada sisa file)
            Storage::disk('public')->deleteDirectory("images/documents/{$user->id}");

            $documents->delete();
        }

        // Hapus foto profil jika ada
        if ($user->profile && $user->profile->profile_picture) {
            $oldPath = str_replace('/storage/', '', $user->profile->profile_picture);
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        // Hapus profil
        if ($user->profile) {
            $user->profile->delete();
        }

        // Hapus user
        $user->delete();

        return redirect()->route('users-dashboard')->with('success', 'Pengguna beserta semua dokumen berhasil dihapus.');
    }

}