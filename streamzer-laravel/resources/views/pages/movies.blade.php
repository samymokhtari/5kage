@extends('base')

@section('content')
    <h1>Movies</h1>
    @foreach($movies as $movie)
        <div>
            {{ $movie['name'] }}
        </div>
    @endforeach
@endsection