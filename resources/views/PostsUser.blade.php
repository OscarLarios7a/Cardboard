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
              @if(count($AllPosts) != 0)
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
              @else
              <td colspan="4"><strong class="text-center">Aun no has creado un post, Animaté y crea uno</strong>
                <a href="{{url('Post/create')}}" class="btn btn-primary">Crear Nuevo Post</a>
              </td>
              @endif
            </tbody>
          </table>
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection