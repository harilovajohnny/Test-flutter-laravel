<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormPostRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class AutheController extends Controller
{

    /**
     * Fonction qui enregistre un utilisateur
     *
     *  @param Request $request
     * @return User
     */
    public function Inscription(Request $request){
        // $test=$request->all();
        // dd($test);
        $rules = [
            'name' => 'required',
            'email' => 'required|string|unique:users',
            'password' => 'required','min:4',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $user = User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password'))
        ]);

        return response()->json([
            'status' => true,
            'message' => "Utilisateur inscrit",
            'data' => [
                "token" => $user->createToken('auth_user')->plainTextToken,
                "token_type" => "Bearer"
            ]
        ],200);

    }

    /**
     * Fonction d'authentiication permettant à l'utilisateur d'acceder à la pag d'accueil
     *
     * @param Request $request
     * @return User
     */
    public function login(Request $request){
        // $requete = $request->validated();
        
        // $test=$request->all();
        // dd($test);
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            $errors = [
                'email' => ['Vérifier votre email.']
            ];
            // $validator->errors()
            return response()->json($errors,400);
        }

        try {
            if(Auth::attempt($request->all())){
                $id = Auth::user()->id;
                $user = User::find($id);
                $user->update(['last_login_at' => now()]);
                
                return response()->json([
                    'status' => true,
                    'message' => "Utilisateur connecté",
                    'data' => [
                        "token" => $user->createToken('auth_user')->plainTextToken,
                        "token_type" => "Bearer"
                    ]
                ],200);

            }else{
                $errors = [
                    'email' => ['Votre mot de passe est incorrect.']
                ];
                return response()->json($errors, 422);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ],500);
        }
    }
}
