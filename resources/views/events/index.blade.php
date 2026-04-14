<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventPro Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js"></script>

    <style>
        h2.font-black {
    background: linear-gradient(to bottom, #ffffff 0%, #a1a1a1 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Optional: Smooth floating animation for the stats icons */
.flex.flex-col.items-center div i {
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-5px); }
    100% { transform: translateY(0px); }
}
        body {
            background: #000;
            color: white;
            overflow-x: hidden;
            opacity: 0;
            transition: opacity 0.6s ease;
        }
        body.loaded { opacity: 1; }

        .sidebar {
            width: 260px;
            background: rgba(0,0,0,0.85);
            backdrop-filter: blur(12px);
            position: fixed;
            left: -260px;
            top: 0;
            height: 100%;
            transition: 0.3s;
            z-index: 50;
            border-right: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar.active { left: 0; }

        @media(min-width:768px){
            .sidebar { left: 0; }
        }

        .glass {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,0.1);
        }

        .card-hover:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 0 30px rgba(0,255,255,0.3);
        }

        .btn-glow {
            background: linear-gradient(45deg,#4f46e5,#00f0ff);
        }
        .btn-glow:hover {
            box-shadow: 0 0 20px #00f0ff;
            transform: scale(1.05);
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        .animate-marquee {
            display: flex;
            width: max-content;
            animation: scroll 30s linear infinite;
        }

        .status-input {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            transition: 0.3s;
        }
        .status-input:focus {
            border-color: #00f0ff;
            outline: none;
            background: rgba(255,255,255,0.1);
        }
    </style>
</head>

<body>

<div id="particles-js"></div>

<div id="sidebar" class="sidebar text-white p-6 flex flex-col">
    <h2 class="text-2xl font-bold mb-10 text-cyan-400">EventPro</h2>

    <nav class="flex-grow">
        <a href="/" class="block mb-4 hover:text-cyan-400"><i class="fa fa-home mr-2"></i> Home</a>
        <a href="/mybookings" class="block mb-4 hover:text-cyan-400"><i class="fa fa-ticket mr-2"></i> My Events</a>
        <a href="/profile" class="block mb-4 hover:text-cyan-400"><i class="fa fa-user mr-2"></i> Profile</a>
        <a href="/admin/login" class="block mb-4 hover:text-cyan-400"><i class="fa fa-lock mr-2"></i> Admin</a>
        <a href="/login" class="block mb-10 hover:text-cyan-400"><i class="fa fa-sign-in mr-2"></i> Login</a>
    </nav>

    <div class="mt-auto pt-6 border-t border-gray-800">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-widest mb-3">Check Demo Status</p>
        <div class="space-y-2">
            <input type="email" id="demoEmailInput" placeholder="Enter your email" 
                   class="status-input w-full p-2 rounded-lg text-sm text-white">
            <button onclick="checkDemoStatus()" class="w-full btn-glow text-white text-xs py-2 rounded-lg font-bold">
                Check Database
            </button>
        </div>
        <div id="statusResult" class="hidden mt-4 p-3 glass rounded-lg text-xs">
            </div>
    </div>
</div>

<div class="md:ml-[260px]">

    <section class="h-screen flex flex-col justify-center items-center text-center px-4">
        <h1 id="heroTitle" class="text-5xl md:text-6xl font-bold mb-6">
            Manage Your Events Like a Pro
        </h1>
        <p class="text-gray-400 mb-8">Premium event management platform</p>
        <div class="space-x-4">
            <button onclick="scrollToEvents()" class="btn-glow px-6 py-3 rounded-full font-bold">Get Started</button>
            <button onclick="window.location.href='/demo'" 
                    class="border border-cyan-400 px-6 py-3 rounded-full hover:bg-cyan-400 hover:text-black transition">
                Book Demo
            </button>
        </div>
    </section>

    <div id="events" class="p-10 grid md:grid-cols-3 gap-8">
        @foreach($events as $event)
        <div class="glass rounded-xl overflow-hidden card-hover" data-aos="fade-up">
            <img src="{{ asset('images/'.$event->image) }}" class="w-full h-52 object-cover">
            <div class="p-5">
                <h3 class="text-lg font-bold mb-2">{{ $event->title }}</h3>
                <p class="text-sm text-gray-300"><i class="fa fa-location-dot text-cyan-400 mr-1"></i> {{ $event->location }}</p>
                <p class="text-sm text-gray-300 mb-3"><i class="fa fa-calendar text-cyan-400 mr-1"></i> {{ $event->date }}</p>
                <div class="flex justify-between items-center">
                    <span class="text-xl text-cyan-400">₹{{ number_format($event->price) }}</span>
                    <a href="/book/{{ $event->id }}" class="btn-glow px-4 py-2 rounded-full text-sm font-bold">Register</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <section class="py-16 text-center">
        <div class="mt-24 mb-12">
            <h2 class="text-4xl md:text-6xl font-bold tracking-tight">All the flexibility your <br>events need</h2>
        </div> 
        <h2 class="text-gray-400 mb-10 uppercase text-sm tracking-widest">Trusted By</h2>
        <div class="marquee-container overflow-hidden bg-black py-10 relative">
            <div class="animate-marquee flex gap-12 items-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" class="h-16 w-auto bg-white p-4 rounded-xl" alt="Amazon">
                <img src="{{ asset('images/levi.jpg') }}" class="h-16 w-auto bg-white p-4 rounded-xl" alt="Levi's">
                <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Razorpay_logo.svg" class="h-16 w-auto bg-white p-4 rounded-xl" alt="Razorpay">
                <img src="{{ asset('images/zoho.png') }}" class="h-16 w-auto bg-white p-4 rounded-xl" alt="Zoho">
                <img src="{{ asset('images/blink.jpg') }}" class="h-16 w-auto bg-white p-4 rounded-xl" alt="Blinkit">
                <img src="{{ asset('images/sun.png') }}" class="h-16 w-auto bg-white p-4 rounded-xl" alt="HT">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" class="h-16 w-auto bg-white p-4 rounded-xl" alt="Amazon">
                <img src="{{ asset('images/levi.jpg') }}" class="h-16 w-auto bg-white p-4 rounded-xl" alt="Levi's">
                <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Razorpay_logo.svg" class="h-16 w-auto bg-white p-4 rounded-xl" alt="Razorpay">
                <img src="{{ asset('images/zoho.png') }}" class="h-16 w-auto bg-white p-4 rounded-xl" alt="Zoho">
                <img src="{{ asset('images/blink.jpg') }}" class="h-16 w-auto bg-white p-4 rounded-xl" alt="Blinkit">
                <img src="{{ asset('images/sun.png') }}" class="h-16 w-auto bg-white p-4 rounded-xl" alt="HT">
            </div>
        </div>
    </section>
    <section class="py-20 px-10 border-y border-gray-800 bg-black/50">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-10 text-center">
            
            <div class="flex flex-col items-center" data-aos="fade-up">
                <div class="w-12 h-12 bg-cyan-500/20 rounded-full flex items-center justify-center mb-4 border border-cyan-400/30">
                    <i class="fa fa-star text-cyan-400"></i>
                </div>
                <h2 class="text-4xl font-black tracking-tighter mb-1">100,000+</h2>
                <p class="text-gray-500 uppercase text-xs font-bold tracking-widest">Events Hosted</p>
            </div>

            <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="100">
                <div class="w-12 h-12 bg-indigo-500/20 rounded-full flex items-center justify-center mb-4 border border-indigo-400/30">
                    <i class="fa fa-calendar-check text-indigo-400"></i>
                </div>
                <h2 class="text-4xl font-black tracking-tighter mb-1">50,000+</h2>
                <p class="text-gray-500 uppercase text-xs font-bold tracking-widest">Event Planners</p>
            </div>

            <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="200">
                <div class="w-12 h-12 bg-purple-500/20 rounded-full flex items-center justify-center mb-4 border border-purple-400/30">
                    <i class="fa fa-globe text-purple-400"></i>
                </div>
                <h2 class="text-4xl font-black tracking-tighter mb-1">15+</h2>
                <p class="text-gray-500 uppercase text-xs font-bold tracking-widest">Countries</p>
            </div>

            <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="300">
                <div class="w-12 h-12 bg-blue-500/20 rounded-full flex items-center justify-center mb-4 border border-blue-400/30">
                    <i class="fa fa-users text-blue-400"></i>
                </div>
                <h2 class="text-4xl font-black tracking-tighter mb-1">1.6M+</h2>
                <p class="text-gray-500 uppercase text-xs font-bold tracking-widest">Attendees</p>
            </div>

        </div>
    </div>
</section>

<section class="pt-24 pb-10 text-center px-6">
    <h2 class="text-5xl md:text-7xl font-black tracking-tighter leading-tight" data-aos="fade-right">
        Built to make your event <br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-600 italic">journey smoother.</span>
    </h2>
</section>
 

    <footer class="bg-black border-t border-gray-800 px-10 py-16">
        <div class="grid md:grid-cols-4 gap-10 text-gray-400">
            <div>
                <h2 class="text-2xl text-cyan-400 font-bold mb-4">EventPro</h2>
                <p>Premium event platform.</p>
            </div>
            <div>
                <h4 class="text-white mb-4">Company</h4>
                <a href="/about" class="block hover:text-white">About</a>
                <a href="/demo" class="block hover:text-white">Demo</a>
                <a href="/careers" class="block hover:text-white">Careers</a>
                <a href="/blog" class="block hover:text-white">Blog</a>
                
            </div>
            <div>
                <h4 class="text-white mb-4">Product</h4>
                <a href="/features" class="block hover:text-white">Features</a>
                <a href="/pricing" class="block hover:text-white">Pricing</a>
            </div>
            <div>
                <h4 class="text-white mb-4">Contact</h4>
                <p>support@eventpro.com</p>
                <p>Ahmedabad, India</p>
            </div>
        </div>
        <div class="text-center mt-10 text-gray-600">© 2026 EventPro</div>
    </footer>
</div>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
    gsap.from("#heroTitle", { y:50, opacity:0, duration:1.5 });
    particlesJS("particles-js", {
        particles: { number:{value:80}, size:{value:3}, move:{speed:1}, color:{value:"#00f0ff"}, line_linked:{enable:true,color:"#00f0ff"} }
    });

    function scrollToEvents() {
        const section = document.getElementById("events");
        const y = section.getBoundingClientRect().top + window.scrollY - 80;
        window.scrollTo({ top: y, behavior: "smooth" });
    }

    window.onload = () => document.body.classList.add("loaded");

    // NEW: Function to check database for demo
    async function checkDemoStatus() {
        const email = document.getElementById('demoEmailInput').value;
        const resultDiv = document.getElementById('statusResult');

        if (!email) {
            alert("Please enter your email.");
            return;
        }

        resultDiv.classList.remove('hidden');
        resultDiv.innerHTML = `<p class="animate-pulse text-cyan-400">Searching...</p>`;

        try {
            const response = await fetch(`/api/check-demo?email=${encodeURIComponent(email)}`);
            const data = await response.json();

            if (data.success) {
                resultDiv.innerHTML = `
                    <p class="text-green-400 font-bold mb-1"><i class="fa fa-check-circle"></i> Demo Found!</p>
                    <p class="text-gray-300">Plan: <span class="text-white">${data.demo.plan}</span></p>
                    <p class="text-gray-300">Company: <span class="text-white">${data.demo.company || 'N/A'}</span></p>
                    <p class="text-gray-500 mt-2 italic">Scheduled on ${new Date(data.demo.created_at).toLocaleDateString()}</p>
                `;
            } else {
                resultDiv.innerHTML = `<p class="text-red-400"><i class="fa fa-times-circle"></i> No demo found for this email.</p>`;
            }
        } catch (error) {
            resultDiv.innerHTML = `<p class="text-orange-400">Error connecting to server.</p>`;
        }
    }
</script>


</body>
</html>


