@extends('layouts.app')

@section('content')

<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<style>
    /* Hides the Admin/Home nav from your layouts.app */
    nav, .navbar { display: none !important; }

    body {
        background: radial-gradient(circle at top right, #1a1a2e, #0a0a0c);
        color: #e2e8f0;
        font-family: 'Inter', sans-serif;
        overflow-x: hidden;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        box-shadow: 0 20px 50px rgba(0,0,0,0.3);
    }

    .orb {
        position: absolute; border-radius: 50%; filter: blur(80px); z-index: -1; opacity: 0.15;
    }

    /* Input Styling */
    .form-group { margin-bottom: 1.5rem; }
    .form-label { 
        display: block; 
        font-size: 0.75rem; 
        color: #38bdf8; 
        margin-bottom: 6px; 
        font-weight: 700; 
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    
    input, select, textarea {
        width: 100%; padding: 14px; background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 12px; color: white;
        transition: 0.3s;
    }
    input:focus { border-color: #38bdf8; outline: none; background: rgba(255,255,255,0.07); }

    .btn-premium {
        width: 100%; padding: 16px; background: linear-gradient(135deg, #38bdf8, #818cf8);
        border-radius: 12px; font-weight: 800; color: white; transition: 0.3s;
        border: none; cursor: pointer; text-transform: uppercase; letter-spacing: 1px;
    }
    .btn-premium:hover { transform: translateY(-3px); box-shadow: 0 10px 30px rgba(56, 189, 248, 0.4); }

    .btn-home {
        color: #94a3b8; text-decoration: none; font-size: 0.9rem; transition: 0.3s;
        display: inline-flex; align-items: center; gap: 5px;
    }
    .btn-home:hover { color: #38bdf8; }
</style>

<div class="relative min-h-screen flex flex-col items-center justify-center px-4 py-20">
    <div class="orb w-96 h-96 bg-cyan-500 top-[-10%] left-[-10%]"></div>
    <div class="orb w-80 h-80 bg-purple-600 bottom-[10%] right-[-5%]"></div>

    <div class="text-center mb-12" id="header-content">
        <a href="/" class="btn-home mb-6" data-aos="fade-down">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            Back to Home
        </a>
        <h1 class="text-5xl md:text-6xl font-black tracking-tight mb-4 text-white">
            Experience <span class="text-cyan-400">EventPro</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-lg mx-auto">
            Book a personalized walkthrough of the world’s most powerful event management system.
        </p>
    </div>

    <div class="w-full max-w-2xl glass-card p-10 rounded-[2rem]" data-aos="zoom-in">
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-500/10 border border-green-500/30 rounded-xl text-green-400 text-center font-medium">
                {{ session('success') }}
            </div>
        @endif

        <form action="/demo" method="POST" id="demoForm">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" placeholder="John Doe" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Work Email</label>
                    <input type="email" name="email" placeholder="john@company.com" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-group">
                    <label class="form-label">Company Name</label>
                    <input type="text" name="company" placeholder="Acme Corp">
                </div>
                <div class="form-group">
                    <label class="form-label">Plan Interest</label>
                    <select name="plan">
                        <option value="basic">Basic Tier</option>
                        <option value="pro" selected>Professional Tier</option>
                        <option value="enterprise">Enterprise Solutions</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Message (Optional)</label>
                <textarea name="message" rows="3" placeholder="Tell us about your event needs..."></textarea>
            </div>

            <button type="submit" class="btn-premium mt-2">
                Get My Demo Invitation →
            </button>
        </form>
    </div>

    <p class="mt-8 text-gray-600 text-sm">© 2026 EventPro Solutions. All rights reserved.</p>
</div>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ duration: 1000, once: true });
    
    // GSAP Entrance Animation
    gsap.from("h1", { opacity: 0, y: 30, duration: 1, ease: "power4.out" });
    gsap.from("p", { opacity: 0, y: 20, duration: 1, delay: 0.3 });

    document.getElementById('demoForm').onsubmit = function() {
        const btn = this.querySelector('button');
        btn.innerHTML = `<span class="animate-pulse">Preparing your demo...</span>`;
        btn.style.opacity = "0.8";
    };
</script>

@endsectionx