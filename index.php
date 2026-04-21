<?php 
require_once 'includes/header.php'; 
$early_bird_deadline = get_setting('early_bird_deadline');
?>

<!-- Hero Section -->
<section class="relative min-h-[85vh] flex items-center overflow-hidden">
    <div class="container mx-auto px-8 lg:px-16 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center py-20 relative z-10">
        <div class="animate-[fadeInUp_1s_ease-out_forwards] xl:pr-10">
            <div class="inline-flex items-center gap-2 px-3 md:px-4 py-1.5 rounded-full bg-secondary-container/30 text-secondary font-bold text-[10px] md:text-sm mb-4 md:mb-6">
                <span class="material-symbols-outlined text-xs md:text-sm">verified</span>
                Developmental Support Counselor
            </div>
            <h1 class="text-4xl md:text-7xl font-extrabold text-primary leading-[1.3] mb-6 tracking-tight font-manrope">
                LIFE CIRCLE
                <span class="block text-2xl md:text-4xl text-secondary font-medium mt-2">Developmental Support Counselor</span>
            </h1>
            <p class="text-on-surface-variant text-lg leading-relaxed max-w-xl animate-[fadeInUp_1.2s_ease-out_forwards]">
                With 15 years in the Disability Sector and 5 years in Counseling, we provide a compassionate sanctuary for children and families. Our holistic approach focuses on nurturing each child through evidence-based developmental guidance.
            </p>
        </div>
        <div class="relative flex justify-center mt-10 lg:mt-0">
            <div class="absolute -top-10 -right-10 w-96 h-96 bg-secondary-container/20 rounded-full blur-3xl animate-[float_6s_infinite_ease-in-out]"></div>
            <div class="relative w-full max-w-md bg-white p-4 rounded-[2.5rem] whisper-shadow transform rotate-2 hover:rotate-0 transition-transform duration-700">
                <div class="rounded-[2rem] overflow-hidden aspect-[4/5] bg-surface-container">
                    <img alt="Lead Counselor" class="w-full h-full object-cover" src="assets/Sharmin Mujahid1.png">
                </div>
            </div>
            <div class="absolute -bottom-4 -left-4 md:-bottom-6 md:-left-6 bg-primary p-4 md:p-6 rounded-2xl whisper-shadow max-w-[260px] md:max-w-xs text-white animate-[float_5s_infinite_ease-in-out_1s]">
                <div class="flex items-center gap-3 md:gap-4 mb-2 border-b border-white/20 pb-2">
                    <span class="material-symbols-outlined text-secondary-container text-2xl md:text-3xl" style="font-variation-settings: 'FILL' 1;">psychology_alt</span>
                    <div>
                        <div class="text-sm md:text-base font-bold text-white">Sharmin Mujahid</div>
                        <div class="text-[9px] md:text-xs text-secondary-container font-medium mt-1">Developmental Counselor</div>
                    </div>
                </div>
                <p class="text-[10px] md:text-xs font-medium leading-tight text-white/80">Dedicated to transforming lives through holistic emotional and behavioral support.</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-32 bg-surface reveal" id="about">
    <div class="container mx-auto px-8 lg:px-16 grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
        <div class="relative group flex justify-center">
            <div class="rounded-[3rem] overflow-hidden aspect-[4/4] max-w-md whisper-shadow relative z-10 border-[12px] border-white">
                <img alt="Sharmin Mujahid professional" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000" src="assets/Sharmin Mujahid2.png">
            </div>
            <div class="absolute -top-12 -left-12 w-64 h-64 bg-secondary-container/20 rounded-full -z-0"></div>
            <div class="absolute bottom-10 -right-6 md:bottom-10 md:-right-10 px-6 py-4 md:px-8 md:py-6 bg-white rounded-3xl whisper-shadow z-20">
                <div class="flex items-center gap-3">
                    <div class="text-3xl md:text-4xl font-black text-secondary">15+</div>
                    <div class="text-[9px] md:text-xs font-bold text-secondary uppercase tracking-widest leading-none">Years<br>Experience</div>
                </div>
            </div>
        </div>
        <div>
            <span class="text-secondary font-bold tracking-widest uppercase text-sm">Developmental Support Counselor</span>
            <h2 class="text-4xl font-extrabold mb-8 mt-4 text-primary">About Me</h2>
            <div class="space-y-6 text-on-surface-variant leading-relaxed text-lg">
                <p>I am a Developmental Support Counselor dedicated to supporting children with developmental challenges and their families. I have practical experience working with children with developmental delays, autism, speech and behavioral difficulties.</p>
                <p>I focus on providing structured developmental support, parent guidance, and practical strategies that can be applied in daily life. My goal is to help each child reach their fullest potential in a supportive and understanding environment.</p>
            </div>
            
            <h3 class="text-2xl font-extrabold mt-10 mb-4 text-primary">My Approach</h3>
            <div class="space-y-4 text-on-surface-variant leading-relaxed text-lg">
                <p>I follow a child-centered and family-focused approach. Each child is unique, so I create personalized support strategies based on individual needs. I also work closely with parents to ensure consistency between support sessions and home environment.</p>
            </div>

            <h3 class="text-2xl font-extrabold mt-10 mb-4 text-primary">Training / Qualification</h3>
            <ul class="list-disc pl-5 space-y-2 text-on-surface-variant text-lg">
                <li>Developmental Disorder Management Certificate (DMC)</li>
                <li>Training in Child Development & Behavior Support</li>
                <li>Practical experience working with children with special needs</li>
            </ul>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-32 bg-primary reveal" id="services">
    <div class="container mx-auto px-8 lg:px-16">
        <div class="text-center mb-20">
            <span class="text-secondary-container font-bold tracking-[0.2em] uppercase text-sm">Comprehensive Support</span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mt-4 mb-6">My Services</h2>
            <p class="text-secondary-container/70 max-w-2xl mx-auto text-lg">Providing a specialized spectrum of support for developmental, emotional, and behavioral well-being.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white/5 border border-white/10 p-8 rounded-3xl hover:bg-white/10 transition-all group">
                <span class="material-symbols-outlined text-secondary-container text-4xl mb-4">fact_check</span>
                <h3 class="text-xl font-bold text-white mb-2">Developmental Screening & Basic Assessment</h3>
                <p class="text-white/60 text-sm">Comprehensive evaluation and personalized growth roadmaps for each child.</p>
            </div>
            <!-- Other services ... (Skipped for brevity but same as original) -->
            <div class="bg-white/5 border border-white/10 p-8 rounded-3xl hover:bg-white/10 transition-all group">
                <span class="material-symbols-outlined text-secondary-container text-4xl mb-4">family_restroom</span>
                <h3 class="text-xl font-bold text-white mb-2">Parent Counseling & Guidance</h3>
                <p class="text-white/60 text-sm">Expert strategies to navigate the complexities of modern parenting and child development.</p>
            </div>
             <div class="bg-white/5 border border-white/10 p-8 rounded-3xl hover:bg-white/10 transition-all group">
                <span class="material-symbols-outlined text-secondary-container text-4xl mb-4">psychology_alt</span>
                <h3 class="text-xl font-bold text-white mb-2">Behavior Management Support</h3>
                <p class="text-white/60 text-sm">Practical strategies to address challenging behaviors and foster positive development.</p>
            </div>
        </div>
    </div>
