<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="/css/style.css">
</head>
<body>

<div class="login-box">
    <h2>Admin Login</h2>

    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <form method="POST" action="/admin/login">
        @csrf
        <input type="email" name="email" placeholder="Enter Email"><br>
        <input type="password" name="password" placeholder="Enter Password"><br>
        <button>Login</button>
    </form>
</div>

</body>
</html>