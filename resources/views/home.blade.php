@extends('layouts.app', ['styles' => ['home']])

@section('content')
@include('layouts.social')
<section id="home" class="row" itemscope itemtype="https://schema.org/Organization">
    <img alt="Landing" src="{{ asset('images/home/l1.png') }}" class="landing" />
    <img alt="Landing" src="{{ asset('images/home/l2.png') }}" class="landing" />
    <img alt="Landing" src="{{ asset('images/home/l3.png') }}" class="landing" />
    <div class="offset-1 col-10 col-lg-8 col-xl-6" id="pr">
        <h1><span itemprop="legalName">ZenoriaMC</span>
            Mini-Jeux à l'ancienne et nouveautés exclusives
        </h1>
        <button onclick="copy_ip()" id="ip" value="play.zenoriamc.fr">play.zenoriamc.fr<img alt="Copy" src="{{ asset('images/svg/copy.svg')}}" /></button>
    </div>
    <meta itemprop="logo" content = "{{ asset('images/logo.png') }}">
</section>
<script>
function copy_ip() {
  const el = document.createElement('textarea');
  el.value = 'play.zenoriamc.fr';
  document.body.appendChild(el);
  el.select();
  document.execCommand('copy');
  document.body.removeChild(el);
  const btn = document.getElementById('ip');
  btn.innerText = 'Copié !'
}
</script>
@endsection
