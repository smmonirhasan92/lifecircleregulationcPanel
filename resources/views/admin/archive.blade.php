@extends('layouts.app')

@php
    $title = 'Past Records | Admin Archive';
@endphp

@section('content')
<div class="flex min-h-screen bg-surface-container-low/20 pt-20">
    <!-- Premium Sidebar (Standardized) -->
    <nav class="w-72 bg-white border-r border-outline-variant/10 flex flex-col py-10 fixed h-full shadow-[20px_0_40px_rgba(0,0,0,0.02)]">
        <div class="px-8 mb-12 flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-gray-800 flex items-center justify-center text-white shadow-lg shadow-gray-800/20">
                <span class="material-symbols-outlined text-xl">history_edu</span>
            </div>
            <div>
                <h1 class="text-sm font-black text-gray-800 uppercase tracking-tighter leading-none">Admin Portal</h1>
                <p class="text-[10px] text-outline font-bold uppercase tracking-widest mt-1">Management v2.0</p>
            </div>
        </div>

        <div class="flex-1 space-y-1 px-4 overflow-y-auto custom-scrollbar">
            <div class="px-4 py-2 text-[10px] font-black text-outline-variant uppercase tracking-widest">Active Operations</div>
            <a class="flex items-center gap-3 text-outline hover:bg-surface-container-low px-5 py-4 rounded-2xl transition-all font-bold group" href="{{ route('admin.list') }}">
                <span class="material-symbols-outlined text-xl group-hover:scale-110 transition-transform">group</span>
                <span>Enrollments</span>
            </a>
            <a class="flex items-center gap-3 text-outline hover:bg-surface-container-low px-5 py-4 rounded-2xl transition-all font-bold group" href="{{ route('admin.appointments') }}">
                <span class="material-symbols-outlined text-xl group-hover:scale-110 transition-transform">calendar_month</span>
                <span>Appointments</span>
            </a>

            <div class="pt-8 px-4 py-2 text-[10px] font-black text-outline-variant uppercase tracking-widest">Master Data</div>
            <a class="flex items-center gap-3 text-outline hover:bg-surface-container-low px-5 py-4 rounded-2xl transition-all font-bold group" href="{{ route('admin.clients') }}">
                <span class="material-symbols-outlined text-xl group-hover:scale-110 transition-transform">contacts</span>
                <span>Clients Directory</span>
            </a>

            <div class="pt-8 px-4 py-2 text-[10px] font-black text-outline-variant uppercase tracking-widest">History & Legacy</div>
            <a class="flex items-center gap-3 bg-gray-50 text-gray-800 rounded-2xl px-5 py-4 border-l-4 border-gray-800 font-black shadow-sm transition-all" href="{{ route('admin.archive.enrollments') }}">
                <span class="material-symbols-outlined text-xl">history_edu</span>
                <span>Enrollment Archive</span>
            </a>
            <a class="flex items-center gap-3 text-outline hover:bg-surface-container-low px-5 py-4 rounded-2xl transition-all font-bold group" href="{{ route('admin.archive.appointments') }}">
                <span class="material-symbols-outlined text-xl group-hover:scale-110 transition-transform">history</span>
                <span>Appointment Archive</span>
            </a>

            <div class="pt-8 px-4 py-2 text-[10px] font-black text-outline-variant uppercase tracking-widest">Deployment & System</div>
            <a class="flex items-center gap-3 text-amber-600 hover:bg-amber-50 px-5 py-4 rounded-2xl transition-all font-bold" href="{{ route('admin.clear-cache') }}">
                <span class="material-symbols-outlined text-xl">cleaning_services</span>
                <span>Clear Visual Cache</span>
            </a>
            <a class="flex items-center gap-3 text-outline hover:bg-surface-container-low px-5 py-4 rounded-2xl transition-all font-bold group" href="{{ route('admin.security') }}">
                <span class="material-symbols-outlined text-xl group-hover:scale-110 transition-transform">security</span>
                <span>Access Security</span>
            </a>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="ml-72 flex-1 p-12 overflow-x-hidden">
        <header class="flex justify-between items-center mb-16 animate-fade-in">
            <div>
                <h2 class="text-4xl font-black text-gray-800 tracking-tighter uppercase leading-none">সদস্যভুক্তি ইতিহাস <span class="text-outline-variant">Archives</span></h2>
                <div class="flex items-center gap-2 mt-3">
                    <span class="material-symbols-outlined text-emerald-500 text-sm">check_circle</span>
                    <p class="text-xs text-outline font-black uppercase tracking-widest leading-none">Filter: Completed Enrollments Only</p>
                </div>
            </div>
            <div class="hidden md:block bg-surface-container-low px-6 py-4 rounded-[2rem] border border-outline-variant/10 text-xs font-black text-outline-variant">
                Total Archived: {{ $enrollments->total() }}
            </div>
        </header>

        <!-- Archive Ledger -->
        <section class="bg-white rounded-[2.5rem] whisper-shadow border border-outline-variant/10 overflow-hidden">
            <div class="px-10 py-8 border-b border-outline-variant/5 bg-gray-50/50 flex justify-between items-center">
                <h3 class="text-xl font-black text-gray-800">Historical Ledger Index</h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-surface-container-low/50">
                            <th class="px-10 py-6 text-[10px] font-black uppercase tracking-widest text-outline">Client Identity</th>
                            <th class="px-6 py-6 text-[10px] font-black uppercase tracking-widest text-outline">Course Service</th>
                            <th class="px-6 py-6 text-[10px] font-black uppercase tracking-widest text-outline">Duration Log</th>
                            <th class="px-6 py-6 text-[10px] font-black uppercase tracking-widest text-outline">Closure Date</th>
                            <th class="px-10 py-6 text-[10px] font-black uppercase tracking-widest text-outline text-right">Details</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant/5">
                        @forelse($enrollments as $enrollment)
                        <tr class="hover:bg-emerald-50/20 transition-all duration-200">
                            <td class="px-10 py-8">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center font-black text-xs text-gray-500">
                                        {{ strtoupper(substr($enrollment->full_name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="font-black text-gray-800 text-sm leading-tight">{{ $enrollment->full_name }}</p>
                                        <p class="text-[10px] text-outline font-bold mt-0.5">{{ $enrollment->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-8">
                                <div class="inline-flex items-center gap-2 px-3 py-1 bg-gray-100/50 text-gray-600 rounded-lg text-[10px] font-black uppercase italic">
                                    {{ $enrollment->service_type }}
                                </div>
                            </td>
                            <td class="px-6 py-8">
                                <span class="text-sm font-black text-gray-800 font-manrope">
                                    {{ $enrollment->course_duration ?? '3 Months' }}
                                </span>
                            </td>
                            <td class="px-6 py-8">
                                <p class="text-[11px] font-black text-outline uppercase tracking-tighter">{{ $enrollment->created_at->format('M d, Y') }}</p>
                            </td>
                            <td class="px-10 py-8 text-right">
                                <a href="{{ route('admin.client.profile', $enrollment->whatsapp_number) }}" class="inline-flex items-center gap-1.5 text-[10px] font-black text-primary hover:underline group">
                                    Full Engagement File
                                    <span class="material-symbols-outlined text-[14px] group-hover:translate-x-1 transition-transform">arrow_right_alt</span>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-10 py-24 text-center">
                                <div class="flex flex-col items-center opacity-20">
                                    <span class="material-symbols-outlined text-8xl mb-4">archive</span>
                                    <p class="text-xl font-black italic">Archive repository is currently empty</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="px-10 py-8 border-t border-outline-variant/5 bg-gray-50/20">
                {{ $enrollments->links() }}
            </div>
        </section>
    </main>
</div>
@endsection

@push('styles')
<style>
    #topNav { display: none; }
</style>
@endpush
