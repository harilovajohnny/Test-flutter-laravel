<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Redirection vers la page d'index de l'utlisateur
     */
    public function index()
    {

       return view('user.index',[
            'user' => User::paginate(3)
       ]);
    }

    /**
     * Redirection vers la page de la création d'un utilisateur
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Fonction pour enregistrer les informations d'un utilisateur
     */
    public function store(FormPostRequest $request)
    {
        if($request->validated()){
            User::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=>Hash::make($request->input('password'))
            ]);
        }
        return redirect()->route('user.index')->with('success',"Utilisateur enregistré!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Fonction de rédirection vers la page de modification d'un utilisateur
     */
    public function edit(User $user)
    {
        return view('user.edit',[
            'user' => $user
        ]);
    }

    /**
     * Fonction pour enregistrer la modification d'un utilisateur
     */
    public function update(User $user,FormPostRequest $request)
    {
        $user->update($request->validated());
        return redirect()->route('user.index')->with('success',"Utilisateur Modifié!");

    }

    /**
     * fonction qui permet la suppression d'un utilisateur
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success',"Utilisateur supprimé!");
    }
}
