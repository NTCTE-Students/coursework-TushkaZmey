@extends('layouts.header')

@section('content')
<div class="container">
    <h1>Quests</h1>
    <div class="row">
        <div class="col-md-6">
            @foreach($quests as $quest)
                <div class="card mb-3">
                    <div class="card-body">
                        <a href="{{ route('quest.check', $quest->id)  }}" class="card-title">{{ $quest->title }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
</body>
</html>
