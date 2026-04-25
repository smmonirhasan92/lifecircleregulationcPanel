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
                    <div class="flex gap-4">
                        <a href="https://www.facebook.com/share/1DwyNugqj7/" target="_blank" class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-blush hover:border-blush transition-all">
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="mailto:lifecircle835@gmail.com" class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-blush hover:border-blush transition-all">
                            <span class="material-symbols-outlined text-white">mail</span>
                        </a>
                    </div>
                </div>

                <!-- Navigation -->
                <div data-aos="fade-up" data-aos-delay="100">
                    <h4 class="text-lg font-bold mb-8 text-blush font-manrope uppercase tracking-widest">Navigation</h4>
                    <ul class="space-y-4 text-secondary-container/70">
                        <li><a href="index.php" class="hover:text-white transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-blush"></span> Home</a></li>
                        <li><a href="about.php" class="hover:text-white transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-blush"></span> Our Story</a></li>
                        <li><a href="services.php" class="hover:text-white transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-blush"></span> Expertise</a></li>
                        <li><a href="gallery.php" class="hover:text-white transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-blush"></span> Gallery</a></li>
                    </ul>
                </div>

                <!-- Legal -->
                <div data-aos="fade-up" data-aos-delay="200">
                    <h4 class="text-lg font-bold mb-8 text-blush font-manrope uppercase tracking-widest">Information</h4>
                    <ul class="space-y-4 text-secondary-container/70">
                        <li><a href="terms.php" class="hover:text-white transition-colors">Terms & Conditions</a></li>
                        <li><a href="privacy.php" class="hover:text-white transition-colors">Privacy Policy</a></li>
                        <li><a href="refund.php" class="hover:text-white transition-colors">Return Policy</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div data-aos="fade-up" data-aos-delay="300">
                    <h4 class="text-lg font-bold mb-8 text-blush font-manrope uppercase tracking-widest">Reach Out</h4>
                    <div class="space-y-6">
                        <a href="https://wa.me/8801716437859" class="flex items-center gap-4 group">
                            <div class="w-12 h-12 bg-white/5 rounded-xl flex items-center justify-center group-hover:bg-blush transition-all">
                                <span class="material-symbols-outlined text-white">call</span>
                            </div>
                            <span class="text-secondary-container/80 font-bold tracking-wide">+880 1716-437859</span>
                        </a>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/5 rounded-xl flex items-center justify-center">
                                <span class="material-symbols-outlined text-white">location_on</span>
                            </div>
                            <span class="text-secondary-container/80 text-sm leading-relaxed">Dhaka, Bangladesh</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="pt-12 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6 text-center md:text-left">
                <p class="text-secondary-container/40 text-sm font-medium">
                    &copy; <?php echo date('Y'); ?> Life Circle Regulation. All rights reserved.
                </p>
                <div class="flex items-center gap-8 text-[10px] font-bold uppercase tracking-widest text-secondary-container/40">
                    <span>Reg: C-204398</span>
                    <span>No medication prescribed • Counseling support Only</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100,
            easing: 'cubic-bezier(0.4, 0, 0.2, 1)'
        });

        // Initialize Swipers
        const servicesSwiper = new Swiper('.servicesSwiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: { delay: 4000 },
            pagination: { el: '.swiper-pagination', clickable: true },
            navigation: { nextEl: '.swiper-next', prevEl: '.swiper-prev' },
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            }
        });

        const socialSwiper = new Swiper('.socialSwiper', {
            slidesPerView: 'auto',
            spaceBetween: 30,
            loop: true,
            autoplay: { delay: 6000 }
        });

        const reviewsSwiper = new Swiper('.reviewsSwiper', {
            slidesPerView: 1,
            spaceBetween: 40,
            centeredSlides: false,
            loop: true,
            autoplay: { delay: 5000 },
            navigation: {
                nextEl: '.swiper-next-reviews',
                prevEl: '.swiper-prev-reviews',
            },
            breakpoints: {
                768: { slidesPerView: 1 }
            }
        });

        // Counter Animation
        const counters = document.querySelectorAll('.counter');
        const counterOptions = { threshold: 1, rootMargin: "0px 0px -100px 0px" };
        
        const counterObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = entry.target;
                    const countTo = parseInt(target.getAttribute('data-target'));
                    let count = 0;
                    const speed = 2000;
                    const increment = countTo / (speed / 16);
                    
                    const updateCount = () => {
                        count += increment;
                        if (count < countTo) {
                            target.innerText = Math.ceil(count).toLocaleString();
                            requestAnimationFrame(updateCount);
                        } else {
                            target.innerText = countTo.toLocaleString();
                        }
                    };
                    updateCount();
                    observer.unobserve(target);
                }
            });
        }, counterOptions);

        counters.forEach(counter => counterObserver.observe(counter));

        // Modal Logic
        function openModal(type) {
            const modal = document.getElementById('actionModal');
            if (!modal) return;
            
            const title = document.getElementById('modalTitle');
            const icon = document.getElementById('modalIcon');
            const desc = document.getElementById('modalDesc');
            const dateField = document.getElementById('dateField');
            const form = document.getElementById('modalForm');

            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.firstElementChild.classList.remove('modal-enter');
            }, 10);

            if (type === 'appointment') {
                title.innerText = 'Book Appointment';
                icon.innerText = 'event_available';
                desc.innerText = 'Schedule a professional counseling session.';
                dateField.classList.remove('hidden');
            } else {
                title.innerText = 'Enroll in Program';
                icon.innerText = 'school';
                desc.innerText = 'Join our developmental support programs.';
                dateField.classList.add('hidden');
            }
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('actionModal');
            if (!modal) return;
            modal.firstElementChild.classList.add('modal-enter');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }

        window.onclick = function(event) {
            const modal = document.getElementById('actionModal');
            if (event.target == modal) closeModal();
        }

        // Nav Scroll Effect
        window.onscroll = function() {
            const nav = document.getElementById('topNav');
            if (window.pageYOffset > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        };
    </script>
</body>
</html>
