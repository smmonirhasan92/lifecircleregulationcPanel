<?php 
require_once 'includes/header.php'; 
$early_bird_deadline = get_setting('early_bird_deadline');
?>

<!-- Hero Section -->
<section class="relative min-h-[90vh] flex items-center overflow-hidden bg-primary-container/30">
    <div class="container mx-auto px-8 lg:px-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            <!-- Text Content -->
            <div class="animate-fade-in-up">
                <div class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-primary/5 text-primary border border-primary/10 mb-8 backdrop-blur-sm">
                    <span class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-primary"></span>
                    </span>
                    <span class="text-sm font-semibold tracking-wide uppercase font-manrope">Verified Developmental Support Counselor</span>
                </div>
                <h1 class="text-6xl lg:text-8xl font-extrabold text-primary leading-[1.1] mb-8 font-manrope">
                    LIFE <span class="text-blush">CIRCLE</span>
                </h1>
                <p class="text-xl text-on-surface-variant/80 mb-12 max-w-xl leading-relaxed">
                    With <span class="font-bold text-primary">15 years in the Disability Sector</span> and <span class="font-bold text-primary">5 years in Counseling</span>, we provide a compassionate sanctuary for children and families.
                </p>
                <div class="flex flex-wrap gap-5">
                    <button onclick="openModal('appointment')" class="btn-interact px-10 py-5 bg-primary text-white rounded-2xl font-bold text-lg shadow-premium flex items-center gap-3">
                        Book Appointment
                        <span class="material-symbols-outlined text-xl">calendar_month</span>
                    </button>
                    <button onclick="openModal('enroll')" class="btn-interact px-10 py-5 bg-secondary text-white rounded-2xl font-bold text-lg shadow-premium">
                        Enroll Now
                    </button>
                </div>
                
                <!-- Refined Stats -->
                <div class="mt-16 grid grid-cols-3 gap-12 pt-10 border-t border-primary/5 max-w-lg">
                    <div>
                        <div class="text-3xl font-extrabold text-primary mb-1"><span class="counter" data-target="15">0</span>+</div>
                        <div class="text-[10px] text-on-surface-variant/40 font-black uppercase tracking-[0.2em]">Years</div>
                    </div>
                    <div>
                        <div class="text-3xl font-extrabold text-primary mb-1"><span class="counter" data-target="5200">0</span>+</div>
                        <div class="text-[10px] text-on-surface-variant/40 font-black uppercase tracking-[0.2em]">Families</div>
                    </div>
                    <div>
                        <div class="text-3xl font-extrabold text-primary mb-1"><span class="counter" data-target="100">0</span>+</div>
                        <div class="text-[10px] text-on-surface-variant/40 font-black uppercase tracking-[0.2em]">Programs</div>
                    </div>
                </div>
            </div>

            <!-- Image Section -->
            <div class="relative flex justify-center lg:justify-end animate-fade-in-right">
                <div class="absolute -top-10 -right-10 w-96 h-96 bg-primary/5 rounded-full blur-3xl animate-pulse"></div>
                <div class="relative w-full max-w-md bg-white p-5 rounded-[3rem] shadow-premium transform rotate-2 hover:rotate-0 transition-all duration-700">
                    <div class="rounded-[2.5rem] overflow-hidden aspect-[4/5] bg-surface-container relative group">
                        <img alt="Sharmin Mujahid professional" class="w-full h-full object-cover object-top transition-transform duration-1000 group-hover:scale-105" src="assets/sarmin--1.png">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                </div>
                <!-- Float Badge -->
                <div class="absolute -bottom-10 -left-10 bg-white/80 backdrop-blur-xl p-8 rounded-[2.5rem] shadow-premium max-w-[300px] border border-white/50 animate-bounce-slow">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 bg-blush/20 rounded-2xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-blush text-3xl font-bold">psychology_alt</span>
                        </div>
                        <div>
                            <div class="font-extrabold text-primary text-xl">Sharmin Mujahid</div>
                            <div class="text-xs font-bold text-on-surface-variant/60 uppercase tracking-widest">Lead Counselor</div>
                        </div>
                    </div>
                    <p class="text-sm italic text-on-surface-variant/80 font-medium leading-relaxed">
                        "Dedicated to transforming lives through holistic emotional and behavioral support."
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Impact -->
<section class="py-32 bg-surface-container-low" id="gallery">
    <div class="container mx-auto px-8 lg:px-16">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
            <div class="max-w-2xl text-left">
                <span class="text-secondary font-bold tracking-[0.2em] uppercase text-sm">Visual Journey</span>
                <h2 class="text-4xl md:text-5xl font-extrabold text-primary mt-4 mb-4">Our Impact</h2>
                <p class="text-on-surface-variant text-lg">Witness the moments of transformation and the community that makes Life Circle a sanctuary for growth.</p>
            </div>
            <a href="gallery.php" class="bg-white text-secondary px-8 py-4 rounded-full font-bold border border-secondary/20 shadow-whisper hover:bg-secondary/5 transition-all flex items-center gap-2">
                View Full Gallery <span class="material-symbols-outlined">arrow_forward</span>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="group relative overflow-hidden rounded-[2.5rem] shadow-whisper hover:shadow-premium transition-all duration-700 aspect-[4/3]">
                <img src="assets/gallery/community-impact.jpg" alt="Community Impact" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-1000">
                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-10">
                    <p class="text-white font-bold text-xl leading-tight">Community Awareness & Support</p>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-[2.5rem] shadow-whisper hover:shadow-premium transition-all duration-700 aspect-[4/3]">
                <img src="assets/gallery/dmc-success.jpg" alt="DMC Success" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-1000">
                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-10">
                    <p class="text-white font-bold text-xl leading-tight">DMC Course Graduates</p>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-[2.5rem] shadow-whisper hover:shadow-premium transition-all duration-700 aspect-[4/3]">
                <img src="assets/gallery/teacher-training.jpg" alt="Teacher Training" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-1000">
                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-10">
                    <p class="text-white font-bold text-xl leading-tight">Professional Training Sessions</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: How It Works -->
