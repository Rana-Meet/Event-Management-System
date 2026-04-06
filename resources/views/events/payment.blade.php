<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Payment - EventPro</title>

    <!-- FIXED: Correct CDN Links -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://googleapis.com" rel="stylesheet">
    <link rel="stylesheet" href="https://cloudflare.com">

    <style>
        body {
            background-color: #020617;
            background-image: radial-gradient(circle at 50% -20%, #1e1b4b, #020617);
            color: white;
            font-family: 'Plus Jakarta Sans', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        /* Perfect Glass UI */
        .glass-card {
            background: rgba(30, 41, 59, 0.4);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 380px;
        }

        /* QR Glow Animation */
        @keyframes qr-pulse {
            0% { box-shadow: 0 0 0 0px rgba(34, 211, 238, 0.2); }
            70% { box-shadow: 0 0 0 15px rgba(34, 211, 238, 0); }
            100% { box-shadow: 0 0 0 0px rgba(34, 211, 238, 0); }
        }

        .qr-container {
            background: white;
            padding: 12px;
            border-radius: 24px;
            display: inline-block;
            animation: qr-pulse 2s infinite;
            transition: transform 0.3s ease;
        }

        .qr-container:hover {
            transform: scale(1.02);
        }

        .btn-premium {
            background: linear-gradient(135deg, #22d3ee 0%, #0ea5e9 100%);
            color: #020617;
            font-weight: 800;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-premium:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px -8px rgba(34, 211, 238, 0.5);
            filter: brightness(1.1);
        }

        /* Background Orbs */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            z-index: -1;
            opacity: 0.3;
        }
    </style>
</head>

<body>
    <!-- Decor Orbs -->
    <div class="orb w-80 h-80 bg-indigo-600 top-[-10%] left-[-10%]"></div>
    <div class="orb w-80 h-80 bg-cyan-600 bottom-[-10%] right-[-10%]"></div>

    <div class="glass-card p-8 md:p-10 rounded-[2.5rem] text-center mx-4 relative">
        
        <!-- Header -->
        <div class="mb-6">
            <div class="w-12 h-12 bg-cyan-500/10 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-cyan-500/20">
                <i class="fas fa-shield-check text-cyan-400 text-xl"></i>
            </div>
            <h2 class="text-2xl font-extrabold tracking-tight text-white">Scan & Pay</h2>
            <p class="text-slate-400 text-sm mt-1">Complete your booking for <span class="text-cyan-400 font-semibold">EventPro</span></p>
        </div>

        <!-- THE QR CODE -->
        <div class="qr-container mb-8">
            <!-- Ensure your Laravel Backend has SimpleQRCode installed -->
            {!! QrCode::size(180)->margin(1)->color(15, 23, 42)->generate('upi://pay?pa=event@upi&pn=EventPro&am=499.00&cu=INR&tn=Ticket%20Booking') !!}
        </div>

        <!-- Info Box -->
        <div class="bg-slate-900/50 rounded-2xl p-4 mb-6 border border-white/5">
            <div class="flex justify-between items-center mb-1">
                <span class="text-[10px] uppercase tracking-[2px] font-bold text-slate-500">Payable Amount</span>
                <span class="text-[10px] uppercase tracking-[2px] font-bold text-slate-500">UPI ID</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-xl font-extrabold text-white">₹499.00</span>
                <span class="text-xs font-semibold text-cyan-400 bg-cyan-400/10 px-2 py-1 rounded-md">event@upi</span>
            </div>
        </div>

        <!-- Action -->
        <form action="{{ url('/payment-success') }}" method="POST">
            @csrf
            <button type="submit" class="btn-premium w-full py-4 rounded-2xl flex items-center justify-center gap-3 text-sm uppercase tracking-wider">
                I have paid <i class="fas fa-arrow-right text-xs"></i>
            </button>
        </form>

        <p class="mt-6 text-[9px] text-slate-500 font-bold tracking-[4px] uppercase opacity-50">
            Secure Encryption Active
        </p>
    </div>
</body>
</html>
