@extends('layouts.app', ['styles' => ['support/show']])
@section('title', 'Support msg')

@section('content')
@include('layouts.social')
<section>
    <div id='test'>
        @foreach ($chats as $chat)
            <!--Vue Support-->
            @if ($user->rank_power>=310)
                @if($chat->user->rank_power>=310)
                    <div class="right">
                        <!--Si msg.expediteur.power >= assistant-->
                        <p class="msg">{{$chat->message}}</p>
                    </div>
                @else
                    <div class="left">
                        <!--Si msg.expediteur.power >= assistant-->
                        <p class="msg">{{$chat->message}}</p>
                    </div>
                @endif
            @else
                @if($chat->user->rank_power<310)
                    <div class="right">
                        <!--Si msg.expediteur.power >= assistant-->
                        <p class="msg">{{$chat->message}}</p>
                    </div>
                @else
                    <div class="left">
                        <!--Si msg.expediteur.power >= assistant-->
                        <p class="msg">{{$chat->message}}</p>
                    </div>
                @endif
            @endif
        </div>
        @endforeach
    </div>
</section>
@endsection
