
@extends('master')

@section('title', 'Zmień ilość postów na stronie')

@section('contents')

<div class="panel panel-default">
<div class="panel-heading">Konfiguracja wyświetlania postów na stronie</div>
    <div class="panel-body">
    @include('error_raports')

    <div class="row" style="padding-bottom: 20px;">
        <div class="col col-md-5 col-sm-12" style="padding-top: 20px;">

            <div class="alert alert-info">
                Podaj ilość postów które będą wyświetlone na stronie
            </div>

            <!-- Formularz Zmiany koloru tła strony -->
            {!! Form::open(['method' => 'put', 'action' => 'BlogConfigController@updatePagination']) !!}
            <div class="form-group">
                {!! Form::label('pagination','Posty wyświetlane:') !!}
                {!! Form::text('pagination', null, ['class'=>'form-control', 'Autocomplete' => 'off']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Zapisz', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

        </div>

        <div class="col col-md-7 col-sm-12">
            <h3>Liczba wpisów wyświetlających się na stronie: {{ $pagination }}</h3>
            <a class="btn btn-link btn-sm" href="{{route('blog.index')}}">Pokaż na stronie</a>
        </div>
    </div>

    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Ustawienia</li>
        <li class="breadcrumb-item"><a href="{{ route('blogconfig.image') }}">Obrazek</a></li>
        <li class="breadcrumb-item"><a href="{{ route('blogconfig.text') }}">Tekst</a></li>
        <li class="breadcrumb-item"><a href="{{ route('blogconfig.pagination') }}">Paginacja</a></li>
    </ol>

    </div>
</div>
@endsection