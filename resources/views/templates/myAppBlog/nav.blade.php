<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="/">MójBlog</a>
        </div> <!-- ./navbar-header -->

        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
            </ul>

            <!-- right menu -->
			<ul class="nav navbar-nav navbar-right">
                @if(Auth::user())
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						<span class="icon-user"></span>
						<strong>{{ Auth::user()->name }}</strong> <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
                        @if(Auth::user()->hasRole('Uzytkownik'))
                        <li><a href="{{ route('blog.user') }}"><span class="icon-home">Profil</span></a></li>
                        @else
                        <li><a href="/welcome"><span class="icon-home">Kokpit</span></a></li>
                        @endif
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
                @else
                    <li><a href="{{ route('login') }}" class="icon-login">Zaloguj</a></li>
                @endif
			</ul>

        </div><!--/.nav-collapse -->
    </div> <!-- ./container -->
</nav>