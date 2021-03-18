@extends('panel.layouts.app', ['styles' => ['home', 'box/tickets', 'box/tickets_stats']])

@section('content')
@include('layouts.popup')
<main class="offset-md-4 offset-xl-2 col-12 col-md-8 col-xl-10 row" id="home">
    <div class="col-12 row">
    @include('panel.box.tickets_stats', [
        'img' => 'ticket_valid',
        'nb' => count($tickets_end),
        'stat' => 'Résolus'
    ])
    @include('panel.box.tickets_stats', [
        'img' => 'ticket_in',
        'nb' => count($tickets_in),
        'stat' => 'en cours'
    ])
    </div>
    <div class="col-12 row">
        @include('panel.box.tickets', ['tickets' => $tickets, 'title' => 'Demandes à traiter'])
    </div>
</main>
@endsection
