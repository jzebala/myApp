@extends('master')

@section('title', $post->title)

@section('contents')
<div class="panel panel-default">
<div class="panel-heading">Edytuj wpis</div>
    <div class="panel-body">
        @include('error_raports')
        <!-- Post Header -->
        <div class="row">
            <div class=" col col-md-10 col-sm-12">
                <h3>{{ $post->title }}</h3>
                <span class="text-muted">
                    Autor: <a target="_blank" href="{{ route('users.show', $post->user_id) }}">{{ $post->user->name }}</a>
                </span>
            </div>
            <div class=" col col-md-2 col-sm-12">
                <h3><small>{{ $post->created_at }}</small></h3>
            </div>
        </div>

        <hr>

        <!-- Formularz edycji -->
        {!! Form::model($post, ['method'=>'put', 'enctype' => 'multipart/form-data','action'=>['PostsController@update', $post->id]]) !!}
            <div class="form-group">
                {!! Form::label('title','Tytuł:') !!}
                {!! Form::text('title',null,['class'=>'form-control', 'autocomplete' => 'off']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('contents', 'Treść:') !!}
                {!! Form::textarea('contents', null, ['class'=>'form-control', 'id' => 'contents']) !!}
            </div>
            <div class="row">
                <div class=" col col-md-9 col-sm-12">
                    <!-- Upload image -->
                    <div class="form-group">
                        {!! Form::label('image', 'Obrazek:') !!}
                        {!! Form::file('image', null) !!}
                        <span><small><i>Dopuszczalny format: (JPEG, JPG, PNG) Max: 2048KB</i></small></span>
                    </div>
                </div>
                <div class=" col col-md-3 col-sm-12">
                    <!-- Show current image -->
                    Obecny obrazek
                    <img class="img-thumbnail" src="/uploads/posts/{{ $post->image }}" alt="Post image">
                </div>
            </div>  
            <div class="form-group">
                {!! Form::select('CategoryList[]', $categories, null, ['class'=>'form-control', 'multiple']) !!}
            </div>
            <div class="checkbox">
                <label>{!! Form::checkbox('publish', 1, false); !!} Opublikuj</label>
            </div>
            <div class="form-group">
                {!! Form::submit('Zapisz zmiany', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>

@section('tinymce')
    <script src="{{ URL::asset('tinymce/tinymce.min.js') }}"></script>
@endsection

@endsection