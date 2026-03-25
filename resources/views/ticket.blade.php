@extends('layouts.app')

@section('content')
<style>
    .ticket-container {
        max-width: 600px;
        margin: 50px auto;
        font-family: 'Arial', sans-serif;
    }

    .ticket {
        display: flex;
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
        border: 1px solid #e0e0e0;
        position: relative;
    }

    /* Ticket Main Section */
    .ticket-main {
        padding: 30px;
        flex: 2;
        border-right: 2px dashed #ddd;
    }

    .ticket-header {
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #2563eb;
        font-weight: bold;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .event-title {
        font-size: 24px;
        margin: 5px 0;
        color: #1e293b;
    }

    .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-top: 20px;
    }

    .info-label {
        font-size: 11px;
        color: #64748b;
        text-transform: uppercase;
        margin-bottom: 2px;
    }

    .info-value {
        font-size: 14px;
        font-weight: 600;
        color: #334155;
    }

    /* Ticket Stub (QR Side) */
    .ticket-stub {
        padding: 30px;
        flex: 1;
        background: #f8fafc;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .qr-wrapper {
        background: white;
        padding: 10px;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        margin-bottom: 10px;
    }

    .ticket-code {
        font-family: 'Courier New', monospace;
        font-weight: bold;
        font-size: 12px;
        color: #475569;
    }

    /* Decorative circles for the ticket "cut" */
    .ticket::before, .ticket::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        background: #f3f4f6; /* Match your page background */
        border-radius: 50%;
        left: 65.5%; /* Position at the dash line */
        z-index: 10;
    }
    .ticket::before { top: -10px; border-bottom: 1px solid #e0e0e0; }
    .ticket::after { bottom: -10px; border-top: 1px solid #e0e0e0; }

    .btn-download {
        display: block;
        width: 200px;
        margin: 20px auto;
        background: #2563eb;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        transition: 0.2s;
    }
    .btn-download:hover { background: #1e40af; }
</style>

<div class="ticket-container">
    <div class="ticket">
        <!-- Main Body -->
        <div class="ticket-main">
            <div class="ticket-header">
                🎟️ Official Admission
            </div>
            <h1 class="event-title">{{ $booking->event->title ?? 'Special Event' }}</h1>
            
            <div class="info-grid">
                <div>
                    <p class="info-label">Attendee</p>
                    <p class="info-value">{{ $booking->user->name ?? 'Guest' }}</p>
                </div>
                <div>
                    <p class="info-label">Date</p>
                    <p class="info-value">{{ $booking->event->date ?? 'TBD' }}</p>
                </div>
                <div>
                    <p class="info-label">Location</p>
                    <p class="info-value">{{ $booking->event->location ?? 'Venue' }}</p>
                </div>
                <div>
                    <p class="info-label">Price</p>
                    <p class="info-value">₹{{ number_format($booking->event->price ?? 0, 2) }}</p>
                </div>
            </div>
        </div>

        <!-- Stub Section -->
        <div class="ticket-stub">
            <div class="qr-wrapper">
                @if(!empty($booking->ticket_code))
                    {{-- Note: format('png') is required for the PDF download to work --}}
                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(120)->margin(0)->generate($booking->ticket_code)) !!} ">
                @else
                    <small style="color: red;">NO CODE</small>
                @endif
            </div>
            <p class="info-label">Ticket ID</p>
            <p class="ticket-code">{{ $booking->ticket_code ?? 'N/A' }}</p>
        </div>
    </div>

    <!-- Download Link -->
    <a href="/download/{{ $booking->id }}" class="btn-download">
        Download PDF Ticket
    </a>
</div>
@endsection
