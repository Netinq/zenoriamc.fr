@extends('panel.layouts.app', ['styles' => ['support/show']])

@section('content')
@include('layouts.social')
<main class="offset-md-4 offset-xl-2 col-12 col-md-8 col-xl-10 row" id="home">
    <div class="col-12 col-md-12 col-xl-8 box-grid">
        <div class="box">
            <div class="head">
                <h3>Ma demande</h3>
            </div>
            <div class="content">
            </div>
        </div>
    </div>
</main>
{{-- <section>
    <div id='test'>
        @foreach ($chats as $chat)
            <!--Vue Support-->
            @if ($user->rank_power>=310)
                @if($chat->user->id == $user->id)
                    <div class="left">
                        <!--Si msg.expediteur.power >= assistant-->
                        <p class="msg">{{$chat->message}}</p>
                    </div>
                @else
                    <div class="right">
                        <!--Si msg.expediteur.power >= assistant-->
                        <p class="msg">{{$chat->message}}</p>
                    </div>
                @endif
            @else
                @if($chat->user->id == $user->id)
                    <div class="left">
                        <!--Si msg.expediteur.power >= assistant-->
                        <p class="msg">{{$chat->message}}</p>
                    </div>
                @else
                    <div class="right">
                        <!--Si msg.expediteur.power >= assistant-->
                        <p class="msg">{{$chat->message}}</p>
                    </div>
                @endif
            @endif
        </div>
        @endforeach
    </div>
</section> --}}
@endsection
