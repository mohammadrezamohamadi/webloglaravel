@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <ul class="mt-4">
        @foreach($posts as $post)
            <li>
                @if($post->deleted_at)
                    <a href="{{ route('posts.show', $post) }}" target="_blank">
                            {{ $post->title }} (owner: {{ $post->user->name }})
                        </a>
                    <p>{{$post->create_at}}</p>

                @else
                    <a href="{{ route('posts.show', $post) }}" target="_blank">
                        {{ $post->title }} (owner: {{ $post->user->name }})
                    </a>
                <hr>
                    <p>Content: {{ \Illuminate\Support\Str::limit($post->content,20)}}</p>
                <hr>
                    <p>Created_at: {{$post->created_at}}</p>
                    <hr>
                @endif
            </li>
        @endforeach
    </ul>
@endsection
