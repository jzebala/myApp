@extends('auth.master')

@section('contents')
<style>
body{
	background-color: #EFEFEF;
}
.panel-heading {
    padding: 8px 15px;
}

.panel-footer {
	padding: 6px 15px;
	color: #A0A0A0;
}

.profile-img {
	width: 96px;
	height: 96px;
	margin: 0 auto 10px;
	display: block;
	-moz-border-radius: 50%;
	-webkit-border-radius: 50%;
	border-radius: 50%;
}
</style>
<div class="container" style="margin-top:60px">
	<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>Zaloguj się</strong>
				</div>

				<div class="panel-body">
					<form role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
						<fieldset>
							<div class="row">
								<div class="center-block">
									<img class="profile-img"
										src="/img/login-user.png" alt="Login user">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 col-md-10  col-md-offset-1 ">
									<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="icon-user"></i>
											</span> 
											<input class="form-control" placeholder="E-mail" id="email" type="email"  name="email" value="{{ old('email') }}" required autofocus>
										</div>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
									</div>
									
									<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="icon-lock"></i>
											</span>
										<input class="form-control" placeholder="Hasło" name="password" id="password" type="password" required>
										</div>
										@if ($errors->has('password'))
											<span>
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
									</div>
									
									<div class="form-group">
										<input type="submit" class="btn btn-lg btn-success btn-block" value="Zaloguj">
									</div>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
				
				<div class="panel-footer text-center">
					<!-- Nie masz konta ? <a href="/register"> Zarejestruj się </a> -->
					<span class="text-muted">
						myApp | Created by 
						<a href="mailto:j.zebala96@gmail.com" target="_top">JZ</a>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection