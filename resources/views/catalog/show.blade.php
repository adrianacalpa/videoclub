@extends('layouts.master')
@section('content')
@foreach($pelicula as $key => $pelicula )   
    <div class="row">       

        <div class="col-sm-4" align="center">           
            {{-- TODO: Imagen de la películaaaaaaaaaaaaa --}}  
            <img src="{{$pelicula->poster}}" style="height:350px"/>    
        </div>      

        <div class="col-sm-8">           
            {{-- TODO: Datos de la película --}}
            <h1><strong>{{$pelicula->title}}</strong></h1>
            <h3><strong>Año:{{$pelicula->year}}</strong></h3>
            <h2><strong>Director:{{$pelicula->director}}</strong></h3>

            <p>
                <strong>Resumen: </strong>{{$pelicula->synopsis}}
            </p>

            <p>
                @if($pelicula->rented === true)
                    <strong>Estado: </strong> Película actualmente alquilada.<br><br>
                    <a type="button" class="btn btn-danger">Devolver Película !!!</a>
                @else
                    <strong>Estado: </strong> Película disponible.<br><br>
                    <a type="button" class="btn btn-info">Alquilar Película</a>
                @endif
                <a href="{{url('/catalog/edit/'.$pelicula->id)}}" type="button" class="btn btn-warning" ><i class="fas fa-pencil-alt"></i>Editar Película</a>
                {{--<a href="{{url('/catalog')}}"type="button" class="btn btn-outline-dark"><i class="fas fa-angle-left"></i>Volver al listado</a>--}}
                <a href="{{ url('/catalog') }}" type="button" class="btn btn-outline-dark">
                    <i class="fas fa-angle-left"></i> Volver
                </a>
            </p>
            
        </div> 

    </div>
@endforeach
@stop