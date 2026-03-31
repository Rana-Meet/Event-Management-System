<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Bookings | EventPro</title>

<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- AOS -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet"/>

<!-- GSAP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<style>
body {
    background: radial-gradient(circle at top, #0f0f1a, #000);
    color: white;
    min-height: 100vh;
    overflow-x: hidden;
}

/* Glass card */
.glass {
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255,255,255,0.1);
}

/* Card hover */
.card-hover:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 0 25px rgba(0,255,255,0.25);
}

/* Button */
.btn-home {
    display: inline-block;
    padding: 10px 20px;
    background: linear-gradient(45deg,#4f46e5,#00f0ff);
    color: white;
    text-decoration: none;
    border-radius: 25px;
    margin: 20px;
    transition: 0.3s;
}
.btn-home:hover {
    transform: scale(1.05);
    box-shadow: 0 0 20px #00f0ff;
}

/* Floating shapes */
.shape {
    position: absolute;
    width: 250px;
    height: 250px;
    background: cyan;
    opacity: 0.1;
    filter: blur(100px);
    animation: float 6s infinite ease-in-out;
}
.shape2 {
    right: 0;
    background: purple;
}

@keyframes float {
    0%{transform: translateY(0);}
    50%{transform: translateY(-30px);}
    100%{transform: translateY(0);}
}
</style>

</head>

<body>

<!-- BACKGROUND SHAPES -->
<div class="shape"></div>
<div class="shape shape2"></div>

<!-- HEADER -->
<div class="flex justify-between items-center p-6">
    <a href="{{ url('/') }}" class="btn-home">← Back to Home</a>
</div>

<h2 id="title" class="text-4xl text-center font-bold text-cyan-400 mb-10">
My Bookings
</h2>

<!-- BOOKINGS -->
<div class="max-w-5xl mx-auto px-6 space-y-6">

@forelse($bookings as $b)

<div class="glass p-6 rounded-xl card-hover transition duration-300" data-aos="fade-up">

    <h3 class="text-xl font-bold mb-2 text-cyan-300">
        {{ $b->event->title }}
    </h3>

    <p class="text-gray-300 mb-1">
        📅 <strong>Date:</strong> {{ $b->event->date }}
    </p>

    <p class="text-gray-300 mb-1">
        📍 <strong>Location:</strong> {{ $b->event->location }}
    </p>

    <p class="mt-2">
        🎟 <strong>Ticket Code:</strong> 
        <span class="text-green-400 font-semibold">
            {{ $b->ticket_code ?? 'N/A' }}
        </span>
    </p>

</div>

@empty

<p class="text-center text-gray-400 text-lg">
No bookings found. Go book an event!
</p>

@endforelse

</div>

<!-- FOOTER -->
<div class="text-center py-10 text-gray-500 text-sm mt-10 border-t border-gray-800">
© 2026 EventPro
</div>

<!-- SCRIPTS -->

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
AOS.init({ duration:1000 });
</script>

<script>
// GSAP title animation
gsap.from("#title", {
    y:50,
    opacity:0,
    duration:1.2
});
</script>

</body>
</html>