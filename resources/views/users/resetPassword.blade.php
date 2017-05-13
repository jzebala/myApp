<style>#user_avatar{background: url("/uploads/avatars/{{ $user->avatar }}");}</style>
@extends('master')

@section('title', 'Resetowanie hasła')

@section('contents')
<div class="panel panel-default">
<div class="panel-heading">Resetuj hasło</div>
    <div class="panel-body">
        @include('error_raports')

        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3">
                <div id="user_avatar">User avatar</div>
                <h2 class="text-center">{{ $user->name }}</h2>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-9">
                {!! Form::open(['action' => ['UsersController@updatePassword', $user->id], 'method' => 'PUT', 'class'=>'form-horizontal']) !!}
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
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Resetuj hasło',['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
</div>
@endsection