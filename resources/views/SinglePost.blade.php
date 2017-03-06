@extends('layouts.app')
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
                <div class="panel-heading">{{$InfoPost->TitlePost}} </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <p>{{$InfoPost->InfoPost}}</p>
                    </div>
                    <div class="col-md-6">
                   
                        <img src="{{$InfoPost->Imgpost ? 'null' :'https://lh3.googleusercontent.com/nYhPnY2I-e9rpqnid9u9aAODz4C04OycEGxqHG5vxFnA35OGmLMrrUmhM9eaHKJ7liB-=w300'}}" alt="{{$InfoPost->TitlePost}}" width="300" height="auto">
                    </div>
                    
                </div>
                <div class="panel-footer">
                    Escrito por: <strong>{{$InfoPost->nickname}}</strong>, creado el: <strong>{{date('d-m-Y H:i A',strtotime($InfoPost->created_at))}}</strong>, Categoría : <strong>{{$InfoPost->name}}</strong>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Comentarios </div>
                <div class="panel-body">
                    <div class="row">
                        @if(count($Comments) != 0)
                            @foreach($Comments as $comment)
                                el Usuario {{$comment->nickname}} dijo: {{$comment->Comment}}, el día {{date('d-m-Y',strtotime($comment->created_at))}}
                            @endforeach
                        @else
                            <p>Este post aun no tiene comentarios</p>
                        @endif
                    </div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('Comments') }}" id="FormRegister">
                         <input type="hidden" value="{{$InfoPost->idPost}}" name="idPost">
                        {{ csrf_field() }}
                        <div class="form-group">
                            Hola, <strong>{{Auth::user()->nickname}}</strong> aqui puedes realizar un comentario sobre este post.
                        </div>
                        <div class="form-group">

                            <textarea name="Comments" id="" cols="30" rows="10" class="form-control">
                                
                            </textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Comentar</button>
                        </div>
                        
                    </form>
                </div>      
            </div>
        </div>
    </div>
</div>
@endsection