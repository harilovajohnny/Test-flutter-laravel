<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{

    /**
     * Undocumented function
     *
     * @param LoginRequest $request
     * @return void
     */
    public function login(LoginRequest $request){
        return response()->json([
            'status' => true,
            'message' => "Utilisateur connecté",
            'data' => [
                "token" => "n",
                "token_type" => "Bearer"
            ]
        ],422);

        // $requete = $request->validated();
        // try {

        //     if(Auth::attempt($requete)){
        //         $id = Auth::user()->id;
        //         $user = User::find($id);
        //         $user->update(['last_login_at' => now()]);
                
        //         return response()->json([
        //             'status' => true,
        //             'message' => "Utilisateur connecté",
        //             'data' => [
        //                 "token" => $user->createToken('auth_user')->plainTextToken,
        //                 "token_type" => "Bearer"
        //             ]
        //         ],422);

        //     }else{
        //         return response()->json([
        //             'status' => false,
        //             'message' => "erreur",
        //             'errors' => $requete->errors
        //         ],422);
        //     }

        // } catch (\Throwable $th) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => $th->getMessage()
        //     ],500);
        // }

    }
}