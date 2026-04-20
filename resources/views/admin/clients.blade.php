@extends('layouts.app')

@php
    $title = 'Clients Directory | Admin Panel';
@endphp

@section('content')
<div class="flex min-h-screen bg-surface-container-low/20 pt-20">
    <!-- Premium Sidebar (Standardized) -->
    <nav class="w-72 bg-white border-r border-outline-variant/10 flex flex-col py-10 fixed h-full shadow-[20px_0_40px_rgba(0,0,0,0.02)]">
        <div class="px-8 mb-12 flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-blue-600 flex items-center justify-center text-white shadow-lg shadow-blue-500/20">
                <span class="material-symbols-outlined text-xl">contacts</span>
            </div>
            <div>
                <h1 class="text-sm font-black text-blue-600 uppercase tracking-tighter leading-none">Admin Portal</h1>
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

            <div class="pt-8 px-4 py-2 text-[10px] font-black text-outline-variant uppercase tracking-widest">Deployment & System</div>
            <a class="flex items-center gap-3 text-amber-600 hover:bg-amber-50 px-5 py-4 rounded-2xl transition-all font-bold" href="{{ route('admin.clear-cache') }}">
                <span class="material-symbols-outlined text-xl">cleaning_services</span>
                <span>Clear Visual Cache</span>
            </a>
            <a class="flex items-center gap-3 text-amber-600 hover:bg-amber-50 px-5 py-4 rounded-2xl transition-all font-bold" href="{{ route('admin.clear-cache') }}">
                <span class="material-symbols-outlined text-xl">cleaning_services</span>
                <span>Clear Visual Cache</span>
            </a>
            <a class="flex items-center gap-3 text-outline hover:bg-surface-container-low px-5 py-4 rounded-2xl transition-all font-bold group" href="{{ route('admin.security') }}">
                <span class="material-symbols-outlined text-xl group-hover:scale-110 transition-transform">security</span>
                <span>Access Security</span>
            </a>

            <div class="pt-8 px-4 py-2 text-[10px] font-black text-outline-variant uppercase tracking-widest">Master Data</div>
            <a class="flex items-center gap-3 bg-blue-50 text-blue-600 rounded-2xl px-5 py-4 border-l-4 border-blue-600 font-black shadow-sm transition-all" href="{{ route('admin.clients') }}">
                <span class="material-symbols-outlined text-xl">contacts</span>
                <span>Clients Directory</span>
            </a>
            <a class="flex items-center gap-3 text-outline hover:bg-surface-container-low px-5 py-4 rounded-2xl transition-all font-bold" href="{{ route('admin.reports') }}">
                <span class="material-symbols-outlined text-xl">analytics</span>
                <span>Financial Analysis</span>
            </a>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="ml-72 flex-1 p-12 overflow-x-hidden">
        <header class="flex justify-between items-center mb-16 animate-fade-in">
            <div>
                <h2 class="text-4xl font-black text-blue-600 tracking-tighter">ক্লায়েন্ট ডিরেক্টরি <span class="text-on-surface">Clients</span></h2>
                <div class="flex items-center gap-2 mt-2">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                    </span>
                    <p class="text-xs text-outline font-bold uppercase tracking-widest">Master Database: {{ count($clients) }} Active Clients</p>
                </div>
            </div>
            <div class="flex gap-4">
                <input type="text" placeholder="Search clients by phone..." class="bg-white border-2 border-outline-variant/10 rounded-2xl px-6 py-3 text-xs font-bold focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all w-72 shadow-sm">
            </div>
        </header>

        <!-- Clients Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @foreach($clients as $client)
            <div class="bg-white rounded-[2.5rem] p-10 whisper-shadow border border-outline-variant/5 hover:-translate-y-2 transition-all duration-300 relative group overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-full -mr-16 -mt-16 blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                
                <div class="relative z-10 flex flex-col md:flex-row gap-8">
                    <div class="w-20 h-20 rounded-3xl bg-blue-600/10 text-blue-600 flex items-center justify-center font-black text-2xl shrink-0">
                        {{ strtoupper(substr($client->name, 0, 1)) }}
                    </div>
                    <div class="flex-1">
                        <h3 class="text-2xl font-black text-on-surface tracking-tight">{{ $client->name }}</h3>
                        <p class="text-sm font-bold text-outline font-manrope italic">{{ $client->email }}</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                            <div class="bg-surface-container-low/50 p-4 rounded-2xl border border-outline-variant/5">
                                <p class="text-[9px] font-black text-outline uppercase tracking-widest mb-1">WhatsApp Primary</p>
                                <p class="text-md font-black text-blue-600 font-manrope">{{ $client->whatsapp_number }}</p>
                            </div>
                            <div class="bg-surface-container-low/50 p-4 rounded-2xl border border-outline-variant/5">
                                <p class="text-[9px] font-black text-outline uppercase tracking-widest mb-1">Account Role</p>
                                <p class="text-md font-black text-secondary uppercase tracking-tighter">{{ $client->role }}</p>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-4 mt-8">
                            <a href="{{ route('admin.client.profile', $client->whatsapp_number) }}" class="inline-flex items-center gap-2 px-6 py-3 bg-on-surface text-white rounded-xl text-xs font-black hover:bg-primary transition-all">
                                <span class="material-symbols-outlined text-[14px]">visibility</span>
                                View Engagement
                            </a>
                            <a href="https://wa.me/{{ preg_replace('/\D/', '', $client->whatsapp_number) }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-3 bg-emerald-500 text-white rounded-xl text-xs font-black hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-500/10">
                                <span class="material-symbols-outlined text-[14px]">chat_bubble</span>
                                WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if(count($clients) === 0)
        <div class="bg-white rounded-[3rem] p-24 text-center border-2 border-dashed border-outline-variant/10">
            <span class="material-symbols-outlined text-8xl text-outline opacity-20 mb-4">person_search</span>
            <p class="text-2xl font-black text-outline">No client data available in master record</p>
        </div>
        @endif
    </main>
</div>
@endsection

@push('styles')
<style>
    #topNav { display: none; }
</style>
@endpush
