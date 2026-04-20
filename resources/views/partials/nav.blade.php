<!-- Humanized Navigation: Clear, Emotional, and Professional -->
<nav class="fixed top-0 w-full z-50 transition-all duration-500 organic-easing h-16 md:h-24 flex justify-between items-center px-4 md:px-8 lg:px-16 max-w-full" id="topNav">
    <div class="flex items-center gap-2 md:gap-3">
        <img alt="Life Circle Logo" class="h-8 w-8 md:h-12 md:w-12 object-contain" src="{{ asset('logo.png') }}">
        <div class="flex flex-col">
            <span class="text-base md:text-xl font-extrabold text-primary font-manrope leading-tight uppercase tracking-tight">Life Circle</span>
            <span class="text-[7px] md:text-[10px] text-secondary font-bold tracking-tighter uppercase">Counseling Services</span>
        </div>
    </div>
    <div class="hidden md:flex items-center gap-8 font-manrope font-bold tracking-tight">
        <a class="text-on-surface-variant hover:text-primary transition-colors text-sm" href="{{ route('home') }}#about">About</a>
        <a class="text-on-surface-variant hover:text-primary transition-colors text-sm" href="{{ route('home') }}#services">Services</a>
        <a class="text-on-surface-variant hover:text-primary transition-colors text-sm" href="{{ route('home') }}#contact">Contact</a>
        
        @auth
            @if(Auth::user()->role === 'admin')
                <a class="text-secondary bg-secondary/5 px-4 py-2 rounded-full hover:bg-secondary/10 transition-all text-sm" href="{{ route('admin.list') }}">Admin Portal</a>
            @else
                <a class="text-secondary bg-secondary/5 px-4 py-2 rounded-full hover:bg-secondary/10 transition-all text-sm" href="{{ route('dashboard') }}">My Dashboard</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-red-400 hover:text-red-600 transition-colors text-xs uppercase tracking-widest">Logout</button>
                </form>
            @endif
        @else
            <a class="text-on-surface-variant hover:text-primary transition-colors text-sm font-bold" href="{{ route('login') }}">Login</a>
            <a class="text-secondary bg-secondary/5 px-4 py-2 rounded-full hover:bg-secondary/10 transition-all text-sm font-bold" href="{{ route('register') }}">Register</a>
        @endauth
    </div>
    <a href="{{ route('enroll') }}" class="btn-interact bg-primary text-on-primary px-3 md:px-6 py-1.5 md:py-2.5 rounded-full font-manrope font-bold hover:brightness-110 shadow-lg text-[9px] md:text-base whitespace-nowrap font-bengali">
        DMC কোর্সে ভর্তি হোন
    </a>
</nav>

<style>
    nav.scrolled {
        height: 4.5rem;
        background-color: rgba(253, 250, 245, 0.9);
        backdrop-filter: blur(12px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
    }
    .btn-interact {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .btn-interact:active {
        transform: scale(0.95);
    }
</style>

<script>
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
</script>
