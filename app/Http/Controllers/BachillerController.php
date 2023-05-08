<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Tesis;
use App\Models\Publicacion;

class BachillerController extends Controller
{
    public function viewProject(Request $request) {
        $buscar = trim($request->get('r_Buscar'));
        if ($buscar != '') {
            $proyectos = Proyecto::all()->where('descripcion', 'like', $buscar);
            $proyectos = $proyectos->where('tesista', auth()->user()->name);
        } else {
            $proyectos = Proyecto::all()->where('tesista', auth()->user()->name);
        }  
        $publicaciones = Publicacion::all();
        return view('bachiller.proyecto', compact('proyectos'), compact('publicaciones'));
    }

    public function viewThesis(Request $request) {
        $buscar = trim($request->get('r_Buscar'));
        $tesis = Tesis::where(function ($query) {
            $query->select('tesista')->from('projects')->whereColumn('projects.id', 'thesis.idproyecto');
        }, auth()->user()->name)->get();
        $publicaciones = Publicacion::all();
        return view('bachiller.tesis', compact('tesis'), compact('publicaciones'));
    }

    public function addProject(Request $request) {
        $proyecto = new Proyecto();
        $proyecto->tesista = auth()->user()->name;
        $proyecto->asesor = $request->r_Asesor;
        $proyecto->descripcion = $request->r_Descripcion;
        $proyecto->finicio = $request->r_Inicio;
        $proyecto->ftermino = $request->r_Fin;
        $proyecto->estado = 'Pendiente';
        $proyecto->save();
        return redirect()->route('bc.proyecto')->with('status','PROYECTO ENVIADO');
    }

    public function editThesis($id, Request $request) {
        $tesis = Tesis::find($id);
        $tesis->informe = $request->file('r_Informe')->store('public');
        $tesis->comentario = $request->r_Comentario;
        $tesis->estado = 'Espera';
        $tesis->save();
        return redirect()->route('bc.tesis')->with('status','TESIS MODIFICADA');
    }
}
