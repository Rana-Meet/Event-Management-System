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
body {
    background: #000;
    color: white;
    overflow-x: hidden;
    opacity:0;
    transition: opacity 0.6s ease;
}
body.loaded { opacity:1; }

.sidebar {
    width: 260px;
    background: rgba(0,0,0,0.85);
    backdrop-filter: blur(12px);
    position: fixed;
    left: -260px;
    top: 0;
    height: 100%;
    transition: 0.3s;
}
.sidebar.active { left: 0; }

@media(min-width:768px){
    .sidebar { left:0; }
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
    position:absolute;
    width:100%;
    height:100%;
    z-index:-1;
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

.marquee-container:hover .animate-marquee {
    animation-play-state: paused; /* Optional: stops the train when you hover */
}

</style>
</head>

<body>

<div id="particles-js"></div>

<!-- SIDEBAR -->
<div id="sidebar" class="sidebar text-white p-6">
    <h2 class="text-2xl font-bold mb-10 text-cyan-400">EventPro</h2>

    <a href="/" class="block mb-4 hover:text-cyan-400">Home</a>
    <a href="/mybookings" class="block mb-4 hover:text-cyan-400">My Events</a>
    <a href="/profile" class="block mb-4 hover:text-cyan-400">Profile</a>
    <a href="/admin/login" class="block mb-4 hover:text-cyan-400">Admin</a>
    <a href="/login" class="block hover:text-cyan-400">Login</a>
</div>

<div class="md:ml-[260px]">

<!-- HERO -->
<section class="h-screen flex flex-col justify-center items-center text-center">

<h1 id="heroTitle" class="text-5xl md:text-6xl font-bold mb-6">
Manage Your Events Like a Pro
</h1>

<p class="text-gray-400 mb-8">
Premium event management platform
</p>

<div class="space-x-4">
<button onclick="scrollToEvents()" class="btn-glow px-6 py-3 rounded-full">
Get Started
</button>

<button onclick="window.location.href='/login'" 
class="border border-cyan-400 px-6 py-3 rounded-full hover:bg-cyan-400 hover:text-black">
Book Demo
</button>
</div>

</section>

<!-- EVENTS -->
<div id="events" class="p-10 grid md:grid-cols-3 gap-8">

@foreach($events as $event)
<div class="glass rounded-xl overflow-hidden card-hover" data-aos="fade-up">

<img src="{{ asset('images/'.$event->image) }}" class="w-full h-52 object-cover">

<div class="p-5">
<h3 class="text-lg font-bold mb-2">{{ $event->title }}</h3>

<p class="text-sm text-gray-300">
<i class="fa fa-location-dot text-cyan-400"></i> {{ $event->location }}
</p>

<p class="text-sm text-gray-300 mb-3">
<i class="fa fa-calendar text-cyan-400"></i> {{ $event->date }}
</p>

<div class="flex justify-between items-center">
<span class="text-xl text-cyan-400">₹{{ number_format($event->price) }}</span>

<a href="/book/{{ $event->id }}" class="btn-glow px-4 py-2 rounded-full text-sm">
Register
</a>
</div>
</div>
</div>
@endforeach

</div>

<!-- TRUSTED BY -->
<section class="py-16 text-center">
<div class="text-center mt-24">
            <h2 class="text-4xl md:text-6xl font-bold tracking-tight">All the flexibility your <br>events need</h2><br><br>
        </div> 
<h2 class="text-gray-400 mb-10 uppercase">Trusted By</h2>

<div class="marquee-container overflow-hidden bg-black py-10 relative">
    <!-- The Moving "Train" -->
    <div class="animate-marquee flex gap-12 items-center">
        
        <!-- FIRST SET OF LOGOS -->
        <!-- Amazon -->
    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" 
         class="h-20 w-auto object-contain bg-white p-4 rounded-xl shadow-lg transition-transform hover:scale-110" alt="Amazon">

    <!-- Levi's -->
    <img src="{{ asset('images/levi.jpg') }}" 
         class="h-20 w-auto object-contain bg-white p-4 rounded-xl shadow-lg transition-transform hover:scale-110" alt="Levi's">

    <!-- Razorpay -->
    <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Razorpay_logo.svg" 
         class="h-20 w-auto object-contain bg-white p-4 rounded-xl shadow-lg transition-transform hover:scale-110" alt="Razorpay">

    <!-- Zoho -->
    <img src="{{ asset('images/zoho.png') }}" 
         class="h-20 w-auto object-contain bg-white p-4 rounded-xl shadow-lg transition-transform hover:scale-110" alt="Zoho">

    <!-- Blinkit -->
    <img src="{{ asset('images/blink.jpg') }}" 
         class="h-20 w-auto object-contain bg-white p-4 rounded-xl shadow-lg transition-transform hover:scale-110" alt="Blinkit">

    <!-- Hindustan Times -->
    <img src="{{ asset('images/sun.png') }}" 
         class="h-20 w-auto object-contain bg-white p-4 rounded-xl shadow-lg transition-transform hover:scale-110" alt="HT">

    <!-- Startup India -->
    {{-- <img src="https://wikimedia.org" 
         class="h-20 w-auto object-contain bg-white p-4 rounded-xl shadow-lg transition-transform hover:scale-110" alt="Startup India"> --}}

        <!-- DUPLICATE SET (To make it loop forever without a jump) -->
        <!-- Amazon -->
    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" 
         class="h-20 w-auto object-contain bg-white p-4 rounded-xl shadow-lg transition-transform hover:scale-110" alt="Amazon">

    <!-- Levi's -->
    <img src="{{ asset('images/levi.jpg') }}" 
         class="h-20 w-auto object-contain bg-white p-4 rounded-xl shadow-lg transition-transform hover:scale-110" alt="Levi's">

    <!-- Razorpay -->
    <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Razorpay_logo.svg" 
         class="h-20 w-auto object-contain bg-white p-4 rounded-xl shadow-lg transition-transform hover:scale-110" alt="Razorpay">

    <!-- Zoho -->
    <img src="{{ asset('images/zoho.png') }}" 
         class="h-20 w-auto object-contain bg-white p-4 rounded-xl shadow-lg transition-transform hover:scale-110" alt="Zoho">

    <!-- Blinkit -->
    <img src="{{ asset('images/blink.jpg') }}" 
         class="h-20 w-auto object-contain bg-white p-4 rounded-xl shadow-lg transition-transform hover:scale-110" alt="Blinkit">

    <!-- Hindustan Times -->
    <img src="{{ asset('images/sun.png') }}" 
         class="h-20 w-auto object-contain bg-white p-4 rounded-xl shadow-lg transition-transform hover:scale-110" alt="HT">

    <!-- Startup India -->
    {{-- <img src="https://wikimedia.org" 
         class="h-20 w-auto object-contain bg-white p-4 rounded-xl shadow-lg transition-transform hover:scale-110" alt="Startup India"> --}}
        
    </div>
</div>


</section>

<!-- FOOTER -->
<footer class="bg-black border-t border-gray-800 px-10 py-16">

<div class="grid md:grid-cols-4 gap-10 text-gray-400">

<div>
<h2 class="text-2xl text-cyan-400 font-bold mb-4">EventPro</h2>
<p>Premium event platform.</p>
</div>

<div>
<h4 class="text-white mb-4">Company</h4>
<ul>
<li>About</li>
<li>Careers</li>
<li>Blog</li>
</ul>
</div>

<div>
<h4 class="text-white mb-4">Product</h4>
<ul>
<li>Features</li>
<li>Pricing</li>
</ul>
</div>

<div>
<h4 class="text-white mb-4">Contact</h4>
<p>support@eventpro.com</p>
<p>Ahmedabad</p>
</div>

</div>

<div class="text-center mt-10 text-gray-600">
© 2026 EventPro
</div>

</footer>

</div>

<!-- SCRIPTS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>AOS.init();</script>

<script>
gsap.from("#heroTitle", { y:50, opacity:0, duration:1.5 });
</script>

<script>
particlesJS("particles-js", {
  particles: { number:{value:80}, size:{value:3}, move:{speed:1} }
});
</script>

<!-- FIXED SCROLL FUNCTION -->
<script>
function scrollToEvents() {
    const section = document.getElementById("events");
    const y = section.getBoundingClientRect().top + window.scrollY - 80;

    window.scrollTo({
        top: y,
        behavior: "smooth"
    });
}
</script>

<script>
window.onload = () => document.body.classList.add("loaded");
</script>

</body>
</html>




