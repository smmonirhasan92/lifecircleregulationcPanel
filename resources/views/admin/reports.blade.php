@extends('layouts.app')

@php
    $title = 'Financial Analysis | Admin Portal';
@endphp

@section('content')
<div class="flex min-h-screen bg-surface-container-low/20 pt-20">
    <!-- Premium Sidebar (Standardized) -->
    <nav class="w-72 bg-white border-r border-outline-variant/10 flex flex-col py-10 fixed h-full shadow-[20px_0_40px_rgba(0,0,0,0.02)]">
        <div class="px-8 mb-12 flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-emerald-600 flex items-center justify-center text-white shadow-lg shadow-emerald-500/20">
                <span class="material-symbols-outlined text-xl">analytics</span>
            </div>
            <div>
                <h1 class="text-sm font-black text-emerald-600 uppercase tracking-tighter leading-none">Admin Portal</h1>
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

            <div class="pt-8 px-4 py-2 text-[10px] font-black text-outline-variant uppercase tracking-widest">Master Data</div>
            <a class="flex items-center gap-3 text-outline hover:bg-surface-container-low px-5 py-4 rounded-2xl transition-all font-bold group" href="{{ route('admin.clients') }}">
                <span class="material-symbols-outlined text-xl group-hover:scale-110 transition-transform">contacts</span>
                <span>Clients Directory</span>
            </a>
            <a class="flex items-center gap-3 bg-emerald-50 text-emerald-600 rounded-2xl px-5 py-4 border-l-4 border-emerald-600 font-black shadow-sm transition-all" href="{{ route('admin.reports') }}">
                <span class="material-symbols-outlined text-xl">analytics</span>
                <span>Financial Analysis</span>
            </a>

            <div class="pt-8 px-4 py-2 text-[10px] font-black text-outline-variant uppercase tracking-widest">Archives</div>
            <a class="flex items-center gap-3 text-outline hover:bg-surface-container-low px-5 py-4 rounded-2xl transition-all font-bold group" href="{{ route('admin.archive.enrollments') }}">
                <span class="material-symbols-outlined text-xl group-hover:scale-110 transition-transform">history_edu</span>
                <span>Past Records</span>
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
                <h2 class="text-4xl font-black text-emerald-600 tracking-tighter">আর্থিক প্রতিবেদন <span class="text-on-surface">Reports</span></h2>
                <div class="flex items-center gap-2 mt-2">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                    <p class="text-xs text-outline font-bold uppercase tracking-widest">Life Circle Accounting Matrix</p>
                </div>
            </div>
            <div class="bg-white px-5 py-3 rounded-2xl whisper-shadow border border-outline-variant/5 text-sm font-black text-on-surface">
                Session: 2026 High Recovery
            </div>
        </header>

        <!-- Accounting Stats Grid -->
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
            @php
                $metrics = [
                    ['label' => 'Total Expected', 'value' => $stats['total_revenue'], 'color' => 'primary', 'icon' => 'currency_exchange'],
                    ['label' => 'Verified Paid', 'value' => $stats['verified_paid'], 'color' => 'emerald-600', 'icon' => 'check_circle'],
                    ['label' => 'Pending Dues', 'value' => $stats['pending_dues'], 'color' => 'amber-500', 'icon' => 'hourglass_top'],
                    ['label' => 'Enrollment Conversion', 'value' => $stats['enrollment_count'], 'color' => 'secondary', 'icon' => 'person_add'],
                ];
            @endphp
            @foreach($metrics as $metric)
            <div class="bg-white p-10 rounded-[2.5rem] whisper-shadow border border-outline-variant/10 hover:-translate-y-2 transition-transform duration-300">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-10 h-10 rounded-xl bg-{{ $metric['color'] }}/10 text-{{ $metric['color'] }} flex items-center justify-center">
                        <span class="material-symbols-outlined text-xl">{{ $metric['icon'] }}</span>
                    </div>
                </div>
                <h3 class="text-3xl font-black text-on-surface font-manrope">৳{{ number_format($metric['value'], 0) }}</h3>
                <p class="text-[10px] font-black text-outline-variant uppercase tracking-widest mt-2">{{ $metric['label'] }}</p>
            </div>
            @endforeach
        </section>

        <!-- Detailed Breakdown -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <!-- Program Revenue Matrix -->
            <div class="bg-white rounded-[2.5rem] whisper-shadow border border-outline-variant/10 overflow-hidden">
                <div class="px-10 py-8 border-b border-outline-variant/5 bg-surface-container-low/30">
                    <h3 class="text-xl font-black text-on-surface">Program Performance</h3>
                </div>
                <div class="p-8 space-y-8">
                    @foreach($stats['revenue_by_service'] as $service => $revenue)
                    <div>
                        <div class="flex justify-between items-end mb-3">
                            <h4 class="text-xs font-black text-on-surface uppercase tracking-tighter">{{ $service }}</h4>
                            <span class="text-xs font-bold text-emerald-600 font-manrope">৳{{ number_format($revenue, 2) }}</span>
                        </div>
                        <div class="h-2 bg-surface-container rounded-full overflow-hidden">
                            <div class="h-full bg-emerald-500 rounded-full" style="width: {{ $stats['total_revenue'] > 0 ? ($revenue / $stats['total_revenue']) * 100 : 0 }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Operational Insights -->
            <div class="bg-white rounded-[2.5rem] whisper-shadow border border-outline-variant/10 p-10">
                <h3 class="text-xl font-black text-on-surface mb-8">Data Summary</h3>
                <div class="space-y-6">
                    <div class="flex justify-between items-center py-4 border-b border-outline-variant/5">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-outline">calendar_month</span>
                            <span class="text-sm font-bold text-on-surface-variant font-bengali">মোট অ্যাপয়েন্টমেন্ট এনগেজমেন্ট</span>
                        </div>
                        <span class="font-black text-on-surface font-manrope">{{ $stats['appointment_count'] }}</span>
                    </div>
                    <div class="flex justify-between items-center py-4 border-b border-outline-variant/5">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-outline">verified_user</span>
                            <span class="text-sm font-bold text-on-surface-variant font-bengali">ফি ভেরিফাইড ইউজার</span>
                        </div>
                        <span class="font-black text-emerald-600 font-manrope">{{ count($clients) }}</span>
                    </div>
                    <div class="mt-10 p-6 rounded-3xl bg-primary/5 border border-primary/10">
                        <p class="text-[10px] font-black text-primary uppercase tracking-widest mb-2">Account Integrity</p>
                        <p class="text-sm text-outline-variant leading-relaxed">System is calculating revenue based on verified 'is_paid' flags and 'payment_amount' field entries in real-time.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection

@push('styles')
<style>
    #topNav { display: none; }
</style>
@endpush
