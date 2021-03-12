<header class="row" id="header">
    <div class="offset-1 col-10 nav-mobile head-mobile">
        <a href="{{ route('home') }}">
            <img alt="Logo" src="{{ asset('images/logo.png') }}" id="nav-lg"/>
        </a>
        <div id="nav-bg-ct" onclick="displayNav()">
            <img alt="Burger menu" src="{{ asset('images/svg/burger.svg') }}" class="nav-bg" id="nav-bg"/>
            <img alt="Burger menu" src="{{ asset('images/svg/close.svg') }}" class="nav-bg hide" id="nav-cl"/>
        </div>
    </div>
    <nav class="offset-1 col-10" id="nav-desktop">
        <div class="nav-flex-start">
            <a href="{{ route('home') }}">
                <img alt="Logo" src="{{ asset('images/logo.png') }}" id="nav-lg"/>
            </a>
            <a href="{{ route('home') }}">
                <div class="nav-btn {{ Route::is('home') ? 'nav-btn-select' : '' }}">
                    Accueil
                </div>
            </a>
            <a href="{{ route('games') }}">
                <div class="nav-btn {{ Route::is('games') ? 'nav-btn-select' : '' }}">
                    Nos Jeux
                </div>
            </a>
            <a href="{{ route('assistance.index') }}">
                <div class="nav-btn {{ Route::is('assistance.index') ? 'nav-btn-select' : '' }}">
                    Assistance
                </div>
            </a>
        </div>
        <div class="nav-flex-end">
            <a href="#">
                <div class="nav-btn nav-btn-sec nav-flex-end">
                    Mon espace
                </div>
            </a>
            <a href="#">
                <div class="nav-btn nav-btn-pri nav-flex-end">
                    Boutique
                </div>
            </a>
        </div>
    </nav>
    <nav class="hide" id="nav-mobile">
        <a href="{{ route('home') }}">
            <img alt="Logo" src="{{ asset('images/logo.png') }}" id="nav-lg"/>
        </a>
        <a href="{{ route('home') }}">
            <div class="nav-btn">
                Accueil
            </div>
        </a>
        <a href="{{ route('games') }}">
            <div class="nav-btn">
                Nos Jeux
            </div>
        </a>
        <a href="{{ route('assistance.index') }}">
            <div class="nav-btn">
                Assistance
            </div>
        </a>
        <a href="#">
            <div class="nav-btn nav-btn-sec">
                Mon espace
            </div>
        </a>
        <a href="#">
            <div class="nav-btn nav-btn-pri">
                Boutique
            </div>
        </a>
    </nav>
    <div id="nav-bg-btc" onclick="displayNav()">
        <img alt="Burger menu" src="{{ asset('images/svg/burger.svg') }}" class="nav-bg" id="nav-bg-bt"/>
        <img alt="Burger menu" src="{{ asset('images/svg/close.svg') }}" class="nav-bg hide" id="nav-cl-bt"/>
    </div>
</header>
