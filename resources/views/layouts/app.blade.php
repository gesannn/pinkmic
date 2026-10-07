<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'PINKMIC RECORDS')</title>
    <link rel="stylesheet" href="{{ asset('css/studio.css') }}">
</head>
<body>
<nav>
    <a class="brand" href="{{ route('home') }}">PINKMIC<span> RECORDS</span></a>
    <div class="navlinks">
        <a href="{{ route('home') }}">Studio</a>
        @if(session('user_id'))
            <a href="{{ route('user.bookings') }}">Booking Saya</a>
            @if(session('role') === 'admin')
                <a href="{{ route('admin.dashboard') }}">Admin</a>
            @endif
            <form method="post" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a class="pill" href="{{ route('register') }}">Daftar</a>
        @endif
    </div>
</nav>

@if(session('success'))
    <div class="flash success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="flash error">{{ session('error') }}</div>
@endif
@if($errors->any())
    <div class="flash error">
        @foreach($errors->all() as $message)
            <div>{{ $message }}</div>
        @endforeach
    </div>
@endif

<main>
    @yield('content')
</main>

<footer>PINKMIC RECORDS • Makassar • Your Sound, Your Story.</footer>
</body>
</html>
