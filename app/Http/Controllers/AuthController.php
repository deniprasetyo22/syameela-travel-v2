<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{
    // Login
    public function login()
    {
        $title = 'Login';
        return view('pages.auth.login', ['title' => $title]);
    }

    public function attemptLogin(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if (is_null($user->email_verified_at)) {
                // Auth::logout();
                return redirect()->route('verification.notice')
                    ->with('message', 'Silakan verifikasi email Anda terlebih dahulu.');
            }

            $roles = $user->role->name;

            // Redirect berdasarkan role
            if ($roles === 'Admin') {
                return redirect()->route('admin-dashboard');
            } elseif ($roles === 'User') {
                return redirect()->route('user-dashboard');
            } else {
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'email' => 'Role tidak dikenali.',
                ]);
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Register
    public function register()
    {
        $title = 'Register';
        return view('pages.auth.register', ['title' => $title]);
    }

    public function attemptRegister(Request $request)
    {
        $request->validate([
            'full_name'=> 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Gunakan transaction untuk memastikan integritas data
        $user = DB::transaction(function () use ($request) {
            // Dapatkan role 'User'
            $userRole = Role::where('name', 'User')->firstOrFail();

            // 1. Buat User
            $user = User::create([
                'full_name' => $request->full_name,
                'username'  => $request->username,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
                'role_id'   => $userRole->id,
            ]);

            // 2. Buat UserProfile yang terhubung
            UserProfile::create([
                'user_id' => $user->id,
            ]);

            return $user;
        });

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('verification.notice')
            ->with('status', 'Pendaftaran berhasil. Silakan cek email untuk verifikasi.');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // Verifikasi Email
    public function noticeVerifyEmail()
    {
        return view('pages.auth.verify-email', ['title' => 'Verifikasi Email']);
    }

    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/login')->with('status', 'Email berhasil diverifikasi.');
    }

    public function resendVerification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Link verifikasi telah dikirim ulang.');
    }

    // Lupa Password
    public function forgotPasswordForm()
    {
        return view('pages.auth.forgot-password', ['title' => 'Lupa Password']);
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetPasswordForm(string $token)
    {
        return view('auth.reset-password', [
            'title' => 'Reset Password',
            'token' => $token,
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password'       => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect('/login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}