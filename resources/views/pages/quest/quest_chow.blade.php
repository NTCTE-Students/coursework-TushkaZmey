@extends('layouts.header')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Quest Details</h1>
            <h2>{{ $quest->title }}</h2>
            <p>{{ $quest->description }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1>Tasks</h1>
            <a href="{{ route('tasks.create', $quest->id) }}" class="btn btn-primary">Add Task</a>
            @foreach($tasks as $task)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $task->title }}</h5>
                    <p class="card-text">{{ $task->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
