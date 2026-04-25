<?php 
require_once 'includes/header.php'; 
$early_bird_deadline = get_setting('early_bird_deadline');
?>

<!-- Hero Section -->
<section class="relative min-h-[90vh] flex items-center overflow-hidden bg-primary-container/30">
    <div class="container mx-auto px-8 lg:px-16 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center py-20 relative z-10">
        <div class="xl:pr-10">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-secondary/10 text-secondary font-bold text-xs md:text-sm mb-6 shadow-sm border border-secondary/10 uppercase tracking-widest">
                Developmental Support Counselor
            </div>
            <h1 class="text-5xl md:text-8xl font-extrabold text-primary leading-[1.05] mb-8 tracking-tighter uppercase">
                LIFE CIRCLE
            </h1>
            <p class="text-on-surface-variant text-lg md:text-xl leading-relaxed max-w-xl mb-10 font-medium">
                With 15 years in the Disability Sector and 5 years in Counseling, we provide a compassionate sanctuary for children and families. Our holistic approach focuses on nurturing each child through evidence-based developmental guidance.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="appointment.php" class="bg-primary text-white px-10 py-5 rounded-full font-bold text-lg hover:brightness-110 transition-all shadow-premium text-center">Book Appointment</a>
                <a href="enroll.php" class="bg-white text-primary border border-primary/10 px-10 py-5 rounded-full font-bold text-lg hover:bg-primary-container/20 transition-all shadow-whisper text-center">Enroll Now</a>
            </div>
        </div>
        <div class="relative flex justify-center mt-10 lg:mt-0">
            <div class="absolute -top-10 -right-10 w-96 h-96 bg-secondary/5 rounded-full blur-3xl"></div>
            <div class="relative w-full max-w-md bg-white p-5 rounded-[3rem] shadow-premium transform rotate-2 hover:rotate-0 transition-transform duration-1000">
                <div class="rounded-[2.5rem] overflow-hidden aspect-[4/5] bg-surface-container">
                    <img alt="Sharmin Mujahid professional" class="w-full h-full object-cover" src="assets/Sharmin Mujahid2.png">
                </div>
            </div>
            <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-[2rem] shadow-premium max-w-[280px] border border-primary/5">
                <div class="flex items-center gap-4 mb-3 border-b border-surface-container pb-3">
                    <div class="w-12 h-12 rounded-full bg-primary-container/50 flex items-center justify-center">
                        <span class="material-symbols-outlined text-secondary text-2xl" style="font-variation-settings: 'FILL' 1;">psychology_alt</span>
                    </div>
                    <div>
                        <div class="text-base font-black text-primary">Sharmin Mujahid</div>
                        <div class="text-[10px] text-secondary font-black uppercase tracking-widest mt-1">Lead Counselor</div>
                    </div>
                </div>
                <p class="text-xs font-medium leading-relaxed text-on-surface-variant italic">"Dedicated to transforming lives through holistic emotional and behavioral support."</p>
            </div>
        </div>
    </div>
</section>

<!-- Our Impact (Image Gallery Teaser) -->
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


<!-- About Section (Full Content Restored) -->
<section class="py-32 bg-surface" id="about">
    <div class="container mx-auto px-8 lg:px-16 grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
        <div class="relative group flex justify-center">
            <div class="rounded-[4rem] overflow-hidden aspect-square max-w-md shadow-premium relative z-10 border-[16px] border-white transform -rotate-3 group-hover:rotate-0 transition-all duration-1000">
                <img alt="Sharmin Mujahid professional" class="w-full h-full object-cover" src="assets/Sharmin Mujahid2.png">
            </div>
            <div class="absolute -top-12 -left-12 w-80 h-80 bg-primary-container rounded-full -z-0 opacity-50"></div>
            <div class="absolute bottom-10 -right-10 px-10 py-8 bg-white rounded-[2rem] shadow-premium z-20 border border-primary/5">
                <div class="flex items-center gap-4">
                    <div class="text-5xl font-black text-secondary">15+</div>
                    <div class="text-xs font-black text-secondary uppercase tracking-widest leading-tight">Years<br>Experience</div>
                </div>
            </div>
        </div>
        <div class="space-y-8">
            <span class="text-secondary font-bold tracking-[0.2em] uppercase text-sm">Professional Expertise</span>
            <h2 class="text-4xl md:text-6xl font-extrabold text-primary leading-tight">Compassion Meets Experience</h2>
            <div class="space-y-6 text-on-surface-variant leading-relaxed text-lg">
                <p>I am a Developmental Support Counselor dedicated to supporting children with developmental challenges and their families. I have practical experience working with children with developmental delays, autism, speech and behavioral difficulties.</p>
                <p>I focus on providing structured developmental support, parent guidance, and practical strategies that can be applied in daily life. My goal is to help each child reach their fullest potential in a supportive and understanding environment.</p>
            </div>
            
            <div class="pt-6 space-y-8">
                <div>
                    <h3 class="text-2xl font-extrabold text-primary mb-4">My Approach</h3>
                    <p class="text-on-surface-variant text-lg">I follow a child-centered and family-focused approach. Each child is unique, so I create personalized support strategies based on individual needs. I also work closely with parents to ensure consistency between support sessions and home environment.</p>
                </div>
                <div>
                    <h3 class="text-2xl font-extrabold text-primary mb-4">Training / Qualification</h3>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 text-on-surface-variant font-bold">
                            <span class="material-symbols-outlined text-secondary">verified</span>
                            Developmental Disorder Management Certificate (DMC)
                        </li>
                        <li class="flex items-center gap-3 text-on-surface-variant font-bold">
                            <span class="material-symbols-outlined text-secondary">verified</span>
                            Training in Child Development & Behavior Support
                        </li>
                        <li class="flex items-center gap-3 text-on-surface-variant font-bold">
                            <span class="material-symbols-outlined text-secondary">verified</span>
                            Practical experience working with children with special needs
                        </li>
                    </ul>
                </div>
                <a href="about.php" class="text-secondary font-black border-b-2 border-secondary pb-1 hover:text-primary hover:border-primary transition-all">Read More About My Story</a>
            </div>
        </div>
    </div>
