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
</head>
<body style="background-color:#f9f9fb">

    @include('components.nav')
    
    <div style="padding-left: 26px; padding-right: 26px;">
        <table style="width: 100%;">
            <tr>
                <td style="width: 33%;">
                    <h3>Proyectos de tesis</h3>
                </td>
                <td style="text-align: center;">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-secondary" style="background-color: #f0f4f7"><i class="bi bi-plus-lg" data-bs-toggle="modal" data-bs-target="#Modal"></i></button>
                        <button type="button" class="btn btn-outline-secondary" style="background-color: #f0f4f7"><i class="bi bi-search"></i></button>
                    </div>
                </td>
                <td style="text-align: right; width: 33%;">
                    <label>3 ELEMENTOS</label>
                </td>
            </tr>
        </table>
        <br>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Asesor</th>
                <th scope="col">Área</th>
                <th scope="col">Tema</th>
                <th scope="col">Estado</th>
                <th scope="col">Modalidad</th>
                <th scope="col">Inicio</th>
                <th scope="col">Fin</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">
                    <button class="btn btn-outline-secondary btn-sm" data-bs-target="#exampleModalToggle1" data-bs-toggle="modal" data-bs-dismiss="modal">
                        <i class="bi bi-file-earmark-text"></i>
                    </button>
                </th>
                <td>Crear un sistema de alerta movil sobre desbalanchamiento de lagunas cercanas</td>
                <td>Roger Vergara</td>
                <td>Ingeniería de Sistemas</td>
                <td>Desarrollo de Sistemas Sociales y Economicos</td>
                <td>Plan de Tesis</td>
                <td>Informe de Competencia Profesional</td>
                <td>9NOV.2021</td>
                <td>9FEB.2022</td>
              </tr>
              <tr>
                <th scope="row">
                    <button class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-file-earmark-text"></i>
                    </button>
                </th>
                <td>Diseño de base de datos para la gestión de la UNT</td>
                <td>Hugo Solorsano</td>
                <td>Ingeniería de Sistemas</td>
                <td>Desarrollo de Sistemas Sociales y Economicos</td>
                <td>Plan de Tesis</td>
                <td>Programación de Titulo Profesional</td>
                <td>11NOV.2021</td>
                <td>11FEB.2022</td>
              </tr>
              <tr>
                <th scope="row">
                    <button class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-file-earmark-text"></i>
                    </button>
                </th>
                <td>Implementacion de un sistema web para optimizar los procesos en la biblioteca municipal de Alto Trujillo</td>
                <td>Hugo Solorsano</td>
                <td>Ingeniería de Sistemas</td>
                <td>Implementación de Sistemas de Información Computarizado Integrales</td>
                <td>Plan de Tesis</td>
                <td>Informe de Competencia Profesional</td>
                <td>21NOV.2021</td>
                <td>21FEB.2022</td>
              </tr>
            </tbody>
          </table>
    </div>

    <div class="modal fade" id="Modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
                <h6 class="modal-title" id="ModalLabel">Nuevo plan de tesis</h6> <br>
                <form>
                    <input class="form-control form-control-sm" type="text" placeholder="Título"> <br>
                    <select class="form-select form-select-sm">
                        <option selected>Asesor</option>
                        <option>Roger Vergara</option>
                        <option>Hugo Solorsano</option>
                        <option>Anne Lyon</option>
                    </select> <br>
                    <select class="form-select form-select-sm">
                        <option selected>Área</option>
                        <option>Ingeniería de Sistemas</option>
                        <option>Ingeniería Informatica</option>
                        <option>Ingenierá Ambiental</option>
                    </select> <br>
                    <input class="form-control form-control-sm" type="text" placeholder="Tema"> <br>
                    <input class="form-control form-control-sm" type="text" placeholder="Modalidad"> <br>
                    <input class="form-control form-control-sm" type="date" placeholder="Fecha de Termino"> <br>
                </form>
            </div>
            <div class="modal-footer" style="background-color: #f0f4f7">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Crear</button>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalToggle1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel1" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
                <h6 class="modal-title" id="ModalLabel">Seguimiento del plan</h6> <br>
                <table class="table table-borderless table-sm">
                    <tr>
                        <td>Asesor</td>
                        <td class="fw-light">Roger Vergara</td>
                    </tr>
                    <tr>
                        <td>Resolución</td>
                        <td class="fw-light">9900</td>
                    </tr>
                    <tr>
                        <td>Título</td>
                        <td class="fw-light">Crear un sistema de alerta movil sobre desbalanchamiento de lagunas cercanas</td>
                    </tr>
                    <tr>
                        <td>Observación</td>
                        <td class="fw-light">Se tiene que mejorar el titulo.</td>
                    </tr>
                    <tr>
                        <td>Avance</td>
                        <td class="fw-light">29%</td>
                    </tr>
                    <tr>
                        <td>Inicio</td>
                        <td class="fw-light">9NOV.2021</td>
                    </tr>
                    <tr>
                        <td>Fin</td>
                        <td class="fw-light">9FEB.2021</td>
                    </tr>
                    <tr>
                        <td>Tiempo</td>
                        <td class="fw-light">92 días</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer" style="background-color: #f0f4f7">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Aceptar</button>
            </div>
          </div>
        </div>
    </div>

</body>
</html>