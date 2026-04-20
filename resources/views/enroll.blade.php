@extends('layouts.app')

@section('content')
<main class="min-h-screen pt-32 pb-24 px-6 bg-surface-container-low/30 relative overflow-hidden">
    <!-- Abstract Background Elements -->
    <div class="absolute top-0 right-0 -mr-32 -mt-32 w-[600px] h-[600px] bg-primary/5 rounded-full blur-3xl -z-10"></div>
    <div class="absolute bottom-0 left-0 -ml-32 -mb-32 w-[600px] h-[600px] bg-secondary/5 rounded-full blur-3xl -z-10"></div>

    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <header class="max-w-3xl mb-16 animate-fade-in-up">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-primary/10 text-primary rounded-full text-[10px] font-black uppercase tracking-widest mb-6">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                </span>
                Registration Phase: Active
            </div>
            <h1 class="text-4xl md:text-6xl font-black text-primary leading-[1.1] md:-tracking-[0.03em] mb-6 font-bengali">
                নতুন সম্ভাবনার পথে <span class="text-on-surface">প্রথম পদক্ষেপ</span> নিন।
            </h1>
            <p class="text-lg text-outline leading-relaxed max-w-2xl font-bengali">
                শারমিন মুজাহিদ ম্যামের বিশেষজ্ঞ গাইডেন্সে আপনার বা আপনার সন্তানের উজ্জ্বল ভবিষ্যৎ বিনির্মাণে আমরা প্রতিশ্রুতিবদ্ধ। সহজ ৪টি ধাপে রেজিষ্ট্রেশন সম্পন্ন করুন।
            </p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <!-- Left Side: Trust & Value -->
            <div class="lg:col-span-5 space-y-8 order-2 lg:order-1">
                
                <!-- Pricing & Countdown Matrix -->
                <div class="bg-white rounded-[2.5rem] p-8 md:p-10 whisper-shadow border border-outline-variant/10 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-secondary/5 rounded-full -mr-16 -mt-16 blur-2xl group-hover:scale-150 transition-all duration-700"></div>
                    
                    <div class="relative z-10">
                        <div class="flex justify-between items-start mb-10">
                            <div>
                                <h3 class="text-xl font-black text-primary mb-1">কোর্স ফি ও অফার</h3>
                                <p class="text-xs text-outline font-bold uppercase tracking-widest">Pricing & Validity</p>
                            </div>
                            <div class="w-12 h-12 rounded-2xl bg-secondary/10 text-secondary flex items-center justify-center">
                                <span class="material-symbols-outlined">verified</span>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="p-6 rounded-3xl bg-surface-container-low border border-outline-variant/5">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-xs font-bold text-outline uppercase tracking-wider">Regular Admission</span>
                                    <span class="text-lg font-bold text-outline line-through opacity-50 font-manrope">৳৯,৯৯৯</span>
                                </div>
                                <div class="flex justify-between items-end">
                                    <div>
                                        <span class="bg-amber-100 text-amber-700 text-[9px] font-black px-2 py-0.5 rounded-full uppercase mb-1 inline-block">Special Early Bird</span>
                                        <h4 class="text-4xl font-black text-primary font-manrope tracking-tighter">৳৭,৯৯৯</h4>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-[10px] text-outline font-bold uppercase">Valid Until</p>
                                        <p class="text-xs font-black text-secondary">Deadline Ending</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Integrated Countdown -->
                            @if($early_bird_deadline)
                            <div id="countdown-card" class="flex justify-center gap-4 py-4 px-2 rounded-2xl bg-primary/5 hidden">
                                @foreach(['days' => 'D', 'hours' => 'H', 'minutes' => 'M', 'seconds' => 'S'] as $unit => $label)
                                <div class="flex flex-col items-center">
                                    <div class="w-12 h-12 rounded-xl bg-white whisper-shadow flex items-center justify-center text-xl font-black text-primary font-manrope" id="{{ $unit }}">00</div>
                                    <span class="text-[8px] font-black text-outline-variant mt-2 uppercase tracking-tighter">{{ $unit }}</span>
                                </div>
                                @if(!$loop->last) <div class="text-xl font-black text-primary/20 pt-2">:</div> @endif
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Step Visual -->
                <div class="bg-surface-container p-8 rounded-[2.5rem] space-y-6">
                    <h3 class="text-sm font-black text-primary uppercase tracking-widest mb-4">ভর্তির প্রক্রিয়া (Registration Steps)</h3>
                    <div class="space-y-6">
                        @foreach([
                            ['icon' => 'edit_note', 'title' => 'তথ্য প্রদান', 'desc' => 'নিচের ফর্মে সঠিক তথ্য দিয়ে পূরণ করুন।'],
                            ['icon' => 'payments', 'title' => 'ফি প্রদান', 'desc' => 'বিকাশে পেমেন্ট করে ট্রানজেকশন আইডি দিন।'],
                            ['icon' => 'task_alt', 'title' => 'নিশ্চিতকরণ', 'desc' => 'ম্যাম আপনার সাথে যোগাযোগ করে সময় দিবেন।']
                        ] as $step)
                        <div class="flex gap-4">
                            <div class="w-8 h-8 shrink-0 rounded-lg bg-white flex items-center justify-center text-primary whisper-shadow">
                                <span class="material-symbols-outlined text-lg">{{ $step['icon'] }}</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-sm text-on-surface">{{ $step['title'] }}</h4>
                                <p class="text-xs text-outline">{{ $step['desc'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Payment Reminder (Mobile Friendly) -->
                <div class="bg-primary text-white p-8 rounded-[2.5rem] shadow-xl shadow-primary/20 relative overflow-hidden">
                    <div class="relative z-10 flex items-center justify-between">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-widest text-primary-container/60 mb-1">bKash Payment</p>
                            <h4 class="text-2xl font-black font-manrope">01716437859</h4>
                            <p class="text-[10px] font-bold mt-1 text-primary-container/80 font-bengali">পার্সোনাল নম্বর - সেন্ড মানি করুন</p>
                        </div>
                        <span class="material-symbols-outlined text-4xl opacity-20">wallet</span>
                    </div>
                    <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-white/10 rounded-full blur-3xl"></div>
                </div>
            </div>

            <!-- Right Side: The Form -->
            <div class="lg:col-span-7 order-1 lg:order-2">
                <div class="bg-white rounded-[2.5rem] p-8 md:p-14 whisper-shadow border border-outline-variant/10 relative">
                    <div class="absolute top-10 right-10 hidden md:block">
                        <span class="bg-surface-container text-outline-variant px-3 py-1 rounded-full text-[9px] font-bold uppercase tracking-widest">Secured Form 2.0</span>
                    </div>

                    <form action="{{ route('enroll.store') }}" method="POST" id="enrollmentForm" class="space-y-10">
                        @csrf
                        
                        <!-- Group 1: Personal -->
                        <section class="space-y-6">
                            <h3 class="text-lg font-black text-primary border-l-4 border-secondary pl-4 font-bengali">ব্যক্তিগত তথ্য (Personal Data)</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="relative group">
                                    <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10 transition-all group-focus-within:text-primary">Full Name</label>
                                    <input name="full_name" value="{{ old('full_name') }}" class="w-full bg-white border-2 border-surface-container-high rounded-2xl px-6 py-4 focus:ring-0 focus:border-primary transition-all font-bold placeholder:text-outline-variant/50 @error('full_name') !border-red-400 @enderror" placeholder="যেমন: আব্দুল্লাহ আল মামুন" type="text" required>
                                    @error('full_name') <p class="text-red-500 text-[10px] mt-1 ml-2 font-bold">{{ $message }}</p> @enderror
                                </div>
                                <div class="relative group">
                                    <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10 transition-all group-focus-within:text-primary">Email Address</label>
                                    <input name="email" value="{{ old('email') }}" class="w-full bg-white border-2 border-surface-container-high rounded-2xl px-6 py-4 focus:ring-0 focus:border-primary transition-all font-bold placeholder:text-outline-variant/50 @error('email') !border-red-400 @enderror" placeholder="example@mail.com" type="email" required>
                                    @error('email') <p class="text-red-500 text-[10px] mt-1 ml-2 font-bold">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                                <div class="relative group">
                                    <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10 transition-all group-focus-within:text-primary">WhatsApp Number</label>
                                    <input name="whatsapp" value="{{ old('whatsapp') }}" class="w-full bg-white border-2 border-surface-container-high rounded-2xl pl-14 pr-6 py-4 focus:ring-0 focus:border-primary transition-all font-bold placeholder:text-outline-variant/50 @error('whatsapp') !border-red-400 @enderror" placeholder="017XXXXXXXX" type="tel" required>
                                    <div class="absolute left-6 top-1/2 -translate-y-1/2 text-outline-variant group-focus-within:text-primary transition-all">
                                        <span class="material-symbols-outlined text-lg">call</span>
                                    </div>
                                    @error('whatsapp') <p class="text-red-500 text-[10px] mt-1 ml-2 font-bold">{{ $message }}</p> @enderror
                                </div>
                                <div class="relative group">
                                    <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10 transition-all group-focus-within:text-primary">Account Password</label>
                                    <input name="password" class="w-full bg-white border-2 border-surface-container-high rounded-2xl pl-14 pr-6 py-4 focus:ring-0 focus:border-primary transition-all font-bold placeholder:text-outline-variant/50 @error('password') !border-red-400 @enderror" placeholder="••••••••" type="password" required>
                                    <div class="absolute left-6 top-1/2 -translate-y-1/2 text-outline-variant group-focus-within:text-primary transition-all">
                                        <span class="material-symbols-outlined text-lg">lock</span>
                                    </div>
                                    @error('password') <p class="text-red-500 text-[10px] mt-1 ml-2 font-bold">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </section>

                        <!-- Group 2: Program -->
                        <section class="space-y-6">
                            <h3 class="text-lg font-black text-primary border-l-4 border-secondary pl-4 font-bengali">প্রোগ্রাম এবং পেমেন্ট (Details)</h3>
                            <div class="relative group">
                                <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10 transition-all group-focus-within:text-primary">Service Type</label>
                                <select name="service_type" class="w-full bg-white border-2 border-surface-container-high rounded-2xl px-6 py-4 focus:ring-0 focus:border-primary transition-all font-bold font-bengali appearance-none @error('service_type') !border-red-400 @enderror" required>
                                    <option value="">নির্বাচন করুন</option>
                                    @foreach([
                                        'DMC Certificate Course' => 'Developmental Disorder Management Certificate (DMC)',
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
                                <div class="absolute right-6 top-1/2 -translate-y-1/2 text-outline-variant pointer-events-none group-focus-within:text-primary transition-all">
                                    <span class="material-symbols-outlined text-lg">expand_more</span>
                                </div>
                                @error('service_type') <p class="text-red-500 text-[10px] mt-1 ml-2 font-bold">{{ $message }}</p> @enderror
                            </div>

                            <div class="relative group mt-8">
                                <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10 transition-all group-focus-within:text-primary">bKash Transaction ID</label>
                                <input name="transaction_id" value="{{ old('transaction_id') }}" class="w-full bg-surface-container-high rounded-2xl px-6 py-5 border-2 border-dashed border-primary/20 focus:border-solid focus:border-primary transition-all font-manrope font-bold text-lg text-primary placeholder:opacity-30" placeholder="যেমন: TRN918237" type="text" required>
                                @error('transaction_id') <p class="text-red-500 text-[10px] mt-1 ml-2 font-bold">{{ $message }}</p> @enderror
                            </div>

                            <div class="relative group mt-8">
                                <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10 transition-all group-focus-within:text-primary">Additional Message (Optional)</label>
                                <textarea name="message" class="w-full bg-white border-2 border-surface-container-high rounded-2xl px-6 py-4 focus:ring-0 focus:border-primary transition-all font-bold placeholder:text-outline-variant/30" placeholder="আপনার সমস্যা বা লক্ষ্য সম্পর্কে কিছু বলুন..." rows="3">{{ old('message') }}</textarea>
                            </div>
                        </section>

                        <!-- Group 3: Submit -->
                        <section class="pt-6 space-y-6">
                            <div class="flex items-start gap-4 p-4 rounded-2xl bg-surface-container-low border border-outline-variant/10">
                                <div class="flex items-center h-5">
                                    <input name="disclaimer" id="disclaimer" class="w-6 h-6 rounded-lg border-2 border-outline-variant text-primary focus:ring-0 bg-white cursor-pointer transition-all hover:scale-110 checked:bg-primary" type="checkbox" required>
                                </div>
                                <label class="text-xs text-on-surface-variant font-bold leading-tight cursor-pointer font-bengali" for="disclaimer">
                                    লাইফ সার্কেল প্লাটফর্মের মাধ্যমে আমি আমার সন্তানের সম্ভাবনা বিকাশে এবং ম্যামের বিশেষায়িত গাইডেন্স প্রোগ্রামে অংশ নিতে সম্মত হচ্ছি।
                                </label>
                            </div>

                            <button type="submit" class="w-full bg-primary text-white py-5 rounded-3xl font-black text-xl shadow-xl shadow-primary/20 hover:shadow-primary/40 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-4 group" id="submitBtn">
                                <span class="font-bengali">রেজিষ্ট্রেশন সম্পন্ন করুন</span>
                                <span class="material-symbols-outlined transition-transform group-hover:translate-x-1">arrow_forward</span>
                            </button>
                            
                            <p class="text-center text-[10px] text-outline font-black uppercase tracking-widest">
                                <span class="text-secondary">Protected by SSL</span> • 256-Bit Encryption Active
                            </p>
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
        color: theme('colors.primary.DEFAULT') !important;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deadlineStr = "{{ $early_bird_deadline }}";
        if (!deadlineStr) return;

        const countdownDate = new Date(deadlineStr).getTime();
        const countdownCard = document.getElementById('countdown-card');
        
        const updateCountdown = () => {
            const now = new Date().getTime();
            const distance = countdownDate - now;

            if (distance < 0) {
                countdownCard.classList.add('hidden');
                clearInterval(interval);
                return;
            }

            countdownCard.classList.remove('hidden');

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            if(document.getElementById('days')) document.getElementById('days').innerText = days.toString().padStart(2, '0');
            if(document.getElementById('hours')) document.getElementById('hours').innerText = hours.toString().padStart(2, '0');
            if(document.getElementById('minutes')) document.getElementById('minutes').innerText = minutes.toString().padStart(2, '0');
            if(document.getElementById('seconds')) document.getElementById('seconds').innerText = seconds.toString().padStart(2, '0');
        };

        const interval = setInterval(updateCountdown, 1000);
        updateCountdown();
    });
</script>
@endpush
