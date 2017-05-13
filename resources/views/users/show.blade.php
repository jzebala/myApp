<style>#user_avatar{background: url("/uploads/avatars/{{ $user->avatar }}");}</style>
@extends('master')

@section('title', $user->name)

@section('contents')
<div class="panel panel-default">
<div class="panel-heading">Użytkownik</div>
    <div class="panel-body">

        @if($user == Auth::user())
            <div class="alert alert-warning">
                <strong>Uwaga!</strong> Jesteś w trybie edycji użytkownika obecnie zalogowanego. 
            </div>
        @endif

        @include('error_raports')
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div id="user_avatar">User avatar</div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-9">
            <h3>Użytkownik <small>{{ $user->name }}</small></h3>
            <h3>E-mail <small>{{ $user->email }}</small></h3>
            <h3>Rola <small>
                @foreach($roles as $role)
                    {{ $role }}
                @endforeach   
            </small></h3>
            <h4>
                Ostatnie logowanie
                @if(!empty($last_log->last_login))
                <small>{{ $last_log->last_login }}</small> 
                <button type="button" class="btn btn-link btn-xs" data-toggle="modal" data-target="#myModal">Pokaż więcej</button>
                @else
                    <small>Brak historii logowań użytkownika</small>
                @endif
            </h4>
            
             @include('users.AllLoginLogs')

            <hr>

            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Użytkownik <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ route('users.edit', $user->id) }}">Edytuj</a></li>
                    <li><a href="" data-toggle="modal" data-target="#deleteModal" >Usuń</a></li>
                    @if(!empty($last_log->last_login))
                    <li><a href="{{ route('users.pdf', $user->id) }}">Historia logowań PDF</a></li>
                    @endif
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('users.resetPassword', $user->id) }}">Resetuj hasło</a></li>
                </ul>
            </div>
        </div>
        <!-- Delete User Modal -->
        <div class="modal fade" id="deleteModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Usuń użytkownika</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <strong>Uwaga!</strong> Na pewno chcesz usunąć tego użytkownika ?
                    </div>
                </div>
					<div class="modal-footer">
                        {!! Form::model($user, ['method' => 'DELETE', 'action' => ['UsersController@destroy', $user->id]]) !!}
                        {!! Form::submit('Usuń użytkownika', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}                      
					</div>
				</div>
			</div>
		</div>

    </div>
</div>
@endsection