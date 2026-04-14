@extends('layouts.app')
@section('content')
<div class="min-h-screen p-20">
    <h1 class="text-4xl font-bold mb-8">Join the Team</h1>
    <div class="space-y-4">
        <div class="glass p-6 rounded-xl flex justify-between items-center">
            <div>
                <h4 class="text-xl font-bold">Senior UI/UX Designer</h4>
                <p class="text-gray-400 text-sm">Remote • Full-time</p>
            </div>
            <button class="text-cyan-400 border border-cyan-400 px-4 py-2 rounded-lg">Apply</button>
        </div>
        <div class="glass p-6 rounded-xl flex justify-between items-center">
            <div>
                <h4 class="text-xl font-bold">Laravel Backend Developer</h4>
                <p class="text-gray-400 text-sm">Ahmedabad • Full-time</p>
            </div>
            
            <button class="text-cyan-400 border border-cyan-400 px-4 py-2 rounded-lg">Apply</button>
            
        </div>
    </div>
</div>
@endsection