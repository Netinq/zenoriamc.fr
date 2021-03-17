@section('description', 'Découvrez et redécouvrez un serveur minecraft comme à l\'ancienne. Des mini-jeux exclusif et d\'anciens jeux remis aux goûts du jour. Rejoignez-nous dès maintenant.')

<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- Default meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">

        <meta name='author' content='Quentin Sar, Netinq'>
        <meta name='owner' content='ZenoriaMC'>
        <meta name='subject' content="Quentin Sar">

        <meta name='identifier-URL' content='zenoriamc.fr'>
        <meta name="description" content="@yield('description')">
        <meta name='reply-to' content='contact@zenoriamc.fr'>

        <meta name='language' content='FR'>
        <meta name='target' content='all'>
        <meta name='theme-color' content='#48BBE8'>

        <link rel='shortcut icon' type='image/png' href='{{ asset('images/logo.png') }}'>
        <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}" />

        <!-- Twitter Card meta -->
        <meta name='twitter:card' content='summary'>
        <meta name="twitter:site" content="@Netinq" />
        <meta name="twitter:title" content="@hasSection('title') {{Config::get('app.name')}} - @yield('title') @else ZenoriaMC Serveur Mini-Jeux 1.15.2 @endif" />
        <meta name='twitter:url' content='https://zenoriamc.fr' />
        <meta name='twitter:domain' content='zenoriamc.fr' />
        <meta name="twitter:description" content="@yield('description')" />
        <meta name="twitter:image" content="{{asset('images/meta.png')}}" />

        <!-- Open Graph meta -->
        <meta property='og:title' content='@hasSection('title') {{Config::get('app.name')}} - @yield('title') @else ZenoriaMC Serveur Mini-Jeux 1.15.2 @endif' />
        <meta property="og:description" content="@yield('description')" />
        <meta property="og:image" content="{{asset('images/meta.png')}}" />
        <meta property='og:type' content='website' />
        <meta property='og:url' content='https://zenoriamc.fr' />
        <meta property='og:site_name' content='{{Config::get('app.name')}}' />
        <meta property="og:locale" content="fr_FR" />

        <!-- IOS meta -->
        <meta name="apple-mobile-web-app-title" content="{{Config::get('app.name')}}">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

        <title>
            @hasSection('title') {{Config::get('app.name')}} - @yield('title')
            @else ZenoriaMC Serveur Mini-Jeux 1.15.2 @endif
        </title>

        <!-- STATIC Scripts -->

        @hasSection('noMaster') @else
        <link rel="stylesheet" type="text/css" href="{{ asset('css/master.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts.css') }}">
        @endif

        <!-- GENERATE Stylesheet -->
        @if($styles ?? null)
        @foreach($styles as $style)
        <link rel="stylesheet" type="text/css"
        href="{{ asset('css/'.$style.'.css') }}">
        @endforeach
        @endif


        <!-- STATIC Stylesheet -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/layouts/footer.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/layouts/header.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/layouts/social.css') }}">
    </head>

    <body class="row">
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
        <script src="{{asset('js/header.js')}}"></script>
    </body>
</html>
