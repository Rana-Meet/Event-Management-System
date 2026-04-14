@extends('layouts.app')

@section('content')
<!-- External Assets -->
<link href="https://unpkg.com" rel="stylesheet""")/>>
<script src="https://cloudflare.com"></script>
<script src="https://jsdelivr.net"></script>
<link rel="stylesheet" href="https://cloudflare.com">

<style>
    /* Base Styles */
    body { background: #000; color: white; overflow-x: hidden; font-family: 'Inter', sans-serif; }
    #particles-js { position: fixed; width: 100%; height: 100%; z-index: -1; top: 0; left: 0; }

    /* Glassmorphism Cards */
    .glass-job-card {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 1.5rem;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
    }

    .glass-job-card:hover {
        background: rgba(255, 255, 255, 0.07);
        border-color: #22d3ee;
        transform: translateX(12px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.4);

    }

    /* Tags & Icons */
    .dept-tag {
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        padding: 6px 14px;
        border-radius: 100px;
        background: rgba(34, 211, 238, 0.1);
        color: #22d3ee;
        display: inline-block;
    }

    .benefit-icon-wrapper {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #1e293b, #0f172a);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(255, 255, 255, 0.1);
        margin: 0 auto 1rem;
        transition: transform 0.3s ease;
    }

    .benefit-card:hover .benefit-icon-wrapper {
        transform: translateY(-5px) scale(1.05);
        border-color: #22d3ee;
    }

    .btn-apply {
        background: #fff;
        color: #000;
        font-weight: 900;
        padding: 12px 32px;
        border-radius: 12px;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-apply:hover {
        background: #22d3ee;
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(34, 211, 238, 0.4);
    }
</style>

<div id="particles-js"></div>

<div class="relative z-10 py-24 px-6 max-w-6xl mx-auto">
    
    <!-- Hero Section -->
    <div class="text-center mb-24" data-aos="fade-down">
        <h1 id="careerTitle" class="text-6xl md:text-8xl font-black tracking-tighter mb-6 leading-tight">
            Join the <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-indigo-500 italic">Evolution</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
            We’re building the infrastructure for the next generation of global events. Help us redefine human connection.
        </p>
    </div>

    <!-- Benefits Grid -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-32" data-aos="fade-up">
        <div class="benefit-card text-center">
            <div class="benefit-icon-wrapper">
                <i class="fas fa-house-laptop text-2xl text-cyan-400"></i>
            </div>
            <h4 class="font-bold text-sm uppercase tracking-widest">Remote First</h4>
        </div>
        <div class="benefit-card text-center">
            <div class="benefit-icon-wrapper">
                <i class="fas fa-chart-line text-2xl text-cyan-400"></i>
            </div>
            <h4 class="font-bold text-sm uppercase tracking-widest">Equity Options</h4>
        </div>
        <div class="benefit-card text-center">
            <div class="benefit-icon-wrapper">
                <i class="fas fa-earth-americas text-2xl text-cyan-400"></i>
            </div>
            <h4 class="font-bold text-sm uppercase tracking-widest">Annual Retreats</h4>
        </div>
        <div class="benefit-card text-center">
            <div class="benefit-icon-wrapper">
                <i class="fas fa-microchip text-2xl text-cyan-400"></i>
            </div>
            <h4 class="font-bold text-sm uppercase tracking-widest">Latest Tech</h4>
            
        </div>
    </div>

    <!-- Job Listings -->
    <div class="space-y-8">
        <div class="flex items-center gap-6 mb-12">
            <h2 class="text-3xl font-black tracking-tight whitespace-nowrap">Open Positions</h2>
            <div class="h-[1px] w-full bg-gradient-to-r from-white/20 to-transparent"></div>
        </div>

        <!-- Job 1 -->
        <div class="glass-job-card p-8 flex flex-col md:flex-row md:items-center justify-between gap-8" data-aos="fade-left">
            <div>
                <span class="dept-tag">Engineering</span>
                <h3 class="text-2xl font-bold mt-3">Senior Laravel Backend Developer</h3>
                <div class="flex gap-4 mt-3 text-gray-500 text-sm">
                    <span><i class="fas fa-location-dot mr-2"></i>Remote</span>
                    <span><i class="fas fa-clock mr-2"></i>Full-time</span>
                    <span class="text-cyan-400/80">$120k - $160k</span>
                </div>
            </div>
            <button class="btn-apply">Apply Now</button>
        </div>

        <!-- Job 2 -->
        <div class="glass-job-card p-8 flex flex-col md:flex-row md:items-center justify-between gap-8" data-aos="fade-left" data-aos-delay="100">
            <div>
                <span class="dept-tag">Design</span>
                <h3 class="text-2xl font-bold mt-3">Product Designer (UI/UX)</h3>
                <div class="flex gap-4 mt-3 text-gray-500 text-sm">
                    <span><i class="fas fa-location-dot mr-2"></i>Remote</span>
                    <span><i class="fas fa-clock mr-2"></i>Full-time</span>
                    <span class="text-cyan-400/80">$90k - $130k</span>
                </div>
            </div>
            <button class="btn-apply">Apply Now</button>
        </div>

        <!-- Job 3 -->
        <div class="glass-job-card p-8 flex flex-col md:flex-row md:items-center justify-between gap-8" data-aos="fade-left" data-aos-delay="200">
            <div>
                <span class="dept-tag">Growth</span>
                <h3 class="text-2xl font-bold mt-3">Community & Events Manager</h3>
                <div class="flex gap-4 mt-3 text-gray-500 text-sm">
                    <span><i class="fas fa-location-dot mr-2"></i>NY / London</span>
                    <span><i class="fas fa-clock mr-2"></i>Full-time</span>
                    <span class="text-cyan-400/80">$80k - $110k</span>
                </div>
            </div>
            <button class="btn-apply">Apply Now</button>
        </div>
    </div>

    <!-- General Application Footer -->
    <div class="mt-32 p-16 glass-job-card text-center border-dashed border-2 border-white/10" data-aos="zoom-in">
        <h3 class="text-3xl font-black mb-4">Don't see a perfect fit?</h3>
        <p class="text-gray-400 mb-10 text-lg">We're always looking for exceptional talent. Send us your portfolio anyway.</p>
        <a href="mailto:careers@eventpro2026.com" class="group text-cyan-400 text-xl font-bold transition-all">
            Send a General Application 
            <span class="inline-block transition-transform group-hover:translate-x-2">→</span>
        </a>
    </div>

</div>

<!-- Scripts -->
<script src="https://unpkg.com"></script>
<script>
    // Initialize Animations
    AOS.init({ 
        duration: 1000, 
        once: true,
        easing: 'ease-out-back'
        
    });

    // GSAP Title Animation
    gsap.from("#careerTitle", { 
        y: 80, 
        opacity: 0, 
        duration: 1.5, 
        ease: "power4.out" 
    });

    // Particle Background Config
    particlesJS("particles-js", {
        "particles": {
            "number": { "value": 60, "density": { "enable": true, "value_area": 800 } },
            "color": { "value": "#22d3ee" },
            "shape": { "type": "circle" },
            "opacity": { "value": 0.2, "random": true },
            "size": { "value": 2, "random": true },
            "line_linked": { "enable": true, "distance": 150, "color": "#22d3ee", "opacity": 0.1, "width": 1 },
            "move": { "enable": true, "speed": 1.2, "direction": "none", "random": true, "straight": false, "out_mode": "out" }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": { "onhover": { "enable": true, "mode": "grab" }, "onclick": { "enable": true, "mode": "push" } }
        },
        "retina_detect": true
        
    });
</script>
@endsection
