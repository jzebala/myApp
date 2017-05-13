@extends('master')

@section('title', "Welcome")

@section('contents')
<div class="panel panel-default">
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <h1><strong>Witaj, <small>{{ Auth::user()->name }} <span class="icon-mail">{{ Auth::user()->email }}</span></small></strong></h1>
        </div>
    </div>

    <hr>

    @if(!empty($eventtoday))
    <div class="alert alert-info alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Pamiętaj! </strong> Sprawdź swój kalendarz, planowane wydarzenia na dziś: <strong>{{ $eventtoday }}</strong>
    </div>
    @endif

    <div class="row">

        <!-- Tile 1 -->
        <a href="{{ route('blog.index') }}">
        <div class="col-sm-4">
            <div class="tile">
                <h3 class="title"><span class="icon-home"></sapn>Moja strona</h3>
                <p>Pokaż moją strone</p>
            </div>
        </div>
        </a>
        <!-- Tile 2 -->
        <a href="{{ route('posts.index') }}">
        <div class="col-sm-4">
            <div class="tile">
                <h3 class="title"><span class="icon-doc-text"></sapn>Wpisy ({{ Auth::user()->postsCount() }})</h3>
                <p>Zarządzaj swoimi wpisami na stronie</p>
            </div>
        </div>
        </a>
        <!-- Tile 3 -->
        <a href="{{ route('categories.index') }}">
        <div class="col-sm-4">
            <div class="tile">
                <h3 class="title"><span class="icon-tags"></sapn>Kategorie</h3>
                <p>Zarządaj kategoriami dodawanej treści</p>
            </div>
        </div>
        </a>
    </div>
    <div class="row">
        <!-- Tile 4 -->
        <a href="{{ route('calendar.index') }}">
        <div class="col-sm-4">
            <div class="tile">
                <h3 class="title"><span class="icon-calendar"></sapn>Kalendarz ({{ Auth::user()->eventsCount() }})</h3>
                <p>Mój kalendarz</p>
            </div>
        </div>
        </a>
        <!-- Tile 5 -->
        <a href="{{ route('user.index') }}">
        <div class="col-sm-4">
            <div class="tile">
                <h3 class="title"><span class="icon-user"></sapn>Profil</h3>
                <p>Profil użytkownika</p>
            </div>
        </div>
        </a>

        @if(Auth::user()->hasRole('Admin'))
        <!-- Tile 6 -->
        <a href="{{ route('users.index') }}">
        <div class="col-sm-4">
            <div class="tile">
                <h3 class="title"><span class="icon-users"></sapn>Użytkownicy</h3>
                <p>Wszyscy użytkownicy</p>
            </div>
        </div>
        </a>
        @endif
    </div>

    <div class="row">
        @if(Auth::user()->hasRole('Admin'))
        <!-- Tile 6 -->
        <a href="{{ route('blogconfig.index') }}">
        <div class="col-sm-4">
            <div class="tile">
                <h3 class="title"><span class="icon-cog-alt"></sapn>Ustawienia</h3>
                <p>Konfiguracja strony</p>
            </div>
        </div>
        </a>
        @endif
    </div>

</div> <!-- ./panel-body -->
</div>
@endsection