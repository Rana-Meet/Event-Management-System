@extends('layouts.app')

@section('content')

<!-- 1. FIXED External Assets (Corrected CDN Links) -->
<link href="https://unpkg.com" rel="stylesheet">
<script src="https://cloudflare.com"></script>
<link rel="stylesheet" href="https://cloudflare.com">

<style>
    /* 2. THE FIX: Hide the unwanted Navigation Bar from layouts.app */
    nav, .navbar, header, #navbar {
        display: none !important;
    }

    body {
        background: #020617; 
        color: #f8fafc;
        font-family: 'Plus Jakarta Sans', sans-serif;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        overflow: hidden;
    }

    /* Floating Neon Glows */
    .orb {
        position: absolute;
        width: 300px; height: 300px;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.2;
        z-index: -1;
        animation: float 8s infinite alternate ease-in-out;
    }
    .orb-1 { top: 10%; left: 15%; background: #4f46e5; }
    .orb-2 { bottom: 10%; right: 15%; background: #06b6d4; animation-delay: 2s; }

    @keyframes float {
        from { transform: translate(0, 0) scale(1); }
        to { transform: translate(30px, 40px) scale(1.1); }
    }

    .premium-card {
        width: 100%;
        max-width: 380px;
        background: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 28px;
        padding: 2.5rem;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.8);
        position: relative;
        z-index: 10;
    }

    .form-label {
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #64748b;
        margin-bottom: 8px;
        display: block;
    }

    .glass-input {
        width: 100%;
        background: rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.05);
        padding: 14px 16px;
        border-radius: 14px;
        color: #fff;
        transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        margin-bottom: 20px;
    }

    .glass-input:focus {
        outline: none;
        border-color: #22d3ee;
        background: rgba(0, 0, 0, 0.5);
        box-shadow: 0 0 20px rgba(34, 211, 238, 0.15);
    }

    .btn-glow {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #6366f1 0%, #06b6d4 100%);
        border: none;
        border-radius: 14px;
        color: white;
        font-weight: 800;
        letter-spacing: 0.5px;
        cursor: pointer;
        transition: 0.4s;
    }

    .btn-glow:hover {
        transform: translateY(-2px);
        filter: brightness(1.1);
        box-shadow: 0 20px 25px -5px rgba(6, 182, 212, 0.4);
    }
</style>

<div class="orb orb-1"></div>
<div class="orb orb-2"></div>

<div class="flex flex-col items-center">
    <div class="text-center mb-8" id="header-gsap">
        <h2 class="text-4xl font-black tracking-tighter mb-2 bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-cyan-300">
            Book Spot
        </h2>
        <p class="text-gray-400 text-sm font-medium">Join <span class="text-white">{{ $event->title }}</span></p>
    </div>

    <div class="premium-card" data-aos="zoom-in">
        <form action="{{ url('/book/'.$event->id) }}" method="POST">
            @csrf
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="glass-input" placeholder="Enter name" required>

            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="glass-input" placeholder="your@email.com" required>

            <label class="form-label">Create Password</label>
            <input type="password" name="password" class="glass-input" placeholder="••••••••" required>

            <button type="submit" class="btn-glow mt-2">
                Confirm Booking <i class="fas fa-arrow-right ml-2 text-xs"></i>
            </button>
        </form>

        <p class="text-center text-[10px] text-gray-500 mt-8 font-bold tracking-[3px] uppercase">
            EventPro Premium
        </p>
    </div>
</div>


<script src="https://unpkg.com"></script>
<script>
    AOS.init({ duration: 800, once: true });

    gsap.from("#header-gsap > *", {
        y: 30,
        opacity: 0,
        duration: 0.8,
        stagger: 0.2,
        ease: "back.out(1.7)"
    });
</script>

@endsection