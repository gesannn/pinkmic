@extends('layouts.app')

@section('title', 'Daftar - PINKMIC RECORDS')

@section('content')
<div class="auth">
    <p class="eyebrow">JOIN THE ROOM</p>
    <h1>Buat akun</h1>
    <form method="post" action="{{ route('register.store') }}">
        @csrf
        <input name="name" value="{{ old('name') }}" placeholder="Nama" required>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password (min. 6 karakter)" required>
        <input type="password" name="password_confirmation" placeholder="Konfirmasi password" required>
        <button class="cta" type="submit">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
</div>
@endsection