<section id="process" class="py-32 bg-white relative overflow-hidden">
    <div class="container mx-auto px-8 lg:px-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
            <!-- Left: Visual Guide -->
            <div class="lg:col-span-5" data-aos="fade-right">
                <div class="relative group">
                    <div class="absolute -inset-4 bg-secondary/5 rounded-[3rem] blur-2xl group-hover:bg-secondary/10 transition-all"></div>
                    <div class="relative rounded-[2.5rem] overflow-hidden shadow-2xl border-8 border-white transform -rotate-2 hover:rotate-0 transition-all duration-700">
                        <img src="assets/howtouse.jpeg" class="w-full h-auto max-h-[550px] object-contain bg-surface" alt="Parent Training Guide">
                    </div>
                    <!-- Decorative Badge -->
                    <div class="absolute -bottom-6 -right-6 bg-secondary text-white p-6 rounded-3xl shadow-xl animate-bounce-slow hidden md:block">
                        <span class="material-symbols-outlined text-3xl">lightbulb</span>
                    </div>
                </div>
            </div>

            <!-- Right: Steps -->
            <div class="lg:col-span-7 space-y-12" data-aos="fade-left">
                <div>
                    <span class="text-secondary font-black tracking-[0.3em] uppercase text-xs mb-4 block">Our Methodology</span>
                    <h2 class="text-4xl lg:text-5xl font-extrabold text-primary mb-6 font-manrope leading-tight">How We <span class="text-blush">Empower</span> Your Family</h2>
                    <p class="text-on-surface-variant/70 text-lg leading-relaxed max-w-xl">
                        Our approach combines professional expertise with deep empathy to create a clear roadmap for your child's growth.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="p-8 rounded-[2rem] bg-primary-container/20 border border-primary/5 hover:bg-white hover:shadow-premium transition-all duration-500 group">
                        <div class="w-12 h-12 rounded-2xl bg-white shadow-sm flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition-all">
                            <span class="material-symbols-outlined">contact_support</span>
                        </div>
                        <h4 class="font-black text-primary mb-3 uppercase tracking-tight text-sm">1. Initial Connection</h4>
                        <p class="text-xs text-on-surface-variant/80 leading-relaxed">Book an assessment or counseling session through our simple online form or WhatsApp.</p>
                    </div>

                    <div class="p-8 rounded-[2rem] bg-secondary-container/20 border border-secondary/5 hover:bg-white hover:shadow-premium transition-all duration-500 group">
                        <div class="w-12 h-12 rounded-2xl bg-white shadow-sm flex items-center justify-center text-secondary mb-6 group-hover:bg-secondary group-hover:text-white transition-all">
                            <span class="material-symbols-outlined">analytics</span>
                        </div>
                        <h4 class="font-black text-primary mb-3 uppercase tracking-tight text-sm">2. Professional Evaluation</h4>
                        <p class="text-xs text-on-surface-variant/80 leading-relaxed">A deep dive into your child's needs or your emotional journey with Sharmin Mujahid.</p>
                    </div>

                    <div class="p-8 rounded-[2rem] bg-primary-container/20 border border-primary/5 hover:bg-white hover:shadow-premium transition-all duration-500 group md:col-span-2">
                        <div class="flex items-center gap-6">
                            <div class="w-12 h-12 rounded-2xl bg-white shadow-sm flex items-center justify-center text-primary shrink-0 group-hover:bg-primary group-hover:text-white transition-all">
                                <span class="material-symbols-outlined">trending_up</span>
                            </div>
                            <div>
                                <h4 class="font-black text-primary mb-1 uppercase tracking-tight text-sm">3. Ongoing Growth & Support</h4>
                                <p class="text-xs text-on-surface-variant/80 leading-relaxed">Receive personalized support plans, home training, and continuous guidance for lasting impact.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-6 pt-4">
                    <button onclick="openModal('appointment')" class="btn-interact px-8 py-4 bg-primary text-white rounded-2xl font-bold shadow-premium">
                        Book Your First Session
                    </button>
                    <a href="services.php" class="text-primary font-bold hover:text-secondary transition-colors flex items-center gap-2">
                        Explore Services <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: Professional Journey (About) -->
