@extends('layouts.app')

@section('content')
<style>
    .dashboard-header { 
        display: flex; 
        justify-content: space-between; 
        align-items: center; 
        margin: 25px 0; 
    }
    .btn-add {
        background: #2563eb;
        color: white;
        padding: 12px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: 0.2s;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .btn-add:hover { background: #1e40af; color: white; transform: translateY(-2px); }
    
    .stats-container { display: flex; gap: 20px; margin-bottom: 30px; }
    .stat-card {
        flex: 1;
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        border-left: 5px solid #2563eb;
    }
    .stat-card h3 { color: #64748b; font-size: 14px; text-transform: uppercase; margin-bottom: 5px; }
    .stat-card p { font-size: 28px; font-weight: bold; color: #1e293b; }
    
    .chart-box { 
        background: white; 
        padding: 20px; 
        border-radius: 12px; 
        box-shadow: 0 4px 6px rgba(0,0,0,0.05); 
        max-width: 600px; 
        margin: 0 auto; 
    }
</style>

<div class="container">
    <!-- Updated Header with Button -->
    <div class="dashboard-header">
        <h2 style="margin: 0;">📊 Admin Dashboard</h2>
        <a href="/admin/create" class="btn-add">
            <span>+</span> Add New Event
        </a>
    </div>

    <div class="stats-container">
        <div class="stat-card">
            <h3>Total Events</h3>
            <p>{{ $events }}</p>
        </div>
        <div class="stat-card" style="border-left-color: #10b981;">
            <h3>Total Bookings</h3>
            <p>{{ $bookings }}</p>
        </div>
    </div>

    <div class="chart-box">
        <canvas id="chart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('chart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Events', 'Bookings'],
                datasets: [{
                    label: 'Platform Statistics',
                    data: [{{ $events }}, {{ $bookings }}],
                    backgroundColor: ['#2563eb', '#10b981'],
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { 
                        beginAtZero: true, 
                        ticks: { stepSize: 1, precision: 0 } 
                    }       
                }
            }
        });
    });
</script>
@endsection
