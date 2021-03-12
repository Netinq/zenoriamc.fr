@extends('layouts.app', ['styles' => ['games']])
@section('title', 'Nos mini-jeux')

@section('content')
@include('layouts.social')
<section id="games" class="row">
    <div class="offset-1 col-10 col-md-5 col-lg-4 col-xl-3" id="desc">
        <div id="desc-box">
            <h2 id="db-h">Smash</h2>
            <p id="db-p">Affrontez votre/vos adversaire(s) lors d'une bataille de PvP pour gagner du territoire.
Repousser votre territoire jusqu'à la base ennemie. Les territoires sont séparer par une ligne au centre de la map que vous devrez faire avancer.

Afin de faire progresser la ligne :
- Abattez-vos ennemies dans des combats sanglants
- Contestez le territoire en restant du côté adverse de la ligne durant quelques secondes.
Attention… Chaque secondes augmente la progression de la ligne...
            </p>
            <img alt="Gaming illustration" src="{{asset('images/svg/gaming.svg')}}" id="desc-il"/>
        </div>
    </div>
    <div class="offset-1 col-10 col-md-4 col-lg-5 col-xl-6" id="img-ct">
        <div class="img-g" id="smash">
            <img alt="Smash" src="{{ asset('images/games/smash.png') }}" />
        </div>
        <div class="img-g" id="dac">
            <img alt="Dé à Coudre" src="{{ asset('images/games/dac.png') }}" />
        </div>
        <div class="img-g" id="thelane">
            <img alt="The Lane" src="{{ asset('images/games/thelane.png') }}" />
        </div>
    </div>
</section>
<script src="{{ asset('js/games.js')}}"></script>
@endsection
