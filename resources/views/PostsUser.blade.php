@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mis Post</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Descripcion</th>
                                <th>Categoria</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($AllPosts as $post)
                               <tr>
                                   <td>{{$post->TitlePost}}</td>
                                   <td>{{$post->InfoPost}}</td>
                                   <td>{{$post->name}}</td>
                                   <td>
                                    <div class="btn-group">
                                        <a href="{{url('Post/'.$post->idPost.'/edit')}}" class="btn btn-primary">Editar</a>
                                        <a href="#" class="btn btn-danger">Eliminar</a>
                                       
                                    </div>
                                   </td>
                               </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
