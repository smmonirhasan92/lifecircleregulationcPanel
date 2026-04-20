@extends('layouts.app')

@php
    $title = 'Manage Appointments | Admin Portal';
@endphp

@section('content')
<div class="flex min-h-screen bg-surface-container-low/20 pt-20">
    <!-- Premium Sidebar (Matches Enrollments) -->
    <nav class="w-72 bg-white border-r border-outline-variant/10 flex flex-col py-10 fixed h-full shadow-[20px_0_40px_rgba(0,0,0,0.02)]">
        <div class="px-8 mb-12">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 rounded-2xl bg-secondary flex items-center justify-center text-white shadow-lg shadow-secondary/20">
                    <span class="material-symbols-outlined text-xl">event_upcoming</span>
                </div>
                <div>
                    <h1 class="text-sm font-black text-secondary uppercase tracking-tighter leading-none">Admin Portal</h1>
                    <p class="text-[10px] text-outline font-bold uppercase tracking-widest mt-1">Management v2.0</p>
                </div>
            </div>
        </div>

        <div class="flex-1 space-y-1 px-4 overflow-y-auto custom-scrollbar">
            <div class="px-4 py-2 text-[10px] font-black text-outline-variant uppercase tracking-widest">Active Operations</div>
            <a class="flex items-center gap-3 text-outline hover:bg-surface-container-low px-5 py-4 rounded-2xl transition-all font-bold group" href="{{ route('admin.list') }}">
                <span class="material-symbols-outlined text-xl group-hover:scale-110 transition-transform">group</span>
                <span>Enrollments</span>
            </a>
            <a class="flex items-center gap-3 bg-secondary/5 text-secondary rounded-2xl px-5 py-4 border-l-4 border-secondary font-black shadow-sm transition-all" href="{{ route('admin.appointments') }}">
                <span class="material-symbols-outlined text-xl">calendar_month</span>
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

            <div class="pt-8 px-4 py-2 text-[10px] font-black text-outline-variant uppercase tracking-widest">System Control</div>
            <a class="flex items-center gap-3 text-outline hover:bg-surface-container-low px-5 py-4 rounded-2xl transition-all font-bold group" href="{{ route('admin.security') }}">
                <span class="material-symbols-outlined text-xl group-hover:scale-110 transition-transform">security</span>
                <span>Access Security</span>
            </a>
            <a class="flex items-center gap-3 text-amber-600 hover:bg-amber-50 px-5 py-4 rounded-2xl transition-all font-bold" href="{{ route('admin.clear-cache') }}">
                <span class="material-symbols-outlined text-xl">cleaning_services</span>
                <span>System Refresh</span>
            </a>
        </div>

        <div class="px-4 mt-auto pt-8 border-t border-outline-variant/5">
            <a class="flex items-center gap-3 text-red-500 hover:bg-red-50 px-5 py-4 rounded-2xl transition-all font-black cursor-pointer group" onclick="document.getElementById('logout-form').submit();">
                <span class="material-symbols-outlined text-xl group-hover:-translate-x-1 transition-transform">logout</span>
                <span>Secure Sign Out</span>
            </a>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="ml-72 flex-1 p-12 overflow-x-hidden">
        <header class="flex justify-between items-center mb-16 animate-fade-in">
            <div>
                <h2 class="text-4xl font-black text-secondary tracking-tighter">অ্যাপয়েন্টমেন্ট বুকিং <span class="text-on-surface">Appointments</span></h2>
                <div class="flex items-center gap-2 mt-2">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-secondary opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-secondary"></span>
                    </span>
                    <p class="text-xs text-outline font-bold uppercase tracking-widest">Booking Logic: Active and Monitoring</p>
                </div>
            </div>
            <div class="hidden md:flex bg-white px-5 py-3 rounded-2xl whisper-shadow border border-outline-variant/5 items-center gap-3">
                <span class="material-symbols-outlined text-secondary text-xl">calendar_today</span>
                <span class="text-sm font-black text-on-surface">{{ date('l, M d, Y') }}</span>
            </div>
        </header>

        @if (session('success'))
            <div class="mb-10 bg-emerald-50 text-emerald-800 p-5 rounded-[2rem] border border-emerald-100 flex items-center gap-4 animate-fade-in-up">
                <div class="w-10 h-10 rounded-xl bg-emerald-500 text-white flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined">check_circle</span>
                </div>
                <span class="font-bold text-sm">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Session Metric Grid -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            @php
                $metrics = [
                    ['label' => 'Gross Bookings', 'value' => $stats->total, 'color' => 'secondary', 'icon' => 'calendar_month'],
                    ['label' => 'Pending', 'value' => $stats->pending, 'color' => 'amber-500', 'icon' => 'notification_important'],
                    ['label' => 'Active Sessions', 'value' => $stats->active, 'color' => 'emerald-500', 'icon' => 'event_available'],
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
                <h3 class="text-xl font-black text-on-surface">Bookings Ledger <span class="text-xs font-bold text-outline ml-2">Displaying Active Sessions</span></h3>
                <div class="flex items-center gap-4">
                    <div class="relative">
                        <input type="text" placeholder="Search appointments..." class="bg-white border-2 border-outline-variant/10 rounded-full px-6 py-2.5 text-xs font-bold focus:ring-2 focus:ring-secondary focus:border-transparent transition-all w-64 shadow-sm">
                        <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-outline text-sm font-bold">search</span>
                    </div>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-surface-container-low/50">
                            <th class="px-10 py-6 text-[10px] font-black uppercase tracking-widest text-outline">Client Identity</th>
                            <th class="px-6 py-6 text-[10px] font-black uppercase tracking-widest text-outline">Scheduled Session</th>
                            <th class="px-6 py-6 text-[10px] font-black uppercase tracking-widest text-outline">Service & ID</th>
                            <th class="px-6 py-6 text-[10px] font-black uppercase tracking-widest text-outline">Reach</th>
                            <th class="px-10 py-6 text-[10px] font-black uppercase tracking-widest text-outline">Status Control</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant/5">
                        @forelse($appointments as $appointment)
                        <tr class="hover:bg-surface-container-low/30 transition-all duration-200">
                            <td class="px-10 py-8">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-secondary/10 text-secondary flex items-center justify-center font-black text-xs">
                                        {{ strtoupper(substr($appointment->full_name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="font-black text-on-surface text-sm leading-none mb-1">{{ $appointment->full_name }}</p>
                                        <p class="text-[11px] text-outline font-bold font-manrope italic">{{ $appointment->email }}</p>
                                        @if($appointment->admin_notes)
                                            <p class="text-[10px] text-amber-600 font-bold mt-1 truncate max-w-[180px]" title="{{ $appointment->admin_notes }}">
                                                📝 {{ $appointment->admin_notes }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-8">
                                <p class="text-sm font-black text-secondary font-manrope">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M, Y') }}</p>
                                <p class="text-[10px] font-bold text-outline uppercase tracking-widest mt-1">{{ $appointment->appointment_time ?? 'To be discussed' }}</p>
                            </td>
                            <td class="px-6 py-8">
                                <div class="inline-flex items-center gap-2 px-3 py-1 bg-surface-container text-on-surface rounded-lg text-[10px] font-black uppercase whitespace-nowrap mb-2">
                                    {{ $appointment->service_type }}
                                </div>
                                <p class="font-manrope text-[10px] font-black text-primary p-1 bg-primary/5 rounded-md text-center border border-primary/5">TX: {{ $appointment->transaction_id }}</p>
                            </td>
                            <td class="px-6 py-8">
                                <a href="https://wa.me/{{ preg_replace('/\D/', '', $appointment->whatsapp_number) }}" target="_blank" class="inline-flex items-center gap-3 px-5 py-3 bg-emerald-500 text-white rounded-2xl text-xs font-black hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-500/10 hover:-translate-y-1">
                                    <span class="material-symbols-outlined text-sm font-bold">chat</span>
                                    WhatsApp
                                </a>
                            </td>
                            <td class="px-10 py-8">
                                <form action="{{ route('admin.appointments.update', $appointment->id) }}" method="POST" class="space-y-3">
                                    @csrf
                                    <div class="flex items-center gap-2">
                                        <div class="relative flex-1">
                                            <select name="status" class="w-full bg-white border border-outline-variant/20 text-[11px] font-black rounded-xl px-4 py-2 appearance-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all">
                                                <option value="pending" {{ $appointment->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="active" {{ $appointment->status === 'active' ? 'selected' : '' }}>Active Work</option>
                                                <option value="completed" {{ $appointment->status === 'completed' ? 'selected' : '' }}>Move to Archive</option>
                                                <option value="canceled" class="text-red-500">Cancel & Delete</option>
                                            </select>
                                            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline text-xs pointer-events-none">expand_more</span>
                                        </div>
                                        <input type="number" name="payment_amount" value="{{ $appointment->payment_amount }}" placeholder="৳ Amt" class="w-20 bg-surface-container text-[11px] font-black rounded-xl px-3 py-2 border-none focus:ring-2 focus:ring-secondary transition-all">
                                    </div>
                                    <div class="flex items-center justify-between px-1">
                                        <label class="flex items-center gap-2 text-[10px] font-black text-outline cursor-pointer hover:text-secondary transition-colors">
                                            <input type="checkbox" name="is_paid" value="1" {{ $appointment->is_paid ? 'checked' : '' }} class="w-4 h-4 rounded-md border-outline-variant text-secondary focus:ring-0 cursor-pointer">
                                            Verified Paid
                                        </label>
                                        <button type="submit" class="text-secondary font-black text-[10px] uppercase tracking-tighter hover:underline">Commit</button>
                                    </div>
                                </form>
                                {{-- Expand Notes Button --}}
                                <button onclick="toggleNotes('notes-{{ $appointment->id }}')" class="mt-3 text-[10px] font-black text-outline hover:text-secondary flex items-center gap-1 transition-colors w-full justify-center border border-outline-variant/10 rounded-xl py-1.5 hover:border-secondary/20 hover:bg-secondary/5">
                                    <span class="material-symbols-outlined text-[14px]">edit_note</span>
                                    Notes & Tracking
                                </button>
                            </td>
                        </tr>
                        {{-- Expandable Notes & Payment Tracking Row --}}
                        <tr id="notes-{{ $appointment->id }}" class="hidden bg-amber-50/30">
                            <td colspan="5" class="px-10 py-6 border-b border-outline-variant/10">
                                <form action="{{ route('admin.appointments.details.update', $appointment->id) }}" method="POST">
                                    @csrf
                                    <p class="text-[10px] font-black uppercase tracking-widest text-outline mb-4 flex items-center gap-2">
                                        <span class="material-symbols-outlined text-sm">edit_note</span>
                                        Appointment Notes & Tracking — {{ $appointment->full_name }}
                                    </p>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                                        <div class="flex flex-col gap-1">
                                            <label class="text-[10px] font-black uppercase tracking-widest text-outline">Confirmed Payment (৳)</label>
                                            <input type="number" name="payment_amount" value="{{ $appointment->payment_amount }}" placeholder="0.00" class="bg-white border border-outline-variant/20 text-xs font-bold rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-secondary transition-all">
                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <label class="text-[10px] font-black uppercase tracking-widest text-outline">Internal Admin Notes</label>
                                            <textarea name="admin_notes" rows="2" placeholder="Session observations, follow-ups, specific parent requests..." class="bg-white border border-outline-variant/20 text-xs font-bold rounded-xl px-4 py-3 focus:ring-2 focus:ring-secondary transition-all resize-none">{{ $appointment->admin_notes }}</textarea>
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit" class="inline-flex items-center gap-2 bg-secondary text-white text-xs font-black px-6 py-2.5 rounded-xl hover:bg-secondary/90 transition-all shadow-lg shadow-secondary/20">
                                            <span class="material-symbols-outlined text-sm">save</span>
                                            Update Session Info
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-10 py-24 text-center">
                                <div class="flex flex-col items-center opacity-20">
                                    <span class="material-symbols-outlined text-8xl mb-4">calendar_today</span>
                                    <p class="text-xl font-black italic">No upcoming sessions found</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="px-10 py-8 border-t border-outline-variant/5 bg-surface-container-low/20">
                {{ $appointments->links() }}
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
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    .animate-fade-in { animation: fadeIn 1s ease-out forwards; }
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
