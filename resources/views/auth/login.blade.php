@extends('layouts.app')

@section('content')
<main class="min-h-screen flex items-center justify-center pt-20 pb-12 px-6 bg-surface-container-low">
    <div class="max-w-md w-full animate-fade-in-up">
        <!-- Logo/Header Area -->
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-3xl bg-primary-container text-primary mb-6 shadow-xl shadow-primary/10">
                <span class="material-symbols-outlined text-4xl" style="font-variation-settings: 'FILL' 1;">face_6</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-primary -tracking-tight">সদস্য লগইন</h1>
            <p class="text-on-surface-variant mt-2 font-bold font-bengali">আপনার ড্যাশবোর্ড অ্যাক্সেস করতে লগইন করুন।</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-[2.5rem] p-10 whisper-shadow border border-outline-variant/10 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full -mr-16 -mt-16 blur-3xl"></div>
            
            <form action="{{ route('login') }}" method="POST" class="space-y-8 relative z-10">
                @csrf
                
                <div class="space-y-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-outline ml-1">হোয়াটসঅ্যাপ নম্বর (WhatsApp Number)</label>
                        <div class="relative group">
                            <input name="whatsapp_number" value="{{ old('whatsapp_number') }}" class="w-full bg-surface-container-high border-none rounded-2xl pl-12 pr-4 py-4 focus:ring-2 focus:ring-primary focus:bg-white transition-all @error('whatsapp_number') ring-2 ring-red-500 @enderror" placeholder="017XXXXXXXX" type="tel" required>
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">call</span>
                            </div>
                        </div>
                        @error('whatsapp_number') <p class="text-red-500 text-[10px] mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-outline ml-1">পাসওয়ার্ড (Password)</label>
                        <div class="relative group">
                            <input name="password" class="w-full bg-surface-container-high border-none rounded-2xl pl-12 pr-4 py-4 focus:ring-2 focus:ring-primary focus:bg-white transition-all @error('password') ring-2 ring-red-500 @enderror" placeholder="••••••••" type="password" required>
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">lock</span>
                            </div>
                        </div>
                        @error('password') <p class="text-red-500 text-[10px] mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between px-1">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input name="remember" class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary/20" type="checkbox">
                        <span class="text-xs font-bold text-outline group-hover:text-primary transition-colors">মনে রাখুন (Remember)</span>
                    </label>
                </div>

                <button type="submit" class="w-full bg-primary text-white py-4 rounded-2xl font-black text-lg shadow-xl shadow-primary/20 hover:shadow-primary/40 hover:-translate-y-1 transition-all duration-300">
                    লগইন করুন (Sign In)
                </button>
            </form>
        </div>

        <!-- Footer Link -->
        <div class="mt-8 text-center space-y-4">
            <p class="text-sm text-outline font-medium">
                নতুন সদস্য? <a href="{{ route('enroll') }}" class="text-primary font-black hover:underline">আজই ভর্তি হোন</a>
            </p>
            <div class="flex items-center justify-center gap-4 text-[10px] text-outline font-bold uppercase tracking-widest">
                <div class="h-[1px] w-12 bg-outline-variant/20"></div>
                <span>Secured by Life Circle</span>
                <div class="h-[1px] w-12 bg-outline-variant/20"></div>
            </div>
        </div>
    </div>
</main>
@endsection
