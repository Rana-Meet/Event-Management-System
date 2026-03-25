<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event System</title>

    <!-- CSS -->
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <!-- Navbar -->
    @include('layouts.navigation')

    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>

</body>
</html>