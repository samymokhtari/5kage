@extends('base')

@section('content')
    <h1>Movies</h1>
    @foreach($movies as $movie)
        <div>
            {{ $movie['name'] }} - {{ $movie['author'] }} - {{ $movie['date_release'] }}
        </div>
    @endforeach
@endsection