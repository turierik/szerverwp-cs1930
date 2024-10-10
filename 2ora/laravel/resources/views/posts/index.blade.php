@extends('layout')

@section('title', 'Kezdőlap')

@section('content')

<ul>
    @foreach ($posts as $p)
        <li>{{$p -> title}} (<i>{{ $p -> user -> name }}</i>)</li>
    @endforeach
</ul>

@endsection
