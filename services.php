<?php require_once 'includes/header.php'; ?>

<section class="pt-32 pb-20 bg-primary-container/30">
    <div class="container mx-auto px-8 lg:px-16 text-center animate-fade-in-up">
        <span class="text-secondary font-bold tracking-widest uppercase text-sm">Comprehensive Care</span>
        <h1 class="text-4xl md:text-6xl font-extrabold text-primary mt-4 mb-6">Our Services</h1>
        <p class="text-on-surface-variant max-w-2xl mx-auto text-lg leading-relaxed">
            Providing specialized developmental, emotional, and behavioral support tailored to each child's unique needs and every family's journey.
        </p>
    </div>
</section>

<section class="py-24 bg-surface">
    <div class="container mx-auto px-8 lg:px-16 space-y-32">
        <!-- Service 1 -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="relative rounded-[3rem] overflow-hidden aspect-video whisper-shadow">
                <img src="assets/gallery/inclusive-education.jpg" class="w-full h-full object-cover" alt="Developmental Screening">
            </div>
            <div>
                <span class="material-symbols-outlined text-secondary text-5xl mb-6">fact_check</span>
                <h2 class="text-3xl font-extrabold text-primary mb-6">Developmental Screening & Assessment</h2>
                <p class="text-on-surface-variant text-lg leading-relaxed mb-8">
                    We provide thorough evaluations to understand your child's current developmental stage. This includes identifying strengths, challenges, and creating a personalized roadmap for growth in communication, social skills, and behavior.
                </p>
                <a href="appointment.php" class="btn-interact inline-flex items-center gap-3 bg-primary text-white px-8 py-4 rounded-2xl font-bold shadow-premium">
                    Book Assessment <span class="material-symbols-outlined text-lg">arrow_forward</span>
                </a>
            </div>
        </div>

        <!-- Service 2 -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center lg:flex-row-reverse">
            <div class="lg:order-2 relative rounded-[3rem] overflow-hidden aspect-video whisper-shadow">
                <img src="assets/gallery/parent-support.jpg" class="w-full h-full object-cover" alt="Parent Counseling">
            </div>
            <div class="lg:order-1">
                <span class="material-symbols-outlined text-secondary text-5xl mb-6">family_restroom</span>
                <h2 class="text-3xl font-extrabold text-primary mb-6">Parent Counseling & Guidance</h2>
                <p class="text-on-surface-variant text-lg leading-relaxed mb-8">
                    Supporting a child with developmental challenges requires a strong, informed support system at home. We provide parents with practical strategies, emotional support, and tools to foster a positive environment for their child's daily growth.
                </p>
                <a href="appointment.php" class="btn-interact inline-flex items-center gap-3 bg-secondary text-white px-8 py-4 rounded-2xl font-bold shadow-premium">
                    Schedule Session <span class="material-symbols-outlined text-lg">arrow_forward</span>
                </a>
            </div>
        </div>

        <!-- Service 3 -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="relative rounded-[3rem] overflow-hidden aspect-video whisper-shadow">
                <img src="assets/gallery/counseling-session.jpg" class="w-full h-full object-cover" alt="Behavior Management">
            </div>
            <div>
                <span class="material-symbols-outlined text-secondary text-5xl mb-6">psychology_alt</span>
                <h2 class="text-3xl font-extrabold text-primary mb-6">Behavior Management Support</h2>
                <p class="text-on-surface-variant text-lg leading-relaxed mb-8">
                    Our behavior management strategies are child-centered and positive. We work to understand the "why" behind challenging behaviors and implement evidence-based techniques that help children regulate their emotions and interact more effectively.
                </p>
                <a href="appointment.php" class="btn-interact inline-flex items-center gap-3 bg-primary text-white px-8 py-4 rounded-2xl font-bold shadow-premium">
                    Learn More <span class="material-symbols-outlined text-lg">arrow_forward</span>
                </a>
            </div>
        <div class="pt-24 text-center">
            <a href="index.php" class="btn-interact inline-flex items-center gap-3 bg-white text-primary border-2 border-primary/10 px-10 py-5 rounded-2xl font-bold text-lg shadow-whisper">
                <span class="material-symbols-outlined">home</span> Back to Home
            </a>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