<section class="py-32 bg-surface relative overflow-hidden" id="about">
    <div class="absolute -right-20 top-1/2 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>
    <div class="container mx-auto px-8 lg:px-16 grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
        <!-- Left: Text Content -->
        <div data-aos="fade-right">
            <span class="text-secondary font-black tracking-[0.3em] uppercase text-xs mb-6 block">Professional Expertise</span>
            <h2 class="text-4xl lg:text-6xl font-extrabold text-primary mb-10 font-manrope leading-tight">
                Compassion Meets <span class="text-blush">Experience</span>
            </h2>
            <div class="space-y-8 text-on-surface-variant/80 text-lg leading-relaxed">
                <p>
                    I am a Developmental Support Counselor dedicated to supporting children with developmental challenges and their families. I have practical experience working with children with developmental delays, autism, speech and behavioral difficulties.
                </p>
                <p>
                    I focus on providing structured developmental support, parent guidance, and practical strategies that can be applied in daily life. My goal is to help each child reach their fullest potential in a supportive and understanding environment.
                </p>
                <div class="pt-4">
                    <a href="about.php" class="text-primary font-bold hover:text-secondary transition-all flex items-center gap-3 group">
                        Read More About My Story
                        <span class="material-symbols-outlined group-hover:translate-x-2 transition-transform">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Right: Image -->
        <div class="relative group flex justify-center lg:justify-end" data-aos="fade-left">
            <div class="rounded-[4rem] overflow-hidden aspect-square max-w-md shadow-premium relative z-10 border-[16px] border-white transform rotate-3 group-hover:rotate-0 transition-all duration-1000">
                <img alt="Sharmin Mujahid professional" class="w-full h-full object-cover" src="assets/Sharmin%20Mujahid2.png">
            </div>
            <div class="absolute -top-12 -right-12 w-80 h-80 bg-primary-container rounded-full -z-0 opacity-50"></div>
            <div class="absolute bottom-10 -left-10 px-10 py-8 bg-white rounded-[2rem] shadow-premium z-20 border border-primary/5">
                <div class="flex items-center gap-4">
                    <div class="text-5xl font-black text-secondary">15+</div>
                    <div class="text-xs font-black text-secondary uppercase tracking-widest leading-tight">Years<br>Experience</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-32 bg-surface-container">
    <div class="container mx-auto px-8 lg:px-16">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-8">
            <div data-aos="fade-up">
                <h2 class="text-4xl lg:text-6xl font-extrabold text-primary mb-6 font-manrope">Our Expertise</h2>
                <p class="text-on-surface-variant/70 max-w-xl text-lg">Comprehensive developmental support tailored to every family's unique journey.</p>
            </div>
            <div class="flex gap-4" data-aos="fade-left">
                <button class="swiper-prev w-14 h-14 rounded-2xl bg-white text-primary shadow-premium hover:bg-primary hover:text-white transition-all flex items-center justify-center">
                    <span class="material-symbols-outlined">arrow_back</span>
                </button>
                <button class="swiper-next w-14 h-14 rounded-2xl bg-white text-primary shadow-premium hover:bg-primary hover:text-white transition-all flex items-center justify-center">
                    <span class="material-symbols-outlined">arrow_forward</span>
                </button>
            </div>
        </div>

        <!-- Swiper Carousel -->
        <div class="swiper servicesSwiper !pb-20">
            <div class="swiper-wrapper">
                <div class="swiper-slide h-auto">
                    <div class="bg-white p-10 rounded-[3rem] h-full shadow-whisper hover:shadow-premium transition-all duration-500 border border-primary/5 group">
                        <div class="w-16 h-16 bg-primary/5 rounded-3xl flex items-center justify-center text-primary mb-8 group-hover:bg-primary group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-4xl">neurology</span>
                        </div>
                        <h3 class="text-2xl font-extrabold text-primary mb-5 font-manrope">Autism & Neuro-Dev</h3>
                        <p class="text-on-surface-variant/70 leading-relaxed">Evidence-based developmental guidance focusing on neuro-diverse children's unique potential.</p>
                    </div>
                </div>
                <div class="swiper-slide h-auto">
                    <div class="bg-white p-10 rounded-[3rem] h-full shadow-whisper hover:shadow-premium transition-all duration-500 border border-primary/5 group">
                        <div class="w-16 h-16 bg-primary/5 rounded-3xl flex items-center justify-center text-primary mb-8 group-hover:bg-primary group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-4xl">family_restroom</span>
                        </div>
                        <h3 class="text-2xl font-extrabold text-primary mb-5 font-manrope">Family Counseling</h3>
                        <p class="text-on-surface-variant/70 leading-relaxed">Holistic support for families, fostering emotional resilience and stronger bonds through empathy.</p>
                    </div>
                </div>
                <div class="swiper-slide h-auto">
                    <div class="bg-white p-10 rounded-[3rem] h-full shadow-whisper hover:shadow-premium transition-all duration-500 border border-primary/5 group">
                        <div class="w-16 h-16 bg-primary/5 rounded-3xl flex items-center justify-center text-primary mb-8 group-hover:bg-primary group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-4xl">sentiment_satisfied</span>
                        </div>
                        <h3 class="text-2xl font-extrabold text-primary mb-5 font-manrope">CBT & Emotional</h3>
                        <p class="text-on-surface-variant/70 leading-relaxed">Practical emotional and behavioral strategies using Cognitive Behavioral Therapy principles.</p>
                    </div>
                </div>
                <div class="swiper-slide h-auto">
                    <div class="bg-white p-10 rounded-[3rem] h-full shadow-whisper hover:shadow-premium transition-all duration-500 border border-primary/5 group">
                        <div class="w-16 h-16 bg-primary/5 rounded-3xl flex items-center justify-center text-primary mb-8 group-hover:bg-primary group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-4xl">school</span>
                        </div>
                        <h3 class="text-2xl font-extrabold text-primary mb-5 font-manrope">Teacher Training</h3>
                        <p class="text-on-surface-variant/70 leading-relaxed">Empowering educators with tools and strategies to create inclusive learning environments.</p>
                    </div>
                </div>
                <div class="swiper-slide h-auto">
                    <div class="bg-white p-10 rounded-[3rem] h-full shadow-whisper hover:shadow-premium transition-all duration-500 border border-primary/5 group">
                        <div class="w-16 h-16 bg-primary/5 rounded-3xl flex items-center justify-center text-primary mb-8 group-hover:bg-primary group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-4xl">auto_stories</span>
                        </div>
                        <h3 class="text-2xl font-extrabold text-primary mb-5 font-manrope">Special Education</h3>
                        <p class="text-on-surface-variant/70 leading-relaxed">Customized educational support paths for children with diverse learning needs.</p>
                    </div>
                </div>
                <div class="swiper-slide h-auto">
                    <div class="bg-white p-10 rounded-[3rem] h-full shadow-whisper hover:shadow-premium transition-all duration-500 border border-primary/5 group">
                        <div class="w-16 h-16 bg-primary/5 rounded-3xl flex items-center justify-center text-primary mb-8 group-hover:bg-primary group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-4xl">gavel</span>
                        </div>
                        <h3 class="text-2xl font-extrabold text-primary mb-5 font-manrope">Legal Guidance</h3>
                        <p class="text-on-surface-variant/70 leading-relaxed">Navigating rights and advocacy for children within the disability sector framework.</p>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination !-bottom-1"></div>
        </div>
    </div>
