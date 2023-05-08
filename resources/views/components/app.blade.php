<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eurua project</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <script language="javascript">
        function viewNavbar() {
            if (document.getElementById('navbar').style.height == '78px') {
                document.getElementById('navbar').style.height = '400px';
                document.getElementById('panel').style.display = 'block';
            } else {
                document.getElementById('navbar').style.height = '78px';
                document.getElementById('panel').style.display = 'none';
            }
        }
    </script>
</head>
<body style="background-color:@if(auth()->user()->role == 'secretary') #fbf8f8 @else #f9f9fb @endif" onselectstart="return false">

    <div class="shadow-sm" style="@if(auth()->user()->role == 'secretary') background-color: #f5f1f2 @else background-color: #f0f4f7 @endif; padding-left: 10px; padding-right: 10px;">
        <div class="container-fluid" style="height: 78px;" id="navbar">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-1 mb-4">
                <a href="#" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-secondary text-decoration-none" onclick="viewNavbar()">
                    <i class="bi bi-person-circle"></i> &nbsp {{ auth()->user()->name }}
                </a>
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    @if (auth()->user()->role == 'student')
                        <li>
                            <div align='center'>
                                <a href="{{ route('st.inscripcion') }}" class="nav-link @routeIs('st.inscripcion') text-dark @else text-secondary @endif">
                                    <i class="bi bi-file-earmark-text d-block" style="font-size: 20px"></i>
                                    Inscripcion
                                </a>
                            </div>
                        </li>
                        <li>
                            <div align='center'>
                                <a href="{{ route('st.practica') }}" class="nav-link @routeIs('st.practica') text-dark @else text-secondary @endif">
                                    <i class="bi bi-file-earmark-medical d-block" style="font-size: 20px"></i>
                                    Practica
                                </a>
                            </div>
                        </li>     
                    @elseif (auth()->user()->role == 'professor')
                        <li>
                            <div align='center'>
                                <a href="{{ route('pr.inscripciones') }}" class="nav-link @routeIs('pr.inscripciones') text-dark @else text-secondary @endif">
                                    <i class="bi bi-file-earmark-text d-block" style="font-size: 20px"> <sup style="color: #327ec5">{{ $inumber }}</sup> </i>
                                    Inscripciones
                                </a>
                            </div>
                        </li>
                        <li>
                            <div align='center'>
                                <a href="{{ route('pr.practicas') }}" class="nav-link @routeIs('pr.practicas') text-dark @else text-secondary @endif">
                                    <i class="bi bi-file-earmark-medical d-block" style="font-size: 20px"> <sup style="color: #327ec5">{{ $pnumber }}</sup> </i>
                                    Practicas
                                </a>
                            </div>
                        </li>     
                    @elseif (auth()->user()->role == 'secretary')
                        <li>
                            <div align='center'>
                                <a href="{{ route('sc.practicas') }}" class="nav-link @routeIs('sc.practicas') text-dark @else text-secondary @endif">
                                    <i class="bi bi-file-earmark-medical d-block" style="font-size: 20px"></i>
                                    Practicas
                                </a>
                            </div>
                        </li>
                        <li>
                            <div align='center'>
                                <a href="{{ route('sc.tesis') }}" class="nav-link @routeIs('sc.tesis') text-dark @else text-secondary @endif">
                                    <i class="bi bi-journal-text d-block" style="font-size: 20px"></i>
                                    Tesis
                                </a>
                            </div>
                        </li>
                    @elseif (auth()->user()->role == 'bachelor')
                        <li>
                            <div align='center'>
                                <a href="{{ route('bc.proyecto') }}" class="nav-link @routeIs('bc.proyecto') text-dark @else text-secondary @endif">
                                    <i class="bi bi-journal-text d-block" style="font-size: 20px"></i>
                                    Proyecto
                                </a>
                            </div>
                        </li>
                        <li>
                            <div align='center'>
                                <a href="{{ route('bc.tesis') }}" class="nav-link @routeIs('bc.tesis') text-dark @else text-secondary @endif">
                                    <i class="bi bi-journal-bookmark d-block" style="font-size: 20px"></i>
                                    Tesis
                                </a>
                            </div>
                        </li>
                    @elseif (auth()->user()->role == 'assessor')
                        <li>
                            <div align='center'>
                                <a href="{{ route('ss.proyectos') }}" class="nav-link @routeIs('ss.proyectos') text-dark @else text-secondary @endif">
                                    <i class="bi bi-journal-text d-block" style="font-size: 20px"> <sup style="color: #327ec5">{{ $rnumber }}</sup> </i>
                                    Proyectos
                                </a>
                            </div>
                        </li>
                        <li>
                            <div align='center'>
                                <a href="{{ route('ss.tesis') }}" class="nav-link @routeIs('ss.tesis') text-dark @else text-secondary @endif">
                                    <i class="bi bi-journal-bookmark d-block" style="font-size: 20px"> <sup style="color: #327ec5">{{ $tnumber }}</sup> </i>
                                    Tesis
                                </a>
                            </div>
                        </li>
                    @else
                        <div align='center' style="color: red">
                            ⊙﹏⊙∥ <br>
                            Vaya, no debería estar aquí. <br>
                            (no me pagan lo suficiente.)
                        </div>         
                    @endif    
                </ul>
                <div class="col-md-3 text-end">
                <a href="{{ route('login.destroy') }}" class="nav-link px-2 link-secondary">Cerrar Sesión &nbsp<i class="bi bi-x-circle"></i></a>
                </div>
            </header>
            <div class="container-fluid" id="panel" style="display: none; height: 70%; align-content: center;">
                <div class="row" style="height: 100%">
                    <div class="col-3">
                        <div class="row" style="height: 50%">
                            <div class="card text-center border-secondary" style="background-color:@if(auth()->user()->role == 'secretary') #fbf8f8 @else #f9f9fb @endif; height: 90%;">
                                <div class="card-body">
                                    <h6 class="card-title">{{ auth()->user()->name }}</h6>
                                    <h6 class="card-subtitle mb-2 text-muted">#{{ auth()->user()->role }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="height: 50%">
                            <div class="card text-center border-secondary" style="background-color:@if(auth()->user()->role == 'secretary') #fbf8f8 @else #f9f9fb @endif; height: 90%;">
                                <div class="card-body">
                                    <h6 class="card-title">Prácticas y Tesis</h6>
                                    <h6 class="card-subtitle mb-2 text-muted">#eurua</h6>
                                    <p class="card-text" style="font-size: 9px;"> <br> Aplicación desarrollada por Coleguitas [TEAM]. <br> Todos los derechos reservados.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card text-center border-secondary mb-2" style="background-color:@if(auth()->user()->role == 'secretary') #fbf8f8 @else #f9f9fb @endif; height: 95%;">
                            <div class="card-body">
                                <h6 class="card-title">Publicaciones</h6>
                                <ul class="list-group list-group-horizontal" style="height: 90%"">
                                    @forelse ($publicaciones as $p)
                                        <a href="#" class="list-group-item list-group-item-action">
                                        <h6 class="mb-1">{{ $p->titulo }}</h6>
                                        <p class="mb-1">{{ $p->cuerpo }}</p>
                                        <small class="text-muted">{{ $p->fecha }}</small>
                                        @if (auth()->user()->role == 'secretary')
                                            <form action="{{ route('sc.dropPost', $p->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger btn-sm" style="background-color: #fbf8f8">Eliminar</button>
                                            </form>
                                        @endif
                                        </a>
                                    @empty
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <small class="text-muted">(Aún nada.)</small>
                                        </a>
                                    @endforelse
                                    @if (auth()->user()->role == 'secretary')
                                        <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#ModalPost">
                                        <small class="text-muted"><i class="bi bi-plus-lg"></i> <br> Crear publicación</small>
                                        </a>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="padding: 26px;"">
        @yield('content')
    </div>
    
    @if (auth()->user()->role == 'secretary')
    <div class="modal fade" id="ModalPost" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
                <h6 class="modal-title" id="ModalLabel">Nueva publicación</h6> <br>
                <form action="{{route('sc.addPost')}}" method="post"">
                    @csrf
                    <input class="form-control form-control-sm" type="text" placeholder="Titulo" name="r_Titulo"> <br>
                    <input class="form-control form-control-sm" type="text" placeholder="Cuerpo" name="r_Cuerpo"> <br>
            </div>
            <div class="modal-footer" style="background-color: #f0f4f7">
                <button type="submit" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Publicar</button>
                </form>
            </div>
          </div>
        </div>
    </div>
    @endif

    <div class="modal fade" id="ModalSearch" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
                <h6 class="modal-title" id="ModalLabel">Buscar</h6> <br>
                <form action="{{ route(Route::currentRouteName()) }}" method="GET">
                    @csrf
                    <input class="form-control form-control-sm" type="text" placeholder="Buscar" name="r_Buscar"> <br>
            </div>
            <div class="modal-footer" style="background-color: #f0f4f7">
                <button type="submit" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Buscar</button>
                </form>
            </div>
          </div>
        </div>
    </div>
    
</body>
</html>