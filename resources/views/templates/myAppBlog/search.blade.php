@extends('templates.myappblog.master')

@section('title', 'myAppBlog - Wyszukaj')

@section('contents')

<style>
.jumbotron{
    background-image: url('/myappblog/img/{{ $config->image }}');
}
</style>

<div class="jumbotron text-center">
    <div class="container">
        <h1>{{ $config->text }}</h1>
    </div>
</div> <!-- ./jumbotron -->

<div class="container">

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3"> 
            {!! Form::open(['method' => 'GET', 'action' => 'BlogController@index']) !!}
            <div class="input-group stylish-input-group">
                {!! Form::text('search', null, ['class'=>'form-control input-lg', 'autocomplete' => 'off', 'placeholder' => 'Wyszukaj']) !!}
                <span class="input-group-addon">
                    <button type="submit">
                        <span class="icon-search"></span>
                    </button>  
                </span>
                
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <h2>Wyszukane wpisy</h2>
    <hr>
    <div class="row">
    @forelse($posts as $post)
        @if($post->publish == true)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                @if(file_exists(public_path('/uploads/posts/' . $post->image)))
                    <img class="img-responsive" src="/uploads/posts/{{ $post->image }}" alt="...">
                @else
                    <img class="img-responsive" src="/uploads/posts/default.png" alt="...">
                @endif
                <div class="caption">
                    <h3>{{ str_limit($post->title, 26) }}</h3>
                    <a href="{{ route('blog.show', $post->id) }}" type="button" class="btn btn-success btn-outline btn-lg btn-block">Czytaj...</a>
                </div>
            </div>
        </div>
        @endif
    @empty
        <h2 class="text-center"><small>Brak wyników</small></h2>
    @endforelse
    </div> <!-- ./row -->

    <hr>

    <div class="well">
        <h3>Projekt myApp</h3>
        <p class="project_about">
            Projekt myApp jest to aplikacja typu CMS, wykonana w framework Laravel.
            Aplikacja jest przeznaczona do prowadzenia prostych blogów.
            Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500.
            Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500.
            Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500.
        </p>
    </div>

</div>


<div class="container">
    <h2>Kontakt</h2>
    <hr>
    <div class="row">
        <div class="col-sm-12 col-md-6 text-center" id="mail">
            <a href="#mailto:j.zebala96@gmail.com">
                <span data-toggle="modal" data-target="#contactform" class="icon-mail"></span>
            </a>
        </div>
        <div class="col-sm-12 col-md-6 text-center" id="github">
            <a href="http://www.github.com/jzebala">
                <span class="icon-github-circled"></span>
            </a>
        </div>
    </div>
</div>
    </div>
</div>
@endsection