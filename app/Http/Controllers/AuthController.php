<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //  afficher le formulaire  pour inscrire
    public function showRegistrationForm(){
        return view('auth.register');
    }
    public function register(Request $request){
        $auth=new User();
        $auth->name=$request->input('name');
        $auth->email=$request->input('email');
        $auth->password=Hash::make($request->input('password'));
        $auth->adresse=$request->input('adresse');
        $auth->numero=$request->input('numero');
        $auth->save();
        return redirect()->route('auth.loginform');
    }
        //  afficher le formulaire  pour connecter
     public function showLoginForm(){
        return view('auth.login');

     }
     public function login(Request $request){

        // Validation des données du formulaire de connexion
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tentative de connexion
        if (Auth::attempt($credentials)) {
            // L'utilisateur est connecté avec succès
            return redirect()->intended('/dashboard');
        } else {
            // Échec de la connexion
            return back()->withErrors(['email' => 'Les informations d\'identification ne correspondent pas']);
        }
    }
    public function logOut(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended('/dashboard');
    }
    }

