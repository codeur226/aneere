<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Mail\MailToUser;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        // $this->middleware('auth')->except(['index','edit']);
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('pages.back-office.users.index', [
            'users' => $users,
            "title"=>"Gestion des utilisateurs"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.back-office.users.create', [
            'user' => new User,
            'roles' => Role::all(),
            "title"=>"Gestion des utilisateurs"
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
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . (isset($user) ? $user->id : null),
            'password' => ['required', 'string', 'min:8', 'confirmed'],


        ]);
        $user = User::create([
            'role_id' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        // Mail::to($user->email)->send(new MailToUser($user));
        return redirect()->route('users.show', $user)->with('success', "L'utilisateur a bien été ajouté");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('pages.back-office.users.show', [
            'user' => $user,
            "title"=>"Gestion des utilisateurs"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::where('nom', '!=', 'administrateur')->get();

        return view('pages.back-office.users.edit', [
            'user' => $user,
            'roles' => $roles,
            "title"=>"Gestion des utilisateurs"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . (isset($user) ? $user->id : null),

        ]);
        // $user->roles()->sync($request->roles);
        $user->name =  $request->name;
        $user->role_id =  $request->role;
        $user->email =  $request->email;
        $user->update();


        return redirect()->route('users.show', $user)->with('success', "L'utilisateur a été mises à jour");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // $user->role()->detach();
        $user->delete();
        return redirect()->route('users.index')->with('success', "L'utilisateur a été mis à jour");
    }

    public function profil()
    {

        return view('pages.back-office.users.profil', [
            'user' => Auth::user(),
            "title"=>"Gestion des utilisateurs"
        ]);
    }
    public function profil_save(Request $request)
    {

        $request->validate([
            'oldpassword' => 'required|string|min:8',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = Auth::user();
        if (Hash::check($request->input('oldpassword'), $user->password)) {
            $user->password = bcrypt($request->input('password'));
        } else {
        return redirect()->route('profil', $user)->with('error', "Actuel mot de passe saisi invalide. Votre compte n'a pas  été mis à jour !");


        }
        $user->save();
        return redirect()->route('profil', $user)->with('success','Votre mot de passe a bien été mis à jour !');
    }
    public function activate(User $user)
    {
        $user->disable = false;
        $user->save();

        return redirect()->route('users.show', $user)->with('success', "L'utilisteur ".$user->name.' est actif');
    }

    public function disable(User $user)
    {
        $user->disable = true;
        $user->save();

        return redirect()->route('users.show', $user)->with('success', "L'utilisteur ".$user->name.' est désactivé');
    }

    public function change_password()
    {
        return view('pages.front-office.consommateur.etablissement.create', [
            // 'etablissement' => Etablissement::where("user_id", Auth::user()->id)->first(),
        ]);
    }


    public function save_password(Request $request)
    {
        // dd($request);
        $request->validate([
            'oldpassword' => 'required|string|min:8',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = Auth::user();
        if (Hash::check($request->input('oldpassword'), $user->password)) {
            $user->password = bcrypt($request->input('password'));
        } else {
        return redirect()->route('consommateur.password_change', $user)->with('error', "Actuel mot de passe saisi invalide. Votre compte n'a pas  été mis à jour !");
        }
        $user->save();
        return redirect()->route('consommateur.password_change', $user)->with('success','Votre mot de passe a bien été mis à jour !');
    }
}
