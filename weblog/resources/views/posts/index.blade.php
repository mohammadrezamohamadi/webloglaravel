@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <ul class="mt-4">
        @foreach($posts as $post)
            <li>
                @if($post->deleted_at)
                    <del><a href="{{ route('posts.show', $post) }}" target="_blank">
                            {{ $post->title }} (owner: {{ $post->user->name }})
                        </a></del>
                @else
                    <a href="{{ route('posts.show', $post) }}" target="_blank">
                        {{ $post->title }} (owner: {{ $post->user->name }})
                    </a>
                @endif
            </li>
        @endforeach
    </ul>
@endsection
