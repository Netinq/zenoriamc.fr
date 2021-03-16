@extends('layouts.app', ['styles' => ['auth/form']])

@section('content')
<section class="auth row">
    <img alt="Landing" src="{{ asset('images/auth/l1.png') }}" class="landing" />
    <img alt="Landing" src="{{ asset('images/auth/l2.png') }}" class="landing" />
    <div class="offset-1 col-10 col-md-8 col-lg-6 col-xl-4 content">
        <div class="order-2 order-sm-1">
        <h1>Créer un compte</h1>
        <p>Accéder à toutes les fonctionnalitées du site.</p>
       @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
        <form method="POST" action="{{ route('register')}}" class="row">
            @csrf
             <div class="form-group col-12 col-md-11">
                <label for="name">Pseudo web</label>
                <input id="name"
                type="name"
                class="@error('name') is-invalid @enderror"
                name="name"
                value="{{ old('name') }}"
                autocomplete="name"
                autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
             <div class="form-group col-12 col-md-11">
                <label for="email">E-mail</label>
                <input id="email"
                type="email"
                class="@error('email') is-invalid @enderror"
                name="email"
                value="{{ old('email') }}"
                autocomplete="email"
                autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
             <div class="form-group col-12 col-md-11">
                <label for="password">Mot de passe</label>
                <input id="password"
                type="password"
                class="@error('password') is-invalid @enderror"
                name="password"
                value="{{ old('password') }}"
                autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
             <div class="form-group col-12 col-md-11">
                <label for="password-confirm">confirmation Mot de passe</label>
                <input id="password-confirm"
                type="password"
                class="@error('password_confirmation') is-invalid @enderror"
                name="password_confirmation"
                value="{{ old('password') }}"
                autocomplete="new-password">
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-grad form-sub">
                <img alt="Start button" src="{{asset('images/svg/go.svg')}}" />
            </button>
        </form>
        </div>
        <div class="change order-1 order-sm-2">
            <p class="d-none d-sm-inline-block">OU</p>
            <a href="{{route('login')}}">Connexion à un compte</a>
            <p class="d-sm-none d-inline-block">OU</p>
        </div>
    </div>
</section>
@endsection
