<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthControlleur extends Controller
{
   public function register(){
        return view('auth.users.register');
   }

   public function login(){
    return view('auth/users/login');
   }

   public function handleRegister( Request $request){
    $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users,email',
        'password' => 'required|min:4',
    ] , [
        'name.required'=> 'Veillez entrer votre nom&prénom',
        'email.required'=> 'Veillez entrer votre adresse email valide',
        'email.unique'=> 'Cette adresse email est déjà prise',
        'password.required'=> 'Le mot de passe est obligatoire',
        'password.min'=> 'Le mot de passe doit avoir quatre(4) caractères',
    ]);

    try{


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'is_admin' => 0 ,
            'is_active' => 1 // Par défaut, un nouveau compte est actif

        ]);
        return redirect()->route('handleUserLogin')->with('success', 'Votre compte a été crée, Connectez-vous');
    } catch (Exception $e){
        return redirect()->back()->with('error', 'Erreur lors de la création du compte. Veuillez réessayer.');
    }

   }

    public function handlelogin(Request $request){
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required|min:4',
        ] , [
            'email.required'=> 'Veillez entrer votre adresse email valide',
            'email.exists'=> 'Cette adresse email n\'est liée à aucun compte',
            'password.required'=> 'Le mot de passe est obligatoire',
            'password.min'=> 'Le mot de passe doit avoir quatre(4) caractères'
        ]);

        try {

            $user = User::where('email', $request->email)->first();
            if ($user && !$user->is_active) {
                return redirect()->back()->with('error', 'Votre compte a été désactivé par l\'administrateur.');
            }


           if (auth()->attempt($request->only('email', 'password'))) {
                return redirect('/');
            } else {
                return redirect()->back()->with('error', 'Information de connexion non reconnue.');
            }

        } catch (Exception $e) {
                return redirect()->back()->with('error', 'Erreur lors de la connexion. Veuillez réessayer.');
        }
    }



    public function handleLogout()
   {
       Auth::logout();
       return redirect('/');
   }


}
