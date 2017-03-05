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
                <div class="panel-heading">Registro de Usuarios</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('Register') }}" id="FormRegister" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Apellido</label>
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>
                                @if ($errors->has('lastname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('Genre') ? ' has-error' : '' }}">
                            <label for="Genre" class="col-md-4 control-label">Genero</label>
                            <div class="col-md-6">
                                <select name="Genre" id="" class="form-control">
                                    <option value="">Seleccione</option>
                                    <option value="Male">Masculino</option>
                                    <option value="Female">Femenino</option>
                                </select>
                                @if ($errors->has('Genre'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('Genre') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('date_birth') ? ' has-error' : '' }}">
                            <label for="date_birth" class="col-md-4 control-label">Fecha de Nacimiento</label>
                            <div class="col-md-6">
                                <input id="date_birth" type="text" class="form-control" name="date_birth" value="{{ old('date_birth') }}" required autofocus>
                                @if ($errors->has('date_birth'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('date_birth') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">
                            <label for="alias" class="col-md-4 control-label">Alias o nickname</label>
                            <div class="col-md-6">
                                <input id="nickname" type="text" class="form-control" name="nickname" value="{{ old('nickname') }}" required autofocus>
                                @if ($errors->has('nickname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nickname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Grupos" class="col-md-4 control-label">Grupos</label>
                            <div class="col-md-6">
                                <select name="Group" id="" class="form-control">
                                    <option value="">Elija un grupo</option>
                                    @foreach($Groups as $group)
                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('url_photo_profile') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Foto de Perfil</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="url_photo_profile" />
                                @if ($errors->has('url_photo_profile'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('url_photo_profile') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                Registrar
                                </button>
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
<script src="{{asset('js/ValidationRegister.js')}}"></script>
@endsection