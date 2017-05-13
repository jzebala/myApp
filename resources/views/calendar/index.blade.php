@extends('master')
@section('title', 'Kalendarz')

@section('contents')
<div class="panel panel-default">
<div class="panel-heading">Kalendarz</div>
    <div class="panel-body">
        @include('error_raports')

        <div class="list-group">
        @forelse($events as $event)
            <a href="#" data-toggle="collapse" data-target="#description_{{ $event->id }}" class="list-group-item">
                <h4>
                    <span class="icon-calendar">{{ $event->title }}</span>
                    <small> 
                        {{ $event->eventTime() }}
                    </small>
                </h4>
            </a>
            <div id="description_{{ $event->id }}" class="collapse event_description">
                
            <div class="row">
                <div class="col col-md-8">
                     {{ $event->description }}
                </div>
                <div class="col col-md-4">
                     <div class="text-muted text-right">
                        Data rozpoczęcia:&nbsp; 
                        <strong>{{ $event->start_time }}</strong>
                     </div>
                     <div class="text-muted text-right">
                        Data zakończenia: 
                        <strong>{{ $event->end_time }}</strong>
                     </div>
                </div>
            </div>

                <!-- Delete event -->
                {!! Form::model($event, ['method' => 'DELETE', 'action' => ['CalendarController@destroy', $event->id]]) !!}
                <button class="btn btn-danger btn-sm" type="submit"><span class="icon-trash-empty">Usuń</span></button>
                {!! Form::close() !!}

            </div>
        @empty

        <div class="alert alert-info alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Uwaga!</strong> Obecnie twój Kalendarz jest pust.
        </div>

        @endforelse

        </div>
        <hr>
        <a href="{{ route('calendar.create') }}" class="btn btn-primary"><span class="icon-calendar-plus-o">Dodaj wydarzenie</span></a>
	</div>
</div>
@endsection