<!-- Comments -->
<div id="comments" class="well well-sm">
    <h3><span class="icon-comment-alt">Komentarze</span></h3>
    <button class="btn btn-primary" data-toggle="collapse" data-target="#addcomment">Skomentuj</button>
    <hr>

    @include('error_raports')

    @if(Auth::user())
    <div id="addcomment" class="collapse">
        <!-- Nowy komentarz -->
        {!! Form::open(['method'=>'post', 'action'=>['CommentsController@store', $post->id]]) !!}
            <div class="form-group">
                {!! Form::label('text', 'Twój komenarz:') !!}
                {!! Form::textarea('text', null, ['class'=>'form-control', 'id' => 'contents']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Skomentuj', ['class'=>'btn btn-success']) !!}
            </div>
        {!! Form::close() !!}
        <hr>
    </div>
    @else
    <div id="addcomment" class="collapse">
        <div class="alert alert-danger">
            <strong>Uwaga!</strong> Zaloguj się aby skomentować.
            [<strong><a style="color: #990033;" href="/login">Logowanie</a> / <a style="color: #990033;" href="/register">Rejestracja</a></strong>]
        </div>
    </div>
    @endif

    @forelse($post->comments as $comment)
    @if(!$comment->trashed())
    <div class="media">
        <div class="media-left">
            <img src="/uploads/avatars/{{ $comment->user->avatar }}" class="media-object" style="width: 60px" alt="User avatar">
        </div>
        <div class="media-body">
            <h4 class="media-heading">{{ $comment->user->name }}<small>&nbsp;&nbsp;<span class="icon-clock">{{ $comment->commentTime() }}</span> &nbsp;&nbsp; {{ $comment->created_at}}</small></h4>
            <span>{!! $comment->text !!}</span>

            <hr>
            @if(Auth::user())
                @if((Auth::user()->id == $comment->user->id) || (Auth::user()->hasRole('Admin')))
                <!-- Delete comment -->
                {!! Form::model($comment, ['method' => 'DELETE', 'action' => ['CommentsController@destroy', $comment->id]]) !!}
                <input type="hidden" name="post" value="{{ $post->id }}">
                <button class="btn btn-danger" type="submit">Usuń</button>
                {!! Form::close() !!}
                @endif
            @endif
        </div>
    </div>
    <hr>
    @elseif((Auth::user()) && (Auth::user()->hasRole('Admin')))
    <div class="media trashed">
        <div class="media-left">
            <img src="/uploads/avatars/{{ $comment->user->avatar }}" class="media-object" style="width: 60px" alt="User avatar">
        </div>
        <div class="media-body">
            <h4 class="media-heading"><a href="{{ route('users.show', $comment->user->id) }}">{{ $comment->user->name }}</a>
            <small>&nbsp;&nbsp;<span class="icon-clock">{{ $comment->commentTime() }}</span> &nbsp;&nbsp; {{ $comment->created_at}}</small>
            </h4>
            <span>{!! $comment->text !!}</span>

            <hr>
            <div class="alert alert-danger">
                <strong>{{ $comment->deleted_at}}</strong>, Post został usunięty przez użytkownika!
            </div>

            @if(Auth::user())
                @if((Auth::user()->id == $comment->user->id) || (Auth::user()->hasRole('Admin')))
                <!-- Delete comment -->
                {!! Form::model($comment, ['method' => 'DELETE', 'action' => ['CommentsController@destroy', $comment->id]]) !!}
                <input type="hidden" name="post" value="{{ $post->id }}">
                <button class="btn btn-danger btn-sm" type="submit">Usuń na zawsze</button>
                {!! Form::close() !!}
                @endif
            @endif

        </div>
    </div>
    <hr>
    @endif
    @empty
    <div class="alert alert-info">
    <strong>Info!</strong> Tego wpisu jeszcze nikt nie skomentował.
    </div>
    @endforelse
</div> <!-- ./well -->

<script src="{{ URL::asset('tinymce/tinymce.min.js') }}"></script>
<script>tinymce.init({ selector:'textarea', language: 'pl' });</script>