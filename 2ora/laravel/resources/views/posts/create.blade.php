@extends('layout')

@section('title', 'Létrehozás')

@section('content')

<h2 class="text-lg text-slate-800 font-medium pb-8">Bejegyzés létrehozása</h2>

<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    Cím:<br>
    <input type="text" name="title" value="{{ old('title', '') }}"><br>
    @error('title')
    <span class="text-red-500">{{ $message }}</span>
    @enderror
    <br>
    Tartalom:<br>
    <textarea name="content">{{ old('content', '')}}</textarea><br>
    @error('content')
    <span class="text-red-500">{{ $message }}</span>
    @enderror
    Szerző:
    <select name="author_id">
        @foreach($users as $u)
            <option value="{{ $u -> id }}">{{ $u -> name }}</option>
        @endforeach
    </select>
    @error('author_id')
    <span class="text-red-500">{{ $message }}</span>
    @enderror<br>
    <button type="submit">Létrehozás</button>
</form>

<a href="{{ route('posts.index') }}">Vissza</a>

@endsection
