<header class="offset-md-4 offset-xl-2 col-12 col-md-8 col-xl-10">
    <div id="nav-bg-btc" class="d-flex d-md-none" onclick="displayNav()">
        <img alt="Burger menu" src="{{ asset('images/svg/burger.svg') }}" class="nav-bg" id="nav-bg"/>
        <img alt="Burger menu" src="{{ asset('images/svg/close.svg') }}" class="nav-bg hide" id="nav-cl"/>
    </div>
    <div id="hd-pr" onclick="displayDrop()">
        <img alt="Profil picture" src="{{ $profil->minecraft_head != null ? $profil->minecraft_head : asset('images/meta.png') }}" id="hd-pr-pp">
        <p>{{$user->name}}</p>
        <img alt="Arrow" src="{{asset('images/svg/arrow.svg')}}" id="hd-pr-ar">
        <div id="hd-pr-drop" class="hide box">
            <form method="POST" action="{{ route('logout') }}">
            @csrf
                <button type="submit">Déconnexion</button>
            </form>
        </div>
    </div>
</header>
<nav class="col-md-4 col-xl-2 hide-nav" id="nav-panel">
    <a href="/"><div id="nav-tl">
        <img alt="ZenoriaMC's logo" src="{{asset('images/logo.png')}}">
    </div></a>
    <div id="nav-pl">
        <a href="{{route('panel.home')}}">
        <div class="nav-pl-box {{ Route::is('panel.home') ? 'selected' : '' }}">
            <img alt="People icon" src="{{asset('images/panel/overide.svg')}}">
            Tableau de bord
        </div>
        </a>
        <a href="{{route('assistance.create')}}">
            <div class="nav-pl-box {{ Route::is('assitance.create') ? 'selected' : '' }}">
                <img alt="Support icon" src="{{asset('images/panel/support.svg')}}">
                Demande d'assistance
            </div>
        </a>
    </div>
    @if ($profil->minecraft_verified && $profil->rank->power >= 310)
    <div id="nav-ad">
        <a href="{{route('assistance.all')}}">
        <div class="nav-ad-box">
            <img alt="Support icon" src="{{asset('images/panel/support.svg')}}">
            Support
        </div>
        </a>
        <div class="nav-ad-box">
            <img alt="People icon" src="{{asset('images/panel/overide.svg')}}">
            Minecraft
        </div>
        <div class="nav-ad-box">
            <img alt="Logs icon" src="{{asset('images/panel/logs.svg')}}">
            Boutique logs
        </div>
    </div>
    @endif
    <a href="/">
    <div id="nav-dh">
        <img alt="Dashboard logo" src="{{asset('images/panel/dashboard.svg')}}">
    </div>
    </a>
</nav>
