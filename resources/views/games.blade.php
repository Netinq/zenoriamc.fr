@extends('layouts.app', ['styles' => ['games']])
@section('title', 'Nos mini-jeux')

@section('content')
@include('layouts.social')
<section id="games" class="row">
    <div class="offset-1 col-3" id="desc">
        <div id="desc-box">
            <h2>Smash</h2>
            <img alt="Gaming illustration" src="{{asset('images/svg/gaming.svg')}}" id="desc-il"/>
        </div>
    </div>
    <div class="offset-1 col-6">

    </div>
</section>
@endsection
