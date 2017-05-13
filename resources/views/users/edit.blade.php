<style>#user_avatar{background: url("/uploads/avatars/{{ $user->avatar }}");}</style>
@extends('master')

@section('title', $user->name)

@section('contents')
<div class="panel panel-default">
<div class="panel-heading">Edytuj użytkownika</div>
    <div class="panel-body">
        @include('error_raports')
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3">
                <div id="user_avatar">User avatar</div>
                <h2 class="text-center">{{ $user->name }}</h2>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-9">
                {!! Form::model($user, ['method'=>'PUT','class'=>'form-horizontal','action'=>['UsersController@update', $user->id]]) !!}
                    <div class="form-group">
                        <div  class="col-md-4 control-label">
                            {!! Form::label('name','Nazwa:') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('name',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div  class="col-md-4 control-label">
                            {!! Form::label('email','E-mail:') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::email('email',null,['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div  class="col-md-4 control-label">
                            {!! Form::label('roles', 'Rola użytkownika:') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::select('roles', $roles, $user->roles->first()->id, ['class' => 'form-control']); !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Zmień',['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection