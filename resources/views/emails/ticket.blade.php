<h2>Your Event Ticket 🎟️</h2>

<p><b>Event:</b> {{ $booking->event->title }}</p>
<p><b>Name:</b> {{ $booking->user->name }}</p>
<p><b>Date:</b> {{ $booking->event->date }}</p>
<p><b>Location:</b> {{ $booking->event->location }}</p>

<p><b>Ticket Code:</b> {{ $booking->ticket_code }}</p>

<p>Show this email at entry.</p>