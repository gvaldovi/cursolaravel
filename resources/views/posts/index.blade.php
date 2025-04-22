@extends('layout.app')

@section('content')    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Posts</h1>
        <a href={{route('posts.create')}} class="btn btn-primary">Crear Nuevo Post</a>
    </div>
        
    @foreach ($posts as $post)
        <li>
            <a href="/posts/{{$post->id}}">{{$post->title}}</a>
        </li>
    @endforeach
@endsection