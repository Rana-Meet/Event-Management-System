@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body {
        background: radial-gradient(circle at top right, #1a1a2e, #0a0a0c);
        min-height: 100vh;
    }

    .ticket-container {
        max-width: 700px;
        margin: 60px auto;
        padding: 0 20px;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    /* The Ticket Card */
    .ticket {
        display: flex;
        background: #ffffff;
        border-radius: 24px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        overflow: hidden;
        position: relative;
        transition: transform 0.3s ease;
    }

    .ticket:hover {
        transform: translateY(-5px);
    }

    /* Main Section */
    .ticket-main {
        padding: 40px;
        flex: 1.8;
        border-right: 2px dashed #e2e8f0;
        background: white;
    }

    .brand-tag {
        background: #eff6ff;
        color: #2563eb;
        padding: 6px 12px;
        border-radius: 100px;
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 20px;
    }

    .event-title {
        font-size: 28px;
        font-weight: 800;
        margin: 0 0 25px 0;
        color: #0f172a;
        line-height: 1.2;
    }

    .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
    }

    .info-item i {
        color: #94a3b8;
        font-size: 14px;
        margin-right: 8px;
    }

    .info-label {
        font-size: 11px;
        color: #64748b;
        text-transform: uppercase;
        font-weight: 700;
        margin-bottom: 4px;
        display: block;
    }

    .info-value {
        font-size: 15px;
        font-weight: 600;
        color: #1e293b;
    }

    /* Stub (QR Side) */
    .ticket-stub {
        padding: 40px;
        flex: 1;
        background: #f8fafc;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .qr-wrapper {
        background: white;
        padding: 10px;
        border-radius: 18px;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        margin-bottom: 15px;
        border: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Ensure the SVG scales correctly */
    .qr-wrapper svg {
        width: 130px;
        height: 130px;
    }

    .ticket-id-box {
        text-align: center;
    }

    .ticket-code {
        font-family: 'Monaco', 'Consolas', monospace;
        font-size: 13px;
        font-weight: 700;
        color: #475569;
        letter-spacing: 1px;
    }

    /* Ticket "Bite" Decorations */
    .ticket::before, .ticket::after {
        content: '';
        position: absolute;
        width: 30px;
        height: 30px;
        background: #0a0a0c; 
        border-radius: 50%;
        left: 64.2%; 
        z-index: 2;
    }
    .ticket::before { top: -15px; }
    .ticket::after { bottom: -15px; }

    /* Action Buttons */
    .actions-row {
        display: flex;
        gap: 15px;
        margin-top: 40px;
        justify-content: center;
    }

    .btn-action {
        flex: 1;
        max-width: 250px;
        padding: 14px 24px;
        border-radius: 14px;
        font-weight: 700;
        font-size: 14px;
        text-align: center;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn-pdf {
        background: #2563eb;
        color: white;
        box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
    }

    .btn-pdf:hover { background: #1d4ed8; transform: translateY(-2px); }

    .btn-email {
        background: #10b981;
        color: white;
        box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.3);
    }

    .btn-email:hover { background: #059669; transform: translateY(-2px); }

    @media (max-width: 640px) {
        .ticket { flex-direction: column; }
        .ticket-main { border-right: none; border-bottom: 2px dashed #ddd; }
        .ticket::before, .ticket::after { display: none; }
        .actions-row { flex-direction: column; align-items: center; }
        .btn-action { width: 100%; }
    }
</style>

<div class="ticket-container">
    <div class="ticket">
        <div class="ticket-main">
            <div class="brand-tag">
                <i class="fas fa-check-circle"></i> Verified Booking
            </div>
            
            <h1 class="event-title">{{ $booking->event->title ?? 'Python Webinar' }}</h1>
            
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">Attendee Name</span>
                    <span class="info-value"><i class="far fa-user"></i> {{ $booking->user->name ?? 'User' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Date & Time</span>
                    <span class="info-value"><i class="far fa-calendar-alt"></i> {{ $booking->event->date ?? '2026-04-29' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Venue Location</span>
                    <span class="info-value"><i class="fas fa-map-marker-alt"></i> {{ $booking->event->location ?? 'Online' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Pass Type</span>
                    <span class="info-value"><i class="fas fa-ticket-alt"></i> ₹{{ number_format($booking->event->price ?? 0, 0) }} (VIP)</span>
                </div>
            </div>
        </div>

        <div class="ticket-stub">
            <div class="qr-wrapper">
                {{-- Check if ticket_code exists, otherwise show a test QR --}}
                @if(!empty($booking->ticket_code))
                    {!! QrCode::size(130)->margin(0)->generate($booking->ticket_code) !!}
                @else
                    {{-- This will show a test QR if your database field is empty --}}
                    {!! QrCode::size(130)->color(255, 0, 0)->generate('NO-CODE-FOUND') !!}
                @endif
            </div>
            <div class="ticket-id-box">
                <span class="info-label">Entry Pass ID</span>
                <span class="ticket-code">#{{ $booking->ticket_code ?? 'PENDING' }}</span>
            </div>
        </div>
    </div>

    <div class="actions-row">
        <a href="/download/{{ $booking->id }}" class="btn-action btn-pdf">
            <i class="fas fa-file-pdf"></i> Download PDF
        </a>

        <form action="/send-ticket/{{ $booking->id }}" method="POST" style="flex: 1; max-width: 250px;">
            @csrf
            <button type="submit" class="btn-action btn-email">
                <i class="fas fa-envelope"></i> Send to Email
            </button>
        </form>
    </div>
</div>
@endsection 