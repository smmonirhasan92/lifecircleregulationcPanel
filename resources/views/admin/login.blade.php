@extends('layouts.app')

@php
    $title = 'Admin Login | Life Circle';
@endphp

@section('content')
<main class="flex-grow pt-32 pb-20 px-6 bg-surface min-h-screen flex items-center justify-center">
    <div class="bg-white p-10 rounded-2xl shadow-xl w-full max-w-md animate-fade-in-up border border-outline-variant/10">
        <div class="text-center mb-8">
            <div class="w-16 h-16 rounded-full bg-primary-container flex items-center justify-center mx-auto mb-4 text-primary">
                <span class="material-symbols-outlined text-3xl">admin_panel_settings</span>
            </div>
            <h1 class="text-3xl font-extrabold text-primary mb-2">Admin Portal</h1>
            <p class="text-outline text-sm">Secure login to manage enrollments.</p>
        </div>
        
        <form method="POST" action="{{ route('admin.authenticate') }}" class="space-y-6">
            @csrf
            <div>
                <label class="text-xs font-bold uppercase tracking-widest text-outline ml-1">Password</label>
                <input type="password" name="password" class="w-full bg-surface-container-high border-none rounded-sm px-4 py-3 focus:ring-0 focus:bg-white focus:border-b-2 focus:border-primary transition-all @error('password') border-red-500 @enderror" placeholder="Enter password" required autofocus>
                @error('password')
                    <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center gap-2">
                <input type="checkbox" name="remember" id="remember" class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary/20 cursor-pointer">
                <label for="remember" class="text-sm cursor-pointer text-on-surface-variant">Remember me</label>
            </div>
            <button type="submit" class="w-full bg-primary text-on-primary py-3 rounded-full text-lg font-bold shadow-lg shadow-primary/20 hover:-translate-y-1 focus:outline-none transition-all duration-300">
                Secure Login
            </button>
        </form>
    </div>
</main>
@endsection
