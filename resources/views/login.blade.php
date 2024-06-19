@extends('layouts.header')


@section('content')
<div class="container">
<form method="POST" action="{{ route('site.login') }}">
    @csrf

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="user[email]" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="user[password]" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
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
