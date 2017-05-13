@extends('master')
@section('title', 'Nowe wydarzenie')

@section('contents')
<div class="panel panel-default">
<div class="panel-heading">Nowe wydarzenie</div>
    <div class="panel-body">
    
<script type="text/javascript">
    $(function() {
        $('#datetimepicker1').datetimepicker({
            format: 'yyyy-MM-dd hh:mm:ss',
            language: 'en'
        });
    });
</script>
        @include('error_raports')

        <!-- Formularz dodawanie nowego wydarzenia -->
        {!! Form::open(['method'=>'post', 'action'=>['CalendarController@store']]) !!}
            <div class="form-group">
                {!! Form::label('title','Tytuł:') !!}
                <small><i>Maksymalnie 25 znaków</i></small>
                {!! Form::text('title',null,['class'=>'form-control', 'autocomplete' => 'off']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Treść:') !!}
                <small><i>Maksymalnie 100 znaków</i></small>
                {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('start_time','Data rozpoczęcia:') !!}
                <small><i>Dopuszczalny format: RRRR-MM-DD GG:MM:SS</i></small>
                {!! Form::text('start_time', $now,['class'=>'form-control', 'autocomplete' => 'off']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('end_time','Data zakończenia: ') !!}
                <small><i>Dopuszczalny format: RRRR-MM-DD GG:MM:SS</i></small>
                <div id="datetimepicker1" class="input-group input-append date">
                <span class="input-group-addon add-on">
                    <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                </span>
                    {!! Form::text('end_time',null,['class'=>'form-control', 'autocomplete' => 'off']) !!}
                </div>

            </div>
            <div class="form-group">
                {!! Form::submit('Zapisz', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

	</div>
</div>
@endsection