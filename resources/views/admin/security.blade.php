@extends('layouts.app')

@php
    $title = 'Security Settings | Admin Portal';
@endphp

@section('content')
<div class="flex min-h-screen bg-surface-container-low/20 pt-20">
    <!-- Premium Sidebar (Standardized) -->
    <nav class="w-72 bg-white border-r border-outline-variant/10 flex flex-col py-10 fixed h-full shadow-[20px_0_40px_rgba(0,0,0,0.02)]">
        <div class="px-8 mb-12 flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-on-surface flex items-center justify-center text-white shadow-lg shadow-on-surface/20">
                <span class="material-symbols-outlined text-xl">security</span>
            </div>
            <div>
                <h1 class="text-sm font-black text-on-surface uppercase tracking-tighter leading-none">Admin Portal</h1>
                <p class="text-[10px] text-outline font-bold uppercase tracking-widest mt-1">Management v2.0</p>
            </div>
        </div>

        <div class="flex-1 space-y-1 px-4 overflow-y-auto custom-scrollbar">
            <div class="px-4 py-2 text-[10px] font-black text-outline-variant uppercase tracking-widest">Active Operations</div>
            <a class="flex items-center gap-3 text-outline hover:bg-surface-container-low px-5 py-4 rounded-2xl transition-all font-bold" href="{{ route('admin.list') }}">
                <span class="material-symbols-outlined text-xl">group</span>
                <span>Enrollments</span>
            </a>
            <a class="flex items-center gap-3 text-outline hover:bg-surface-container-low px-5 py-4 rounded-2xl transition-all font-bold" href="{{ route('admin.appointments') }}">
                <span class="material-symbols-outlined text-xl">calendar_month</span>
                <span>Appointments</span>
            </a>

            <div class="pt-8 px-4 py-2 text-[10px] font-black text-outline-variant uppercase tracking-widest">System Control</div>
            <a class="flex items-center gap-3 bg-on-surface text-white rounded-2xl px-5 py-4 border-l-4 border-white font-black shadow-sm transition-all" href="{{ route('admin.security') }}">
                <span class="material-symbols-outlined text-xl">security</span>
                <span>Portal Security</span>
            </a>

            <div class="pt-8 px-4 py-2 text-[10px] font-black text-outline-variant uppercase tracking-widest">Deployment & System</div>
            <a class="flex items-center gap-3 text-amber-600 hover:bg-amber-50 px-5 py-4 rounded-2xl transition-all font-bold" href="{{ route('admin.clear-cache') }}">
                <span class="material-symbols-outlined text-xl">cleaning_services</span>
                <span>Clear Visual Cache</span>
            </a>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="ml-72 flex-1 p-12 overflow-x-hidden">
        <header class="mb-16 animate-fade-in">
            <h2 class="text-4xl font-black text-on-surface tracking-tighter">সিকিউরিটি সেটিংস <span class="text-outline">Access</span></h2>
            <div class="flex items-center gap-2 mt-2">
                <span class="material-symbols-outlined text-outline text-sm">enhanced_encryption</span>
                <p class="text-xs text-outline font-bold uppercase tracking-widest leading-none">Last Security Audit: Secure</p>
            </div>
        </header>

        <div class="max-w-2xl">
            @if (session('success'))
                <div class="mb-10 bg-emerald-50 text-emerald-800 p-5 rounded-[2rem] border border-emerald-100 flex items-center gap-4 animate-fade-in-up">
                    <div class="w-10 h-10 rounded-xl bg-emerald-500 text-white flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined">verified</span>
                    </div>
                    <span class="font-bold text-sm">{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('admin.security.update') }}" method="POST" class="bg-white rounded-[3rem] p-12 whisper-shadow border border-outline-variant/10 space-y-10 relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-40 h-40 bg-surface-container-low rounded-full -mr-20 -mt-20 blur-3xl group-hover:scale-125 transition-transform duration-700"></div>
                
                @csrf
                <div class="space-y-10 relative z-10">
                    <div class="relative group/field">
                        <label class="text-[10px] font-black text-outline-variant uppercase tracking-widest absolute -top-2.5 left-6 bg-white px-2 z-10 transition-all group-focus-within/field:text-primary">Current Password</label>
                        <input name="current_password" type="password" class="w-full bg-white border-2 border-surface-container-high rounded-2xl px-8 py-5 focus:ring-0 focus:border-primary transition-all font-black @error('current_password') !border-red-400 @enderror" required>
                        @error('current_password') <p class="text-red-500 text-[10px] mt-2 ml-4 font-black uppercase">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="relative group/field">
                            <label class="text-[10px] font-black text-outline-variant uppercase tracking-widest absolute -top-2.5 left-6 bg-white px-2 z-10 transition-all group-focus-within/field:text-primary">New Password</label>
                            <input name="password" type="password" class="w-full bg-white border-2 border-surface-container-high rounded-2xl px-8 py-5 focus:ring-0 focus:border-primary transition-all font-black @error('password') !border-red-400 @enderror" required>
                            @error('password') <p class="text-red-500 text-[10px] mt-2 ml-4 font-black uppercase">{{ $message }}</p> @enderror
                        </div>

                        <div class="relative group/field">
                            <label class="text-[10px] font-black text-outline-variant uppercase tracking-widest absolute -top-2.5 left-6 bg-white px-2 z-10 transition-all group-focus-within/field:text-primary">Confirm New</label>
                            <input name="password_confirmation" type="password" class="w-full bg-white border-2 border-surface-container-high rounded-2xl px-8 py-5 focus:ring-0 focus:border-primary transition-all font-black" required>
                        </div>
                    </div>
                </div>

                <div class="pt-6 relative z-10">
                    <button type="submit" class="w-full bg-on-surface text-white py-5 rounded-[2rem] font-black text-xl shadow-xl shadow-on-surface/10 hover:brightness-125 transition-all duration-300 flex items-center justify-center gap-4 group">
                        <span class="font-bengali">নতুন পাসওয়ার্ড সেভ করুন</span>
                        <span class="material-symbols-outlined transition-transform group-hover:rotate-12">key</span>
                    </button>
                    
                    <div class="mt-8 flex items-center justify-center gap-4 text-outline opacity-40">
                        <div class="h-[1px] flex-grow bg-outline-variant"></div>
                        <span class="text-[10px] font-black uppercase tracking-widest">End-to-End Encrypted</span>
                        <div class="h-[1px] flex-grow bg-outline-variant"></div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection

@push('styles')
<style>
    #topNav { display: none; }
</style>
@endpush
