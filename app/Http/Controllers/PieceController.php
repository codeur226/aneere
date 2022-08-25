<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use Illuminate\Http\Request;

class PieceController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "piece.*" => "file|mimes:pdf|max:2048",
        ]);
//   dd($request->currentAuditeur);
                // $auditeur =Piece::whereAuditeurId($request->currentAuditeur)->first()->id;
                // dd($auditeur);

             if($request->hasFile('piece'))
        {
            // dd($request->file('piece'));
            foreach($request->file('piece') as $piece)
            {
                $name= $piece->getClientOriginalName();
                $piece->move(public_path().'/piece/', $name);  // your folder path
                // $data [] = $name;
                $piece = new Piece;
                $piece->piece = $name;
                $piece->auditeur_id = $request->currentAuditeur;
                $piece->save();
            }

            }
        //  dd($piece);
        return redirect()->route("auditeurs.show",$request->currentAuditeur)->with("statut", "Le piece a été ajoutée avec succès");
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function show(Piece $piece)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function edit(Piece $piece)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Piece $piece)
    {
        $request->validate([
            "piece" => "file|mimes:pdf|max:2048",
        ]);
        if($request->hasFile('piece'))
        {
            $name= $request->file('piece')->getClientOriginalName();
            $request->file('piece')->move(public_path().'/piece/', $name);
            $piece->piece = $name;
            $piece->update();
            return redirect()->route("auditeurs.show",$piece->auditeur_id)->with("statut", "La piece a été modifiée avec succès");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function destroy(Piece $piece)
    {
        $file_path = public_path('/piece/'.$piece->piece);
        // dd($file_path);
        unlink($file_path);
        $piece->delete();
        return redirect()->route("auditeurs.show",$piece->auditeur_id)->with("statut", "La piece a été supprimée avec succès");

    }
}
