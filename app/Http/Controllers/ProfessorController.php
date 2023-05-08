<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\Practica;
use App\Models\Publicacion;

class ProfessorController extends Controller
{
    public function viewInscriptions(Request $request) {
        $buscar = trim($request->get('r_Buscar'));
        if ($buscar != '') {
            $inscripciones = Inscripcion::all()->where('descripcion', 'like', $buscar);
            $inscripciones = $inscripciones->where('docente',auth()->user()->name);
        } else {
            $inscripciones = Inscripcion::all()->where('docente',auth()->user()->name);
        }  
        $publicaciones = Publicacion::all();
        $inumber = Inscripcion::all()->where('estado', 'Pendiente')->count();
        $pnumber = Practica::all()->where('estado', 'Espera')->count();
        return view('professor.inscripciones', compact('inscripciones'), compact('publicaciones', 'inumber', 'pnumber'));
    }

    public function viewPractices() {
        $practicas = Practica::where(function ($query) {
            $query->select('docente')->from('inscriptions')->whereColumn('inscriptions.id', 'practices.idinscripcion');
        }, auth()->user()->name)->get();
        $publicaciones = Publicacion::all();
        $inumber = Inscripcion::all()->where('estado', 'Pendiente')->count();
        $pnumber = Practica::all()->where('estado', 'Espera')->count();
        return view('professor.practicas', compact('practicas'), compact('publicaciones', 'inumber', 'pnumber'));
    }

    public function checkInscription($id, Request $request) {
        $inscripcion = Inscripcion::find($id);
        $inscripcion->estado = $request->r_Estado;
        if ($inscripcion->estado == 'Aceptada') {
            $practica = new Practica();
            $practica->informe = '(Vacío)';
            $practica->idinscripcion = $inscripcion->id;
            $practica->estado='Pendiente';
            $practica->save();
        }
        $inscripcion->save();
        return redirect()->route('pr.inscripciones')->with('status','INSCRIPCIÓN RESUELTA');;
    }

    public function checkPractice($id, Request $request) {
        $practica = Practica::find($id);
        $practica->observacion = $request->r_Observacion;
        $practica->estado = $request->r_Estado;
        $practica->save();
        return redirect()->route('pr.practicas')->with('status','PRÁCTICA CALIFICADA');
    }
}
