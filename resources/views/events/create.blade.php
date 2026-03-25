@extends('layouts.app')

@section('content')

<h2 style="text-align:center;">Create Event</h2>

<div class="form-container">

    <form action="/admin/store" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="title" placeholder="Event Title" required>

        <textarea name="description" placeholder="Event Description" required></textarea>

        <input type="date" name="date" required>

        <input type="text" name="location" placeholder="Event Location" required>

        <input type="number" name="price" placeholder="Event Price" required>

        <input type="file" name="image" required>

        <button type="submit">Add Event</button>
    </form>

</div>

@endsection