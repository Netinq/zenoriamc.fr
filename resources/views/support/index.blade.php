@extends('layouts.app', ['styles' => ['support/index']])
@section('title', 'Besoin d\'assistance ?')

@section('content')
@include('layouts.social')
<section id="sp-ix" class="row">
    <div class="offset-1 col-10" id="sp-ix-ct">
        <div id="sp-ix-tl">
            <div id="sp-ix-tl-txt">
                <h1>Besoin d'assistance ?</h1>
                <p>Notre équipe est à votre disposition.</p>
            </div>
            <div id="sp-ix-tl-img">
                <img alt="People chatting" src="{{asset('images/svg/sp-ln.svg')}}" />
            </div>
        </div>
        @foreach ($types as $type)
        <a href="{{route('support.create', $type->tag)}}">
            <div id="sp-ix-box">
                <img alt="Icon" src="{{asset('images/svg/support/'.$type->tag.'.svg')}}" />
                <div id="sp-ix-box-desc">
                    <h2>{{ $type->title }}</h2>
                    <p>{{ $type->description }}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</section>
@endsection