</section>

<!-- Section: Success Stories (Testimonials) -->
<section id="reviews" class="py-32 bg-surface overflow-hidden">
    <div class="container mx-auto px-8 lg:px-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            <!-- Left: Context -->
            <div data-aos="fade-right">
                <span class="text-secondary font-black tracking-[0.3em] uppercase text-xs mb-6 block">Testimonials</span>
                <h2 class="text-4xl lg:text-6xl font-extrabold text-primary mb-8 font-manrope">Voices of <span class="text-blush">Hope</span></h2>
                <p class="text-on-surface-variant/70 text-xl leading-relaxed mb-10">
                    Real stories from families who found clarity and support in our sanctuary. Every word reflects a journey of transformation.
                </p>
                <div class="flex gap-4">
                    <button class="swiper-prev-reviews w-14 h-14 rounded-full bg-primary/5 text-primary hover:bg-primary hover:text-white transition-all flex items-center justify-center border border-primary/10">
                        <span class="material-symbols-outlined">west</span>
                    </button>
                    <button class="swiper-next-reviews w-14 h-14 rounded-full bg-primary/5 text-primary hover:bg-primary hover:text-white transition-all flex items-center justify-center border border-primary/10">
                        <span class="material-symbols-outlined">east</span>
                    </button>
                </div>
            </div>

            <!-- Right: Carousel (Half width) -->
            <div class="relative" data-aos="fade-left">
                <div class="swiper reviewsSwiper !overflow-visible">
                    <div class="swiper-wrapper">
                        <!-- Review 1 -->
                        <div class="swiper-slide">
                            <div class="bg-white p-10 rounded-[3rem] shadow-whisper border border-primary/5">
                                <div class="flex gap-1 mb-6">
                                    <?php for($i=0; $i<5; $i++): ?><span class="material-symbols-outlined text-blush text-sm fill-1">star</span><?php endfor; ?>
                                </div>
                                <p class="text-lg text-primary font-medium italic mb-8 leading-relaxed font-manrope">
                                    "Life Circle-এর স্পেশাল এডুকেশনাল সাপোর্ট আমাদের জন্য আশীর্বাদস্বরূপ। আমার ছেলের আত্মবিশ্বাস এখন অনেক বেড়েছে।"
                                </p>
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-primary-container rounded-xl flex items-center justify-center text-primary font-bold text-lg uppercase font-bengali">ক</div>
                                    <div>
                                        <div class="font-bold text-primary font-bengali">কাকলি আহমেদ</div>
                                        <div class="text-[10px] text-on-surface-variant/60 font-black uppercase tracking-widest">Guardian</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Review 2 -->
                        <div class="swiper-slide">
                            <div class="bg-white p-10 rounded-[3rem] shadow-whisper border border-primary/5">
                                <div class="flex gap-1 mb-6">
                                    <?php for($i=0; $i<5; $i++): ?><span class="material-symbols-outlined text-blush text-sm fill-1">star</span><?php endfor; ?>
                                </div>
                                <p class="text-lg text-primary font-medium italic mb-8 leading-relaxed font-manrope">
                                    "শারমিন ম্যাডামের গাইডেন্সে আমার সন্তানের আচরণের অনেক ইতিবাচক পরিবর্তন এসেছে। তিনি খুব ধৈর্য নিয়ে সবকিছু বোঝান।"
                                </p>
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-secondary-container rounded-xl flex items-center justify-center text-primary font-bold text-lg uppercase font-bengali">ত</div>
                                    <div>
                                        <div class="font-bold text-primary font-bengali">তানজিমা আলম</div>
                                        <div class="text-[10px] text-on-surface-variant/60 font-black uppercase tracking-widest">Proud Parent</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Form -->
