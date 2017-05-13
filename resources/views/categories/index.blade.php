@extends('master')

@section('title', 'Kategorie')

@section('contents')
<div class="panel panel-default">
<div class="panel-heading">Kategorie</div>
    <div class="panel-body">
    @include('error_raports')
        <div class="table-responsive">          
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nazwa</th>
                        <th>Utworzono</th>
                        <th>Szczegóły</th>
                        <th><!-- Akcja --></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @forelse($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td><a href="{{ route('categories.show', $category->id) }}" class="btn btn-link">Wyświetl</a></td>
                            <td>
                                {!! Form::model($category, ['method' => 'DELETE', 'action' => ['CategoriesController@destroy', $category->id]]) !!}
                                <button type="submit" class="btn btn-danger" ><span class="icon-trash-empty">Usuń</span></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @empty
                        <tr><td><!-- brak id --></td><td>Brak danych</td><td>Brak danych</td><td>Brak danych</td><td><!-- brak akcji --></td></tr>
                        @endforelse
                    </tr>
                </tbody>
            </table>
        </div>

        <hr>

        <a class="btn btn-primary" href="{{ route('categories.create') }}">Dodaj kategorie</a>
    </div> <!-- ./panel-body -->
</div>
@endsection