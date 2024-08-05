<?php

namespace App\Http\Controllers;

use App\Models\Proprietaire;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProprietaireAuthController extends Controller
{
    public function login(){
        return view('auth/proprietaire/login');
    }
    public function register(){
        return view('auth/proprietaire/register');
    }
    public function  handleRegister( Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:proprietaires,email',
            'password' => 'required|min:4',
        ] , [
            'name.required'=> 'Veillez entrer votre nom&prénom',
            'email.required'=> 'Veillez entrer votre adresse email valide',
            'email.unique'=> 'Cette adresse email est déjà prise',
            'password.required'=> 'Le mot de passe est obligatoire',
            'password.min'=> 'Le mot de passe doit avoir quatre(4) caractères'
        ]);
        try {
            Proprietaire::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_activee' => 1 // Par défaut, un nouveau compte est actif

            ]);
            return redirect()->route('proprietaire.handleLogin')->with('success', 'Votre compte a été crée Mr, connectez-vous');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la création du compte. Veuillez réessayer.');
        }
    }



    public function handlelogin(Request $request){




        $request->validate([
            'email' => 'required|exists:proprietaires,email',
            'password' => 'required|min:4',
        ] , [
            'email.required'=> ' L\'adresse email n\'est pas reconnu en tant que proprietaire',
            'email.exists'=> 'Cette adresse email n\'est liée à aucun compte',
            'password.required'=> 'Le mot de passe est obligatoire',
            'password.min'=> 'Le mot de passe doit avoir quatre(4) caractères'
        ]);

        try {

                $proprietaire = Proprietaire::where('email', $request->email)->first();
                if ($proprietaire && !$proprietaire->is_activee) {
                    return redirect()->back()->with('error', 'Votre compte a été désactivé par l\'administrateur.');
                }


                if(auth('proprietaire')->attempt($request->only('email', 'password'))){
                    return redirect()->route('ProprietaireDashboard');
                }else{
                    return redirect()->back()->with('error','Information de connecxion du compte propriétaire non reconnu.');
                }

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la connexion. Veuillez réessayer.');

        }
    }
}
