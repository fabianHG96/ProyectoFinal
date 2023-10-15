<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class FlexController extends Controller
{
    public function index(){
        $authenticated_user = Auth::user();

    return view('admin.home')->with([
        'user' => $authenticated_user,
    ]);
    }
    function Manager(){
        $usuarios = User::all();
        return view('vistas.manager.usuarios', compact('user'));
     }


}
