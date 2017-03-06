@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Post</div>
                <div class="panel-body">
                    <form action="" class="form-horizontal" id="CreatePost">
                        <div class="form-group">
                            <label for="Title">Titulo</label>
                            <input id="name" type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Description">Contenido</label>
                        <textarea class="form-control" name="" id="" cols="30" rows="10">
                        
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="ImgPost">Imagen destacada</label>
                        <input type="file" class="form-control" name="url_photo_profile" />
                    </div>
                    <div class="form-group">
                        <label for="Category">Categorias</label>
                        <select name="Categories" id="" class="form-control">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Crear Post</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
</div>
@endsection