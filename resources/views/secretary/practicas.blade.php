@extends('components.app')

@section('content')
    <table style="width: 100%;">
        <tr>
            <td style="width: 33%;">
                <h3>Prácticas profesionales</h3>
            </td>
            <td style="text-align: center;">
                {{-- <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary" style="background-color: #f5f1f2" data-bs-toggle="modal" data-bs-target="#ModalSearch"><i class="bi bi-search"></i></button>
                </div> --}}
            </td>
            <td style="text-align: right; width: 33%;">
                <label> @if(session('status')) {{ session('status') }} @endif</label>
            </td>
        </tr>
    </table> <br>

    <div class="list-group">
        @forelse($practicas as $i)
            <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" data-bs-target="#exampleModalToggle{{ $i->id }}" data-bs-toggle="modal" data-bs-dismiss="modal">
            <img src="{{ asset('img/user.png') }}" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                <h6 class="mb-0">{{ $i->inscription->descripcion }}</h6>
                <p class="mb-0 opacity-75">Alumno: <i>{{ $i->inscription->alumno }}</i>. Docente: <i>{{ $i->inscription->docente }}</i>. Empresa: <i>{{ $i->inscription->organizacion }}</i>.</p>
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
                <p class="mb-0 opacity-75">Aún no hay prácticas.</p>
                </div>
                <small class="opacity-50 text-nowrap">Información</small>
            </div>
            </a>
        @endforelse
    </div>

    @foreach ($practicas as $i)
        <div class="modal fade" id="exampleModalToggle{{ $i->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel{{ $i->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <h6>Práctica: {{ $i->inscription->descripcion }}</h6> <br>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-8">
                                    <iframe width="100%" height="100%" src="{{ Storage::url($i->informe) }}" frameborder="0"></iframe>
                                </div>
                                <div class="col-md-4">
                                    <table class="table table-borderless table-sm">
                                        <tr>
                                            <td colspan="2" class="table-light">Alumno</td>
                                        </tr>
                                        <tr>
                                            <td>Nombre</td>
                                            <td class="fw-light">{{ $i->inscription->alumno }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="table-light">Docente</td>
                                        </tr>
                                        <tr>
                                            <td>Nombre</td>
                                            <td class="fw-light">{{ $i->inscription->docente }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="table-light">Organización</td>
                                        </tr>
                                        <tr>
                                            <td>Nombre</td>
                                            <td class="fw-light">{{ $i->inscription->organizacion }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="table-light">Práctica</td>
                                        </tr>
                                        <tr>
                                            <td>Inicio</td>
                                            <td class="fw-light">{{ $i->inscription->finicio }}</td>
                                        </tr>
                                        <tr>
                                            <td>Fin</td>
                                            <td class="fw-light">{{ $i->inscription->ftermino }}</td>
                                        </tr>
                                        <tr>
                                            <td>Estado</td>
                                            <td class="fw-light">{{ $i->estado }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="table-light">Resolución</sup></td>
                                        </tr>
                                        <tr>
                                            <td>Estado</td>
                                            <td class="fw-light">@if ($i->resolucion == null) Pendiente @else Registrado @endif</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer" style="background-color: #f5f1f2">
                    @if ($i->resolucion == null)
                        <form action="{{ route('sc.resPractice', $i->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <input type="file" class="form-control form-control-sm" name="r_Resolucion" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                <button class="btn btn-light btn-sm" type="submit" id="inputGroupFileAddon04">Enviar</button>
                            </div>
                        </form>
                    @endif
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Listo</button>
                </div>
            </div>
            </div>
        </div>
    @endforeach
@endsection