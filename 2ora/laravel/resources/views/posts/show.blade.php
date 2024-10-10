@extends('layout')

@section('title', $post -> title)

@section('content')

<h2 class="text-lg text-slate-800 font-medium pb-8">{{ $post -> title }}</h2>

<b class="pb-8">Szerző:</b>{{ $post -> user -> name}} <br>

{{ $post -> content }}

@endsection