<div id="actionModal" class="fixed inset-0 z-[100] hidden overflow-y-auto bg-primary/40 backdrop-blur-md flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-2xl rounded-[3rem] shadow-premium overflow-hidden transform transition-all modal-enter">
        <div class="relative p-10 pt-16">
            <button onclick="closeModal()" class="absolute top-8 right-8 w-12 h-12 rounded-full bg-surface-container flex items-center justify-center hover:bg-primary/5 transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
            <div class="text-center mb-10">
                <div class="w-20 h-20 bg-primary/5 rounded-3xl flex items-center justify-center text-primary mx-auto mb-6">
                    <span id="modalIcon" class="material-symbols-outlined text-4xl">event_available</span>
                </div>
                <h2 id="modalTitle" class="text-3xl lg:text-4xl font-extrabold text-primary font-manrope">Book Appointment</h2>
                <p id="modalDesc" class="text-on-surface-variant/60 mt-3 font-medium">Take the first step towards a brighter future.</p>
            </div>
            
            <form id="modalForm" method="POST" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-primary mb-2 ml-2">Full Name</label>
                        <input type="text" name="full_name" required class="w-full px-6 py-4 rounded-2xl bg-surface-container border-none focus:ring-2 focus:ring-primary/20" placeholder="e.g. Abdullah Al Mamun">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-primary mb-2 ml-2">WhatsApp Number</label>
                        <input type="tel" name="whatsapp_number" required class="w-full px-6 py-4 rounded-2xl bg-surface-container border-none focus:ring-2 focus:ring-primary/20" placeholder="e.g. 017xxxxxxxx">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-primary mb-2 ml-2">Select Service</label>
                    <select name="service_type" required class="w-full px-6 py-4 rounded-2xl bg-surface-container border-none focus:ring-2 focus:ring-primary/20 appearance-none">
                        <option value="">Choose a Service...</option>
                        <option value="Autism & Neuro-Dev">Autism & Neuro-Dev</option>
                        <option value="Family Counseling">Family Counseling</option>
                        <option value="CBT & Emotional">CBT & Emotional</option>
                        <option value="Teacher Training">Teacher Training</option>
                        <option value="Special Education">Special Education</option>
                        <option value="DMC Certificate Course">DMC Certificate Course</option>
                    </select>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-primary mb-2 ml-2">Email Address</label>
                        <input type="email" name="email" required class="w-full px-6 py-4 rounded-2xl bg-surface-container border-none focus:ring-2 focus:ring-primary/20" placeholder="e.g. name@example.com">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-primary mb-2 ml-2">Transaction ID (Payment)</label>
                        <input type="text" name="transaction_id" required class="w-full px-6 py-4 rounded-2xl bg-surface-container border-none focus:ring-2 focus:ring-primary/20" placeholder="bKash/Nagad Ref">
                    </div>
                </div>

                <div id="dateField" class="hidden">
                    <label class="block text-sm font-bold text-primary mb-2 ml-2">Preferred Date</label>
                    <input type="date" name="appointment_date" class="w-full px-6 py-4 rounded-2xl bg-surface-container border-none focus:ring-2 focus:ring-primary/20">
                </div>
                <div>
                    <label class="block text-sm font-bold text-primary mb-2 ml-2">Message (Optional)</label>
                    <textarea name="message" rows="3" class="w-full px-6 py-4 rounded-2xl bg-surface-container border-none focus:ring-2 focus:ring-primary/20" placeholder="How can we help?"></textarea>
                </div>
                <button type="submit" class="w-full py-5 bg-primary text-white rounded-2xl font-bold text-lg shadow-premium hover:bg-secondary transition-all">
                    Confirm & Send 🚀
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Section: Social Action (Facebook Videos) -->
<section class="py-32 bg-surface overflow-hidden" id="videos">
    <div class="container mx-auto px-8 lg:px-16">
        <div class="flex flex-col md:flex-row justify-between items-center mb-20 gap-8">
            <div data-aos="fade-right">
                <span class="text-secondary font-black tracking-[0.3em] uppercase text-xs mb-4 block">Social Action</span>
                <h2 class="text-4xl lg:text-6xl font-extrabold text-primary font-manrope">Life Circle in <span class="text-blush">Action</span></h2>
                <p class="text-on-surface-variant/70 mt-4 text-lg">Follow our journey on social media for daily tips and success stories.</p>
            </div>
            <a href="https://www.facebook.com/share/1DwyNugqj7/" target="_blank" class="btn-interact bg-[#1877F2] text-white px-8 py-4 rounded-2xl font-bold flex items-center gap-3 shadow-premium whitespace-nowrap">
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                Follow Our Story
            </a>
        </div>

        <div class="swiper socialSwiper !overflow-visible">
            <div class="swiper-wrapper">
                <!-- Reel 1 -->
                <div class="swiper-slide w-[280px] h-auto">
                    <a href="https://www.facebook.com/share/r/1J96bcGXcG/" target="_blank" class="group relative aspect-[9/16] bg-black rounded-[2.5rem] overflow-hidden shadow-premium block h-full">
                        <img src="assets/gallery/dmc-success.jpg" class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition-transform duration-1000" alt="Reel">
                        <div class="absolute inset-0 flex flex-col justify-end p-8 bg-gradient-to-t from-black/90 via-black/20 to-transparent">
                            <h3 class="text-white font-bold group-hover:text-secondary-container transition-colors">Success Story: DMC Completion</h3>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center group-hover:bg-primary transition-all border border-white/20 shadow-xl">
                                <span class="material-symbols-outlined text-white text-3xl">play_arrow</span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Reel 2 -->
                <div class="swiper-slide w-[280px] h-auto">
                    <a href="https://www.facebook.com/share/r/17XXuRemMB/" target="_blank" class="group relative aspect-[9/16] bg-black rounded-[2.5rem] overflow-hidden shadow-premium block h-full">
                        <img src="assets/gallery/community-impact.jpg" class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition-transform duration-1000" alt="Reel">
                        <div class="absolute inset-0 flex flex-col justify-end p-8 bg-gradient-to-t from-black/90 via-black/20 to-transparent">
                            <h3 class="text-white font-bold group-hover:text-secondary-container transition-colors">Community Awareness Drive</h3>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center group-hover:bg-primary transition-all border border-white/20 shadow-xl">
                                <span class="material-symbols-outlined text-white text-3xl">play_arrow</span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Video 1 -->
                <div class="swiper-slide w-[400px] h-auto">
                    <a href="https://www.facebook.com/share/v/1b9mY2ui48/" target="_blank" class="group relative aspect-video bg-black rounded-[2.5rem] overflow-hidden shadow-premium block h-full">
                        <img src="assets/gallery/counseling-session.jpg" class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition-transform duration-1000" alt="Video">
                        <div class="absolute inset-0 flex flex-col justify-end p-8 bg-gradient-to-t from-black/90 via-black/20 to-transparent">
                            <h3 class="text-2xl text-white font-black uppercase group-hover:text-secondary-container transition-colors">Understanding Support</h3>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-20 h-20 rounded-full bg-primary/80 backdrop-blur-md flex items-center justify-center group-hover:bg-primary transition-all shadow-2xl">
                                <span class="material-symbols-outlined text-white text-5xl">play_circle</span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Reel 3 -->
                <div class="swiper-slide w-[280px] h-auto">
                    <a href="https://www.facebook.com/share/r/1Gr4s4bnG5/" target="_blank" class="group relative aspect-[9/16] bg-black rounded-[2.5rem] overflow-hidden shadow-premium block h-full">
                        <img src="assets/gallery/teacher-training.jpg" class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition-transform duration-1000" alt="Reel">
                        <div class="absolute inset-0 flex flex-col justify-end p-8 bg-gradient-to-t from-black/90 via-black/20 to-transparent">
                            <h3 class="text-white font-bold group-hover:text-secondary-container transition-colors">Inclusive Teaching Workshop</h3>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center group-hover:bg-primary transition-all border border-white/20 shadow-xl">
                                <span class="material-symbols-outlined text-white text-3xl">play_arrow</span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Video 2 -->
                <div class="swiper-slide w-[400px] h-auto">
                    <a href="https://www.facebook.com/share/v/1Aqw7GZSdX/" target="_blank" class="group relative aspect-video bg-black rounded-[2.5rem] overflow-hidden shadow-premium block h-full">
                        <img src="assets/gallery/parent-support.jpg" class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition-transform duration-1000" alt="Video">
                        <div class="absolute inset-0 flex flex-col justify-end p-8 bg-gradient-to-t from-black/90 via-black/20 to-transparent">
                            <h3 class="text-2xl text-white font-black uppercase group-hover:text-secondary-container transition-colors">Parenting Guidance</h3>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-20 h-20 rounded-full bg-primary/80 backdrop-blur-md flex items-center justify-center group-hover:bg-primary transition-all shadow-2xl">
                                <span class="material-symbols-outlined text-white text-5xl">play_circle</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Course Section Teaser -->
