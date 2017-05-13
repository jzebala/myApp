
@extends('master')

@section('title', 'Zmień obraz w tle')

@section('contents')

<div class="panel panel-default">
<div class="panel-heading">Konfiguracja obrazka w tle</div>
    <div class="panel-body">

    @include('error_raports')

    <div class="row" style="padding-bottom: 20px;">
        <div class="col col-md-5 col-sm-12" style="padding-top: 20px;">

            <div class="alert alert-info">
                Wybierz zdjęcie które będzie wyświetlane na stronie
            </div>

            <!-- Formularz Zmiany obrazka tła strony -->
            {!! Form::open(['action' => 'BlogConfigController@updateImage', 'method' => 'PUT', 'enctype' => 'multipart/form-data',]) !!}

            <div class="form-group">
                {!! Form::label('image', 'Image:') !!}
                {!! Form::file('image', null, ['class' => 'upload']) !!}
                <span><small><i>Dopuszczalny format: (JPEG, JPG, PNG) Max: 2048KB</i></small></span>
            </div>

            <div class="form-group">
                {!! Form::submit("Zapisz",['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

        </div>

        <div class="col col-md-7 col-sm-12">
            <h3>Twój obrazek w tle: <small>{{ $image }}</small></h3>
            <img class="img-responsive" src="/myappblog/img/{{ $image }}" alt="Background image">
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