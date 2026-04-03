@extends('layouts.app')

@section('content')

<!-- External Assets -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet""")/>>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://fontawesome.com" crossorigin="anonymous"></script>

<style>
    body {
        background: #050505; /* Deep dark base */
        color: #e2e8f0;
        font-family: 'Inter', sans-serif;
        overflow-x: hidden;
    }

    /* Animated Radial Gradient Background */
    .bg-glow {
        position: fixed;
        top: 0; left: 0; width: 100%; height: 100%;
        background: radial-gradient(circle at 50% -20%, #1e1b4b, #000);
        z-index: -1;
    }

    /* Enhanced Glass UI */
    .glass {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    }

    /* Floating Orbs */
    .orb {
        position: absolute;
        width: 400px; height: 400px;
        border-radius: 50%;
        filter: blur(120px);
        opacity: 0.15;
        z-index: -1;
        animation: float 10s infinite alternate ease-in-out;
    }
    .orb-1 { top: -100px; left: -100px; background: #4f46e5; }
    .orb-2 { bottom: -100px; right: -100px; background: #06b6d4; animation-delay: 2s; }

    @keyframes float {
        from { transform: translate(0, 0); }
        to { transform: translate(40px, 60px); }
    }

    /* Input Styling */
    .form-group {
        position: relative;
        margin-bottom: 1.5rem;
    }
    
    .form-group label {
        display: block;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #94a3b8;
        margin-bottom: 0.5rem;
    }

    .custom-input {
        width: 100%;
        padding: 14px 16px;
        background: rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        color: #fff;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .custom-input:focus {
        border-color: #22d3ee;
        background: rgba(0, 0, 0, 0.4);
        box-shadow: 0 0 15px rgba(34, 211, 238, 0.2);
        outline: none;
        transform: translateY(-2px);
    }

    /* Button Styling */
    .btn-submit {
        width: 100%;
        padding: 16px;
        background: linear-gradient(135deg, #6366f1 0%, #06b6d4 100%);
        border: none;
        border-radius: 14px;
        font-weight: 700;
        letter-spacing: 0.5px;
        color: white;
        cursor: pointer;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px -5px rgba(6, 182, 212, 0.4);
        filter: brightness(1.1);
    }
</style>

<div class="bg-glow"></div>
<div class="orb orb-1"></div>
<div class="orb orb-2"></div>

<div class="container mx-auto px-4 min-h-screen flex flex-col justify-center items-center">
    
    <!-- Header Section -->
    <div class="text-center mb-10" id="header-content">
        <h2 id="title" class="text-5xl md:text-6xl font-extrabold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-cyan-400">
            Book Your Spot
        </h2>
        <p class="text-gray-400 mt-4 text-lg">Join us for <span class="text-cyan-300 font-semibold">{{ $event->title }}</span></p>
    </div>

    <!-- Booking Card -->
    <div class="w-full max-w-lg glass p-10 rounded-3xl relative z-10" data-aos="fade-up">
        
        <!-- Alerts -->
        @if(session('success'))
            <div class="bg-emerald-500/10 border border-emerald-500/50 text-emerald-400 p-4 rounded-xl mb-6 text-center animate-pulse">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-rose-500/10 border border-rose-500/50 text-rose-400 p-4 rounded-xl mb-6 text-sm">
                @foreach ($errors->all() as $error)
                    <p>• {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ url('/book/'.$event->id) }}" method="POST" class="space-y-6">
            @csrf

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" class="custom-input" placeholder="e.g. John Doe" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" class="custom-input" placeholder="name@company.com" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label>Create Password</label>
                <input type="password" name="password" class="custom-input" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn-submit mt-4 text-lg flex items-center justify-center gap-2">
                <span>Confirm Booking</span>
                <i class="fas fa-arrow-right"></i>
            </button>
        </form>
        
        <p class="text-center text-xs text-gray-500 mt-8">
            Secure checkout powered by <span class="text-gray-300">EventPro Pay</span>
        </p>
    </div>

    <!-- Footer -->
    <footer class="mt-16 opacity-50 text-xs tracking-widest uppercase">
        &copy; 2026 EVENTPRO &bull; PREMIUM EXPERIENCE
    </footer>
</div>

<!-- Animations -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ 
        duration: 1000,
        once: true 
    });

    // GSAP Stagger effect for title
    gsap.from("#header-content > *", {
        y: 40,
        opacity: 0,
        duration: 1,
        stagger: 0.2,
        ease: "power4.out"
    });
</script>

@endsection
