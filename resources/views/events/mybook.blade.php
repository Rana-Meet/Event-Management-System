<!DOCTYPE html>
<html>
<head>
    <title>My Bookings</title>
    <style>
        /* Basic styling to make the link look like a button */
        .btn-home {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3490dc;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px;
        }
        .btn-home:hover {
            background-color: #2779bd;
        }
    </style>
</head>
<body>

    <!-- 1. Home Button: Goes back to the '/' route -->
    <div style="text-align: left;">
        <a href="{{ url('/') }}" class="btn-home">← Back to Home</a>
    </div>

    <h2 style="text-align:center;">My Bookings</h2>

    <!-- 2. The Forelse Loop: It checks if data exists and loops at the same time -->
    @forelse($bookings as $b)
        <div style="border:1px solid #ccc; padding:15px; margin:10px; border-radius: 8px;">
            <!-- $b->event->title works because of the 'with(event)' in your route -->
            <h3>{{ $b->event->title }}</h3>
            <p><strong>Date:</strong> {{ $b->event->date }}</p>
            <p><strong>Location:</strong> {{ $b->event->location }}</p>
            <p><strong>Ticket Code:</strong> 
                <span style="color: green;">{{ $b->ticket_code ?? 'N/A' }}</span>
            </p>
        </div>
    @empty
        <!-- 3. This part only shows if $bookings is empty -->
        <p style="text-align:center; color: #666;">No bookings found. Go book an event!</p>
    @endforelse

</body>
</html>
