@extends('layouts.app')

@section('content')

<style>
body {
    background: radial-gradient(circle at top, #0f0f1a, #000);
    color: white;
}

/* 🔥 IMPORTANT WRAPPER */
.dashboard-wrapper {
    width: 100%;
    padding: 20px 40px;
}

/* Header */
.dashboard-header { 
    display: flex; 
    justify-content: space-between; 
    align-items: center; 
    margin: 25px 0; 
}

/* Button */
.btn-add {
    background: linear-gradient(45deg,#4f46e5,#00f0ff);
    color: white;
    padding: 12px 20px;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 600;
    transition: 0.3s;
}
.btn-add:hover {
    transform: scale(1.05);
    box-shadow: 0 0 20px #00f0ff;
}

/* 🔥 FORCE GRID (IMPORTANT FIX) */
.stats-container {
    display: grid !important;
    grid-template-columns: 1fr 1fr !important;
    gap: 25px;
}

/* Mobile */
@media (max-width: 768px) {
    .stats-container {
        grid-template-columns: 1fr !important;
    }
}

/* 🔥 FIX CARD SIZE */
.stat-card {
    min-width: 0; /* prevents overflow */
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(12px);
    padding: 25px;
    border-radius: 15px;
    border: 1px solid rgba(255,255,255,0.1);
    transition: 0.3s;
}

.stat-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 0 25px rgba(0,255,255,0.3);
}

.stat-card h3 { 
    color: #94a3b8; 
    font-size: 13px; 
    margin-bottom: 8px; 
}
.stat-card p { 
    font-size: 32px; 
    font-weight: bold; 
    color: #00f0ff; 
}

/* Chart */
.chart-box { 
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(12px);
    padding: 25px; 
    border-radius: 15px; 
    max-width: 700px; 
    margin: 50px auto; 
}

/* Animation */
.dashboard-wrapper {
    animation: fadeIn 0.8s ease-in-out;
}
@keyframes fadeIn {
    from { opacity:0; transform: translateY(20px); }
    to { opacity:1; transform: translateY(0); }
}
</style>

<div class="dashboard-wrapper">

    <!-- Header -->
    <div class="dashboard-header">
        <h2>📊 Admin Dashboard</h2>
        <a href="/admin/create" class="btn-add">+ Add New Event</a>
    </div>

    <!-- 🔥 FIXED CARDS -->
    <div class="stats-container">
        <div class="stat-card">
            <h3>Total Events</h3>
            <p>{{ $events }}</p>
        </div>

        <div class="stat-card">
            <h3>Total Bookings</h3>
            <p>{{ $bookings }}</p>
        </div>
    </div>

    <!-- Chart -->
    <div class="chart-box">
        <canvas id="chart"></canvas>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
new Chart(document.getElementById('chart'), {
    type: 'bar',
    data: {
        labels: ['Events', 'Bookings'],
        datasets: [{
            label: 'Stats',
            data: [{{ $events }}, {{ $bookings }}],
            backgroundColor: ['#4f46e5', '#00f0ff']
        }]
    },
    options: {
        plugins: {
            legend: { labels: { color: "white" } }
        },
        scales: {
            x: { ticks: { color: "white" } },
            y: { ticks: { color: "white" } }
        }
    }
});
</script>

@endsection 