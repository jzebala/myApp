<!-- Nawigacja -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ route('welcome.index') }}">myApp</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<!-- MENU STRONY -->
				<li><a href="{{ route('posts.index') }}"><span class="icon-doc-text"></span> Posty</a></li>
				<li><a href="{{ route('calendar.index') }}"><span class="icon-calendar"></span> Kalendarz</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<span class="icon-cog-alt"></span>
					Ustawienia <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="{{ route('categories.index') }}"><span class="icon-tags"></span> Kategorie</a></li>
						@if(Auth::user()->hasRole('Admin'))
							<li role="separator" class="divider"></li>
							<li><a href="{{ route('blogconfig.index') }}"><span class="icon-home"></span> Moja strona</a></li>
							<li><a href="{{ route('users.index') }}"><span class="icon-users"></span> Użytkownicy</a></li>
						@endif
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						<span class="icon-user"></span>
						<strong>{{ Auth::user()->name }}</strong> <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{ route('blog.index') }}"><span class="icon-home"></span> Moja strona</a></li>
                        <li><a href="{{ route('user.index') }}"><span class="icon-user"></span> Profil</a></li>
						<li class="divider"></li>
						<li>
                            <a href="{{ route('logout') }}"
                            	onclick="event.preventDefault();
                            	document.getElementById('logout-form').submit();">
								<span class="icon-logout"></span>
                                Wyloguj
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>