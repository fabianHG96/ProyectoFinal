<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cargo;

class AuthController extends Controller
{
    public function showLogin(){
        return View('auth.login');
    }

    public function attemptLogin(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        $credentials = ['email' => $request->email, 'password' => $request->password];
        if(Auth::attempt($credentials, $request?->remember)){
            $user = Auth::user();
            return redirect()->route('home')->with('user', $user);
        }else{
            session()->flash('error', 'Email o contraseña incorrectos');
            return redirect()->back();
        }
    }

    public function showRegister(){
        $cargos = Cargo::all();
        return View('auth.register', compact('cargos'));
    }

    public function storeAccount(Request $request){
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'cargo_id' => 'required|exists:cargos,id',
            'password' => 'required|min:6|confirmed'
        ]);
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'cargo_id' => $request->cargo_id,
            'password' => bcrypt($request->password),

        ]);
        // Auth::login($user);
        session()->flash('message', 'Usuario creado satisfactoriamente');
        return redirect()->route('register');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}

