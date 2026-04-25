</main>

    <footer class="bg-primary text-white pt-32 pb-12 overflow-hidden relative">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-blush/30 to-transparent"></div>
        
        <div class="container mx-auto px-8 lg:px-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 mb-24">
                <!-- Brand Profile -->
                <div class="lg:col-span-1" data-aos="fade-up">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center p-2">
                            <img src="assets/logo.png" alt="Life Circle" class="w-full h-full object-contain">
                        </div>
                        <span class="text-2xl font-extrabold tracking-tighter font-manrope">LIFE CIRCLE</span>
                    </div>
                    <p class="text-secondary-container/60 leading-relaxed mb-8 font-medium">
                        Dedicated to providing a compassionate sanctuary for children with developmental challenges and their families.
                    </p>
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
