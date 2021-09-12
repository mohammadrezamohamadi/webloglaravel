@extends('layouts.app')

@section('title', 'Show ' . $post->title)

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content}}</p>

    @if($post->deleted_at)
        <form method="post" action="{{ route('posts.forceDelete', $post) }}">
            @csrf
            @method('DELETE')
            <button class="btn-danger" type="submit">Force Delete</button>
        </form>

        <form class="mt-lg-3" method="post" action="{{ route('posts.restore', $post) }}">
            @csrf
            @method('PATCH')
            <button class="btn-success" type="submit">Restore</button>
        </form>

    @else
        <form method="post" action="{{ route('posts.destroy', $post) }}">
            @csrf
            @method('DELETE')
            <button class="btn-danger" type="submit">Delete</button>
        </form>
    @endif
    <form class="mt-lg-3" method="Post" action="{{route('posts.edit', $post)}}">
        @csrf
        @method('GET')
        <button class="btn-secondary" type="submit">Edit</button>
    </form>
@endsection
