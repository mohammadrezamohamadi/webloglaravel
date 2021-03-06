@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="mt-4" method="post" action="{{ route('posts.store') }}">
        @csrf



        <div class="mb-3">
            <label for="exampleInputTitle1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleInputTitle1" name="title">
        </div>

        <div class="mb-3">
            <label for="exampleInputDescription1" class="form-label">Content</label>
            <textarea class="form-control" id="exampleInputDescription1" rows="4" name="content"></textarea>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="is_done">
            <label class="form-check-label" for="flexCheckDefault">
                Done?
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
