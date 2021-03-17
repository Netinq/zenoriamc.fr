<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use App\Models\Player;
use App\Models\Rank;
use App\Models\SupportType;
use App\Models\SupportTicket;

use function PHPUnit\Framework\isEmpty;

class PanelController extends Controller
{

    public function home() {

        $user = User::where('id', Auth::id())->first();
        $profil = Profile::where('user_id', Auth::id())->first();
        $tickets = SupportTicket::where('user_id', Auth::id())->get();
        $tickets_end = SupportTicket::where('user_id', Auth::id())->where('isOpen', false)->get();
        $tickets_in = SupportTicket::where('user_id', Auth::id())->where('isOpen', true)->get();

        if ($profil->player_id != null) {
            $player = Player::where('uuid', $profil->player_id)->first();
            $profil->rank  = Rank::where('power', $player->rank)->first();
        } else {
            $profil->rank = null;
        }

        foreach ($tickets as $ticket) {
            $ticket->type = SupportType::where('id', $ticket->type_id)->first();
        }

        return view('panel.home', compact(
            'profil',
            'user',
            'tickets',
            'tickets_end',
            'tickets_in'
        ));
    }
}
