<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login | EventPro</title>

<script src="https://cdn.tailwindcss.com"></script>

<!-- AOS -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet"/>

<!-- GSAP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<style>
body {
    background: radial-gradient(circle at top, #0f0f1a, #000);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
}

/* Glass UI */
.glass {
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(15px);
    height: 40%;
    border: 1px solid rgba(255,255,255,0.1);
}

/* Inputs */
input {
    width: 110%;
    padding: 12px;
    margin: 10px 0;
    background: transparent;
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 8px;
    color: white;
}

input:focus {
    border-color: #00f0ff;
    box-shadow: 0 0 10px #00f0ff;
}

/* Button */
.btn {
    width: 100%;
    padding: 12px;
    background: linear-gradient(45deg,#4f46e5,#00f0ff);
    border-radius: 25px;
    transition: 0.3s;
}

.btn:hover {
    transform: scale(1.05);
    box-shadow: 0 0 20px #00f0ff;
}

/* Floating shapes */
.shape {
    position: absolute;
    width: 200px;
    height: 200px;
    background: cyan;
    opacity: 0.1;
    filter: blur(80px);
    animation: float 6s infinite;
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




/* For Logos */


</style>

</head>

<body>

<div class="shape"></div>
<div class="shape shape2"></div>

<div class="glass p-8 rounded-xl w-80 text-center" id="loginBox">

<h2 class="text-2xl font-bold mb-4 text-cyan-400">Login</h2>

@if(session('error'))
<p class="text-red-400">{{ session('error') }}</p>
@endif

<form method="POST" action="/login">
@csrf

<input type="email" name="email" placeholder="Enter Email" required><br><br>
<input type="password" name="password" placeholder="Enter Password" required><br><br>

<button class="btn">Login</button>

</form>

</div>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
AOS.init();
</script>

<script>
// GSAP animation
gsap.from("#loginBox", {
    y:50,
    opacity:0,
    duration:1.2
});
</script>

</body>
</html>


