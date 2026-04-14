<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>EventPro Premium Pass</title>
    <style>
        @page { margin: 0; }
        body {
            font-family: 'Helvetica', sans-serif;
            background-color: #111827;
            padding: 50px;
        }

        /* The Main Ticket */
        .ticket-wrapper {
            width: 100%;
            max-width: 650px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 20px 30px rgba(0,0,0,0.3);
        }

        /* Top Bar Branding */
        .top-bar {
            background: #000000;
            color: #22d3ee;
            padding: 15px;
            text-align: center;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 3px;
            border-bottom: 3px solid #22d3ee;
        }

        /* Ticket Layout Table */
        .ticket-table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Main Info Section */
        .main-section {
            padding: 30px;
            vertical-align: top;
        }

        .event-title {
            font-size: 26px;
            font-weight: 900;
            color: #111827;
            margin-bottom: 25px;
            text-transform: uppercase;
        }

        .label {
            color: #94a3b8;
            font-size: 10px;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 3px;
        }

        .value {
            color: #1e293b;
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* The Perforated Stub Section */
        .stub-section {
            width: 200px;
            background-color: #f8fafc;
            border-left: 2px dashed #cbd5e1;
            padding: 30px;
            text-align: center;
            vertical-align: middle;
        }

        /* Physical Ticket "Notches" (Bites) */
        .notch {
            position: absolute;
            width: 40px;
            height: 40px;
            background-color: #111827; /* Matches body background */
            border-radius: 50%;
            right: 180px; /* Aligned with dashed line */
        }
        .notch-top { top: -20px; }
        .notch-bottom { bottom: -20px; }

        /* QR Code Styling */
        .qr-box {
            background: white;
            padding: 10px;
            border: 1px solid #e2e8f0;
            display: inline-block;
            border-radius: 10px;
        }

        .qr-box img {
            width: 120px;
            height: 120px;
        }

        .ticket-id {
            font-family: 'Courier', monospace;
            font-size: 12px;
            color: #64748b;
            margin-top: 10px;
            font-weight: bold;
        }

        /* Footer Accent */
        .footer-tag {
            background: #22d3ee;
            color: #000;
            padding: 5px 15px;
            font-size: 10px;
            font-weight: bold;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="ticket-wrapper">
        <div class="notch notch-top"></div>
        <div class="notch notch-bottom"></div>

        <div class="top-bar">
            VIP ACCESS PASS • EVENTPRO 2026 • VERIFIED
        </div>

        <table class="ticket-table">
            <tr>
                <td class="main-section">
                    <div class="event-title">{{ $booking->event->title }}</div>
                    
                    <table width="100%">
                        <tr>
                            <td>
                                <div class="label">Attendee</div>
                                <div class="value">{{ $booking->user->name }}</div>
                            </td>
                            <td>
                                <div class="label">Date</div>
                                <div class="value">{{ date('M d, Y', strtotime($booking->event->date)) }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="label">Venue Location</div>
                                <div class="value">{{ $booking->event->location }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="label">Pass Type</div>
                                <div class="value">Premium Entry (VIP)</div>
                            </td>
                            <td>
                                <div class="label">Price</div>
                                <div class="value">Rs {{ number_format($booking->event->price) }}</div>
                            </td>
                        </tr>
                    </table>
                </td>

                <td class="stub-section">
                    <div class="label">Scan for Entry</div>
                    <div class="qr-box">
                        @if(isset($qr) && !empty($qr))
                            <img src="data:image/png;base64,{{ $qr }}">
                        @else
                            <div style="font-size: 10px; padding: 40px 0;">QR CODE</div>
                        @endif
                    </div>
                    <div class="ticket-id">#{{ strtoupper($booking->ticket_code) }}</div>
                    <div class="footer-tag">VALID ONLY 2026</div>
                </td>
            </tr>
        </table>
    </div>

    <div style="text-align: center; color: #4b5563; font-size: 10px; margin-top: 20px;">
        This is a computer-generated ticket. No signature required.
    </div>

</body>
</html>