</section>

<!-- Course Section -->
<section class="py-24 bg-surface-container-low reveal">
    <div class="container mx-auto px-8 lg:px-16">
        <div class="bg-secondary-container/20 rounded-[3rem] overflow-hidden relative p-12 lg:p-20 text-center border-2 border-secondary/30 whisper-shadow">
            <div class="relative z-10 flex flex-col items-center gap-6">
                <span class="material-symbols-outlined text-secondary text-5xl mb-2">school</span>
                <h2 class="text-3xl lg:text-5xl font-extrabold text-primary font-manrope">Developmental Disorder Management Certificate (DMC)</h2>
                <p class="text-on-surface-variant text-lg lg:text-xl max-w-3xl font-bengali">
                    ৩ মাস ব্যাপী এই সার্টিফিকেট কোর্সটিতে অংশ নিয়ে স্পেশাল চাইল্ড ম্যানেজমেন্ট এবং ডেভেলপমেন্টাল ডিসঅর্ডার সম্পর্কে বাস্তবমুখী এবং কার্যকরী জ্ঞান অর্জন করুন। 
                </p>

                <?php if($early_bird_deadline): ?>
                <div id="home-countdown" class="bg-white/80 backdrop-blur-md px-8 py-4 rounded-2xl whisper-shadow border-t-4 border-secondary hidden mt-4">
                    <div class="flex flex-col items-center gap-2">
                        <div class="flex items-center gap-2 text-secondary font-bold uppercase tracking-widest text-[10px]">
                            <span class="material-symbols-outlined text-xs animate-pulse">timer</span>
                            Early Bird Offer Ends In:
                        </div>
                        <div class="flex gap-4 font-manrope">
                            <div class="flex flex-col items-center"><span id="h-days" class="text-2xl font-black text-primary">00</span><span class="text-[8px] text-outline font-bold uppercase tracking-widest">Days</span></div>
                            <div class="text-2xl font-black text-primary/20">:</div>
                            <div class="flex flex-col items-center"><span id="h-hours" class="text-2xl font-black text-primary">00</span><span class="text-[8px] text-outline font-bold uppercase tracking-widest">Hours</span></div>
                            <div class="text-2xl font-black text-primary/20">:</div>
                            <div class="flex flex-col items-center"><span id="h-minutes" class="text-2xl font-black text-primary">00</span><span class="text-[8px] text-outline font-bold uppercase tracking-widest">Mins</span></div>
                            <div class="text-2xl font-black text-primary/20">:</div>
                            <div class="flex flex-col items-center"><span id="h-seconds" class="text-2xl font-black text-secondary">00</span><span class="text-[8px] text-outline font-bold uppercase tracking-widest">Secs</span></div>
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
                
                <div class="mt-4">
                    <a href="enroll.php" class="btn-interact bg-primary text-on-primary px-8 py-4 rounded-full font-bold text-lg whisper-shadow hover:brightness-110 transition-all font-bengali">
                        DMC কোর্সে ভর্তি হোন (Enroll Now)
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-24 bg-surface-container reveal" id="contact">
    <div class="container mx-auto px-8 lg:px-16">
        <div class="bg-primary rounded-[3rem] overflow-hidden relative p-12 lg:p-20 text-center lg:text-left">
            <div class="relative z-10 flex flex-col lg:flex-row justify-between items-center gap-12">
                <div class="text-white max-w-xl">
                    <h2 class="text-4xl font-extrabold mb-4">Start Your Healing Journey Today</h2>
                    <p class="text-white/70 text-lg mb-8">Reach out to schedule your developmental assessment or family counselling session.</p>
                    <div class="flex items-center gap-4 justify-center lg:justify-start">
                        <div class="w-12 h-12 rounded-full bg-secondary flex items-center justify-center"><span class="material-symbols-outlined">call</span></div>
                        <div>
                            <div class="text-white/60 text-sm font-bold uppercase tracking-widest">Appointment Line</div>
                            <a class="text-2xl font-bold" href="tel:+8801716437859">+880 1716 437859</a>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="enroll.php" class="bg-white text-primary font-bold py-5 px-10 rounded-full text-base lg:text-xl hover:bg-secondary-container hover:text-primary transition-all whisper-shadow text-center">Enroll Now</a>
                    <a href="appointment.php" class="bg-secondary text-white font-bold py-5 px-10 rounded-full text-base lg:text-xl hover:brightness-110 transition-all whisper-shadow text-center">Book Appointment</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
