@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h1 class="card-title">{{ $post->title }}</h1>
            <p class="card-text">{{ $post->description }}</p>
            <div class="d-flex">
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-secondary me-2">Edit</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>Comments ({{ $post->comments->count() }})</h2>
        </div>
        <div class="card-body">
            @foreach($post->comments as $comment)
                <div class="mb-3 p-3 border rounded">
                    <p>{{ $comment->content }}</p>
                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            @endforeach

            <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-4">
                @csrf
                <h3>Add a Comment</h3>
                
                <div class="mb-3">
                    <label for="content" class="form-label">Comment</label>
                    <input class="form-control" id="content" name="content" rows="3" required />
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection