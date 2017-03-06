@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido al grupo {{$NameGroup}}</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            
                            <a href="" class="btn btn-primary">Crear Nuevo Post</a>
                        </div>
                        <div class="col-md-9">
                            
                            <select name="Categories" id="" class="form-control">
                                <option value="">Elegir Categoria para ver post:</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