</section>

<!-- Services Section (Full Content Restored) -->
<section class="py-32 bg-primary-container/20" id="services">
    <div class="container mx-auto px-8 lg:px-16">
        <div class="text-center mb-20">
            <span class="text-secondary font-bold tracking-[0.2em] uppercase text-sm">Comprehensive Support</span>
            <h2 class="text-4xl md:text-6xl font-extrabold text-primary mt-4 mb-6">My Services</h2>
            <p class="text-on-surface-variant max-w-2xl mx-auto text-lg">Providing a specialized spectrum of support for developmental, emotional, and behavioral well-being.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-10 rounded-[3rem] shadow-whisper hover:shadow-premium transition-all duration-500 border border-primary/5 group">
                <div class="w-16 h-16 rounded-2xl bg-primary/5 flex items-center justify-center mb-8 group-hover:bg-primary transition-colors">
                    <span class="material-symbols-outlined text-secondary text-4xl group-hover:text-white">fact_check</span>
                </div>
                <h3 class="text-2xl font-black text-primary mb-4">Developmental Screening & Basic Assessment</h3>
                <p class="text-on-surface-variant mb-6 leading-relaxed">Comprehensive evaluation and personalized growth roadmaps for each child.</p>
            </div>
            <div class="bg-white p-10 rounded-[3rem] shadow-whisper hover:shadow-premium transition-all duration-500 border border-primary/5 group">
                <div class="w-16 h-16 rounded-2xl bg-primary/5 flex items-center justify-center mb-8 group-hover:bg-primary transition-colors">
                    <span class="material-symbols-outlined text-secondary text-4xl group-hover:text-white">family_restroom</span>
                </div>
                <h3 class="text-2xl font-black text-primary mb-4">Parent Counseling & Guidance</h3>
                <p class="text-on-surface-variant mb-6 leading-relaxed">Expert strategies to navigate the complexities of modern parenting and child development.</p>
            </div>
            <div class="bg-white p-10 rounded-[3rem] shadow-whisper hover:shadow-premium transition-all duration-500 border border-primary/5 group">
                <div class="w-16 h-16 rounded-2xl bg-primary/5 flex items-center justify-center mb-8 group-hover:bg-primary transition-colors">
                    <span class="material-symbols-outlined text-secondary text-4xl group-hover:text-white">psychology_alt</span>
                </div>
                <h3 class="text-2xl font-black text-primary mb-4">Behavior Management Support</h3>
                <p class="text-on-surface-variant mb-6 leading-relaxed">Practical strategies to address challenging behaviors and foster positive development.</p>
            </div>
        </div>
        <div class="text-center mt-16">
            <a href="services.php" class="bg-primary text-white px-10 py-5 rounded-full font-bold text-lg hover:brightness-110 transition-all shadow-premium inline-block">Learn More About Services</a>
        </div>
    </div>
</section>

