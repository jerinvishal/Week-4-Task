@extends('layouts.app')
@section('content')

<h1>Edit Post</h1>

<form action="{{ route('posts.update', $post) }}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" id="title" class="form-control" name="title" value="{{ $post->title }}" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Content</label>
        <textarea class="form-control" id="description" name="description" rows="5" required>{{ $post->description }}</textarea>
    </div>
    <button class="btn btn-primary" type="submit">Update</button>
</form>

@endsection