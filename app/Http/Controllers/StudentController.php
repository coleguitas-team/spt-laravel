<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\Practica;
use App\Models\User;
use App\Models\Publicacion;

class StudentController extends Controller
{
    public function viewInscription(Request $request) {
        $buscar = trim($request->get('r_Buscar'));
        if ($buscar != '') {
            $inscripciones = Inscripcion::all()->where('descripcion', 'like', $buscar);
            $inscripciones = $inscripciones->where('alumno', auth()->user()->name);
        } else {
            $inscripciones = Inscripcion::all()->where('alumno', auth()->user()->name);
        }  
        $publicaciones = Publicacion::all();  
        $docentes = User::all()->where('role', 'professor');
        return view('student.inscripcion',compact('inscripciones'), compact('publicaciones', 'docentes'));
    }

    public function viewPractice() {
        $practicas = Practica::where(function ($query) {
            $query->select('alumno')->from('inscriptions')->whereColumn('inscriptions.id', 'practices.idinscripcion');
        }, auth()->user()->name)->get();
        $publicaciones = Publicacion::all();
        return view('student.practica', compact('practicas'), compact('publicaciones'));
    }

    public function addInscription(Request $request) {
        $inscripcion = new Inscripcion();
        $inscripcion->alumno = auth()->user()->name;
        $inscripcion->docente = $request->r_Docente;
        $inscripcion->organizacion = $request->r_Organizacion;
        $inscripcion->descripcion = $request->r_Descripcion;
        $inscripcion->finicio = $request->r_Inicio;
        $inscripcion->ftermino = $request->r_Fin;
        $inscripcion->solicitud = $request->file('r_Solicitud')->store('public');
        $inscripcion->estado = 'Pendiente';
        $inscripcion->save();
        return redirect()->route('st.inscripcion')->with('status','INSCRIPCIÓN ENVIADA');
    }

    public function editPractice($id, Request $request) {
        $practica = Practica::find($id);
        $practica->informe = $request->file('r_Informe')->store('public');
        $practica->comentario = $request->r_Comentario;
        $practica->estado = 'Espera';
        $practica->save();
        return redirect()->route('st.practica')->with('status','PRÁCTICA ENVIADA');
    }

}
