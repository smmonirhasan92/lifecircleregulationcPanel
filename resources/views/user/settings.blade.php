@extends('layouts.app')

@php
    $title = 'Account Settings | Dashboard';
@endphp

@section('content')
<main class="min-h-screen pt-32 pb-20 px-6">
    <div class="max-w-xl mx-auto">
        <header class="flex items-center gap-4 mb-10 text-primary">
            <a href="{{ route('dashboard') }}" class="w-10 h-10 rounded-full bg-white flex items-center justify-center hover:bg-surface-container transition shadow-sm border border-outline-variant/10">
                <span class="material-symbols-outlined text-sm">arrow_back</span>
            </a>
            <div>
                <h2 class="text-3xl font-black -tracking-tight">Account Settings</h2>
                <p class="text-on-surface-variant font-bold text-xs uppercase tracking-widest mt-1">Security & Privacy</p>
            </div>
        </header>

        @if (session('success'))
            <div class="mb-6 bg-emerald-100 text-emerald-800 p-4 rounded-lg flex items-center gap-2 animate-fade-in-up shadow-sm">
                <span class="material-symbols-outlined">check_circle</span>
                <span class="font-bold text-sm">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-3xl p-10 whisper-shadow border border-outline-variant/10">
            <div class="mb-10">
                <h3 class="text-xl font-black text-primary mb-2">Change Password</h3>
                <p class="text-xs text-outline leading-loose">অ্যাকাউন্ট সুরক্ষিত রাখতে নিয়মিত পাসওয়ার্ড পরিবর্তন করুন।</p>
            </div>

            <form action="{{ route('user.password.update') }}" method="POST" class="space-y-6">
                @csrf
                <div class="space-y-4">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-outline ml-1">Current Password</label>
                        <input name="current_password" type="password" class="bg-surface-container border-none rounded-xl px-4 py-3.5 focus:ring-2 focus:ring-primary transition-all @error('current_password') ring-2 ring-red-500 @enderror" required>
                        @error('current_password') <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-outline ml-1">New Password</label>
                        <input name="password" type="password" class="bg-surface-container border-none rounded-xl px-4 py-3.5 focus:ring-2 focus:ring-primary transition-all @error('password') ring-2 ring-red-500 @enderror" required>
                        @error('password') <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-outline ml-1">Confirm New Password</label>
                        <input name="password_confirmation" type="password" class="bg-surface-container border-none rounded-xl px-4 py-3.5 focus:ring-2 focus:ring-primary transition-all" required>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-primary text-white py-4 rounded-xl font-black text-sm hover:brightness-110 transition shadow-lg shadow-primary/20">
                        Update Password
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-8 text-center">
            <p class="text-[10px] text-outline font-bold uppercase tracking-widest">Logged in as: <span class="text-primary">{{ Auth::user()->email }}</span></p>
        </div>
    </div>
</main>
@endsection
