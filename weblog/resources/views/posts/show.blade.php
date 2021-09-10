@extends('layouts.app')

@section('title', 'Show ' . $post->title)

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content}}</p>

    @if($post->deleted_at)
        <form method="post" action="{{ route('posts.forceDelete', $post) }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger" type="submit">Force Delete</button>
        </form>

        <form method="post" action="{{ route('posts.restore', $post) }}">
            @csrf
            @method('PATCH')
            <button class="btn btn-outline-success" type="submit">Restore</button>
        </form>
    @else
        <form method="post" action="{{ route('posts.destroy', $post) }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger" type="submit">Delete</button>
        </form>
    @endif
@endsection
