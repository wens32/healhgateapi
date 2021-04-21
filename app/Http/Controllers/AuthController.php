<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/* (Jean-Baptiste ☻♥☺)

Le controller AuthController concernant la l'inscription, 
la connexion et la déconnexion.
*/

class AuthController extends Controller
{
    /* (Jean-Baptiste ☻♣☺)

    la méthode register d'inscription
    */
    public function register(Request $request)
    {
        /* (Jean-Baptiste ☻♥☺)

         Pour la validation des information au niveau des inputs
         */
        $fields = $request->validate([
            'name' => 'required|string|min:5',
            'email' => 'required|email|unique:users,emailUser',
            'password' => 'required|string|min:6',
            'agent'  => ['required', 'exists:App\Models\TypeUser,id'],
        ]);

        /* (Jean-Baptiste ☻♣☺)

    Pour l'insertion des valeurs des inputs dans la base de donnée
    */
        $user = User::create([
            'nameUser' => $fields['name'],
            'emailUser' => $fields['email'],
            'passwordUser' => bcrypt($fields['password']),
            'typeUser_id' => $fields['agent']
        ]);

        /* (Jean-Baptiste ☻♥☺)

    la Créaction de token lors de l'inscription
    */
        $token = $user->createToken('myAppToken')->plainTextToken;

        /* (Jean-Baptiste ☻♣☺)

    Une fois l'inscription bien exécuté sa return comme reponse les coordonnées de 
    l'utilisateur puis son token d'accès
    Et un code de succès 201
    */
        return response([
            'user' => $user,
            'token' => $token
        ], 201);
    }


    /* (Jean-Baptiste ☻♥☺)

    la méthode login de connexion
    */
    public function login(Request $request)
    {
        /* (Jean-Baptiste ☻♥☺)

         Pour la validation des information au niveau des inputs
         */
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);


        /* (Jean-Baptiste ☻♥☺)

    Vérifie si cet utilisateur esciste dans la base de donnée
    */
        $user = User::where('emailUser', $fields['email'])->first();


        /* (Jean-Baptiste ☻♥☺)

    si cet utilisateur n'esciste pas dans la base de donnée sa affiche
    un messaghe d'erreur puis un code 401
    */
        if (!$user || !Hash::check($fields['password'], $user->passwordUser)) {
            return response([
                'message' => 'Mauvais coordonnées',
            ], 401);
        }

        /* (Jean-Baptiste ☻♥☺)

    si cet utilisateur esciste dans la base de donnée sa génère un token
    puis un message de bienvenue et un code 201
    */
        $token = $user->createToken('myAppToken')->plainTextToken;

        return response([
            'message' => 'Soyez la bienvenue sur HealthGate',
            'token' => $token
        ], 201);
    }


    /* (Jean-Baptiste ☻♥☺)

    la méthode logout de déconnexion
    */
    public function logout()
    {
        /* (Jean-Baptiste ☻♥☺)

    Si l'utilisateur est connecté sa suprime le token stocké dans des cookies 
    puis le déconnecte
    */
        auth()->user()->tokens()->delete();

        /* (Jean-Baptiste ☻♥☺)

    une fois déconnecter sa affiche un message 'Vous venez de vous déconnecter sur HealthGate'
    puis un code 201
    */
        return response([
            'message' => 'Vous venez de vous déconnecter sur HealthGate'
        ], 201);
    }
}
