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
    }

    /* Glass Effect */
    .feature-card {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 1.5rem;
        transition: 0.4s ease;
    }

    .feature-card:hover {
        background: rgba(255, 255, 255, 0.07);
        border-color: #22d3ee;
        transform: scale(1.02);
    }

    /* Icon Glow */
    /* .icon-box {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: linear-gradient(45deg, #0891b2, #4f46e5);
        box-shadow: 0 0 15px rgba(34, 211, 238, 0.3);
    } */

    .section-divider {
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(34, 211, 238, 0.5), transparent);
        margin: 4rem 0;
    }

    .text-cyan { color: #22d3ee; }
</style>

<div id="particles-js"></div>

<div class="py-20 px-6 max-w-7xl mx-auto">
    
    <div class="text-center mb-16" data-aos="fade-down">
        <h1 id="featureTitle" class="text-5xl md:text-7xl font-black tracking-tight mb-6">
            Powerful <span class="text-cyan">Capabilities</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto">
            Everything you need to host world-class events, from automated ticketing to real-time attendee analytics.
        </p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        
        <div class="feature-card p-8" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box mb-6">
                <i class="fas fa-qrcode text-white text-xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-3">Smart QR Ticketing</h3>
            <p class="text-gray-500 text-sm leading-relaxed">
                Instant PDF generation with secure QR codes. Validated in milliseconds at the door with our mobile scanner app.
            </p>
        </div>

        <div class="feature-card p-8" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box mb-6">
                <i class="fas fa-chart-line text-white text-xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-3">Real-time Analytics</h3>
            <p class="text-gray-500 text-sm leading-relaxed">
                Track ticket sales, attendance rates, and revenue growth with live dashboards that update as it happens.
            </p>
        </div>

        <div class="feature-card p-8" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box mb-6">
                <i class="fas fa-envelope-open-text text-white text-xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-3">Automated Emails</h3>
            <p class="text-gray-500 text-sm leading-relaxed">
                Send booking confirmations and digital tickets automatically via email. Keep your guests informed 24/7.
            </p>
        </div>

        <div class="feature-card p-8" data-aos="fade-up" data-aos-delay="400">
            <div class="icon-box mb-6">
                <i class="fas fa-credit-card text-white text-xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-3">Global Payments</h3>
            <p class="text-gray-500 text-sm leading-relaxed">
                Seamless Razorpay and Stripe integration. Accept payments in any currency with local tax handling.
            </p>
        </div>

        <div class="feature-card p-8" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box mb-6">
                <i class="fas fa-users-cog text-white text-xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-3">Guest Management</h3>
            <p class="text-gray-500 text-sm leading-relaxed">
                Easily manage attendee lists, dietary requirements, and VIP status from a single, centralized admin panel.
            </p>
        </div>

        <div class="feature-card p-8" data-aos="fade-up" data-aos-delay="600">
            <div class="icon-box mb-6">
                <i class="fas fa-mobile-alt text-white text-xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-3">Mobile Optimized</h3>
            <p class="text-gray-500 text-sm leading-relaxed">
                A fully responsive interface that looks stunning on iPhones, Androids, and tablets alike.
            </p>
        </div>

    </div>

    <div class="section-divider"></div>

    <div class="glass p-12 rounded-[3rem] text-center" data-aos="zoom-in">
        <h2 class="text-3xl font-bold mb-4">Ready to host your next event?</h2>
        <p class="text-gray-400 mb-8">Join thousands of organizers using EventPro today.</p>
        <div class="flex flex-col md:flex-row gap-4 justify-center">
            <a href="/login" class="bg-cyan-500 hover:bg-cyan-400 text-black font-bold px-8 py-3 rounded-full transition">Get Started Free</a>
            <a href="/demo" class="border border-white/20 hover:border-white text-white px-8 py-3 rounded-full transition">Book a Live Demo</a>
        </div>
    </div>
</div>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ duration: 1000, once: true });

    gsap.from("#featureTitle", { 
        y: 40, 
        opacity: 0, 
        duration: 1.5, 
        ease: "power4.out" 
    });

    particlesJS("particles-js", {
        "particles": {
            "number": { "value": 50 },
            "color": { "value": "#22d3ee" },
            "opacity": { "value": 0.15 },
            "size": { "value": 1.5 },
            "move": { "speed": 1 }
        }
    });
</script>
@endsection