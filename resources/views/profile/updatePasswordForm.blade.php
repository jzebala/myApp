<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Zmień hasło</button>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Zmiana hasła</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['action' => 'UserController@updatePassword', 'method' => 'PUT']) !!}
                <div class="form-group">
                    {!! Form::label('old_password', 'Aktualne hasło:') !!}
                    {!! Form::password('old_password', ['placeholder'=>'Aktualne hasło', 'class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Nowe hasło:') !!}
                    {!! Form::password('password', ['placeholder'=>'Nowe hasło', 'class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Powtórz hasło:') !!}
                    {!! Form::password('password_confirmation', ['placeholder'=>'Powtórz hasło', 'class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit("Zmień hasło",['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
            </div>
        </div>
    </div>
</div>