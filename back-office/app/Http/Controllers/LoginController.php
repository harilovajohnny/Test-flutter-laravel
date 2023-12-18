<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Redirection vers la page login 
     *
     * @return 
     */
    public function login(){

        // User::create([
        //     'name' => 'user_1',
        //     'email' => 'user@gmail.com',
        //     'password' => Hash::make('1111')
        // ]);

        return view('auth.login');
    }

    /**
     * fonction d'authentification dans l'application web
     *
     * @param LoginRequest $request
     * @return 
     */
    public function authentification(LoginRequest $request){
        $requete = $request->validated();

        if(Auth::attempt($requete)){
            $id = Auth::user()->id;
            $user = User::find($id);
            $user->update(['last_login_at' => now()]);

            $request->session()->regenerate();
            return redirect()->intended(route('dashboard.index'));
        }

        return to_route('auth.login')->withErrors([
            'auth' => 'Vérifier votre email ou votre mot de passe.',
            ])->withInput();
    }
    
    /**
     * fonction de déconnexion de la page
     *
     * @return void
     */
    public function logout(){
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->update(['last_logout_at' => now()]);

        Auth::logout();
        return to_route('auth.login');
    }
}
