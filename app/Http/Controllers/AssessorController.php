<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Tesis;
use App\Models\Publicacion;
use PHPUnit\Framework\TestSuiteIterator;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class AssessorController extends Controller
{
    public function viewProjects(Request $request) {
        $buscar = trim($request->get('r_Buscar'));
        if ($buscar != '') {
            $proyectos = Proyecto::all()->where('descripcion', 'like', $buscar);
            $proyectos = $proyectos->where('asesor', auth()->user()->name);
        } else {
            $proyectos = Proyecto::all()->where('asesor', auth()->user()->name);
        }  
        $proyectos = Proyecto::all()->where('asesor', auth()->user()->name);
        $publicaciones = Publicacion::all();
        $rnumber = Proyecto::all()->where('estado', 'Pendiente')->count();
        $tnumber = Tesis::all()->where('estado', 'Espera')->count();
        return view('assessor.proyectos', compact('proyectos'), compact('publicaciones', 'rnumber', 'tnumber'));
    }

    public function viewThesis() {
        $tesis = Tesis::where(function ($query) {
            $query->select('asesor')->from('projects')->whereColumn('projects.id', 'thesis.idproyecto');
        }, auth()->user()->name)->get();
        $publicaciones = Publicacion::all();
        $rnumber = Proyecto::all()->where('estado', 'Pendiente')->count();
        $tnumber = Tesis::all()->where('estado', 'Espera')->count();
        return view('assessor.tesis', compact('tesis'), compact('publicaciones', 'rnumber', 'tnumber'));
    }

    public function checkProject($id, Request $request) {
        $proyecto = proyecto::find($id);
        $proyecto->estado = $request->r_Estado;
        if ($proyecto->estado == 'Aceptado') {
            $practica = new Tesis();
            $practica->informe = '(Vacío)';
            $practica->idproyecto = $proyecto->id;
            $practica->estado = 'Pendiente';
            $practica->save();
        }
        $proyecto->save();
        return redirect()->route('ss.proyectos')->with('status','PROYECTO RESUELTO');;
    }

    public function checkThesis($id, Request $request) {
        $practica = Tesis::find($id);
        $practica->observacion = $request->r_Observacion;
        $practica->estado = $request->r_Estado;
        $practica->save();
        return redirect()->route('ss.tesis')->with('status','ASESORÍA REGISTRADA');
    }
}
