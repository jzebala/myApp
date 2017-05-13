
@extends('master')

@section('title', 'Blog Config')

@section('contents')
<div class="panel panel-default">
<div class="panel-heading">Konfiguracja</div>
    <div class="panel-body">
    @include('error_raports')
    
    <div class="list-group">
        <a href="{{ route('blogconfig.image') }}" class="list-group-item">Zmień zdjęcie w tle</a>
        <a href="{{ route('blogconfig.text') }}" class="list-group-item">Zmień główny tekst</a>
        <a href="{{ route('blogconfig.pagination') }}" class="list-group-item">Zmień ilość wpisów wyświetlanych na stronie</a>
    </div>

    </div>
</div>
@endsection