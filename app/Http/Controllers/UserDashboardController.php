<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Enrollment;
use App\Models\Appointment;

class UserDashboardController extends Controller
{
    /**
     * Show the application's login form.
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     */
    public function login(Request $request)
    {
        $request->validate([
            'whatsapp_number' => ['required'],
            'password' => ['required'],
        ]);

        // Standardize the WhatsApp Number
        $wa_number = preg_replace('/[^0-9]/', '', $request->whatsapp_number);
        if (strlen($wa_number) == 11 && strpos($wa_number, '01') === 0) {
            $wa_number = '88' . $wa_number;
        }

        $credentials = [
            'whatsapp_number' => $wa_number,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'whatsapp_number' => 'আপনার প্রদানকৃত তথ্য মিলছে না। (Credentials do not match)',
        ])->onlyInput('whatsapp_number');
    }
    /**
     * Display the Client Dashboard.
     */
    public function index()
    {
        $user = Auth::user();

        // Fetch user's own enrollments and appointments
        $enrollments = Enrollment::where('user_id', $user->id)->latest()->get();
        $appointments = Appointment::where('user_id', $user->id)->latest()->get();

        return view('dashboard', compact('user', 'enrollments', 'appointments'));
    }

    /**
     * Display the settings page for the user.
     */
    public function settings()
    {
        return view('user.settings');
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:4'],
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'পাসওয়ার্ড সফলভাবে পরিবর্তন করা হয়েছে। (Password updated successfully)');
    }

    /**
     * Show the standalone registration form.
     */
    public function showRegisterForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }

    /**
     * Handle a new user registration (standalone, without enrollment).
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|email|max:255|unique:users,email',
            'whatsapp_number' => 'required|string|max:20',
            'password'        => 'required|string|min:4|confirmed',
        ]);

        // Standardize WhatsApp Number
        $wa_number = preg_replace('/[^0-9]/', '', $request->whatsapp_number);
        if (strlen($wa_number) == 11 && strpos($wa_number, '01') === 0) {
            $wa_number = '88' . $wa_number;
        }

        // Block duplicate WhatsApp number
        if (\App\Models\User::where('whatsapp_number', $wa_number)->exists()) {
            return back()->withInput()->withErrors([
                'whatsapp_number' => 'এই হোয়াটসঅ্যাপ নম্বরটি ইতিমধ্যে নিবন্ধিত। (Number already registered)',
            ]);
        }

        $user = \App\Models\User::create([
            'name'            => $request->name,
            'email'           => $request->email,
            'whatsapp_number' => $wa_number,
            'password'        => Hash::make($request->password),
            'role'            => 'client',
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'স্বাগতম! আপনার অ্যাকাউন্ট সফলভাবে তৈরি হয়েছে।');
    }
}
