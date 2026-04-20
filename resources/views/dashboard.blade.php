@extends('layouts.app')

@php
    $title = 'আমার ড্যাশবোর্ড | ' . Auth::user()->name;
@endphp

@section('content')
<main class="min-h-screen pt-24 md:pt-32 pb-20 px-4 md:px-8">
    <div class="max-w-6xl mx-auto">
        <!-- Dashboard Header -->
        <header class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-12">
            <div>
                <h1 class="text-3xl md:text-5xl font-black text-primary -tracking-tight animate-fade-in-up">
                    স্বাগতম, <span class="text-secondary">{{ Auth::user()->name }}</span>
                </h1>
                <p class="text-on-surface-variant mt-2 font-bold font-bengali">আপনার ব্যক্তিগত উন্নয়ন পোর্টাল ও কোর্স হিস্ট্রি।</p>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2 bg-white px-6 py-3 rounded-full whisper-shadow text-primary font-bold hover:bg-surface-container transition-all">
                    <span class="material-symbols-outlined text-sm">home</span> Home
                </a>
            </div>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            <!-- Left Side: User Stats & Info -->
            <div class="lg:col-span-4 space-y-8">
                <div class="bg-gradient-to-br from-primary to-primary-dark p-8 rounded-3xl text-white whisper-shadow relative overflow-hidden group">
                    <div class="absolute -right-8 -bottom-8 w-40 h-40 bg-secondary/20 rounded-full blur-3xl group-hover:scale-125 transition-transform duration-700"></div>
                    <p class="text-white/60 text-[10px] font-bold uppercase tracking-widest mb-1">Your Total Progress</p>
                    <h3 class="text-4xl font-black mb-6">{{ count($enrollments) + count($appointments) }} <span class="text-lg font-normal opacity-70">Records</span></h3>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between items-center py-2 border-b border-white/10">
                            <span class="text-xs font-medium text-white/70">একাডেমিক কোর্স</span>
                            <span class="font-bold">{{ count($enrollments) }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-white/10">
                            <span class="text-xs font-medium text-white/70">সেশন অ্যাপয়েন্টমেন্ট</span>
                            <span class="font-bold">{{ count($appointments) }}</span>
                        </div>
                    </div>
                </div>

                <!-- Password/Settings Quick Link -->
                <div class="bg-white p-8 rounded-3xl whisper-shadow border border-outline-variant/10">
                    <h4 class="font-black text-primary mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-secondary">security</span>
                        Profile Security
                    </h4>
                    <p class="text-xs text-on-surface-variant mb-6 leading-relaxed">আপনার ড্যাশবোর্ড পাসওয়ার্ড পরিবর্তন করে অ্যাকাউন্ট সুরক্ষিত রাখুন।</p>
                    <a href="{{ route('user.settings') }}" class="w-full flex items-center justify-center gap-2 bg-surface-container text-primary py-3 rounded-xl font-bold hover:bg-surface-container-high transition-all">
                         Change Password
                    </a>
                </div>
            </div>

            <!-- Right Side: Details Feed -->
            <div class="lg:col-span-8 space-y-10">
                <!-- Enrolled Courses -->
                <section>
                    <h3 class="text-2xl font-black text-primary mb-6 flex items-center gap-3">
                        <span class="material-symbols-outlined text-secondary">school</span>
                        আমার এনরোলমেন্ট (My Courses)
                    </h3>

                    @forelse($enrollments as $enroll)
                    <div class="bg-white rounded-3xl p-8 whisper-shadow border border-outline-variant/10 mb-6 relative overflow-hidden group">
                        <div class="absolute top-0 left-0 w-2 h-full {{ $enroll->status === 'completed' ? 'bg-emerald-500' : 'bg-secondary' }}"></div>
                        
                        <div class="flex flex-col md:flex-row justify-between items-start gap-6 border-b border-surface-container pb-6 mb-6">
                            <div>
                                <span class="text-[10px] uppercase font-black text-secondary tracking-widest mb-1 block">Course Status</span>
                                <h4 class="text-xl font-black text-primary">{{ $enroll->service_type }}</h4>
                                <div class="mt-2 flex items-center gap-3">
                                    <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase {{ $enroll->status === 'completed' ? 'bg-emerald-100 text-emerald-700' : 'bg-secondary/10 text-secondary' }}">
                                        {{ $enroll->status }}
                                    </span>
                                    <span class="text-xs text-outline font-bold flex items-center gap-1">
                                        <span class="material-symbols-outlined text-sm">calendar_month</span>
                                        {{ $enroll->created_at->format('M d, Y') }}
                                    </span>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-[9px] font-bold text-outline uppercase tracking-widest mb-1">Transaction ID</p>
                                <p class="font-manrope font-black text-primary text-sm">{{ $enroll->transaction_id }}</p>
                            </div>
                        </div>

                        <!-- Course Timeline/Duration (The requested separation) -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-4">
                                <h5 class="text-xs font-black text-outline uppercase tracking-widest flex items-center gap-2">
                                    <span class="material-symbols-outlined text-sm">schedule</span>
                                    Course Details
                                </h5>
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between bg-surface-container px-4 py-2 rounded-lg">
                                        <span class="text-[10px] font-bold text-on-surface-variant">কোর্স সময়সীমা:</span>
                                        <span class="font-bold text-xs text-primary">{{ $enroll->course_duration ?? 'Processing...' }}</span>
                                    </div>
                                    <div class="grid grid-cols-2 gap-3">
                                        <div class="bg-surface-container px-4 py-2 rounded-lg">
                                            <p class="text-[8px] font-bold text-outline uppercase">Start Date</p>
                                            <p class="font-bold text-xs">{{ $enroll->start_date ?? 'TBA' }}</p>
                                        </div>
                                        <div class="bg-surface-container px-4 py-2 rounded-lg">
                                            <p class="text-[8px] font-bold text-outline uppercase">End Date</p>
                                            <p class="font-bold text-xs">{{ $enroll->end_date ?? 'TBA' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <h5 class="text-xs font-black text-outline uppercase tracking-widest flex items-center gap-2">
                                    <span class="material-symbols-outlined text-sm">clinical_notes</span>
                                    Counselor Notes
                                </h5>
                                <div class="bg-surface-container p-4 rounded-xl min-h-[80px]">
                                    <p class="text-xs text-on-surface-variant leading-loose font-medium italic">
                                        {{ $enroll->admin_notes ?? 'আপনার কোর্সের অগ্রগতি সম্পর্কে ম্যামের নির্দেশাবলী এখানে দেখা যাবে।' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="bg-surface-container-low border-2 border-dashed border-outline-variant/20 rounded-3xl p-12 text-center">
                        <span class="material-symbols-outlined text-5xl text-outline/30 mb-4">school</span>
                        <p class="text-outline font-bold">আপনি এখনো কোনো কোর্সে এনরোল করেননি।</p>
                    </div>
                    @endforelse
                </section>

                <hr class="border-outline-variant/10">

                <!-- Appointment Feed -->
                <section>
                    <h3 class="text-2xl font-black text-primary mb-6 flex items-center gap-3">
                        <span class="material-symbols-outlined text-secondary">psychology</span>
                        আমার অ্যাপয়েন্টমেন্ট (Appointments)
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @forelse($appointments as $appt)
                        <div class="bg-white rounded-2xl p-6 whisper-shadow border border-outline-variant/10 flex flex-col justify-between">
                            <div class="mb-4">
                                <span class="px-2 py-0.5 bg-surface-container-high rounded text-[8px] font-black uppercase text-outline mb-2 block w-fit">
                                    {{ $appt->status }}
                                </span>
                                <h4 class="font-black text-primary text-sm leading-tight mb-2">{{ $appt->service_type }}</h4>
                                <div class="flex items-center gap-2 text-xs font-bold text-on-surface-variant">
                                    <span class="material-symbols-outlined text-sm">event</span>
                                    {{ $appt->appointment_date }}
                                </div>
                                <div class="flex items-center gap-2 text-xs font-bold text-on-surface-variant mt-1">
                                    <span class="material-symbols-outlined text-sm">schedule</span>
                                    {{ $appt->appointment_time ?? 'TBA' }}
                                </div>
                            </div>
                            <div class="flex items-center justify-between pt-4 border-t border-surface-container">
                                <span class="text-[10px] font-black text-outline">৳{{ number_format($appt->payment_amount, 0) }}</span>
                                <a href="https://wa.me/8801716437859" class="text-emerald-600 hover:text-emerald-700 transition">
                                    <span class="material-symbols-outlined text-lg">chat</span>
                                </a>
                            </div>
                        </div>
                        @empty
                        <div class="col-span-full py-10 text-center text-outline italic text-sm">
                            আপনি এখনো কোনো সেশনের জন্য বুকিং করেননি।
                        </div>
                        @endforelse
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>
@endsection
