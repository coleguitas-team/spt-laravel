<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function main() {
        if (auth()->attempt(request(['user', 'password'])) == false) {
           return back()->withErrors([
               'message' => 'Credenciales incorrectas'
           ]);
        } else {
            if (auth()->user()->role == 'professor') {
                return redirect()->route('pr.inscripciones');
            } elseif (auth()->user()->role == 'secretary') {
                return redirect()->route('sc.practicas');
            } elseif (auth()->user()->role == 'bachelor') {
                return redirect()->route('bc.proyecto');
            } elseif (auth()->user()->role == 'assessor') {
                return redirect()->route('ss.proyectos');
            } else {
                return redirect()->route('st.inscripcion');
            }
        }
    }

    public function destroy() {
        auth()->logout();
        return redirect()->to('/');
    }
}
