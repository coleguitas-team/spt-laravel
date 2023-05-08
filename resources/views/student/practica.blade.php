@extends('components.app')

@section('content')
    <table style="width: 100%;">
        <tr>
            <td style="width: 33%;">
                <h3>Prácticas profesionales</h3>
            </td>
            <td style="text-align: center;">
                {{-- <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary" style="background-color: #f0f4f7" data-bs-toggle="modal" data-bs-target="#ModalSearch"><i class="bi bi-search"></i></button>
                </div> --}}
            </td>
            <td style="text-align: right; width: 33%;">
                <label> @if(session('status')) {{ session('status') }} @endif</label>
            </td>
        </tr>
    </table> <br>

    <div class="list-group">
        @forelse ($practicas as $i)
            <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" data-bs-target="#exampleModalToggle{{ $i->id }}" data-bs-toggle="modal" data-bs-dismiss="modal">
            <img src="{{ asset('img/user.png') }}" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                <h6 class="mb-0">{{ $i->inscription->descripcion }}</h6>
                <p class="mb-0 opacity-75">Docente: <i>{{ $i->inscription->docente }}</i>. Empresa: <i>{{ $i->inscription->organizacion }}</i>. Inicio: <i>{{ $i->inscription->finicio }}</i>. Fin: <i>{{ $i->inscription->ftermino }}</i>.</p>
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

    @foreach ($practicas as $i)
        <div class="modal fade" id="exampleModalToggle{{ $i->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel{{ $i->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <h6>Práctica: {{ $i->inscription->descripcion }}</h6> <br>
                    <form action="{{ route('st.editPractice', $i->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-8">
                                    @if ($i->informe == '(Vacío)')
                                        <input class="form-control form-control-sm" type="file" placeholder="Informe" name="r_Informe" style="height: 100%">
                                    @elseif ($i->resolucion != null)
                                        <iframe width="100%" height="100%" src="{{ Storage::url($i->resolucion) }}" frameborder="0"></iframe>
                                    @else
                                        <iframe width="100%" height="90%" src="{{ Storage::url($i->informe) }}" frameborder="0"></iframe>
                                        @if ($i->estado == 'Pendiente')
                                            <input class="form-control form-control-sm" type="file" placeholder="Informe" name="r_Informe">
                                        @endif
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <table class="table table-borderless table-sm">
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
                                        @if ($i->estado == 'Pendiente' || $i->estado == 'Espera')
                                            <tr>
                                                <td colspan="2" class="table-light">Chat <sup>alpha</sup></td>
                                            </tr>
                                            <tr>
                                                <td>{{ $i->inscription->docente }}</td>
                                                <td class="fw-light">{{ $i->observacion }}</td>
                                            </tr>
                                            <tr>
                                                <td>Yo</td>
                                                <td class="fw-light">
                                                    <textarea name="r_Comentario" rows="1" style="width: 100%" @if($i->estado != 'Pendiente') disabled @endif>{{ $i->comentario }}</textarea>
                                                </td>
                                            </tr>
                                        @elseif ($i->estado == 'Aprobada')
                                            <tr>
                                                <td colspan="2" class="table-light">Resolución</sup></td>
                                            </tr>
                                            <tr>
                                                <td>Estado</td>
                                                <td class="fw-light">@if ($i->resolucion == null) Procesando... @else Registrado @endif</td>
                                            </tr>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer" style="background-color: #f0f4f7">
                        @if ($i->estado == 'Pendiente')
                            <button type="submit" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Enviar</button>
                        @else
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Listo</button>
                        @endif
                    </form>
                </div>
            </div>
            </div>
        </div>
    @endforeach
@endsection