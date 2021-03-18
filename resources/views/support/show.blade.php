@extends('panel.layouts.app', ['styles' => ['support/show']])

@section('content')
@include('layouts.popup')
<main class="offset-md-4 offset-xl-2 col-12 col-md-8 col-xl-10 row" id="show">
    <form method="POST" action="{{route('assistance.close', $ticket->id)}}" class="col-12 row" style="margin:0;">
        @csrf
        <div class="col-12 col-lg-8 col-xl-8 box-grid">
            <div class="box">
                <div class="content">
                    <h1>#{{$ticket->id}} {{$ticket->object}}</h1>
                    <div class="tags">
                        <div>{{$ticket->type->tag}}</div>
                        <div>{{$ticket->isOpen ? 'en cours' : 'résolu'}}</div>
                    </div>
                </div>
            </div>
        </div>
        @if ($ticket->isOpen)
        <button type="submit" class="col-12 col-lg-4 col-xl-3 box-grid">
            <div class="box-flat box-red">
                <span>Cloturer</span>
                <img alt="Illustration" src="{{asset('images/panel/il-close.svg')}}" />
            </div>
        </button>
        @endif
    </form>
    @if ($ticket->isOpen)
    <form method="POST" action="{{route('assistance.update', $ticket->id)}}" class="col-12 row" style="margin:0;">
        @csrf
        @method('PUT')
        <div class="col-12 col-md-12 col-xl-8 box-grid">
            <div class="box">
                <textarea
                class="fullarea @error('message') is-invalid @enderror"
                name="message"
                placeholder="Votre message..."
                value="{{ old('message') }}"
                ></textarea>
            </div>
        </div>
        <button type="submit" class="offset-4 offset-mg-5 offset-lg-6 offset-xl-0 col-8 col-md-7 col-lg-6 col-xl-3 box-grid">
                <div class="box-flat box-aqua">
                    <span>Répondre</span>
                    <img alt="Illustration" src="{{asset('images/panel/il-response.svg')}}" />
                </div>
        </button>
    </form>
    @endif
    <div class="chats row" style="margin:0;">
    @foreach ($chats as $chat)
        <div class="box-grid {{$chat->user->id != $ticket->user_id ? 'offset-1 col-11' : 'col-11'}}">
            <div class="box">
                <div class="content">
                    @if ($ticket->user_id == Auth::id())
                        @if ($chat->user->id == $user->id)
                            <h4><img alt="Icon me" src="{{asset('images/panel/ico-me.svg')}}" />Moi</h4>
                        @else
                            <h4><img alt="Icon support" src="{{asset('images/panel/ico-support.svg')}}" />Support</h4>
                        @endif
                        <p>{{$chat->message}}</p>
                        @if ($chat->user->id != $user->id)
                            <span class="signed">{{$chat->user->name}}</span>
                        @endif
                    @else
                        @if ($chat->user->id != $user->id && $chat->user->id == $ticket->user_id)
                            <h4><img alt="Icon me" src="{{asset('images/panel/ico-me.svg')}}" />{{$ticket->user->name}}</h4>
                        @else
                            <h4><img alt="Icon support" src="{{asset('images/panel/ico-support.svg')}}" />Support</h4>
                        @endif
                        <p>{{$chat->message}}</p>
                        @if ($chat->user->id != $ticket->user_id)
                            <span class="signed">{{$chat->user->name}}</span>
                        @endif
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-12 col-lg-4 col-xl-3 box-grid" id="compte">
        <div class="box-flat box-purple">
            <span>Compte</span>
            <img alt="Illustration" src="{{asset('images/panel/il-compte.svg')}}" />
        </div>
    </div>
</main>
@endsection
