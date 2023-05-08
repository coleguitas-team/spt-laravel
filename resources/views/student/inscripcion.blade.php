@extends('components.app')

@section('content')
<table style="width: 100%;">
    <tr>
        <td style="width: 33%;">
            <h3>Inscripciones enviadas</h3>
        </td>
        <td style="text-align: center;">
            <div class="btn-group">
                <button type="button" class="btn btn-outline-secondary" style="background-color: #f0f4f7" data-bs-toggle="modal" data-bs-target="#Modal"><i class="bi bi-plus-lg"></i></button>
                <button type="button" class="btn btn-outline-secondary" style="background-color: #f0f4f7" data-bs-toggle="modal" data-bs-target="#ModalSearch"><i class="bi bi-search"></i></button>
            </div>
        </td>
        <td style="text-align: right; width: 33%;">
            <label> @if(session('status')) {{ session('status') }} @endif</label>
        </td>
    </tr>
</table> <br>

<div class="list-group">
    @forelse ($inscripciones as $i)
        <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" data-bs-target="#exampleModalToggle{{ $i->id }}" data-bs-toggle="modal" data-bs-dismiss="modal">
        <img src="{{ asset('img/user.png') }}" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
        <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
            <h6 class="mb-0">{{ $i->descripcion }}</h6>
            <p class="mb-0 opacity-75">Docente: <i>{{ $i->docente }}</i>. Empresa: <i>{{ $i->organizacion }}</i>. Inicio: <i>{{ $i->finicio }}</i>. Fin: <i>{{ $i->ftermino }}</i>.</p>
            </div>
            <small class="opacity-50 text-nowrap">{{ $i->estado }}</small>
        </div>
        </a>
    @empty
        <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3">
        <img src="{{ asset('img/ct.jpg') }}" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
        <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
            <h6 class="mb-0">Vacío.</h6>
            <p class="mb-0 opacity-75">Intente enviar una inscripción.</p>
            </div>
            <small class="opacity-50 text-nowrap">Información</small>
        </div>
        </a>
    @endforelse
</div>

<div class="modal fade" id="Modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
            <h6 class="modal-title" id="ModalLabel">Nueva inscripción</h6> <br>
            <form action="{{route('st.newInscription')}}" method="post" enctype="multipart/form-data">
                @csrf
                <select class="form-select form-select-sm" name="r_Docente">
                    <option value="Profesor" selected>Profesor</option>
                </select> <br>
                <input class="form-control form-control-sm" type="text" placeholder="Organización" name="r_Organizacion"> <br>
                <input class="form-control form-control-sm" type="text" placeholder="Descripción" name="r_Descripcion"> <br>
                <input class="form-control form-control-sm" type="date" placeholder="Inicio" name="r_Inicio"> <br>
                <input class="form-control form-control-sm" type="date" placeholder="Fin" name="r_Fin"> <br>
                <input class="form-control form-control-sm" type="file" placeholder="Solicitud" name="r_Solicitud"> <br>
        </div>
        <div class="modal-footer" style="background-color: #f0f4f7">
            <button type="submit" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Enviar</button>
            </form>
        </div>
      </div>
    </div>
</div>

@foreach ($inscripciones as $i)
    <div class="modal fade" id="exampleModalToggle{{ $i->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel{{ $i->id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <h6>Inscripción: {{ $i->descripcion }}</h6> <br>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <iframe width="100%" height="100%" src="{{ Storage::url($i->solicitud) }}" frameborder="0"></iframe>
                        </div>
                        <div class="col-md-4">
                            <table class="table table-borderless table-sm">
                                <tr>
                                    <td colspan="2" class="table-light">Docente</td>
                                </tr>
                                <tr>
                                    <td>Nombre</td>
                                    <td class="fw-light">{{ $i->docente }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="table-light">Organización</td>
                                </tr>
                                <tr>
                                    <td>Nombre</td>
                                    <td class="fw-light">{{ $i->organizacion }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="table-light">Práctica</td>
                                </tr>
                                <tr>
                                    <td>Inicio</td>
                                    <td class="fw-light">{{ $i->finicio }}</td>
                                </tr>
                                <tr>
                                    <td>Fin</td>
                                    <td class="fw-light">{{ $i->ftermino }}</td>
                                </tr>
                                <tr>
                                    <td>Estado</td>
                                    <td class="fw-light">{{ $i->estado }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="background-color: #f0f4f7">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Listo</button>
            </div>
        </div>
        </div>
    </div>
@endforeach

@endsection