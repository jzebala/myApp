<style>#user_avatar{background: url("/uploads/avatars/{{ $user->avatar }}");}</style>
@extends('templates.myappblog.master')

@section('title', 'Profil użytkownika')

@section('contents')
<br><br><br><br><br>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading">Profil użytkownika</div>
    <div class="panel-body">
    @include('error_raports')
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div id="user_avatar">User avatar</div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-9">
            <h2>Profil: {{ $user->name }} <small><span class="icon-mail"></span> {{ $user->email }}</small></h2>
            {!! Form::open(['action' => 'BlogController@updateAvatar', 'method' => 'POST', 'enctype' => 'multipart/form-data',]) !!}

            <div class="form-group">
                {!! Form::label('avatar', 'Avatar:') !!}
                {!! Form::file('avatar', null, ['class' => 'upload']) !!}
                <span><small><i>Dopuszczalny format: (JPEG, JPG, PNG) Max: 2048KB</i></small></span>
            </div>

            <div class="form-group">
                {!! Form::submit("Zmień avatar'a",['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <hr>
    
    @include('templates.myappblog.updatePasswordForm')

</div>
</div>
</div>
@endsection