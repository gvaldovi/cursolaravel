@extends('layout.app')

@section('content')    
   <div class="card">
    <div class="card-header">
        <h2>Crear Nuevo Post</h2>
    </div>
    <div class="card-body">
        <form action="{{route('posts.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="body">Contenido</label>
                <textarea name="body" id="body" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
   </div>
@endsection