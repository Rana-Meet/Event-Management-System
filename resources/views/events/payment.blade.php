<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Payment - EventPro</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>
body {
    background: linear-gradient(135deg,#0f0f1a,#000);
    color: white;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

/* Glass Card */
.glass {
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255,255,255,0.1);
}

/* Glow Animation */
@keyframes glow {
    0% { box-shadow: 0 0 10px cyan; }
    50% { box-shadow: 0 0 30px cyan; }
    100% { box-shadow: 0 0 10px cyan; }
}

.qr-box {
    animation: glow 2s infinite;
}
</style>
</head>

<body>

<div class="glass p-10 rounded-2xl text-center w-[350px]">

    <h2 class="text-2xl font-bold mb-4 text-cyan-400">
        Scan & Pay
    </h2>

    <p class="text-gray-400 mb-6">
        Use any UPI app to complete payment
    </p>

    <!-- QR CODE -->
    <div class="qr-box p-4 bg-white rounded-xl inline-block mb-6">
        {!! QrCode::size(200)->generate('upi://pay?pa=event@upi&pn=EventPro&am=499&cu=INR') !!}
    </div>

    <p class="text-sm text-gray-400 mb-4">
        UPI ID: event@upi
    </p>

    <!-- PAYMENT BUTTON -->
    <form action="/payment-success" method="POST">
        @csrf
        <button class="bg-cyan-400 text-black px-6 py-3 rounded-full w-full font-bold hover:bg-cyan-300 transition">
            I Have Paid
        </button>
    </form>

</div>

</body>
</html>