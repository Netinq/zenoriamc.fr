<?php

namespace App\Http\Controllers;

use App\Models\SupportTicket;
use Illuminate\Http\Request;
use App\Models\SupportType;
use App\Models\SupportTicketChat;
use App\Models\User;
use App\Models\Profile;
use App\Models\Player;
use App\Models\Rank;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    // GET Page d'accueil -> Page principal de support
    public function index()
    {
        $types = SupportType::all();
        return view('support.index', compact('types'));
    }

    public function create()
    {
        $user = User::where('id', '=', Auth::id())->first();
        $types = SupportType::all();
        $profil = Profile::where('user_id', Auth::id())->first();
        if ($profil->player_id != null) {
            $player = Player::where('uuid', $profil->player_id)->first();
            $profil->rank  = Rank::where('power', $player->rank)->first();
        } else {
            $profil->rank = null;
        }
        return view('support.create', compact('types', 'profil', 'user'));
    }

    // GET Page formulaire contact
    public function createWithTag($tag)
    {
        $user = User::where('id', '=', Auth::id())->first();
        $types = SupportType::all();
        $type = SupportType::where('tag', $tag)->first();
        $profil = Profile::where('user_id', Auth::id())->first();
        if ($profil->player_id != null) {
            $player = Player::where('uuid', $profil->player_id)->first();
            $profil->rank  = Rank::where('power', $player->rank)->first();
        } else {
            $profil->rank = null;
        }
        return view('support.create', compact('type', 'types', 'profil', 'user'));
    }

    // POST Stocker donner dans DB
    public function store(Request $request)
    {
        $this->validate($request, [
            'priority' => 'required|integer',
            'object' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $ticket = new SupportTicket();
        $ticket->user_id = Auth::id();
        $ticket->type_id = $request->type_id;
        $ticket->priority = $request->priority;
        $ticket->object = $request->object;
        $ticket->content = $request->content;
        $ticket->isOpen = true;

        $ticket->save();

        $ticketChat = new SupportTicketChat();
        $ticketChat->user_id = Auth::id();
        $ticketChat->ticket_id = $ticket->id;
        $ticketChat->message = $request->content;

        $ticketChat->save();

        return redirect()->route('panel.home')->with('success', ['Votre ticket à été envoyé', 'Notre équipe d\'assistance se chargera de vous répondre dans des meilleurs délais !']);;
    }

    // GET Page du ticket
    public function show($id)
    {
        $user = User::where('id','=',Auth::id())->first();
        $ticket = SupportTicket::where('id', $id)->first();
        $ticket->type = SupportType::where('id', $ticket->type_id)->first();
        $ticket->user = User::where('id', $ticket->user_id)->first();
        $chats = SupportTicketChat::where('ticket_id', $id)->orderBy('created_at', 'DESC')->get();

        foreach ($chats as $chat) {
            $temp_user = User::where('id', $chat->user_id)->first();
            $chat->user = $temp_user;
        }

        $profil = Profile::where('user_id', Auth::id())->first();
        if ($profil->player_id != null) {
            $player = Player::where('uuid',
                $profil->player_id
            )->first();
            $profil->rank  = Rank::where('power', $player->rank)->first();
        } else {
            $profil->rank = null;
        }

        if($user->id==$ticket->user_id || $player->rank >= 310)
        {
            return view('support.show',compact('chats','user', 'profil', 'ticket'));
        } else {
            return redirect()->route('home')->with('error', ['Erreur', 'Vous ne pouvez pas accéder à ce ticket']);;
        }
    }

    // PUT Mettre à jour une donné existante dans la DB
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'message' => 'required|string',
        ]);

        $chat = new SupportTicketChat();
        $chat->user_id = Auth::id();
        $chat->ticket_id = $id;
        $chat->message = $request->message;
        $chat->save();

        return redirect()->route('assistance.show', $id);
    }

    // DELETE Supprimer donné dans la DB
    public function destroy($id)
    {
    }

    public function close($id)
    {
        $ticket = SupportTicket::where('id', $id)->first();
        $ticket->isOpen = false;
        $ticket->save();

        return redirect()->route('assistance.show', $id)->with('success', ['Le ticket à été clos', 'Merci à vous de votre patience']);
    }

    public function all()
    {
        $user = User::where('id', Auth::id())->first();
        $profil = Profile::where('user_id', Auth::id())->first();
        $tickets = SupportTicket::where('isOpen', true)->get();
        $tickets_end = SupportTicket::where('isOpen', false)->get();
        $tickets_in = SupportTicket::where('isOpen', true)->get();

        if ($profil->player_id != null) {
            $player = Player::where('uuid', $profil->player_id)->first();
            $profil->rank  = Rank::where('power', $player->rank)->first();
        } else {
            $profil->rank = null;
        }

        foreach ($tickets as $ticket) {
            $ticket->type = SupportType::where('id', $ticket->type_id)->first();
        }

        $profil = Profile::where('user_id', Auth::id())->first();
        if ($profil->player_id != null) {
            $player = Player::where(
                'uuid',
                $profil->player_id
            )->first();
            $profil->rank  = Rank::where('power', $player->rank)->first();
        } else {
            $profil->rank = null;
        }

        if ($player->rank >= 310) {
            return view('support.all', compact(
                'user',
                'profil',
                'tickets',
                'tickets_end',
                'tickets_in'));
        } else {
            return redirect()->route('panel.home')->with('error', ['Erreur', 'Vous ne pouvez pas accéder cette page']);;
        }
    }
}
