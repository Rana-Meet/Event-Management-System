<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventPro | Enterprise Event Management</title>
    
    <!-- Fonts: Rubik for a modern, corporate look -->
    <link href="https://fonts.googleapis.com" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com">
    
    <style>
        :root {
            --cvent-navy: #00263E; 
            --cvent-blue: #0073B1; 
            --cvent-bg: #FFFFFF;
            --cvent-gray: #F2F4F7;
            --text-dark: #1A1A1A;
            --sidebar-width: 260px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Rubik', sans-serif; }

        body { display: flex; background: var(--cvent-gray); color: var(--text-dark); flex-direction: column; }

        /* --- WRAPPER FOR SIDEBAR + MAIN --- */
        .app-wrapper { display: flex; flex: 1; }

        /* --- SIDEBAR (CVENT STYLE) --- */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--cvent-navy);
            position: fixed;
            z-index: 1000;
            padding: 30px 0;
            color: white;
        }

        .sidebar .brand {
            padding: 0 30px 40px;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -1px;
            color: white;
            text-transform: uppercase;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 30px;
            color: #A0B2C1;
            text-decoration: none;
            font-size: 15px;
            transition: 0.3s;
        }

        .sidebar a:hover, .sidebar a.active {
            background: rgba(255,255,255,0.08);
            color: #FFFFFF;
            border-left: 4px solid var(--cvent-blue);
        }

        /* --- MAIN SECTION --- */
        .main { flex: 1; margin-left: var(--sidebar-width); min-height: 100vh; display: flex; flex-direction: column; }

        header {
            background: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 999;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        header h2 { font-size: 22px; font-weight: 700; color: var(--cvent-navy); }

        /* --- GRID & CARDS --- */
        .container { padding: 40px; flex: 1; }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
        }

        .card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
            border: 1px solid #E1E8ED;
        }

        .card:hover { transform: translateY(-8px); }

        .card img { width: 100%; height: 200px; object-fit: cover; }

        .card-body { padding: 25px; }

        .card h3 { font-size: 18px; margin-bottom: 12px; color: var(--cvent-navy); }

        .info {
            font-size: 14px;
            color: #555;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info i { color: var(--cvent-blue); width: 16px; }

        .price-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #F0F2F5;
        }

        .price-tag { font-size: 19px; font-weight: 700; color: var(--cvent-navy); }

        .btn-cvent {
            background: var(--cvent-blue);
            color: white;
            padding: 10px 22px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-cvent:hover { background: var(--cvent-navy); }

        /* --- FOOTER (ZOHO BACKSTAGE STYLE) --- */
        footer {
            background: #ffffff;
            padding: 60px 40px 30px;
            border-top: 1px solid #eee;
            margin-left: var(--sidebar-width);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1fr 1fr;
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .green-room-box {
            background: var(--cvent-navy);
            padding: 25px;
            border-radius: 8px;
            color: white;
            text-align: center;
        }

        .green-room-box h4 { color: #4ade80; margin-bottom: 10px; font-size: 18px; }
        .green-room-box p { font-size: 13px; margin-bottom: 15px; opacity: 0.8; line-height: 1.5; }
        
        .btn-red {
            background: #ff4757;
            color: white;
            padding: 8px 18px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
        }

        .footer-col h4 {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #000;
            text-transform: capitalize;
        }

        .footer-col ul { list-style: none; }
        .footer-col ul li { margin-bottom: 12px; }
        .footer-col ul li a {
            text-decoration: none;
            color: #666;
            font-size: 14px;
            transition: 0.3s;
        }

        .footer-col ul li a:hover { color: var(--cvent-blue); }

        .footer-bottom {
            margin-top: 50px;
            padding-top: 25px;
            border-top: 1px solid #f0f0f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 50px auto 0;
        }

        .social-links a {
            font-size: 18px;
            margin-left: 20px;
            color: #333;
            transition: 0.3s;
        }

        .social-links a:hover { color: var(--cvent-blue); }

        .contact-email { color: var(--cvent-blue); text-decoration: none; font-size: 14px; font-weight: 500; }

        @media (max-width: 992px) {
            .sidebar { display: none; }
            .main, footer { margin-left: 0; }
            .footer-grid { grid-template-columns: 1fr 1fr; }
        }
    </style>
</head>
<body>

<div class="app-wrapper">
    
    <div class="sidebar">
        <div class="brand">Event <span style="color:var(--cvent-blue);">Pro</span></div>
        <a href="/" class="active"><i class="fa-solid fa-house"></i> Home</a>
        <a href="/mybookings"><i class="fa-solid fa-calendar-check"></i> My Events</a>
        <a href="/profile"><i class="fa-solid fa-user"></i> Profile</a>
        <a href="/admin/login"><i class="fa-solid fa-shield-halved"></i> Admin Panel</a>
    </div>

    
    <div class="main">
        <header>
            <h2>Upcoming Events</h2>
            <div class="user-actions">
                <a href="/login" style="text-decoration:none; color:var(--cvent-blue); font-weight:600; margin-right:15px;">Sign In</a>
                <i class="fa-solid fa-magnifying-glass" style="color:#888; cursor:pointer;"></i>
            </div>
        </header>

        <div class="container">
            <div class="grid">
                @foreach($events as $event)
                <div class="card">
                    <img src="{{ asset('images/'.$event->image) }}" alt="Event">
                    <div class="card-body">
                        <h3>{{ $event->title }}</h3>
                        <p class="info"><i class="fa-solid fa-location-dot"></i> {{ $event->location }}</p>
                        <p class="info"><i class="fa-solid fa-calendar-days"></i> {{ $event->date }}</p>
                        
                        <div class="price-row">
                            <div class="price-tag">₹{{ number_format($event->price) }}</div>
                            <a href="/book/{{ $event->id }}" class="btn-cvent">Register Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<footer>
    <div class="footer-grid">
        
        <div class="footer-col">
            <div class="green-room-box">
                <h4>The Green Room</h4>
                <p>All that happens backstage to run a successful event.</p>
                <a href="#" class="btn-red">Learn More</a>
            </div>
        </div>


        <div class="footer-col">
            <h4>Features</h4>
            <ul>
                <li><a href="#">Website builder</a></li>
                <li><a href="#">Event ticketing</a></li>
                <li><a href="#">Event marketing</a></li>
                <li><a href="#">Exhibition management</a></li>
                <li><a href="#">Event analytics</a></li>
            </ul>
        </div>

        <!-- Resources -->
        <div class="footer-col">
            <h4>Resources</h4>
            <ul>
                <li><a href="#">Help center</a></li>
                <li><a href="#">Community forum</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Webinars</a></li>
                <li><a href="#">Product updates</a></li>
            </ul>
        </div>

        <!-- Quick Links -->
        <div class="footer-col">
            <h4>Quick links</h4>
            <ul>
                <li><a href="#">Pricing</a></li>
                <li><a href="#">Contact us</a></li>
                <li><a href="#">Customers</a></li>
                <li><a href="#">GDPR Compliance</a></li>
                <li><a href="#">Newsletter</a></li>
            </ul>
        </div>

        <!-- Explore -->
        <div class="footer-col">
            <h4>Explore</h4>
            <ul>
                <li><a href="#">Management software</a></li>
                <li><a href="#">Event Solutions</a></li>
                <li><a href="#">Planning software</a></li>
                <li><a href="#">Ticketing software</a></li>
            </ul>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="footer-bottom">
        <a href="mailto:support@eventpro.com" class="contact-email">
            <i class="fa-regular fa-envelope"></i> support@eventpro.com
        </a>
        
        <div class="social-links">
            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
        </div>
    </div>

    <div style="text-align:center; margin-top:40px; font-size:12px; color:#aaa; border-top:1px solid #f9f9f9; padding-top:20px;">
        <p>Choose Privacy. Choose EventPro. © 2026 EventPro Corp. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
