@extends('layouts.app')
@section('styles')
<link href="{{ asset('css/formValidation.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
@endsection
@section('content')
<div class="container">
    @if (session('Success'))
    <div class="alert alert-success">
        {{ session('Success') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mi perfil</div>
                <div class="panel-body">
                    <form action="{{ url('UpdateUserProfile') }}" method="post" id="UpdateInfo" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Nombre">Nombre</label><br>
                                    <input type="text" class="form-control" name="name" value="{{$DataProfile->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="Apellido">Apellido</label><br>
                                    <input type="text" class="form-control" name="lastname" value="{{$DataProfile->lastname}}">
                                </div>
                                <div class="form-group">
                                    <label for="date_birth">Fecha Nacimiento</label><br>
                                    <input type="text" class="form-control" name="date_birth" value="{{$DataProfile->date_birth}}">
                                </div>
                                <div class="form-group">
                                    <label for="Genre">Genero</label><br>
                                    <select name="Genre" class="form-control">
                                        <option value="">Seleccione</option>
                                        @if($DataProfile->Genre == "Male")
                                            <option value="Male" selected="selected">Masculino</option>
                                            <option value="Female">Femenino</option>
                                        @else
                                             <option value="Male">Masculino</option>
                                            <option value="Female" selected="selected">Femenino</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nickname">nickname</label><br>
                                    <input type="text" class="form-control" name="nickname" value="{{$DataProfile->nickname}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="PhotoProfile">Foto de perfil</label>
                                </div>
                                <div class="form-group">
                                    <img src="{{asset($DataProfile->url_photo_profile)}}" alt="PhotoProfile" width="330" height="auto">
                                </div>
                                <div class="form-group">
                                    <label for="NewPhotoProfile">Subir nueva imagen</label>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" value="{{$DataProfile->url_photo_profile}}" name="oldUrlPhotoProfile">
                                    <input type="file" class="form-control" name="url_photo_profile" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-5">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Datos Adicionales</div>
                <div class="panel-body">
                    <p>Hola, sí deseas añadir más información sobre tí lo puedes hacer aquí:</p>
                    <form action="{{ url('AditionalInfo') }}" method="post" id="AdditionalInfo">
                        {{ csrf_field() }}
                        
                            @if(count($AdditionalInfo) !=0 )
                            <div class="row">
                                @foreach($AdditionalInfo as $info)
                                    <div class="form-group">
                                        <div class="col-md-5">
                                            <input type="hidden" name="idAdditionalInfo[]" value="{{$info->id}}">
                                            <input type="text" class="form-control" name="title_U[]" value="{{$info->PersonalRow}}" placeholder="Nombre del campo" />
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="description_U[]" value="{{$info->Description}}" placeholder="Valor del campo" />
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @else
                            <div class="row">
                                <div class="form-group">
                                    <p class="text-center">Es buen momento para empezar a añadir información personal</p>
                                </div>
                            </div>
                            @endif

                        
                        <div class="row">
                            <div class="form-group hide" id="bookTemplate">
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="title[]" placeholder="Nombre del campo"/>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="description[]" placeholder="Valor del campo"/>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger removeButton">Eliminar</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-8">
                                <div class="btn-group">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary addButton">Añadir</button>
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('Scripts')
<script src="{{asset('js/formValidation/formValidation.min.js')}}"></script>
<script src="{{asset('js/formValidation/bootstrap.min.js')}}"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<script src="{{asset('js/ValidationProfile.js')}}"></script>
@endsection