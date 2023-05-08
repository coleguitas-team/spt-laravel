<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Practica;
use App\Models\Tesis;
use App\Models\Publicacion;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

class SecretaryController extends Controller
{
    public function viewPractices() {
        $practicas = Practica::all()->where('estado', 'Aprobada');
        $publicaciones = Publicacion::all();
        return view('secretary.practicas', compact('practicas'), compact('publicaciones'));
    }

    public function viewThesis() {
        $publicaciones = Publicacion::all();
        $tesis = Tesis::all()->where('estado', 'Aprobada');
        return view('secretary.tesis', compact('tesis'), compact('publicaciones'));
    }

    public function resPractice($id, Request $request) {
        $practica = Practica::find($id);
        $practica->resolucion = $request->file('r_Resolucion')->store('public');
        $practica->save();
        return redirect()->route('sc.practicas')->with('status','RESOLUCIÓN REGISTRADA');
    }

    public function addPost(Request $request) {
        $publicacion = new Publicacion();
        $publicacion->titulo = $request->r_Titulo;
        $publicacion->cuerpo = $request->r_Cuerpo;
        $publicacion->fecha = Carbon::now();
        $publicacion->save();
        return redirect()->route('sc.practicas')->with('status','PUBLICACIÓN FIJADA');
    }

    public function dropPost($id, Request $request) {
        $publicacion = Publicacion::find($id);
        $publicacion->delete();
        return redirect()->route('sc.practicas')->with('status','PUBLICACIÓN ELIMINADA');
    }
}
