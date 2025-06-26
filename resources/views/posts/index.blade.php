@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Posts-App</h1>
    <a href="{{route('posts.create')}}" class="btn btn-primary"> <i class="bi bi-plus-circle"></i> Create Posts</a>
</div>

@foreach($posts as $posts)
<div class="card mb-4">
    <div class="card-body">
        <h4 class="card-title">{{$posts->title}}</h4>
        <p class="card-text">{{ Str::limit($posts->description,100)}}</p>
        <div class="d-flex gap-2">
            <a href="{{route('posts.show',$posts)}}" class="btn btn-outline-primary ">View </a>
            <a href="{{route('posts.edit',$posts)}}" class="btn btn-outline-dark ">Edit </a>
            <form action="{{route('posts.destroy',$posts)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger">DELETE</button>
            </form>
        </div>

        <div class="mb-3">
            <small class="text-muted">
                {{$posts->comments()->count()}} {{Str::plural('comment',$posts->comments->count() ) }}
            </small>
        </div>

    </div>
</div>
@endforeach

@endsection