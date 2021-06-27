@extends('base')

@section('content')
    <h1>Films</h1>
    @foreach($movies as $movie)
        <p>
            {{ $movie['name'] }} - {{ $movie['author'] }} - {{ $movie['date_release'] }}
        </p>
    @endforeach
    <h1>Séries</h1>
    @foreach($series as $serie)
        <p>
            {{ $serie['name'] }} - {{ $serie['author'] }} - {{ $serie['date_release'] }}
        </p>
    @endforeach
@endsection