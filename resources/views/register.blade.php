@extends('layouts.header')


@section('content')
<div class="container">
<form method="POST" action="{{ route('site.register') }}">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input id="name" type="text" name="user[name]" value="{{ old('user.name') }}" required class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input id="email" type="email" name="user[email]" value="{{ old('user.email') }}" required autofocus class="form-control">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input id="password" type="password" name="user[password]" required class="form-control">
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="user[password_confirmation]" required class="form-control">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Register</button>
    </div>
</form>
@if($errors -> any())
<h3>Возникла ошибка при авторизации</h3>
<ul>
@foreach ($errors -> all() as $error)
    <li>{{ $error }}</li>
@endforeach
</ul>
@endif
</div>
@endsection
