@extends('templates.myappblog.master')

@section('title', $post->title)

@section('contents')

<style>
.jumbotron{
    background-image: url('/myappblog/img/{{ $config->image }}');
}
</style>

<div class="jumbotron text-center">
    <div class="container">
        <h1>{{ $post->title }}</h1>
    </div>
</div> <!-- ./jumbotron -->

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">{{ $post->title }}</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <span class="icon-user"> {{ $post->user->name }}</span>
                </div>
                <div class="col-xs-12 col-md-6 text-right">
                    <span class="icon-calendar"> {{ $post->created_at }}</span>
                </div>
            </div>
            <hr>
            <span class="post-contents">
            {!! $post->contents !!}
            </span>
            <hr>
            <span class="icon-tags">
            @foreach($post->categories as $category)
                {{ $category->name }}
                @if(!$loop->last),@endif
            @endforeach
            </span>
        </div>
    </div>
</div>
@endsection