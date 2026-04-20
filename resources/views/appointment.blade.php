@extends('layouts.app')

@section('content')
<main class="min-h-screen pt-32 pb-24 px-6 bg-surface-container-low/30 relative overflow-hidden">
    <!-- Background Accents -->
    <div class="absolute top-0 left-0 -ml-20 -mt-20 w-80 h-80 bg-secondary/5 rounded-full blur-3xl -z-10"></div>
    <div class="absolute bottom-0 right-0 -mr-20 -mb-20 w-96 h-96 bg-primary/5 rounded-full blur-3xl -z-10"></div>

    <div class="max-w-7xl mx-auto">
        <!-- Premium Header -->
        <header class="max-w-3xl mb-16 animate-fade-in-up">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/10 text-secondary rounded-full text-[10px] font-black uppercase tracking-widest mb-6">
                <span class="material-symbols-outlined text-[10px]">event_available</span>
                Session Booking: Priority Access
            </div>
            <h1 class="text-4xl md:text-6xl font-black text-secondary leading-[1.1] md:-tracking-[0.03em] mb-6 font-bengali">
                আজই বুক করুন আপনার <span class="text-on-surface">বিশেষায়িত সেশন</span>।
            </h1>
            <p class="text-lg text-outline leading-relaxed max-w-2xl font-bengali">
                শারমিন মুজাহিদ ম্যামের বিশেষজ্ঞ গাইডেন্স ও সাপোর্টে আপনার সন্তানের সুন্দর ভবিষ্যৎ বিনির্মাণে প্রথম পদক্ষেপ নিন। আপনার সুবিধাজনক সময় নির্বাচন করুন।
            </p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <!-- Left Side: Trust & Steps -->
            <div class="lg:col-span-5 space-y-8 order-2 lg:order-1">
                
                <!-- Quick Info Card -->
                <div class="bg-white rounded-[2.5rem] p-8 md:p-10 whisper-shadow border border-outline-variant/10 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full -mr-16 -mt-16 blur-2xl group-hover:scale-150 transition-all duration-700"></div>
                    
                    <div class="relative z-10">
                        <h3 class="text-xl font-black text-secondary mb-6">অ্যাপয়েন্টমেন্ট গাইড</h3>
                        
                        <div class="space-y-6">
                            @foreach([
                                ['icon' => 'schedule', 'title' => 'সময় নির্বাচন', 'desc' => 'আপনার সুবিধাজনক তারিখ ও সময় বেছে নিন।'],
                                ['icon' => 'account_balance_wallet', 'title' => 'বুকিং ফি', 'desc' => 'ম্যামের সাথে নির্ধারিত ফি বিকাশে প্রদান করুন।'],
                                ['icon' => 'auto_awesome', 'title' => 'সেশন নিশ্চিত', 'desc' => 'পেমেন্ট ভেরিফিকেশনের পর আপনার সময় কনফার্ম করা হবে।']
                            ] as $step)
                            <div class="flex gap-4 items-start">
                                <div class="w-10 h-10 shrink-0 rounded-xl bg-secondary/5 text-secondary flex items-center justify-center">
                                    <span class="material-symbols-outlined text-xl">{{ $step['icon'] }}</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm text-on-surface">{{ $step['title'] }}</h4>
                                    <p class="text-xs text-outline leading-relaxed">{{ $step['desc'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Payment Reminder -->
                <div class="bg-secondary text-white p-8 rounded-[2.5rem] shadow-xl shadow-secondary/20 relative overflow-hidden">
                    <div class="relative z-10">
                        <p class="text-[10px] font-bold uppercase tracking-widest text-white/60 mb-2">Payment Details</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-3xl font-black font-manrope">01716437859</h4>
                                <p class="text-xs text-white/80 font-bengali mt-1">পার্সোনাল বিকাশ নম্বর (সেন্ড মানি)</p>
                            </div>
                            <div class="w-14 h-14 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center">
                                <span class="material-symbols-outlined text-3xl">payments</span>
                            </div>
                        </div>
                    </div>
                    <!-- Aesthetic Circle -->
                    <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
                </div>
            </div>

            <!-- Right Side: The Booking Form -->
            <div class="lg:col-span-7 order-1 lg:order-2">
                <div class="bg-white rounded-[2.5rem] p-8 md:p-14 whisper-shadow border border-outline-variant/10">
                    <form action="{{ route('appointment.store') }}" method="POST" id="appointmentForm" class="space-y-10">
                        @csrf
                        
                        <!-- Client Identification -->
                        <section class="space-y-6">
                            <h3 class="text-lg font-black text-secondary border-l-4 border-primary pl-4 font-bengali">আপনার পরিচয় (Identification)</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="relative group">
                                    <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10 transition-all group-focus-within:text-secondary">Full Name</label>
                                    <input name="full_name" value="{{ old('full_name') }}" class="w-full bg-white border-2 border-surface-container-high rounded-2xl px-6 py-4 focus:ring-0 focus:border-secondary transition-all font-bold placeholder:text-outline-variant/50 @error('full_name') !border-red-400 @enderror" placeholder="আব্দুল্লাহ আল মামুন" type="text" required>
                                    @error('full_name') <p class="text-red-500 text-[10px] mt-1 ml-2 font-bold">{{ $message }}</p> @enderror
                                </div>
                                <div class="relative group">
                                    <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10 transition-all group-focus-within:text-secondary">Email Address</label>
                                    <input name="email" value="{{ old('email') }}" class="w-full bg-white border-2 border-surface-container-high rounded-2xl px-6 py-4 focus:ring-0 focus:border-secondary transition-all font-bold placeholder:text-outline-variant/50 @error('email') !border-red-400 @enderror" placeholder="example@mail.com" type="email" required>
                                    @error('email') <p class="text-red-500 text-[10px] mt-1 ml-2 font-bold">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            
                            <div class="relative group">
                                <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10 transition-all group-focus-within:text-secondary">Dashboard Password</label>
                                <input name="password" class="w-full bg-white border-2 border-surface-container-high rounded-2xl pl-14 pr-6 py-4 focus:ring-0 focus:border-secondary transition-all font-bold placeholder:text-outline-variant/50 @error('password') !border-red-400 @enderror" placeholder="••••••••" type="password" required>
                                <div class="absolute left-6 top-1/2 -translate-y-1/2 text-outline-variant group-focus-within:text-secondary transition-all">
                                    <span class="material-symbols-outlined text-lg">lock_open</span>
                                </div>
                                <p class="text-[9px] text-outline italic mt-2 ml-2 font-bengali">*ভবিষ্যতে লগইন করার জন্য এটি প্রয়োজন হবে।</p>
                                @error('password') <p class="text-red-500 text-[10px] mt-1 ml-2 font-bold">{{ $message }}</p> @enderror
                            </div>
                        </section>

                        <!-- Session Details -->
                        <section class="space-y-6">
                            <h3 class="text-lg font-black text-secondary border-l-4 border-primary pl-4 font-bengali">সেশন ডিটেইলস (Session Matrix)</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="relative group">
                                    <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10 transition-all group-focus-within:text-secondary">WhatsApp Number</label>
                                    <input name="whatsapp" value="{{ old('whatsapp') }}" class="w-full bg-white border-2 border-surface-container-high rounded-2xl pl-14 pr-6 py-4 focus:ring-0 focus:border-secondary transition-all font-bold placeholder:text-outline-variant/50 @error('whatsapp') !border-red-400 @enderror" placeholder="017XXXXXXXX" type="tel" required>
                                    <div class="absolute left-6 top-1/2 -translate-y-1/2 text-outline-variant group-focus-within:text-secondary transition-all">
                                        <span class="material-symbols-outlined text-lg">call</span>
                                    </div>
                                    @error('whatsapp') <p class="text-red-500 text-[10px] mt-1 ml-2 font-bold">{{ $message }}</p> @enderror
                                </div>
                                <div class="relative group">
                                    <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10 transition-all group-focus-within:text-secondary">Service Provider</label>
                                    <div class="w-full bg-surface-container-low rounded-2xl px-6 py-4 flex items-center gap-3 border border-outline-variant/10">
                                        <div class="w-6 h-6 rounded-full bg-secondary/10 flex items-center justify-center text-secondary">
                                            <span class="material-symbols-outlined text-[14px]">psychology</span>
                                        </div>
                                        <span class="font-bold text-sm text-secondary">Sharmin Mujahid (Mam)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="relative group">
                                <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10 transition-all group-focus-within:text-secondary">Select Service</label>
                                <select name="service_type" class="w-full bg-white border-2 border-surface-container-high rounded-2xl px-6 py-4 focus:ring-0 focus:border-secondary transition-all font-bold font-bengali appearance-none @error('service_type') !border-red-400 @enderror" required>
                                    <option value="">নির্বাচন করুন</option>
                                    @foreach([
                                        'Developmental Screening & Basic Assessment' => 'Developmental Screening & Basic Assessment',
                                        'Parent Counseling & Guidance' => 'Parent Counseling & Guidance',
                                        'Behavior Management Support' => 'Behavior Management Support',
                                        'Home-based Training Plans' => 'Home-based Training Plans',
                                        'Early Intervention Support' => 'Early Intervention Support',
                                        'Individualized Support Plan (ISP)' => 'Individualized Support Plan (ISP)'
                                    ] as $value => $label)
                                        <option value="{{ $value }}" {{ old('service_type') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                <div class="absolute right-6 top-1/2 -translate-y-1/2 text-outline-variant pointer-events-none group-focus-within:text-secondary transition-all">
                                    <span class="material-symbols-outlined text-lg">expand_more</span>
                                </div>
                                @error('service_type') <p class="text-red-500 text-[10px] mt-1 ml-2 font-bold">{{ $message }}</p> @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                                <div class="relative group">
                                    <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10 transition-all group-focus-within:text-secondary">Appointment Date</label>
                                    <input name="appointment_date" value="{{ old('appointment_date') }}" class="w-full bg-white border-2 border-surface-container-high rounded-2xl px-6 py-4 focus:ring-0 focus:border-secondary transition-all font-bold placeholder:text-outline-variant/50 @error('appointment_date') !border-red-400 @enderror" type="date" required min="{{ date('Y-m-d') }}">
                                    @error('appointment_date') <p class="text-red-500 text-[10px] mt-1 ml-2 font-bold">{{ $message }}</p> @enderror
                                </div>
                                <div class="relative group">
                                    <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10 transition-all group-focus-within:text-secondary">Preferred Time (Optional)</label>
                                    <input name="appointment_time" value="{{ old('appointment_time') }}" class="w-full bg-white border-2 border-surface-container-high rounded-2xl px-6 py-4 focus:ring-0 focus:border-secondary transition-all font-bold placeholder:text-outline-variant/50" placeholder="যেমন: বিকেল ৪টা" type="text">
                                </div>
                            </div>

                            <div class="relative group mt-8">
                                <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10 transition-all group-focus-within:text-secondary">Payment Transaction ID</label>
                                <input name="transaction_id" value="{{ old('transaction_id') }}" class="w-full bg-surface-container-low rounded-2xl px-6 py-5 border-2 border-dashed border-secondary/20 focus:border-solid focus:border-secondary transition-all font-manrope font-bold text-lg text-secondary placeholder:opacity-30" placeholder="TRN123456" type="text" required>
                                @error('transaction_id') <p class="text-red-500 text-[10px] mt-1 ml-2 font-bold">{{ $message }}</p> @enderror
                            </div>
                        </section>

                        <!-- Submission -->
                        <section class="pt-6 space-y-8">
                            <div class="relative group">
                                <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10 transition-all group-focus-within:text-secondary">Additional Notes</label>
                                <textarea name="message" class="w-full bg-white border-2 border-surface-container-high rounded-2xl px-6 py-4 focus:ring-0 focus:border-secondary transition-all font-bold placeholder:text-outline-variant/30 font-bengali" placeholder="আপনার সমস্যা বা বুকিং সংক্রান্ত অন্য কোনো তথ্য আমাদের জানান..." rows="3">{{ old('message') }}</textarea>
                            </div>

                            <button type="submit" class="w-full bg-secondary text-white py-5 rounded-3xl font-black text-xl shadow-xl shadow-secondary/20 hover:shadow-secondary/40 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-4 group" id="submitBtn">
                                <span class="font-bengali">বুকিং সম্পন্ন করুন</span>
                                <span class="material-symbols-outlined transition-transform group-hover:translate-x-1">calendar_add_on</span>
                            </button>
                            
                            <div class="flex items-center justify-center gap-6">
                                <div class="flex items-center gap-1.5 text-[10px] text-outline font-black uppercase tracking-widest">
                                    <span class="material-symbols-outlined text-[14px]">encrypted</span> Secure
                                </div>
                                <div class="h-1 w-1 bg-outline-variant rounded-full"></div>
                                <div class="flex items-center gap-1.5 text-[10px] text-outline font-black uppercase tracking-widest">
                                    <span class="material-symbols-outlined text-[14px]">lock</span> Private
                                </div>
                            </div>
                        </section>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('styles')
<style>
    @font-face {
        font-family: 'BengaliHero';
        src: local('Hind Siliguri'), local('Noto Sans Bengali');
    }
    .font-bengali { font-family: 'BengaliHero', sans-serif; }
    
    /* Animation Stagger */
    section {
        animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }
    section:nth-child(1) { animation-delay: 0.1s; }
    section:nth-child(2) { animation-delay: 0.2s; }
    section:nth-child(3) { animation-delay: 0.3s; }

    @keyframes fadeInUp {
        from { transform: translateY(20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    input:focus + div, select:focus + div {
        color: theme('colors.secondary.DEFAULT') !important;
    }
</style>
@endpush