<!-- Life Circle in Action (Social Videos) -->
<section class="py-32 bg-surface" id="videos">
    <div class="container mx-auto px-8 lg:px-16">
        <div class="flex flex-col lg:flex-row justify-between items-end mb-16 gap-8">
            <div class="max-w-2xl">
                <span class="text-secondary font-bold tracking-[0.2em] uppercase text-sm">Life Circle on Social</span>
                <h2 class="text-4xl md:text-6xl font-extrabold text-primary mt-4 mb-4">Life Circle in Action</h2>
                <p class="text-on-surface-variant text-lg">Follow our journey on social media for daily tips, success stories, and developmental guidance.</p>
            </div>
            <a href="https://www.facebook.com/share/1DwyNugqj7/" target="_blank" class="bg-[#1877F2] text-white px-10 py-5 rounded-full font-bold flex items-center gap-3 hover:brightness-110 transition-all shadow-premium">
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                Follow on Facebook
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
            <!-- Reels (Vertical) -->
            <a href="https://www.facebook.com/share/r/1J96bcGXcG/" target="_blank" class="lg:col-span-1 group relative aspect-[9/16] bg-black rounded-[2.5rem] overflow-hidden shadow-premium block">
                <img src="assets/gallery/dmc-success.jpg" class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition-transform duration-1000" alt="Reel 1">
                <div class="absolute inset-0 flex flex-col justify-end p-8 bg-gradient-to-t from-black/90 via-black/20 to-transparent">
                    <span class="text-white/70 text-[10px] font-bold uppercase tracking-widest mb-2">Facebook Reel</span>
                    <h3 class="text-lg text-white font-bold leading-tight group-hover:text-secondary-container transition-colors">Success Story: DMC Completion</h3>
                    <div class="mt-6 w-12 h-12 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center group-hover:bg-primary transition-all border border-white/20">
                        <span class="material-symbols-outlined text-white">play_arrow</span>
                    </div>
                </div>
            </a>
            
            <a href="https://www.facebook.com/share/r/17XXuRemMB/" target="_blank" class="lg:col-span-1 group relative aspect-[9/16] bg-black rounded-3xl overflow-hidden shadow-xl block">
                <img src="assets/gallery/community-impact.jpg" class="w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-700" alt="Reel 2">
                <div class="absolute inset-0 flex flex-col justify-end p-8 bg-gradient-to-t from-black/90 via-black/20 to-transparent">
                    <span class="text-white/70 text-[10px] font-bold uppercase tracking-widest mb-2">Facebook Reel</span>
                    <h3 class="text-lg text-white font-bold leading-tight group-hover:text-secondary-container transition-colors">Community Awareness</h3>
                    <div class="mt-6 w-12 h-12 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center group-hover:bg-primary transition-all border border-white/20">
                        <span class="material-symbols-outlined text-white">play_arrow</span>
                    </div>
                </div>
            </a>

            <a href="https://www.facebook.com/share/r/1Gr4s4bnG5/" target="_blank" class="lg:col-span-1 group relative aspect-[9/16] bg-black rounded-[2.5rem] overflow-hidden shadow-premium block">
                <img src="assets/gallery/teacher-training.jpg" class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition-transform duration-1000" alt="Reel 3">
                <div class="absolute inset-0 flex flex-col justify-end p-8 bg-gradient-to-t from-black/90 via-black/20 to-transparent">
                    <span class="text-white/70 text-[10px] font-bold uppercase tracking-widest mb-2">Facebook Reel</span>
                    <h3 class="text-lg text-white font-bold leading-tight group-hover:text-secondary-container transition-colors">Inclusive Workshop</h3>
                    <div class="mt-6 w-12 h-12 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center group-hover:bg-primary transition-all border border-white/20">
                        <span class="material-symbols-outlined text-white">play_arrow</span>
                    </div>
                </div>
            </a>

            <!-- Full Videos (Horizontal/Large) -->
            <div class="lg:col-span-2 space-y-8">
                <a href="https://www.facebook.com/share/v/1b9mY2ui48/" target="_blank" class="group relative aspect-video bg-black rounded-[2.5rem] overflow-hidden shadow-premium block">
                    <img src="assets/gallery/counseling-session.jpg" class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition-transform duration-1000" alt="Video 1">
                    <div class="absolute inset-0 flex flex-col justify-end p-10 bg-gradient-to-t from-black/90 via-black/20 to-transparent">
                        <span class="text-white/70 text-xs font-bold uppercase tracking-widest mb-2">Featured Video</span>
                        <h3 class="text-2xl text-white font-black leading-tight mb-6 group-hover:text-secondary-container transition-colors uppercase">Understanding Support</h3>
                        <div class="w-14 h-14 rounded-full bg-primary text-white flex items-center justify-center shadow-lg group-hover:scale-110 transition-all">
                            <span class="material-symbols-outlined text-3xl">play_circle</span>
                        </div>
                    </div>
                </a>
                <a href="https://www.facebook.com/share/v/1Aqw7GZSdX/" target="_blank" class="group relative aspect-video bg-black rounded-[2.5rem] overflow-hidden shadow-premium block">
                    <img src="assets/gallery/parent-support.jpg" class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition-transform duration-1000" alt="Video 2">
                    <div class="absolute inset-0 flex flex-col justify-end p-10 bg-gradient-to-t from-black/90 via-black/20 to-transparent">
                        <span class="text-white/70 text-xs font-bold uppercase tracking-widest mb-2">Featured Video</span>
                        <h3 class="text-2xl text-white font-black leading-tight mb-6 group-hover:text-secondary-container transition-colors uppercase">Parenting Guidance</h3>
                        <div class="w-14 h-14 rounded-full bg-primary text-white flex items-center justify-center shadow-lg group-hover:scale-110 transition-all">
                            <span class="material-symbols-outlined text-3xl">play_circle</span>
                        </div>
                    </div>
                </a>
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
