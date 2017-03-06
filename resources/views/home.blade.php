@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido al grupo {{$NameGroup}}</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{url('Post/create')}}" class="btn btn-primary">Crear Nuevo Post</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center">Lista de Post</h3>
                        </div>
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Titulo</td>
                                        <td>Contenido</td>
                                        <td>Autor</td>
                                        <td>Categoria</td>
                                        <td>Acciones</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($AllPost) != 0)
                                    @foreach($AllPost as $post)
                                        <tr class="">
                                            <td>{{$post->TitlePost}}</td>
                                            <td>{{$post->InfoPost}}</td>
                                            <td>{{$post->nickname}}</td>
                                            <td>{{$post->name}}</td>
                                            <td><a href="{{url('Post/'.$post->id)}}" class="btn btn-primary">Seguir leyendo</td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5"><strong class="text-center">Aun no hay post para este grupo, Animate y sé el primero</strong></td>
                                    </tr>
                                    @endif
                                </tbody>
                                
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
