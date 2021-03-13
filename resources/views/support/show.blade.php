@extends('layouts.app', ['styles' => ['support/index']])
@section('title', 'Support msg')

@section('content')
@include('layouts.social')
<section>
    <div id='test'>
        <p>petit test oklm</p>
        @foreach ($chats as $chat)
        <div class="msg">
            <h2>msg de: {{$chat->user_id}}</h2>
            <p>{{$chat->message}}</p>
        </div>
        @endforeach
    </div>
</section>
@endsection
