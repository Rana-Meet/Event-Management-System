@extends('layouts.app')

@section('content')
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet"  />
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/particles.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

    .pricing-card {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.4s ease;
        display: flex;
        flex-direction: column;
    }

    .pricing-card:hover {
        border-color: rgba(34, 211, 238, 0.5);
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    }

    .pro-border {
        border: 2px solid #22d3ee;
        position: relative;
    }

    .popular-badge {
        position: absolute;
        top: -15px;
        left: 50%;
        transform: translateX(-50%);
        background: linear-gradient(45deg, #0891b2, #4f46e5);
        color: white;
        padding: 4px 15px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .feature-item {
        font-size: 14px;
        color: #94a3b8;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .feature-item i {
        color: #22d3ee;
    }

    .btn-glow {
        background: linear-gradient(45deg, #4f46e5, #0891b2);
        transition: 0.3s;
    }

    .btn-glow:hover {
        box-shadow: 0 0 20px rgba(34, 211, 238, 0.6);
        transform: scale(1.02);
    }
</style>

<div id="particles-js"></div>

<div class="py-24 px-6 max-w-7xl mx-auto">
    
    <div class="text-center mb-20" data-aos="fade-down">
        <h2 id="pricingTitle" class="text-5xl md:text-7xl font-black tracking-tighter mb-6">
            Simple <span class="text-cyan-400">Pricing</span>
        </h2>
        <p class="text-gray-400 text-lg max-w-xl mx-auto">
            Choose a plan that fits the scale of your event. No hidden fees, just pure performance.
        </p>
    </div>

    <div class="grid md:grid-cols-3 gap-8 items-center">
        
        <div class="pricing-card p-10 rounded-[2.5rem]" data-aos="fade-up" data-aos-delay="100">
            <h3 class="text-2xl font-bold mb-2">Starter</h3>
            <p class="text-gray-500 text-sm mb-8">For small community meetups</p>
            <div class="mb-8">
                <span class="text-5xl font-black">₹0</span>
                <span class="text-gray-500">/month</span>
            </div>
            
            <div class="flex-grow mb-10">
                <div class="feature-item"><i class="fas fa-check-circle"></i> Up to 50 Attendees</div>
                <div class="feature-item"><i class="fas fa-check-circle"></i> Standard QR Tickets</div>
                <div class="feature-item"><i class="fas fa-check-circle"></i> Basic Analytics</div>
                <div class="feature-item text-gray-600"><i class="fas fa-times-circle text-gray-700"></i> Custom Branding</div>
            </div>

            <button class="btn-glow w-full py-4 rounded-2xl font-bold uppercase tracking-widest text-sm">
                Get Started
            </button>
        </div>

        <div class="pricing-card pro-border p-10 rounded-[2.5rem] bg-white/5 scale-105" data-aos="zoom-in">
            <div class="popular-badge">Most Popular</div>
            <h3 class="text-2xl font-bold mb-2 text-cyan-400">Pro</h3>
            <p class="text-gray-400 text-sm mb-8">For professional event organizers</p>
            <div class="mb-8">
                <span class="text-5xl font-black text-white">₹1,999</span>
                <span class="text-gray-500">/month</span>
            </div>
            
            <div class="flex-grow mb-10">
                <div class="feature-item"><i class="fas fa-check-circle"></i> Unlimited Attendees</div>
                <div class="feature-item"><i class="fas fa-check-circle"></i> Custom PDF Ticket Designs</div>
                <div class="feature-item"><i class="fas fa-check-circle"></i> Real-time Door Scanning</div>
                <div class="feature-item"><i class="fas fa-check-circle"></i> Email Marketing Tools</div>
                <div class="feature-item"><i class="fas fa-check-circle"></i> Priority 24/7 Support</div>
            </div>

            <button class="btn-glow w-full py-4 rounded-2xl font-bold uppercase tracking-widest text-sm text-white">
                Start Pro Trial
            </button>
        </div>

        <div class="pricing-card p-10 rounded-[2.5rem]" data-aos="fade-up" data-aos-delay="200">
            <h3 class="text-2xl font-bold mb-2">Enterprise</h3>
            <p class="text-gray-500 text-sm mb-8">For global-scale conferences</p>
            <div class="mb-8">
                <span class="text-5xl font-black">Custom</span>
            </div>
            
            <div class="flex-grow mb-10">
                <div class="feature-item"><i class="fas fa-check-circle"></i> Multiple User Accounts</div>
                <div class="feature-item"><i class="fas fa-check-circle"></i> API & Webhook Access</div>
                <div class="feature-item"><i class="fas fa-check-circle"></i> White-label Solution</div>
                <div class="feature-item"><i class="fas fa-check-circle"></i> Dedicated Account Manager</div>
            </div>

            <button class="border border-white/20 hover:bg-white hover:text-black transition-all w-full py-4 rounded-2xl font-bold uppercase tracking-widest text-sm">
                Contact Sales
            </button>
        </div>

    </div>

    <p class="text-center mt-20 text-gray-600 text-sm">
        All plans include 256-bit SSL security. Need a custom plan? <a href="/demo" class="text-cyan-400 hover:underline">Book a demo.</a>
    </p>
</div>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ duration: 1000, once: true });

    gsap.from("#pricingTitle", { 
        y: 50, 
        opacity: 0, 
        duration: 1.5, 
        ease: "power4.out" 
    });

    particlesJS("particles-js", {
        "particles": {
            "number": { "value": 60 },
            "color": { "value": "#22d3ee" },
            "opacity": { "value": 0.1 },
            "size": { "value": 1.5 },
            "move": { "speed": 1 }
        }
    });
</script>
@endsection