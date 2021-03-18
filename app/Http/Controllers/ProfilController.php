<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfilController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        if ($id != Auth::id()) {
            return redirect()->route('panel.home')->with('error', ['Erreur de requête', 'Permission error']);
        }

        if ($request->minecraft_name == null) {
            return redirect()->route('panel.home')->with('error', ['Erreur de requête', 'Veuillez remplir le champs "compte minecraft"']);
        }

        $player = Player::where('name', $request->minecraft_name)->first();

        if ($player == null) {
            return redirect()->route('panel.home')->with('error', ['Erreur de requête', 'Pas de compte minecraft trouvé à ce nom.']);
        }

        $profil = Profile::where('user_id', $id)->first();
        $profil->minecraft_name = $request->minecraft_name;
        $profil->minecraft_code = Str::random(6);
        $profil->minecraft_head = "https://mc-heads.net/avatar/".$player->uuid;
        $profil->player_id = $player->uuid;
        $profil->save();

        return redirect()->route('panel.home')->with('success', ['Profile mis à jour', 'Votre profile vient d\'être mis à jour']);
    }

    public function destroy($id)
    {
        //
    }
}
