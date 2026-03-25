@extends('layouts.app')

@section('content')

<h2 style="text-align:center;">🎟️ Book Event</h2>

<div class="form-container">

    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
        <p style="color:green; text-align:center;">
            {{ session('success') }}
        </p>
    @endif

    <!-- ERROR MESSAGE -->
    @if ($errors->any())
        <div style="color:red; text-align:center;">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ url('/book/'.$event->id) }}" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Your Name" value="{{ old('name') }}" required>

        <input type="email" name="email" placeholder="Your Email" value="{{ old('email') }}" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Confirm Booking</button>
    </form>
</div>

<!-- SIMPLE CSS -->
<style>
.form-container {
    width: 350px;
    margin: auto;
    padding: 20px;
    background: #f3f4f6;
    border-radius: 10px;
    box-shadow: 0 0 10px #ccc;
}

input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ccc;
}

button {
    width: 100%;
    padding: 10px;
    background: #2563eb;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background: #1d4ed8;
}
</style>

@endsection