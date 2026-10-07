@extends('layouts.app')

@section('title', 'Login - PINKMIC RECORDS')

@section('content')
<div class="auth">
    <p class="eyebrow">WELCOME BACK</p>
    <h1>Masuk ke PINKMIC</h1>
    <form method="post" action="{{ route('login.store') }}">
        @csrf
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button class="cta" type="submit">Login</button>
    </form>
    <p>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
</div>
@endsection
