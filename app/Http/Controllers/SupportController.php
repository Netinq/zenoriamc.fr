<?php

namespace App\Http\Controllers;

use App\Models\SupportTicket;
use Illuminate\Http\Request;
use App\Models\SupportType;
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

    // GET Page formulaire contact
    public function create($tag)
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

        $ticket->save();

        return redirect()->route('home')->with('success', ['Votre ticket à été envoyé', 'Notre équipe d\'assistance se chargera de vous répondre dans des meilleurs délais !']);;
    }

    // GET Page du ticket
    public function show($id)
    {
        //client : répond mode client
        //admin  :
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
