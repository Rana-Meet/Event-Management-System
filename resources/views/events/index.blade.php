<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>EventPro Premium</title>

<script src="https://cdn.tailwindcss.com"></script>

<!-- AOS -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet"/>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- GSAP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<!-- PARTICLES -->
<script src="https://cdn.jsdelivr.net/npm/particles.js"></script>

<style>
body {
    background: #000;
    color: white;
    overflow-x: hidden;
    opacity:0;
    transition: opacity 0.6s ease;
}
body.loaded {
    opacity:1;
}

/* Sidebar */
.sidebar {
    width: 260px;
    background: rgba(0,0,0,0.85);
    backdrop-filter: blur(12px);
    position: fixed;
    left: -260px;
    top: 0;
    height: 100%;
    z-index: 1000;
    transition: 0.3s;
}
.sidebar.active { left: 0; }

@media(min-width:768px){
    .sidebar { left:0; }
}

/* Glass */
.glass {
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255,255,255,0.1);
}

/* Card hover */
.card-hover:hover {
    transform: translateY(-10px) scale(1.03);
    box-shadow: 0 0 30px rgba(0,255,255,0.3);
}

/* Button */
.btn-glow {
    background: linear-gradient(45deg,#4f46e5,#00f0ff);
}
.btn-glow:hover {
    box-shadow: 0 0 20px #00f0ff;
    transform: scale(1.05);
}

/* Particle */
#particles-js {
    position:absolute;
    width:100%;
    height:100%;
    z-index:-1;
}
</style>
</head>

<body>

<!-- PARTICLES -->
<div id="particles-js"></div>

<!-- MOBILE MENU -->
<button onclick="toggleSidebar()" class="fixed top-4 left-4 z-50 md:hidden text-white text-2xl">
☰
</button>

<!-- SIDEBAR -->
<div id="sidebar" class="sidebar text-white p-6">
    <h2 class="text-2xl font-bold mb-10 text-cyan-400">EventPro</h2>

    <a href="/" class="block mb-4 hover:text-cyan-400">Home</a>
    <a href="/mybookings" class="block mb-4 hover:text-cyan-400">My Events</a>
    <a href="/profile" class="block mb-4 hover:text-cyan-400">Profile</a>
    <a href="/admin/login" class="block hover:text-cyan-400">Admin</a>
    <a href="/login" class="block mb-4 hover:text-cyan-400">Login</a>
</div>

<!-- MAIN -->
<div class="md:ml-[260px]">

<!-- HERO -->
<section class="h-screen flex flex-col justify-center items-center text-center relative">

<h1 id="heroTitle" class="text-5xl md:text-6xl font-bold mb-6">
Manage Your Events Like a Pro
</h1>

<p class="text-gray-400 mb-8">
Premium event management platform with powerful tools
</p>

<div class="space-x- 4">
<button onclick="scrollToEvents()" 
class="btn-glow px-6 py-3 rounded-full">
Get Started
</button>

<button  class="border border-cyan-400 px-6 py-3 rounded-full hover:bg-cyan-400 hover:text-black">
Book Demo
</button>

</div>

</section>

<!-- HEADER -->
<div class="flex justify-between items-center p-6 bg-black/40 backdrop-blur-md sticky top-0">
    <h2 class="text-2xl text-cyan-400">Upcoming Events</h2>
</div>

<!-- EVENTS -->
<div id="events" class="p-10 grid md:grid-cols-3 gap-8">

@foreach($events as $event)

<div class="glass rounded-xl overflow-hidden card-hover transition duration-300" data-aos="fade-up">

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

            <a href="/book/{{ $event->id }}" 
               class="btn-glow px-4 py-2 rounded-full text-sm">
               Register
            </a>
        </div>
    </div>

</div>

@endforeach

</div>

<!-- FOOTER -->
<div class="text-center py-10 text-gray-400 border-t border-gray-800">
    © 2026 EventPro
</div>

</div>

<!-- SCRIPTS -->

<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
AOS.init({duration:1000});
</script>

<!-- GSAP -->
<script>
gsap.from("#heroTitle", {
    y:50,
    opacity:0,
    duration:1.5
});
</script>

<!-- PARTICLES -->
<script>
particlesJS("particles-js", {
  particles: {
    number: { value: 80 },
    size: { value: 3 },
    move: { speed: 1 },
    line_linked: { enable: true }
  }
});
</script>

<!-- SIDEBAR -->
<script>
function toggleSidebar(){
    document.getElementById("sidebar").classList.toggle("active");
}
</script>

<!-- SCROLL TO EVENTS -->
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

<!-- PAGE LOAD -->
<script>
window.onload = () => {
    document.body.classList.add("loaded");
}
</script>

</body>
</html>