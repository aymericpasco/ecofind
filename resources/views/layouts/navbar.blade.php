<nav class="navbar container" data-turbolinks-permanent>
    <div class="navbar-brand">
        <a class="navbar-item logo" href="{{ url('/') }}">
            <img src="{{ asset('img/leaf.png') }}" alt="Bulma: a modern CSS framework based on Flexbox" >
            Ecofind
        </a>

        <div class="navbar-burger burger" data-target="navMenu">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="navMenu" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item discover" href="{{ url('/') }}">
                Découvrez
            </a>
            <a class="navbar-item" href="#">
                À Propos
            </a>
        </div>
        <div class="navbar-end">
            @guest
                <a class="navbar-item" href="{{ url('/auth/facebook') }}" data-turbolinks="false">
                    <span class="icon" style="color: #00d1b2;">
                      <i class="fa fa-facebook"></i>
                    </span>
                    <span>Se connecter</span>
                </a>
                @else
                    <p class="navbar-item">
                        <img src="https://graph.facebook.com/{!! \Illuminate\Support\Facades\Auth::user()->provider_id !!}/picture?type=small" class=" is-hidden-touch img-circle">
                        <span class="name-user">{!! \Illuminate\Support\Facades\Auth::user()->name !!}</span>
                        &nbsp;(<a href="{{ url('/logout') }}">
                            Déconnexion
                        </a>)&nbsp;
                    </p>
                    @endguest
        </div>
    </div>
</nav>