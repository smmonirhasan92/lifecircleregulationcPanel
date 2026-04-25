    </main>

    <footer class="bg-primary text-white py-16 px-8 border-t border-white/10">
        <div class="container mx-auto max-w-7xl">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="flex flex-col gap-6 md:col-span-1">
                    <div class="flex items-center gap-3">
                        <img alt="Logo" class="h-8 w-8 md:h-10 md:w-10 brightness-0 invert" src="assets/logo.png">
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
                    <ul class="flex flex-col gap-4 text-sm font-medium text-white/80">
                        <li><a class="hover:text-secondary-container transition-colors" href="index.php#about">About</a></li>
                        <li><a class="hover:text-secondary-container transition-colors" href="index.php#services">Services</a></li>
                        <li><a class="hover:text-secondary-container transition-colors" href="enroll.php">DMC Course</a></li>
                        <li><a class="hover:text-secondary-container transition-colors" href="appointment.php">Book Appointment</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xs uppercase tracking-[0.2em] font-bold text-white/40 mb-8">Information</h4>
                    <ul class="flex flex-col gap-4 text-sm font-medium text-white/80">
                        <li><a class="hover:text-secondary-container transition-colors" href="gallery.php">Gallery</a></li>
                        <li><a class="hover:text-secondary-container transition-colors" href="terms.php">Terms & Conditions</a></li>
                        <li><a class="hover:text-secondary-container transition-colors" href="privacy.php">Privacy Policy</a></li>
                        <li><a class="hover:text-secondary-container transition-colors" href="refund.php">Return Policy</a></li>
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
                        <a href="https://www.facebook.com/share/1DwyNugqj7/" target="_blank" class="flex items-center gap-3 text-white/60 hover:text-secondary-container transition-colors mt-2">
                            <svg class="w-5 h-5 md:w-6 md:h-6 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            <span class="font-bold">Follow Our Journey</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-white/40 text-xs uppercase tracking-widest">© <?php echo date('Y'); ?> Life Circle. All rights reserved.</p>
                <div class="text-[10px] text-white/30 uppercase tracking-tighter">No medication prescribed • Counseling support Only</div>
            </div>
        </div>
    </footer>

    <script>
        // Navigation Scroll Effect
        const topNav = document.getElementById('topNav');
        const handleNavScroll = () => {
            if (window.scrollY > 80) {
                topNav.classList.add('scrolled');
            } else {
                topNav.classList.remove('scrolled');
            }
        };
        window.addEventListener('scroll', handleNavScroll);
        window.addEventListener('load', handleNavScroll);

        // Scroll Reveal Effect
        const revealElements = document.querySelectorAll('.reveal');
        const revealOnScroll = () => {
            revealElements.forEach(el => {
                const rect = el.getBoundingClientRect();
                const windowHeight = window.innerHeight;
                if (rect.top < windowHeight * 0.9) {
                    el.classList.add('active');
                }
            });
        };
        window.addEventListener('scroll', revealOnScroll);
        window.addEventListener('load', revealOnScroll);
    </script>
</body>
</html>
