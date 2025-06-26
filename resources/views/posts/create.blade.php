@extends('layouts.app')

@section('content')

<h1>Create Post</h1>

<form action="{{route('posts.store')}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-lable">Title</label>
        <input type="text" id="title" class="form-control" name="title" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-lable">Content</label>
        <textarea class="form-control" id="content" name="description" rows="5" required></textarea>
    </div>
    <button class="btn btn-primary" type="submit">Post</button>
</form>

@endsection