@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Editar Post</div>
        <div class="panel-body">
          <form action="{{url('updatePost')}}" method="post" class="form-horizontal" id="CreatePost" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" value="{{$InfoPost->id}}" name="idPost">
            <div class="form-group">
              <label for="Title">Titulo</label>
              <input id="name" type="text" class="form-control" name="TitlePost" value="{{$InfoPost->TitlePost}}">
            </div>
            <div class="form-group">
              <label for="Description">Contenido</label>
              <textarea class="form-control" name="InfoPost" id="" cols="30" rows="10">
              {{$InfoPost->InfoPost}}
              </textarea>
            </div>
            <div class="form-group">

              <label for="ImgPost" class="text-center">Imagen destacada</label>
<img src="{{$InfoPost->Imgpost ? asset($InfoPost->Imgpost) :'https://lh3.googleusercontent.com/nYhPnY2I-e9rpqnid9u9aAODz4C04OycEGxqHG5vxFnA35OGmLMrrUmhM9eaHKJ7liB-=w300'}}" alt="" width="300" height="auto" style="display: block;margin-left:auto;margin-right: auto;">
              <input type="file" class="form-control" name="Imgpost" />
            </div>
            <div class="form-group">
              <label for="Category">Categorias</label>
              <select name="Categories" id="" class="form-control">
                <option value="">Seleccione</option>
                @foreach($Categories as $Category)
                  @if($Category->id == $InfoPost->Category_id)
                    <option value="{{$Category->id}}" selected="selected">{{$Category->name}}</option>
                  @else
                    <option value="{{$Category->id}}">{{$Category->name}}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit">Actualizar Post</button>
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection