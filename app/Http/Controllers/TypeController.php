<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Reglementation;

class TypeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(['auth','isTextManager','isActive']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.back-office.types.index', [
            "types" => Type::all(),
            "title" => "Gestion de la règlementation"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.back-office.types.create', [
            "type" => new Type,
            "title" => "Gestion de la règlementation"
        ]);
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
            "libelle" => "required|string|min:2|max:255|unique:types,libelle",
        ]);
        $type = Type::create([
            "ref" => Str::uuid(),
            "libelle" => Str::upper($request->libelle),
        ]);
        return redirect()->route("types.show", $type)->with("statut", "Le tes a été ajouté avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('pages.back-office.types.show', [
            "type" => $type,
            "reglementations" => Reglementation::where("type_id", $type->id)->get(),
            "title" => "Gestion de la règlementation"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {

        return view('pages.back-office.types.edit', [
            "type" => $type,
            "title" => "Gestion de la règlementation"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $request->validate([
            "libelle" => "required|string|min:2|max:255|unique:types,libelle," . (isset($type) ? $type->id : null),
        ]);
        $type->libelle = Str::upper($request->libelle);
        $type->save();
        return redirect()->route("types.show", $type)->with("statut", "Le type a été mis à jour avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route("types.index", $type)->with("statut", "Le type a été supprimé avec succès");
    }
}
