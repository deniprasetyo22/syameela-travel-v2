<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::with('profile')->find(auth()->id());

        $data = [
            'title' => 'Profile',
            'user' => $user
        ];

        return view('pages.user.profile.personal-informations', ['data' => $data]);
    }

    public function editPersonalInformations()
    {
        $user = User::with('profile')->find(auth()->id());

        $data = [
            'title' => 'Edit Profile Personal Informations',
            'user' => $user
        ];

        return view('pages.user.profile.edit-personal-informations', ['data' => $data]);
    }

    public function updatePersonalInformations(Request $request)
    {
        $user = User::with('profile')->findOrFail(auth()->id());
        $profile = $user->profile;
        $profileId = $profile->id ?? null;

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'gender' => 'nullable|in:Laki-laki,Perempuan',
            'national_id' => 'nullable|digits:16|unique:user_profiles,national_id,' . $profileId,
            'family_card_number' => 'nullable|digits:16|unique:user_profiles,family_card_number,' . $profileId,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'profile_picture' => 'nullable|image|max:2048',
        ], [
            'username.unique' => 'Username sudah digunakan oleh orang lain.',
            'email.unique' => 'Email sudah digunakan oleh orang lain.',
            'national_id.unique' => 'Nomor KTP sudah digunakan oleh orang lain.',
            'national_id.digits' => 'Nomor KTP harus terdiri dari 16 angka.',
            'family_card_number.unique' => 'Nomor Kartu Keluarga sudah digunakan oleh orang lain.',
            'family_card_number.digits' => 'Nomor Kartu Keluarga harus terdiri dari 16 angka.',
            'profile_picture.image' => 'Format file harus gambar.',
            'profile_picture.max' => 'Ukuran file maksimal 2MB.',
        ]);

        // Update user
        $user->update([
            'full_name' => $validated['full_name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
        ]);

        // Update profile jika tersedia
        if ($profile) {
            $profile->gender = $validated['gender'] ?? $profile->gender;
            $profile->national_id = $validated['national_id'] ?? $profile->national_id;
            $profile->family_card_number = $validated['family_card_number'] ?? $profile->family_card_number;
            $profile->phone = $validated['phone'] ?? $profile->phone;
            $profile->address = $validated['address'] ?? $profile->address;

            // Upload dan replace foto profil jika ada file baru
            if ($request->hasFile('profile_picture')) {
                // Hapus gambar lama
                if ($profile->profile_picture) {
                    $oldPath = str_replace('/storage/', '', $profile->profile_picture);
                    if (Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->delete($oldPath);
                    }
                }

                // Simpan gambar baru
                $image = $request->file('profile_picture');
                $imageName = Str::random(30) . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('images/profiles', $imageName, 'public');
                $profile->profile_picture = '/storage/' . $path;
            }

            $profile->save();
        }

        return redirect()->route('profile')->with('success', 'Informasi pribadi berhasil diperbarui.');
    }

    public function documents()
    {
        $user = User::with('documents')->find(auth()->id());

        $data = [
            'title' => 'Profile Documents',
            'user' => $user
        ];

        return view('pages.user.profile.documents', ['data' => $data]);
    }

    public function editDocuments()
    {
        $user = User::with('documents')->find(auth()->id());

        $data = [
            'title' => 'Edit Dokumen',
            'user' => $user
        ];

        return view('pages.user.profile.edit-documents', ['data' => $data]);
    }

    public function updateDocuments(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'id_card' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'family_card' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'passport' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'marriage_book' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'vaccine_certificate' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'id_card.image' => 'File KTP harus berupa gambar.',
            'id_card.mimes' => 'Format gambar KTP harus JPG, JPEG, atau PNG.',
            'id_card.max' => 'Ukuran gambar KTP tidak boleh lebih dari 2MB.',
            // 'id_card.uploaded' => 'Gagal mengunggah KTP. Silakan coba lagi.',

            'family_card.image' => 'File KK harus berupa gambar.',
            'family_card.mimes' => 'Format gambar KK harus JPG, JPEG, atau PNG.',
            'family_card.max' => 'Ukuran gambar KK tidak boleh lebih dari 2MB.',
            // 'family_card.uploaded' => 'Gagal mengunggah KK. Silakan coba lagi.',

            'passport.image' => 'File Paspor harus berupa gambar.',
            'passport.mimes' => 'Format gambar Paspor harus JPG, JPEG, atau PNG.',
            'passport.max' => 'Ukuran gambar Paspor tidak boleh lebih dari 2MB.',
            // 'passport.uploaded' => 'Gagal mengunggah Paspor. Silakan coba lagi.',

            'photo.image' => 'File Foto harus berupa gambar.',
            'photo.mimes' => 'Format gambar Foto harus JPG, JPEG, atau PNG.',
            'photo.max' => 'Ukuran gambar Foto tidak boleh lebih dari 2MB.',
            // 'photo.uploaded' => 'Gagal mengunggah Foto. Silakan coba lagi.',

            'marriage_book.image' => 'File Buku Nikah harus berupa gambar.',
            'marriage_book.mimes' => 'Format gambar Buku Nikah harus JPG, JPEG, atau PNG.',
            'marriage_book.max' => 'Ukuran gambar Buku Nikah tidak boleh lebih dari 2MB.',
            // 'marriage_book.uploaded' => 'Gagal mengunggah Buku Nikah. Silakan coba lagi.',

            'vaccine_certificate.image' => 'File Sertifikat Vaksin harus berupa gambar.',
            'vaccine_certificate.mimes' => 'Format gambar Sertifikat Vaksin harus JPG, JPEG, atau PNG.',
            'vaccine_certificate.max' => 'Ukuran gambar Sertifikat Vaksin tidak boleh lebih dari 2MB.',
            // 'vaccine_certificate.uploaded' => 'Gagal mengunggah Sertifikat Vaksin. Silakan coba lagi.',
        ]);

        $documents = $user->documents;

        // Hapus file lama jika akan diganti
        if ($documents) {
            $fields = ['id_card', 'family_card', 'passport', 'photo', 'marriage_bok', 'vaccine_certificate'];
            foreach ($fields as $field) {
                if ($request->hasFile($field)) {
                    $oldPath = str_replace('/storage/', '', $documents->$field);
                    if (Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->delete($oldPath);
                    }
                }
            }
        }

        $data = [];
        foreach ($validated as $key => $file) {
            if ($file) {
                $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs("images/documents/{$user->id}", $filename, 'public');
                $data[$key] = '/storage/' . $path;
            }
        }

        if ($documents) {
            $documents->update($data);
        } else {
            $user->documents()->create($data);
        }

        return redirect()->route('profile-documents')->with('success', 'Dokumen berhasil diperbarui.');
    }

    public function destroyDocument($field)
    {
        $allowedFields = ['id_card', 'family_card', 'passport', 'photo', 'marriage_book', 'vaccine_certificate'];

        if (!in_array($field, $allowedFields)) {
            abort(404);
        }

        $user = auth()->user();
        $document = $user->documents;

        if (!$document || !$document->$field) {
            return back()->with('success', 'Tidak ada file yang dihapus.');
        }

        $path = str_replace('/storage/', '', $document->$field);

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        $document->$field = null;
        $document->save();

        return back()->with('success', 'File berhasil dihapus.');
    }

    public function security()
    {
        $user = User::find(auth()->id());

        $data = [
            'title' => 'Profile Security',
            'user' => $user
        ];

        return view('pages.user.profile.security', ['data' => $data]);
    }

    public function editSecurity()
    {
        $user = User::find(auth()->id());

        $data = [
            'title' => 'Edit Profile Security',
            'user' => $user
        ];

        return view('pages.user.profile.edit-security', ['data' => $data]);
    }

    public function updateSecurity(Request $request)
    {
        $request->validate([
            'new_password' => ['required', 'confirmed', Password::min(8)],
        ], [
            'new_password.required' => 'Kata sandi baru wajib diisi.',
            'new_password.confirmed' => 'Konfirmasi kata sandi baru tidak cocok.',
            'new_password.min' => 'Kata sandi baru minimal 8 karakter.',
        ]);

        $user = auth()->user();

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile-security')->with('success', 'Kata sandi berhasil diperbarui.');
    }
}