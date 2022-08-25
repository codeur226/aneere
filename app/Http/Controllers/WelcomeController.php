<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{

    public function welcome()
    {
        if(Auth::user()!=null && (Auth::user()->role->nom=='Administrateur' || Auth::user()->role->nom=='Directeur' || Auth::user()->role->nom=='Chef de service' || Auth::user()->role->nom=='Agent' || Auth::user()->role->nom=='Secretaire'|| Auth::user()->role->nom=='Gestionnaire agrement')  ){
            return redirect()->route('accueil');
            }elseif(Auth::user()!=null && (Auth::user()->role->nom=='Etablissement')){
                return redirect()->route('rapports.index');
            }else{
                return redirect()->route('reglementations.search',-1);
                // return view('pages.front-office.welcome');
             }
    }

}