<section class="py-32 bg-primary-container/30 reveal">
    <div class="container mx-auto px-8 lg:px-16">
        <div class="bg-white rounded-[4rem] overflow-hidden relative p-12 lg:p-24 text-center border-2 border-secondary/20 shadow-premium">
            <div class="relative z-10 flex flex-col items-center gap-10">
                <div class="w-24 h-24 rounded-full bg-secondary/10 flex items-center justify-center">
                    <span class="material-symbols-outlined text-secondary text-6xl">school</span>
                </div>
                <h2 class="text-3xl lg:text-6xl font-extrabold text-primary tracking-tighter uppercase leading-tight">Developmental Disorder Management Certificate (DMC)</h2>
                <p class="text-on-surface-variant text-xl lg:text-2xl max-w-4xl font-bengali leading-relaxed opacity-90">
                    ৩ মাস ব্যাপী এই সার্টিফিকেট কোর্সটিতে অংশ নিয়ে স্পেশাল চাইল্ড ম্যানেজমেন্ট এবং ডেভেলপমেন্টাল ডিসঅর্ডার সম্পর্কে বাস্তবমুখী এবং কার্যকরী জ্ঞান অর্জন করুন। 
                </p>

                <?php if($early_bird_deadline): ?>
                <div id="home-countdown" class="bg-surface-container-low/80 backdrop-blur-md px-10 py-6 rounded-3xl shadow-whisper border-t-4 border-secondary hidden">
                    <div class="flex flex-col items-center gap-4">
                        <div class="flex items-center gap-3 text-secondary font-bold uppercase tracking-widest text-xs">
                            <span class="material-symbols-outlined text-sm animate-pulse">timer</span>
                            Early Bird Offer Ends In:
                        </div>
                        <div class="flex gap-6 font-manrope">
                            <div class="flex flex-col items-center"><span id="h-days" class="text-3xl font-black text-primary leading-none">00</span><span class="text-[9px] text-outline font-bold uppercase tracking-widest mt-2">Days</span></div>
                            <div class="text-3xl font-black text-primary/20">:</div>
                            <div class="flex flex-col items-center"><span id="h-hours" class="text-3xl font-black text-primary leading-none">00</span><span class="text-[9px] text-outline font-bold uppercase tracking-widest mt-2">Hours</span></div>
                            <div class="text-3xl font-black text-primary/20">:</div>
                            <div class="flex flex-col items-center"><span id="h-minutes" class="text-3xl font-black text-primary leading-none">00</span><span class="text-[9px] text-outline font-bold uppercase tracking-widest mt-2">Mins</span></div>
                            <div class="text-3xl font-black text-primary/20">:</div>
                            <div class="flex flex-col items-center"><span id="h-seconds" class="text-3xl font-black text-secondary leading-none">00</span><span class="text-[9px] text-outline font-bold uppercase tracking-widest mt-2">Secs</span></div>
                        </div>
                    </div>
                </div>
                <script>
                    const deadline = new Date("<?php echo $early_bird_deadline; ?>").getTime();
                    const countdownCard = document.getElementById('home-countdown');
                    setInterval(() => {
                        const now = new Date().getTime();
                        const dist = deadline - now;
                        if (dist < 0) return;
                        countdownCard.classList.remove('hidden');
                        document.getElementById('h-days').innerText = Math.floor(dist / (1000 * 60 * 60 * 24)).toString().padStart(2, '0');
                        document.getElementById('h-hours').innerText = Math.floor((dist % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)).toString().padStart(2, '0');
                        document.getElementById('h-minutes').innerText = Math.floor((dist % (1000 * 60 * 60)) / (1000 * 60)).toString().padStart(2, '0');
                        document.getElementById('h-seconds').innerText = Math.floor((dist % (1000 * 60)) / 1000).toString().padStart(2, '0');
                    }, 1000);
                </script>
                <?php endif; ?>
                
                <div class="pt-6">
                    <a href="enroll.php" class="btn-interact bg-primary text-white px-12 py-6 rounded-full font-bold text-xl shadow-premium hover:brightness-110 transition-all font-bengali">
                        DMC কোর্সে ভর্তি হোন (Enroll Now)
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Teaser -->
<section class="py-32 bg-surface reveal" id="contact">
    <div class="container mx-auto px-8 lg:px-16">
        <div class="bg-primary rounded-[4rem] overflow-hidden relative p-12 lg:p-24 text-center lg:text-left shadow-premium">
            <div class="relative z-10 flex flex-col lg:flex-row justify-between items-center gap-16">
                <div class="text-white max-w-2xl">
                    <h2 class="text-4xl md:text-6xl font-extrabold mb-8 leading-tight tracking-tighter">Start Your Healing Journey Today</h2>
                    <p class="text-white/70 text-lg md:text-xl mb-12 leading-relaxed">Reach out to schedule your developmental assessment or family counselling session.</p>
                    <div class="flex items-center gap-6 justify-center lg:justify-start">
                        <div class="w-16 h-16 rounded-2xl bg-secondary flex items-center justify-center shadow-lg"><span class="material-symbols-outlined text-3xl">call</span></div>
                        <div>
                            <div class="text-white/50 text-[10px] font-black uppercase tracking-[0.2em] mb-1">Appointment Line</div>
                            <a class="text-2xl md:text-4xl font-black hover:text-secondary-container transition-colors" href="tel:+8801716437859">+880 1716 437859</a>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-6 w-full lg:w-auto">
                    <a href="contact.php" class="bg-white text-primary font-bold py-6 px-12 rounded-full text-lg lg:text-xl hover:bg-secondary-container hover:text-primary transition-all shadow-premium text-center">Contact Us</a>
                    <a href="appointment.php" class="bg-secondary text-white font-bold py-6 px-12 rounded-full text-lg lg:text-xl hover:brightness-110 transition-all shadow-premium text-center">Book Appointment</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
