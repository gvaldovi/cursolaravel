@extends('layout.app')    

@section('title', 'Prueba de child')

@section('content')
    <h1>Prueba de child</h1>
    <p>Contenido de la página</p>
    <p>Contenido de la página</p>
    <p>Contenido de la página</p>
    <h3>
        Hola {{$name}} {{$lastname}},
        su edad es: {{$age}} años
    </h3>
    @component('components.alert', ['name' => 'Gonzalo'])
        @slot('title')
            Alerta
        @endslot
        <p>Esto es un componente de Alert</p>
    @endcomponent
    
@endsection