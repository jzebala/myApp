@extends('master')

@section('title', 'Dodaj kategorie')

@section('contents')
<div class="panel panel-default">
<div class="panel-heading">Dodaj kategorie</div>
    <div class="panel-body">
    @include('error_raports')
        <div class="row">
            <div class="col col-md-5 col-sm-12">
                <ul class="list-group">
                @forelse ($categories as $category)
                <li class="list-group-item"><span class="icon-tags"> {{ $category->name }}</span></li>
                @empty
                <div class="alert alert-info">
                    <strong>Info!</strong>
                    Dodaj kategorie, aby następnie móc ją przypisa do któregoś ze swoich wpisów.
                </div>
                @endforelse
                </ul>
            </div>
            <div class="col col-md-7 col-sm-12">
            {!! Form::open(['action' => 'CategoriesController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {!! Form::label('name','Nazwa:') !!}
                    {!! Form::text('name', null,['class'=>'form-control', 'autocomplete' => 'off']) !!}
                </div>

                <div class="checkbox">
                    <label>{!! Form::checkbox('newadd', 1, true); !!} Po dodaniu powróć do tego formularza.</label>
                </div>

                <div class="form-group">
                    {!! Form::submit("Dodaj",['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div> <!-- ./panel-body -->
</div>
@endsection