<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Bookings | EventPro</title>

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<style>
body {
    background: radial-gradient(circle at top, #0f0f1a, #000);
    color: white;
    min-height: 100vh;
    overflow-x: hidden;
}

/* Glass UI */
.glass {
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255,255,255,0.1);
}

/* Card Hover */
.card-hover {
    transition: 0.3s;
}
.card-hover:hover {
    transform: translateY(-10px) scale(1.03);
    box-shadow: 0 0 30px rgba(0,255,255,0.3);
}

/* Button */
.btn-home {
    padding: 10px 20px;
    background: linear-gradient(45deg,#4f46e5,#00f0ff);
    border-radius: 25px;
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

<!-- BACKGROUND -->
<div class="shape"></div>
<div class="shape shape2"></div>

<!-- HEADER -->
<div class="flex justify-between items-center p-6">

    <a href="{{ url('/') }}" class="btn-home">
        ← Back to Home
    </a>

    <h2 class="text-xl text-cyan-400 font-bold hidden md:block">
        EventPro Dashboard
    </h2>

</div>

<!-- TITLE -->
<h2 id="title" class="text-4xl md:text-5xl text-center font-bold text-cyan-400 mb-12">
🎟️ My Bookings
</h2>

<!-- BOOKINGS GRID -->
<div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-8">

@forelse($bookings as $b)

<div class="glass p-6 rounded-2xl card-hover" data-aos="zoom-in">

    <h3 class="text-xl font-bold mb-3 text-cyan-300">
        {{ $b->event->title }}
    </h3>

    <div class="space-y-2 text-gray-300 text-sm">

        <p>
            📅 <span class="text-white font-semibold">Date:</span> 
            {{ $b->event->date }}
        </p>

        <p>
            📍 <span class="text-white font-semibold">Location:</span> 
            {{ $b->event->location }}
        </p>

        <p>
            🎟 <span class="text-white font-semibold">Ticket Code:</span> 
            <span class="text-green-400 font-bold">
                {{ $b->ticket_code ?? 'N/A' }}
            </span>
        </p>

    </div>

    <!-- Extra UI -->
    <div class="mt-4 flex justify-between items-center">

        <span class="text-xs text-gray-400">
            Booking ID: #{{ $b->id }}
        </span>

        <span class="text-xs bg-cyan-500/20 text-cyan-400 px-3 py-1 rounded-full">
            Confirmed
        </span>

    </div>

</div>

@empty

<div class="col-span-2 text-center text-gray-400 text-lg mt-10">
    🚫 No bookings found. Go book an event!
</div>

@endforelse

</div>

<!-- FOOTER -->
<div class="text-center py-10 text-gray-500 text-sm mt-16 border-t border-gray-800">
© 2026 EventPro • All rights reserved
</div>

<!-- SCRIPTS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
AOS.init({ duration:1000 });
</script>

<script>
gsap.from("#title", {
    y:50,
    opacity:0,
    duration:1.2
});
</script>

</body>
</html>