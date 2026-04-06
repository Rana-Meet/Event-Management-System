@extends('layouts.app')

@section('content')
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/particles.js"></script>

<style>
    body {
        background: #000;
        color: white;
        overflow-x: hidden;
    }

    #particles-js {
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: -1;
        top: 0;
        left: 0;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 2rem;
    }

    .text-gradient {
        background: linear-gradient(to right, #22d3ee, #818cf8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .glow-orb {
        position: absolute;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(34, 211, 238, 0.15) 0%, rgba(0,0,0,0) 70%);
        border-radius: 50%;
        z-index: -1;
    }
</style>

<div id="particles-js"></div>

<div class="relative min-h-screen flex flex-col items-center justify-center px-6 py-20">
    <div class="glow-orb top-[-10%] left-[-10%]"></div>
    <div class="glow-orb bottom-[-10%] right-[-10%]"></div>

    <div class="text-center mb-16" data-aos="fade-up">
        <h1 id="aboutTitle" class="text-6xl md:text-7xl font-black tracking-tighter mb-6">
            Our <span class="text-gradient">Mission</span>
        </h1>
        <p class="text-gray-400 max-w-3xl text-xl leading-relaxed mx-auto">
            EventPro 2026 is dedicated to revolutionizing how the world experiences events through 
            <span class="text-white font-semibold">seamless technology</span> and 
            <span class="text-white font-semibold">premium design</span>.
        </p>
    </div>

    <div class="grid md:grid-cols-3 gap-8 max-w-6xl w-full" data-aos="zoom-in" data-aos-delay="200">
        <div class="glass-card p-8 hover:border-cyan-500/50 transition-all duration-500 group">
            <div class="w-12 h-12 bg-cyan-500/20 rounded-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                <i class="fas fa-bolt text-cyan-400 text-xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-3">Lightning Fast</h3>
            <p class="text-gray-500 text-sm">Real-time check-ins and instant ticket generation powered by next-gen cloud infra.</p>
        </div>

        <div class="glass-card p-8 hover:border-purple-500/50 transition-all duration-500 group">
            <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                <i class="fas fa-shield-alt text-purple-400 text-xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-3">Secure & Verified</h3>
            <p class="text-gray-500 text-sm">Every booking is encrypted and blockchain-verified to prevent fraud and scalping.</p>
        </div>

        <div class="glass-card p-8 hover:border-indigo-500/50 transition-all duration-500 group">
            <div class="w-12 h-12 bg-indigo-500/20 rounded-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                <i class="fas fa-magic text-indigo-400 text-xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-3">Premium UX</h3>
            <p class="text-gray-500 text-sm">A distraction-free interface designed for organizers who care about every detail.</p>
        </div>
    </div>

    <a href="/" class="mt-16 text-gray-500 hover:text-cyan-400 transition-colors flex items-center gap-2 text-sm uppercase font-bold tracking-widest">
        <i class="fas fa-arrow-left"></i> Back to Home
    </a>
</div>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    // Initialize Animations
    AOS.init({ duration: 1000, once: true });
    
    // GSAP Title Animation
    gsap.from("#aboutTitle", { 
        y: 60, 
        opacity: 0, 
        duration: 1.2, 
        ease: "power4.out" 
    });

    // Initialize Particles
    particlesJS("particles-js", {
        "particles": {
            "number": { "value": 60 },
            "color": { "value": "#22d3ee" },
            "shape": { "type": "circle" },
            "opacity": { "value": 0.2 },
            "size": { "value": 2 },
            "move": { "speed": 1.5 }
        },
        "interactivity": {
            "events": { "onhover": { "enable": true, "mode": "repulse" } }
        }
    });
</script>
@endsection