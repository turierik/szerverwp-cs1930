@extends('layout')

@section('title', 'Kezdőlap')

@section('content')

<ul>
    @foreach ($posts as $p)
        <li><a href="{{ route('posts.show', ['post' => $p]) }}">{{$p -> title}}</a> (<i>{{ $p -> user -> name }}</i>)</li>
    @endforeach
</ul>

@endsection
