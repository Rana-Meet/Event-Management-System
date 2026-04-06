@extends('layouts.app')

@section('content')
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/particles.js"></script>

<style>
    body {
        background: #000;
        color: white;
    }

    #particles-js {
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: -1;
    }

    .glass-blog-card {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .glass-blog-card:hover {
        transform: translateY(-12px);
        border-color: rgba(34, 211, 238, 0.4);
        box-shadow: 0 20px 40px rgba(0, 240, 255, 0.1);
    }

    .category-badge {
        background: rgba(34, 211, 238, 0.1);
        color: #22d3ee;
        padding: 4px 12px;
        border-radius: 100px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .read-more-btn {
        position: relative;
        overflow: hidden;
        display: inline-block;
        transition: 0.3s;
    }

    .read-more-btn::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 1px;
        background: #22d3ee;
        transition: 0.3s;
    }

    .glass-blog-card:hover .read-more-btn::after {
        width: 100%;
    }

    /* Background Glow */
    .bg-glow {
        position: fixed;
        top: 20%;
        right: 10%;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(79, 70, 229, 0.1) 0%, transparent 70%);
        z-index: -1;
    }
</style>

<div id="particles-js"></div>
<div class="bg-glow"></div>

<div class="py-20 px-6 max-w-7xl mx-auto">
    
    <div class="text-center mb-20" data-aos="fade-down">
        <h1 id="blogTitle" class="text-5xl md:text-7xl font-black mb-4 tracking-tighter">
            Event <span class="text-cyan-400 italic">Insights</span>
        </h1>
        <p class="text-gray-400 text-lg">Deep dives into the future of event management.</p>
    </div>

    <div class="glass-blog-card rounded-[2.5rem] p-8 mb-16 flex flex-col md:flex-row gap-10 items-center" data-aos="fade-up">
        <div class="w-full md:w-1/2 h-80 rounded-3xl overflow-hidden bg-gradient-to-br from-indigo-600 to-cyan-500 relative">
            <div class="absolute inset-0 bg-black/20"></div>
            <div class="absolute bottom-6 left-6">
                <span class="bg-white/10 backdrop-blur-md px-4 py-2 rounded-lg text-xs font-bold uppercase">Trending Now</span>
            </div>
        </div>
        <div class="w-full md:w-1/2">
            <span class="category-badge mb-4 inline-block">Industry News</span>
            <h2 class="text-3xl font-bold mb-4 leading-tight">The Future of AI in Events: How 2026 is Changing Everything</h2>
            <p class="text-gray-400 mb-6 text-lg">Beyond just chatbots—discover how predictive analytics and biometric check-ins are creating friction-less guest experiences.</p>
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-gray-800 border border-gray-700"></div>
                <div>
                    <p class="text-sm font-bold">Admin Team</p>
                    <p class="text-xs text-gray-500">March 28, 2026 • 8 min read</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
        
        <div class="glass-blog-card rounded-3xl overflow-hidden" data-aos="fade-up" data-aos-delay="100">
            <div class="h-56 bg-gray-900 border-b border-white/5 relative">
                <div class="absolute inset-0 flex items-center justify-center">
                   <i class="fas fa-microchip text-5xl text-white/10"></i>
                </div>
            </div>
            <div class="p-8">
                <span class="category-badge mb-4 inline-block">Technology</span>
                <h3 class="text-xl font-bold mb-3">Blockchain for Ticket Security</h3>
                <p class="text-gray-400 text-sm mb-6 leading-relaxed">Stop scalping before it starts. Learn how NFT-backed tickets are securing the secondary market.</p>
                <a href="#" class="read-more-btn text-cyan-400 text-sm font-bold">Read Full Story →</a>
            </div>
        </div>

        <div class="glass-blog-card rounded-3xl overflow-hidden" data-aos="fade-up" data-aos-delay="200">
            <div class="h-56 bg-gray-900 border-b border-white/5 relative">
                <div class="absolute inset-0 flex items-center justify-center">
                   <i class="fas fa-leaf text-5xl text-white/10"></i>
                </div>
            </div>
            <div class="p-8">
                <span class="category-badge mb-4 inline-block">Sustainability</span>
                <h3 class="text-xl font-bold mb-3">Eco-Friendly Event Planning</h3>
                <p class="text-gray-400 text-sm mb-6 leading-relaxed">How to host large-scale conferences with zero-waste goals using smart catering technology.</p>
                <a href="#" class="read-more-btn text-cyan-400 text-sm font-bold">Read Full Story →</a>
            </div>
        </div>

        <div class="glass-blog-card rounded-3xl overflow-hidden" data-aos="fade-up" data-aos-delay="300">
            <div class="h-56 bg-gray-900 border-b border-white/5 relative">
                <div class="absolute inset-0 flex items-center justify-center">
                   <i class="fas fa-vr-cardboard text-5xl text-white/10"></i>
                </div>
            </div>
            <div class="p-8">
                <span class="category-badge mb-4 inline-block">Virtual</span>
                <h3 class="text-xl font-bold mb-3">Hybrid Events in the Metaverse</h3>
                <p class="text-gray-400 text-sm mb-6 leading-relaxed">Bridging the gap between physical attendees and remote VR participants seamlessly.</p>
                <a href="#" class="read-more-btn text-cyan-400 text-sm font-bold">Read Full Story →</a>
            </div>
        </div>

    </div>
</div>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ duration: 1000, once: true });

    gsap.from("#blogTitle", { 
        y: 40, 
        opacity: 0, 
        duration: 1.5, 
        ease: "power4.out" 
    });

    particlesJS("particles-js", {
        "particles": {
            "number": { "value": 40 },
            "color": { "value": "#22d3ee" },
            "opacity": { "value": 0.1 },
            "size": { "value": 1.5 },
            "move": { "speed": 1 }
        }
    });
</script>
@endsection