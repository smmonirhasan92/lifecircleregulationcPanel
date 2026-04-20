<!-- Humanized Footer: Transparent, Reassuring, and Accessible -->
<footer class="bg-primary text-white py-16 px-8 border-t border-white/10">
    <div class="container mx-auto max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <div class="flex flex-col gap-6 md:col-span-1">
                <div class="flex items-center gap-3">
                    <img alt="Logo" class="h-8 w-8 md:h-10 md:w-10 brightness-0 invert" src="{{ asset('logo.png') }}">
                    <div class="flex flex-col">
                        <span class="text-lg md:text-xl font-black font-manrope leading-tight">LIFE CIRCLE</span>
                        <span class="text-[8px] md:text-[10px] text-white/50 tracking-widest uppercase">Reg: C-204398</span>
                    </div>
                </div>
                <p class="text-white/60 text-xs md:text-sm leading-relaxed max-w-xs">
                    Empowering children and families through counseling excellence and heart-led developmental guidance. Developmental Support Counselor.
                </p>
            </div>
            <div>
                <h4 class="text-xs uppercase tracking-[0.2em] font-bold text-white/40 mb-8">Navigation</h4>
                    <li><a class="hover:text-secondary-container transition-colors" href="{{ route('home') }}#about">About</a></li>
                    <li><a class="hover:text-secondary-container transition-colors" href="{{ route('home') }}#services">Services</a></li>
                    <li><a class="hover:text-secondary-container transition-colors" href="{{ route('enroll') }}">DMC Course</a></li>
                    <li><a class="hover:text-secondary-container transition-colors" href="{{ route('appointment') }}">Book Appointment</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-xs uppercase tracking-[0.2em] font-bold text-white/40 mb-8">Information</h4>
                <ul class="flex flex-col gap-4 text-sm font-medium text-white/80">
                    <li><a class="hover:text-secondary-container transition-colors" href="{{ route('gallery') }}">Gallery</a></li>
                    <li><a class="hover:text-secondary-container transition-colors" href="{{ route('terms') }}">Terms & Conditions</a></li>
                    <li><a class="hover:text-secondary-container transition-colors" href="{{ route('privacy') }}">Privacy Policy</a></li>
                    <li><a class="hover:text-secondary-container transition-colors" href="{{ route('refund') }}">Return Policy</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-xs uppercase tracking-[0.2em] font-bold text-white/40 mb-8">Official Connect</h4>
                <div class="flex flex-col gap-4 text-xs md:text-sm">
                    <p class="text-white/60 flex items-center gap-3">
                        <span class="material-symbols-outlined text-secondary-container text-lg md:text-2xl">location_on</span> Dhaka, Bangladesh
                    </p>
                    <p class="text-white/60 flex items-center gap-3">
                        <span class="material-symbols-outlined text-secondary-container text-lg md:text-2xl">mail</span> lifecircle835@gmail.com
                    </p>
                    <p class="text-white/60 flex items-center gap-3">
                        <span class="material-symbols-outlined text-secondary-container text-lg md:text-2xl">call</span> +880 1716 437859
                    </p>
                </div>
            </div>
        </div>
        <div class="pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-white/40 text-xs uppercase tracking-widest">© {{ date('Y') }} Life Circle. All rights reserved.</p>
            <div class="text-[10px] text-white/30 uppercase tracking-tighter">No medication prescribed • Counseling support Only</div>
        </div>
    </div>
</footer>
