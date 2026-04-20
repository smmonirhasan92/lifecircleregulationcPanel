@extends('layouts.app')

@php
    $title = 'Admin Dashboard | Life Circle';
@endphp

@section('content')
<div class="flex min-h-screen bg-surface-container-low/20 pt-20">
    <!-- Premium Standardized Sidebar -->
    <nav class="w-72 bg-white border-r border-outline-variant/10 flex flex-col py-10 fixed h-full shadow-[20px_0_40px_rgba(0,0,0,0.02)]">
        <div class="px-8 mb-12">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 rounded-2xl bg-primary flex items-center justify-center text-white shadow-lg shadow-primary/20">
                    <span class="material-symbols-outlined">shield_person</span>
                </div>
                <div>
                    <h1 class="text-sm font-black text-primary uppercase tracking-tighter leading-none">Admin Portal</h1>
                    <p class="text-[10px] text-outline font-bold uppercase tracking-widest mt-1">Management v2.0</p>
                </div>
            </div>
        </div>

        <div class="flex-1 space-y-1 px-4 overflow-y-auto custom-scrollbar">
            <div class="px-4 py-2 text-[10px] font-black text-outline-variant uppercase tracking-widest">Active Operations</div>
            <a class="flex items-center gap-3 bg-primary/5 text-primary rounded-2xl px-5 py-4 border-l-4 border-primary font-black shadow-sm transition-all" href="{{ route('admin.list') }}">
                <span class="material-symbols-outlined text-xl">group</span>
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
            <a class="flex items-center gap-3 text-outline hover:bg-surface-container-low px-5 py-4 rounded-2xl transition-all font-bold group" href="{{ route('admin.reports') }}">
                <span class="material-symbols-outlined text-xl group-hover:scale-110 transition-transform">analytics</span>
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

        <div class="px-4 mt-auto pt-8 border-t border-outline-variant/5">
            <a class="flex items-center gap-3 text-red-500 hover:bg-red-50 px-5 py-4 rounded-2xl transition-all font-black cursor-pointer group" onclick="document.getElementById('logout-form').submit();">
                <span class="material-symbols-outlined text-xl group-hover:-translate-x-1 transition-transform">logout</span>
                <span>Secure Sign Out</span>
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="ml-72 flex-1 p-12 overflow-x-hidden">
        <header class="flex justify-between items-center mb-16 animate-fade-in">
            <div>
                <h2 class="text-4xl font-black text-primary tracking-tighter uppercase leading-none">সদস্যভুক্তি মনিটর <span class="text-on-surface">Enrollments</span></h2>
                <div class="flex items-center gap-2 mt-3">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                    <p class="text-xs text-outline font-bold uppercase tracking-widest leading-none">Operational Status: Standardized v2.0</p>
                </div>
            </div>
            <div class="hidden md:flex flex-col items-end">
                <div class="bg-white px-5 py-3 rounded-2xl whisper-shadow border border-outline-variant/5 flex items-center gap-3">
                    <span class="material-symbols-outlined text-primary text-xl">event</span>
                    <span class="text-sm font-black text-on-surface">{{ date('l, M d, Y') }}</span>
                </div>
            </div>
        </header>

        @if (session('success'))
            <div class="mb-10 bg-emerald-50 text-emerald-800 p-5 rounded-[2rem] border border-emerald-100 flex items-center gap-4 animate-fade-in-up">
                <div class="w-10 h-10 rounded-xl bg-emerald-500 text-white flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined">check_circle</span>
                </div>
                <div class="flex-1">
                    <p class="text-xs font-black uppercase tracking-widest opacity-60">System Notification</p>
                    <span class="font-bold text-sm">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Dynamic Metric Grid (Standardized) -->
        <section class="grid grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
            @php
                $metrics = [
                    ['label' => 'Total Leads', 'value' => $stats->total, 'color' => 'on-surface', 'icon' => 'analytics'],
                    ['label' => 'Pending', 'value' => $stats->pending, 'color' => 'secondary', 'icon' => 'pending'],
                    ['label' => 'Active Work', 'value' => $stats->active, 'color' => 'blue-500', 'icon' => 'person_search'],
                    ['label' => 'Completed', 'value' => $stats->completed, 'color' => 'emerald-500', 'icon' => 'archive'],
                ];
            @endphp
            @foreach($metrics as $metric)
            <div class="bg-white p-8 rounded-[2.5rem] whisper-shadow border border-outline-variant/10 hover:-translate-y-2 transition-transform duration-300">
                <div class="flex justify-between items-start mb-4">
                    <span class="material-symbols-outlined text-{{ $metric['color'] }} opacity-50">{{ $metric['icon'] }}</span>
                    <span class="text-[10px] font-black text-outline-variant uppercase tracking-tighter">{{ $metric['label'] }}</span>
                </div>
                <h3 class="text-4xl font-black text-{{ $metric['color'] }} font-manrope">{{ $metric['value'] }}</h3>
            </div>
            @endforeach
        </section>

        <!-- Main Ledger Table -->
        <section class="bg-white rounded-[2.5rem] whisper-shadow border border-outline-variant/10 overflow-hidden">
            <div class="px-10 py-8 border-b border-outline-variant/5 flex flex-col md:flex-row justify-between md:items-center gap-6 bg-surface-container-low/30">
                <h3 class="text-xl font-black text-on-surface">Standardized Ledger <span class="text-xs font-bold text-outline ml-2">Displaying Active/Pending Entries</span></h3>
                <div class="flex items-center gap-4">
                    <div class="relative">
                        <input type="text" placeholder="Search data..." class="bg-white border-2 border-outline-variant/10 rounded-full px-6 py-2.5 text-xs font-bold focus:ring-2 focus:ring-primary focus:border-transparent transition-all w-64 shadow-sm">
                        <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-outline text-sm">search</span>
                    </div>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-surface-container-low/50">
                            <th class="px-10 py-6 text-[10px] font-black uppercase tracking-widest text-outline">Client Identity</th>
                            <th class="px-6 py-6 text-[10px] font-black uppercase tracking-widest text-outline">Service Group</th>
                            <th class="px-6 py-6 text-[10px] font-black uppercase tracking-widest text-outline">TX Identifier</th>
                            <th class="px-6 py-6 text-[10px] font-black uppercase tracking-widest text-outline">Communication</th>
                            <th class="px-10 py-6 text-[10px] font-black uppercase tracking-widest text-outline">Operational Matrix</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant/5">
                        @forelse($enrollments as $enrollment)
                        <tr class="hover:bg-surface-container-low/30 transition-all duration-200">
                            <td class="px-10 py-8">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center font-black text-xs">
                                        {{ strtoupper(substr($enrollment->full_name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="font-black text-on-surface text-sm leading-none mb-1">{{ $enrollment->full_name }}</p>
                                        <p class="text-[11px] text-outline font-bold font-manrope italic">{{ $enrollment->email }}</p>
                                        @if($enrollment->start_date)
                                            <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full inline-block mt-1">
                                                📅 {{ \Carbon\Carbon::parse($enrollment->start_date)->format('d M Y') }}
                                                @if($enrollment->end_date) → {{ \Carbon\Carbon::parse($enrollment->end_date)->format('d M Y') }} @endif
                                            </span>
                                        @endif
                                        @if($enrollment->admin_notes)
                                            <p class="text-[10px] text-amber-600 font-bold mt-1 truncate max-w-[180px]" title="{{ $enrollment->admin_notes }}">
                                                📝 {{ $enrollment->admin_notes }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-8">
                                <div class="inline-flex items-center gap-2 px-3 py-1 bg-surface-container text-on-surface rounded-lg text-[10px] font-black uppercase whitespace-nowrap">
                                    {{ $enrollment->service_type }}
                                </div>
                                @if($enrollment->course_duration)
                                    <div class="mt-2 text-[10px] font-bold text-outline">⏱ {{ $enrollment->course_duration }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-8">
                                <div class="font-manrope text-sm font-black text-primary p-2 bg-primary/5 rounded-xl text-center border border-primary/10">
                                    {{ $enrollment->transaction_id }}
                                </div>
                                <a href="{{ route('admin.client.profile', $enrollment->whatsapp_number) }}" class="mt-2 text-[10px] font-black text-outline hover:text-primary flex items-center gap-1 justify-center transition-colors">
                                    <span class="material-symbols-outlined text-[14px]">id_card</span>
                                    Detailed Profile
                                </a>
                            </td>
                            <td class="px-6 py-8">
                                <a href="https://wa.me/{{ preg_replace('/\D/', '', $enrollment->whatsapp_number) }}" target="_blank" class="inline-flex items-center gap-3 px-5 py-3 bg-emerald-500 text-white rounded-2xl text-xs font-black hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-500/10 hover:-translate-y-1">
                                    <span class="material-symbols-outlined text-sm font-bold">chat</span>
                                    WhatsApp
                                </a>
                            </td>
                            <td class="px-10 py-8">
                                <form action="{{ route('admin.status.update', $enrollment->id) }}" method="POST" class="space-y-3">
                                    @csrf
                                    <div class="flex items-center gap-2">
                                        <div class="relative flex-1">
                                            <select name="status" class="w-full bg-white border border-outline-variant/20 text-[11px] font-black rounded-xl px-4 py-2 appearance-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                                <option value="pending" {{ $enrollment->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="active" {{ $enrollment->status === 'active' ? 'selected' : '' }}>Active Work</option>
                                                <option value="completed" {{ $enrollment->status === 'completed' ? 'selected' : '' }}>Move to Archive</option>
                                                <option value="canceled" class="text-red-500">Cancel & Delete</option>
                                            </select>
                                            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline text-xs pointer-events-none">expand_more</span>
                                        </div>
                                        <input type="number" name="payment_amount" value="{{ $enrollment->payment_amount }}" placeholder="৳ Amt" class="w-20 bg-surface-container text-[11px] font-black rounded-xl px-3 py-2 border-none focus:ring-2 focus:ring-primary transition-all">
                                    </div>
                                    <div class="flex items-center justify-between px-1">
                                        <label class="flex items-center gap-2 text-[10px] font-black text-outline cursor-pointer hover:text-primary transition-colors">
                                            <input type="checkbox" name="is_paid" value="1" {{ $enrollment->is_paid ? 'checked' : '' }} class="w-4 h-4 rounded-md border-outline-variant text-primary focus:ring-0 cursor-pointer">
                                            Verified Paid
                                        </label>
                                        <button type="submit" class="text-primary font-black text-[10px] uppercase tracking-tighter hover:underline">Commit Changes</button>
                                    </div>
                                </form>
                                {{-- Expand Notes Button --}}
                                <button onclick="toggleNotes('notes-{{ $enrollment->id }}')" class="mt-3 text-[10px] font-black text-outline hover:text-primary flex items-center gap-1 transition-colors w-full justify-center border border-outline-variant/10 rounded-xl py-1.5 hover:border-primary/20 hover:bg-primary/5">
                                    <span class="material-symbols-outlined text-[14px]">edit_note</span>
                                    Course Notes & Tracking
                                </button>
                            </td>
                        </tr>
                        {{-- Expandable Notes & Course Tracking Row --}}
                        <tr id="notes-{{ $enrollment->id }}" class="hidden bg-amber-50/30">
                            <td colspan="5" class="px-10 py-6 border-b border-outline-variant/10">
                                <form action="{{ route('admin.enrollments.details.update', $enrollment->id) }}" method="POST">
                                    @csrf
                                    <p class="text-[10px] font-black uppercase tracking-widest text-outline mb-4 flex items-center gap-2">
                                        <span class="material-symbols-outlined text-sm">edit_note</span>
                                        Course Tracking & Admin Notes — {{ $enrollment->full_name }}
                                    </p>
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                                        <div class="flex flex-col gap-1">
                                            <label class="text-[10px] font-black uppercase tracking-widest text-outline">Course Duration</label>
                                            <input type="text" name="course_duration" value="{{ $enrollment->course_duration }}" placeholder="e.g. 3 Months" class="bg-white border border-outline-variant/20 text-xs font-bold rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-primary transition-all">
                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <label class="text-[10px] font-black uppercase tracking-widest text-outline">Start Date</label>
                                            <input type="date" name="start_date" value="{{ $enrollment->start_date ? \Carbon\Carbon::parse($enrollment->start_date)->format('Y-m-d') : '' }}" class="bg-white border border-outline-variant/20 text-xs font-bold rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-primary transition-all">
                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <label class="text-[10px] font-black uppercase tracking-widest text-outline">End Date</label>
                                            <input type="date" name="end_date" value="{{ $enrollment->end_date ? \Carbon\Carbon::parse($enrollment->end_date)->format('Y-m-d') : '' }}" class="bg-white border border-outline-variant/20 text-xs font-bold rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-primary transition-all">
                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <label class="text-[10px] font-black uppercase tracking-widest text-outline">Confirmed Payment (৳)</label>
                                            <input type="number" name="payment_amount" value="{{ $enrollment->payment_amount }}" placeholder="0.00" class="bg-white border border-outline-variant/20 text-xs font-bold rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-primary transition-all">
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-1 mb-4">
                                        <label class="text-[10px] font-black uppercase tracking-widest text-outline">Admin Notes (Internal Only)</label>
                                        <textarea name="admin_notes" rows="2" placeholder="Internal notes, observations, follow-up reminders..." class="bg-white border border-outline-variant/20 text-xs font-bold rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary transition-all resize-none">{{ $enrollment->admin_notes }}</textarea>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit" class="inline-flex items-center gap-2 bg-primary text-white text-xs font-black px-6 py-2.5 rounded-xl hover:bg-primary/90 transition-all shadow-lg shadow-primary/20">
                                            <span class="material-symbols-outlined text-sm">save</span>
                                            Save Course Details
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-10 py-24 text-center">
                                <div class="flex flex-col items-center opacity-20">
                                    <span class="material-symbols-outlined text-8xl mb-4">folder_open</span>
                                    <p class="text-xl font-black italic">No records found in current view</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="px-10 py-8 border-t border-outline-variant/5 bg-surface-container-low/20">
                {{ $enrollments->links() }}
            </div>
        </section>
    </main>
</div>
@endsection

@push('styles')
<style>
    #topNav { display: none; }
    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
</style>
@endpush

@push('scripts')
<script>
    function toggleNotes(id) {
        const row = document.getElementById(id);
        if (row) {
            row.classList.toggle('hidden');
        }
    }
</script>
@endpush
