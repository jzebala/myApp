<style>#user_avatar{background: url("/uploads/avatars/default.png");}</style>
@extends('master')

@section('title', 'Nowy uzytkownik')

@section('contents')
<div class="panel panel-default">
<div class="panel-heading">Nowy użytkownik</div>
    <div class="panel-body">
        @include('error_raports')
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div id="user_avatar">User avatar</div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-9">
        {!! Form::open(['action' => 'UsersController@store', 'method' => 'POST','class'=>'form-horizontal']) !!}
            <div class="form-group">
                <div  class="col-md-4 control-label">
                    {!! Form::label('name','Nazwa:') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('name', null,['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div  class="col-md-4 control-label">
                    {!! Form::label('email','E-mail:') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::email('email', null,['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div  class="col-md-4 control-label">
                    {!! Form::label('password', 'Hasło:') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::password('password', ['placeholder'=>'', 'class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div  class="col-md-4 control-label">
                    {!! Form::label('password_confirmation', 'Powtórz hasło:') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::password('password_confirmation', ['placeholder'=>'', 'class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div  class="col-md-4 control-label">
                    {!! Form::label('roles', 'Rola użytkownika:') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::select('roles', ['1' => 'Admin', '2' => 'Moderator'], '1', ['class' => 'form-control']); !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    {!! Form::submit("Dodaj",['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection