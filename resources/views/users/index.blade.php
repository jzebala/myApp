@extends('master')

@section('title', 'Użytkownicy')

@section('contents')
<div class="panel panel-default">
<div class="panel-heading">Użytkownicy</div>
    <div class="panel-body">

        @include('error_raports')

        <div class="table-responsive">          
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nazwa</th>
                        <th>Adres E-mail</th>
                        <th>Rola</th>
                        <th>Ostatnie logowanie</th>
                        <th>Utworzono</th>
                        <th><!-- Akcja --></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)

                        @if($user == Auth::user())
                            <tr class="success">
                        @else
                            <tr>
                        @endif

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($user->roles as $role)
                                {{ $role->name }}
                            @endforeach   
                        </td>
                        <td>
                            @foreach($user->loginlogs as $log)
                                @if($loop->first)
                                <span style="cursor: pointer;" data-toggle="tooltip" title="{{ $log->ip_address }}">
                                    <span class="icon-globe"></span>
                                </span>
                                {{ $log->last_login }}
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-default">Wyświetl</a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr>


<div class="row">
    <!-- Add new user -->
    <div class="col col-md-6">
        <a href="{{ route('users.create') }}" class="btn btn-primary"><span class="icon-user-add"></span> Dodaj użytkownika</a>
    </div>

    <!-- Get users login logs -->
    <div class="col col-md-6 text-right">

    {!! Form::open(['action' => 'UsersController@logsToPdf','method' => 'POST', 'class'=>'form-inline']) !!}
    <div class="form-group">
        {!! Form::label('userselect', 'Historia logowań: ') !!}
        {!! Form::select('userselect', $userselect, $lastkey, ['class' => 'form-control']); !!}
    </div>
    <div class="form-group">
        {!! Form::submit("do PDF", ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    
    </div>
</div> <!-- ./row -->

    </div>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
@endsection