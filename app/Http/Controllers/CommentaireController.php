<?php

namespace App\Http\Controllers;

use App\Models\Rapport;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentaireRequest;
use App\Http\Requests\UpdateCommentaireRequest;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentaireRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $commentaire=Commentaire::create([
            'user_id' => "f284660c-ebec-4c33-ad30-c766aa54510c", //$rapport->user_id,
            'commentaire'=>$request->motif,
            'rapport_id'=>"2f94e017-56a0-499d-b404-25c25cc65e2b",//"$rapport->id",
    ]);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Commentaire $commentaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Commentaire $commentaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentaireRequest  $request
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentaireRequest $request, Commentaire $commentaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commentaire $commentaire)
    {
        //
    }

    public function rejeter(Rapport $rapport, Request $request)
    {
        // dd($rapport);
        $request->validate([
            'motif' => 'required|string|min:2 |max :255',
        ]);

        $rapport->update([
            'etat' => 'Réjeté',
    ]);
    $commentaire=Commentaire::create([
        'user_id' => $request->user,
        'commentaire'=>$request->motif,
        'rapport_id'=>$rapport->id,
]);
        $commentaires = Commentaire::where('rapport_id', $rapport->id)->get();

        return view('pages.back-office.rapports.show', [
         'rapport' => $rapport,
         'commentaires' => $commentaires,
        'title' => 'Gestion des rapports',
    ]);

        return redirect()->route('rapports.show', ['rapport' => $rapport])->with('statut', 'Le rapport a été renvoyé avec succès');
    }
}
