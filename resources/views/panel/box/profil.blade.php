<div class="col-12 col-md-9 col-lg-6 col-xl-4 box-grid">
    <div class="box" id="profil">
        <div class="head">
            <h3>Mon profile</h3>
        </div>
        <div class="content">
            <form method="POST" action="{{route('profil.update', $user->id)}}">
                @csrf
                @method('PUT')
                <div class="field">
                    <span>Compte web</span>
                    <p>{{ $user->name }}</p>
                </div>
                <div class="field">
                    <span>E-Mail</span>
                    <p>{{ $user->email }}</p>
                </div>
                <div class="field">
                    <span>Compte minecraft</span>
                    @if ($profil->minecraft_code == null)
                        <div class="form">
                            <input type="text" name="minecraft_name" placeholder="Pseudo minecraft...">
                            <button type="submit"><img alt="send" src="{{asset('images/panel/send.svg')}}"/></button>
                        </div>
                    @elseif (!($profil->minecraft_verified))
                    <p class="red">
                        sur le serveur <span class="code" id="btn" onclick="copy()"> /verify {{$profil->minecraft_code}}</span>
                    </p>
                    @else
                    <p>{{$profil->minecraft_name}}</p>
                    @endif
                </div>
                <div class="field">
                    <span>Grade</span>
                    <p class="@if ($profil->rank == null) red @endif">{{ $profil->rank != null ? $profil->rank->name : 'non lié' }}</p>
                </div>
            </form>
        </div>
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
