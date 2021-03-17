<div class="col-11 col-md-8 col-lg-6 col-xl-4 box box-grid" id="profil">
    <div class="head">
        <h3>Mon profile</h3>
    </div>
    <div class="content">
        <form method="POST" action="{{route('user.update', $user->id)}}">
            @csrf
            @method('PUT')
            <div class="field">
                <span>Compte web</span>
                <div class="form">
                    <input type="text" name="minecraft_name" value="{{$user->name}}">
                    <button type="submit"><img alt="send" src="{{asset('images/panel/send.svg')}}"></button>
                </div>
            </div>
            <div class="field">
                <span>E-Mail</span>
                <div class="form">
                    <input type="text" name="minecraft_name" value="{{$user->email}}">
                    <button type="submit"><img alt="send" src="{{asset('images/panel/send.svg')}}"></button>
                </div>
            </div>
            </
        <form method="POST" action="{{route('profil.update', $user->id)}}">
            @csrf
            @method('PUT')
            <div class="field">
                <span>Compte minecraft</span>
                <div class="form">
                    <input type="text" name="minecraft_name" value="{{$profil->minecraft_name}}">
                    <button type="submit"><img alt="send" src="{{asset('images/panel/send.svg')}}"></button>
                </div>
            </div>
            <div class="field">
                <span>Grade</span>
                <p class="@if ($profil->rank == null) red @endif">{{ $profil->rank != null ? $profil->rank->name : 'non lié' }}</p>
            </div>
        </form>
    </div>
</div>
<script>
function copy() {
  const el = document.createElement('textarea');
  el.value = {!! json_encode($profil->minecraft_code) !!};
  document.body.appendChild(el);
  el.select();
  document.execCommand('copy');
  document.body.removeChild(el);
  const btn = document.getElementById('btn');
  btn.innerText = 'Copié !'
}
</script>
