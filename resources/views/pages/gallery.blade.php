@extends('layouts.app')

@section('title', 'Gallery - Life Circle Regulation')

@section('content')
<div class="bg-surface pt-32 pb-20">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <h1 class="text-4xl md:text-5xl font-black text-primary font-manrope mb-6">Our Sanctuary</h1>
            <p class="text-secondary-dark text-lg leading-relaxed">
                Take a glimpse into our warm, welcoming, and secure environment designed specifically to help children and families feel at ease during their developmental journey.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Gallery Item 1 -->
            <div class="group relative overflow-hidden rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300">
                <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?q=80&w=1000&auto=format&fit=crop" alt="Therapy Room" class="w-full h-80 object-cover transform group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-primary/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <p class="text-white font-bold text-xl text-center px-4">Welcoming Reception<br><span class="text-sm font-normal text-white/80">A safe space begins here</span></p>
                </div>
            </div>

            <!-- Gallery Item 2 -->
            <div class="group relative overflow-hidden rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300">
                <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?q=80&w=1000&auto=format&fit=crop" alt="Play Therapy" class="w-full h-80 object-cover transform group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-primary/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <p class="text-white font-bold text-xl text-center px-4">Interactive Play Zone<br><span class="text-sm font-normal text-white/80">Encouraging expressive growth</span></p>
                </div>
            </div>

            <!-- Gallery Item 3 -->
            <div class="group relative overflow-hidden rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300">
                <img src="https://images.unsplash.com/photo-1573497620053-ea5300f94f21?q=80&w=1000&auto=format&fit=crop" alt="Consultation" class="w-full h-80 object-cover transform group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-primary/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <p class="text-white font-bold text-xl text-center px-4">Consultation Room<br><span class="text-sm font-normal text-white/80">Private and comfortable</span></p>
                </div>
            </div>

            <!-- Gallery Item 4 -->
            <div class="group relative overflow-hidden rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300">
                <img src="https://images.unsplash.com/photo-1551847677-dc82d7624c96?q=80&w=1000&auto=format&fit=crop" alt="Family Session" class="w-full h-80 object-cover transform group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-primary/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <p class="text-white font-bold text-xl text-center px-4">Family Bonding Area<br><span class="text-sm font-normal text-white/80">Shared healing environment</span></p>
                </div>
            </div>

            <!-- Gallery Item 5 -->
            <div class="group relative overflow-hidden rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300">
                <img src="https://images.unsplash.com/photo-1499209974431-9dddcece7f88?q=80&w=1000&auto=format&fit=crop" alt="Assessment Tools" class="w-full h-80 object-cover transform group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-primary/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <p class="text-white font-bold text-xl text-center px-4">Sensory Materials<br><span class="text-sm font-normal text-white/80">Evidence-based developmental tools</span></p>
                </div>
            </div>

            <!-- Gallery Item 6 -->
            <div class="group relative overflow-hidden rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300">
                <img src="https://images.unsplash.com/photo-1516627145497-ae6968895b74?q=80&w=1000&auto=format&fit=crop" alt="Peaceful Corner" class="w-full h-80 object-cover transform group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-primary/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <p class="text-white font-bold text-xl text-center px-4">Relaxation Corner<br><span class="text-sm font-normal text-white/80">For moments of quiet reflection</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
