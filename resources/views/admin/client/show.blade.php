@extends('layouts.app')

@php
    $title = 'Client Profile | ' . ($client->full_name ?? 'N/A');
@endphp

@section('content')
<div class="flex min-h-screen bg-surface pt-20">
    <!-- Sidebar (Reuse standard) -->
    <nav class="w-64 bg-white border-r border-outline-variant/10 flex flex-col py-8 fixed h-full">
        <div class="px-6 mb-10">
            <h1 class="text-lg font-bold text-primary">Admin Portal</h1>
            <p class="text-xs text-outline font-normal">Management View</p>
        </div>
        <div class="flex-1 space-y-1">
            <a class="flex items-center gap-3 text-outline hover:bg-surface-container-low px-4 py-3 mx-2 rounded-lg transition-all font-bold" href="{{ route('admin.list') }}">
                <span class="material-symbols-outlined">group</span>
                <span>Enrollments</span>
            </a>
            <a class="flex items-center gap-3 text-outline hover:bg-surface-container-low px-4 py-3 mx-2 rounded-lg transition-all font-bold" href="{{ route('admin.appointments') }}">
                <span class="material-symbols-outlined">calendar_month</span>
                <span>Appointments</span>
            </a>
            <a class="flex items-center gap-3 bg-primary/5 text-primary rounded-lg mx-2 px-4 py-3 border-r-4 border-primary font-bold" href="{{ route('admin.clients') }}">
                <span class="material-symbols-outlined">contacts</span>
                <span>Clients Directory</span>
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="ml-64 flex-1 p-10">
        <header class="flex items-center gap-4 mb-10">
            <a href="{{ route('admin.clients') }}" class="w-10 h-10 rounded-full bg-white flex items-center justify-center hover:bg-surface-container transition shadow-sm">
                <span class="material-symbols-outlined text-outline">arrow_back</span>
            </a>
            <div>
                <h2 class="text-3xl font-extrabold text-primary tracking-tight">{{ $client->full_name }}</h2>
                <p class="text-on-surface-variant font-bold text-sm">{{ $client->whatsapp_number }} | {{ $client->email }}</p>
            </div>
        </header>

        @if (session('success'))
            <div class="mb-6 bg-emerald-100 text-emerald-800 p-4 rounded-lg flex items-center gap-2 animate-fade-in-up">
                <span class="material-symbols-outlined">check_circle</span>
                <span class="font-bold text-sm">{{ session('success') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <!-- Left: Stats & Quick Info -->
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-primary rounded-3xl p-8 text-white whisper-shadow">
                    <p class="text-white/60 text-xs font-bold uppercase tracking-widest mb-1">Total Interactions</p>
                    <h3 class="text-4xl font-black mb-6">{{ count($enrollments) + count($appointments) }}</h3>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between items-center py-2 border-b border-white/10">
                            <span class="text-xs font-medium text-white/70">Enrollments (Courses)</span>
                            <span class="font-bold">{{ count($enrollments) }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-white/10">
                            <span class="text-xs font-medium text-white/70">Appointments (Counseling)</span>
                            <span class="font-bold">{{ count($appointments) }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-8 whisper-shadow border border-outline-variant/10">
                    <h4 class="font-bold text-primary mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-secondary">contact_phone</span>
                        Contact Actions
                    </h4>
                    <div class="flex flex-col gap-3">
                        <a href="https://wa.me/{{ $client->whatsapp_number }}" target="_blank" class="w-full flex items-center justify-center gap-2 bg-emerald-600 text-white py-3 rounded-xl font-bold hover:bg-emerald-700 transition">
                            <span class="material-symbols-outlined text-sm">chat</span> WhatsApp Message
                        </a>
                        <a href="mailto:{{ $client->email }}" class="w-full flex items-center justify-center gap-2 bg-secondary text-white py-3 rounded-xl font-bold hover:brightness-110 transition">
                            <span class="material-symbols-outlined text-sm">mail</span> Send Email
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right: Detailed Lists -->
            <div class="lg:col-span-2 space-y-10">
                <!-- Enrollment Lifecycle Management -->
                <section>
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-extrabold text-primary flex items-center gap-2">
                            <span class="material-symbols-outlined text-secondary">school</span>
                            কোর্স এনরোলমেন্ট (Enrollment History)
                        </h3>
                    </div>
                    
                    <div class="space-y-6">
                        @forelse($enrollments as $enroll)
                        <div class="bg-white rounded-2xl p-8 whisper-shadow border border-outline-variant/10 relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-2 h-full {{ $enroll->status === 'completed' ? 'bg-emerald-500' : 'bg-amber-500' }}"></div>
                            
                            <div class="flex flex-col md:flex-row justify-between gap-6 mb-8">
                                <div>
                                    <h4 class="text-lg font-black text-primary">{{ $enroll->service_type }}</h4>
                                    <p class="text-xs text-outline font-bold mt-1">Status: <span class="capitalize">{{ $enroll->status }}</span></p>
                                </div>
                                <div class="text-right">
                                    <p class="text-[10px] font-bold text-outline uppercase tracking-widest">Enrolled Date</p>
                                    <p class="font-bold text-sm">{{ $enroll->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>

                            <form action="{{ route('admin.enrollments.details.update', $enroll->id) }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @csrf
                                <div class="space-y-4">
                                    <div>
                                        <label class="text-[10px] font-bold uppercase text-outline ml-1">Course Duration</label>
                                        <input type="text" name="course_duration" value="{{ $enroll->course_duration }}" placeholder="e.g. 3 Months" class="w-full bg-surface-container rounded-lg border-none px-4 py-2.5 text-sm font-bold focus:ring-2 focus:ring-primary">
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="text-[10px] font-bold uppercase text-outline ml-1">Start Date</label>
                                            <input type="date" name="start_date" value="{{ $enroll->start_date ? \Carbon\Carbon::parse($enroll->start_date)->format('Y-m-d') : '' }}" class="w-full bg-surface-container rounded-lg border-none px-4 py-2.5 text-xs font-bold">
                                        </div>
                                        <div>
                                            <label class="text-[10px] font-bold uppercase text-outline ml-1">End Date</label>
                                            <input type="date" name="end_date" value="{{ $enroll->end_date ? \Carbon\Carbon::parse($enroll->end_date)->format('Y-m-d') : '' }}" class="w-full bg-surface-container rounded-lg border-none px-4 py-2.5 text-xs font-bold">
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div>
                                        <label class="text-[10px] font-bold uppercase text-outline ml-1">Private Progress Notes</label>
                                        <textarea name="admin_notes" rows="3" placeholder="Maintain student history here..." class="w-full bg-surface-container rounded-lg border-none px-4 py-2 text-sm font-medium focus:ring-2 focus:ring-primary">{{ $enroll->admin_notes }}</textarea>
                                    </div>
                                    <button type="submit" class="w-full bg-primary text-white py-2.5 rounded-lg font-bold text-sm hover:brightness-110 transition shadow-sm">
                                        তথ্য আপডেট করুন (Update Details)
                                    </button>
                                </div>
                            </form>
                        </div>
                        @empty
                        <p class="text-outline italic text-sm">No enrollment records found.</p>
                        @endforelse
                    </div>
                </section>

                <hr class="border-outline-variant/10">

                <!-- Appointment History -->
                <section>
                    <h3 class="text-xl font-extrabold text-primary mb-6 flex items-center gap-2">
                        <span class="material-symbols-outlined text-secondary">calendar_month</span>
                        সেশন অ্যাপয়েন্টমেন্ট (Appointment History)
                    </h3>
                    <div class="space-y-3">
                        @forelse($appointments as $appt)
                        <div class="bg-white p-4 rounded-xl border border-outline-variant/10 flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center">
                                    <span class="material-symbols-outlined text-primary text-xl">psychology</span>
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-primary">{{ $appt->service_type }}</p>
                                    <p class="text-[10px] text-outline font-bold font-manrope">{{ $appt->appointment_date }} | {{ $appt->appointment_time }}</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase {{ $appt->status === 'completed' ? 'bg-emerald-100 text-emerald-700' : 'bg-surface-container-high text-outline' }}">
                                {{ $appt->status }}
                            </span>
                        </div>
                        @empty
                        <p class="text-outline italic text-sm">No appointment history found.</p>
                        @endforelse
                    </div>
                </section>
            </div>
        </div>
    </main>
</div>
@endsection

@push('styles')
<style>
    #topNav { background-color: white !important; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
</style>
@endpush
