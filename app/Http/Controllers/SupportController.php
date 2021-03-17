<?php

namespace App\Http\Controllers;

use App\Models\SupportTicket;
use Illuminate\Http\Request;
use App\Models\SupportType;
use App\Models\SupportTicketChat;
use App\Models\User;
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
        $types = SupportType::all();
        return view('support.create', compact('types'));
    }

    // GET Page formulaire contact
    public function createWithTag($tag)
    {
        $type = SupportType::where('tag', $tag)->first();
        return view('support.create', compact('type'));
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

        return redirect()->route('home')->with('success', ['Votre ticket à été envoyé', 'Notre équipe d\'assistance se chargera de vous répondre dans des meilleurs délais !']);;
    }

    // GET Page du ticket
    public function show($id)
    {
        //client : répond mode client
        //admin  : répond mode support

        //si client != user id du ticket, on le vire (pas les perms de voir ce ticket)
        //get ticket à partir de l'id
        $user = User::where('id','=',Auth::id())->first();
        // $chats = SupportTicketChat::where('id',$id)::All();
        $chats = SupportTicketChat::where('ticket_id', $id)->get();

        foreach ($chats as $chat) {
            $temp_user = User::where('id', $chat->user_id)->first();
            $chat->user = $temp_user;
        }

        $ticket = SupportTicket::where('id',$id)->first();

        if($user->id==$ticket->user_id || $user->rank_power >= 310)
        {
            return view('support.show',compact('chats','user'));
        } else {
            return redirect()->route('home')->with('error', ['Erreur', 'Vous ne pouvez pas accéder à ce ticket']);;
        }
    }

    // PUT Mettre à jour une donné existante dans la DB
    public function update(Request $request, $id)
    {
        //
    }

    // DELETE Supprimer donné dans la DB
    public function destroy($id)
    {
        //
    }
}
