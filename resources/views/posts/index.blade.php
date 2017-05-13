
@extends('master')
<script>
$( ".moj" ).prop( "disabled", true );
</script>
@section('title', 'Artykuły')
<style>tr > td {vertical-align: middle !important;}</style>
@section('contents')
<div class="panel panel-default">
<div class="panel-heading">Posty</div>
    <div class="panel-body">
        @include('error_raports')
        <div class="table-responsive">          
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Obrazek</th>
                        <th>Tytuł</th>
                        <th>Status</th>
                        <th>Autor</th>
                        <th>Utworzono</th>
                        <th><!-- Akcja --></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                    @if($post->trashed())
                        <tr class="trashed">
                    @else
                        <tr>
                    @endif
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img class="img-thumbnail" src="/uploads/posts/{{ $post->image }}" alt="Post image" width="100" height="100">
                        </td>
                        <td>{{ $post->title }}</td>
                        <td>
                            @if($post->trashed())
                                <strong>Usunięto</strong>
                            @else
                                @if($post->publish == true)
                                    Opublikowano
                                @else
                                    Nieopublikowano
                                @endif
                            @endif
                        </td>
                        <td>
                            @if(Auth::user()->hasRole('Admin'))
                            <a style="color: #333333;" target="_blank" href="{{ route('users.show', $post->user_id) }}">{{ $post->user->name }}</a>
                            @else
                            {{ $post->user->name }}
                            @endif
                        </td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                             <a href="{{ route('posts.show', $post->id) }}" class="btn btn-default">Wyświetl</a>
                        </td>
                    </tr>
                    @empty
                    <tr><td><!-- brak id --></td><td>Brak danych</td><td>Brak danych</td><td>Brak danych</td><td>Brak danych</td><td>Brak danych</td><td><!-- Brak akcji --></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <hr>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Dodaj artykuł</a>
    </div>
	<div class="panel-footer">
		{{ $posts->links() }}
	</div>
</div>
@endsection