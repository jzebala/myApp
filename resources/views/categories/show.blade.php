@extends('master')

@section('title', 'Kategoria')

@section('contents')
<script>
$(document).ready(function() 
    { 
        $("#myTable").tablesorter(); 
    } 
); 
</script>
<div class="panel panel-default">
<div class="panel-heading">Kategoria: {{ $category->name }}</div>
    <div class="panel-body">
        <h4>Lista wpisów powiązanych z tą kategorią: <strong>{{ $category->name }}</strong></h4>
        <div id="myTable" class="table-responsive">          
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nazwa wpisu</th>
                        <th>Utworzono</th>
                        <th><!-- Akcja --></th>
                    </tr>

                    
                    @forelse($category->posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                            <a href="{{ route('blog.show', $post->id) }}" class="btn btn-default">Pokaż wpis</a>
                        </td>
                    </tr>
                    @empty
                        <tr><td>#</td><td>Brak danych</td><td>Brak danych</td><td><!-- Brak akcji --></td></tr>
                    @endforelse
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div> <!-- ./panel-body -->
</div>
@endsection