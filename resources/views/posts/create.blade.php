@extends('master')

@section('title', 'Nowy wpis')

@section('contents')
<div class="panel panel-default">
<div class="panel-heading">Nowy wpis</div>
    <div class="panel-body">
    @include('error_raports')
        <!-- Formularz dodawanie nowego wpisu -->
        {!! Form::open(['method'=>'post', 'enctype' => 'multipart/form-data','action'=>['PostsController@store']]) !!}
            <div class="form-group">
                {!! Form::label('title','Tytuł:') !!}
                {!! Form::text('title',null,['class'=>'form-control', 'autocomplete' => 'off']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('contents', 'Treść:') !!}
                {!! Form::textarea('contents', null, ['class'=>'form-control', 'id' => 'contents']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('image', 'Obrazek:') !!}
                {!! Form::file('image', null) !!}
                <span><small><i>Dopuszczalny format: (JPEG, JPG, PNG) Max: 2048KB</i></small></span>
            </div>
            <div class="form-group">
                {!! Form::select('CategoryList[]', $categories, null, ['class'=>'form-control', 'multiple']) !!}
            </div>
            <div class="checkbox">
                <label>{!! Form::checkbox('publish', 1, false); !!} Opublikuj</label>
            </div>
            <div class="form-group">
                {!! Form::submit('Zapisz', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>

@section('tinymce')
    <script src="{{ URL::asset('tinymce/tinymce.min.js') }}"></script>
@endsection

@endsection