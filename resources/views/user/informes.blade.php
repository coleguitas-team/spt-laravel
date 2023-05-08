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
                    <h3>Informes de tesis</h3>
                </td>
                <td style="text-align: center;">
                    <div class="btn-group">
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
                <td>Desarrollar y diseñar sistema web para control en comedor universitario</td>
                <td>Nayrobe Marcellano</td>
                <td>Ingeniería de Sistemas</td>
                <td>Desarrollo y Programación de Sistemas de Gestión</td>
                <td>Desarrollo de Tesis</td>
                <td>Modalidad de Tesis</td>
                <td>9NOV.2021</td>
                <td>9FEB.2022</td>
              </tr>
              <tr>
                <th scope="row">
                    <button class="btn btn-outline-secondary btn-sm" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">
                        <i class="bi bi-file-earmark-text"></i>
                    </button>
                </th>
                <td>Gestión de los ejes estrategicos de gestion en rectorado de la UNT</td>
                <td>Kenet Bustamante</td>
                <td>Ingeniería de Sistemas</td>
                <td>Implementación de Sistemas de Información Conputarizados Integrales</td>
                <td>Calificación de Tesis</td>
                <td>Modalidad de Tesis</td>
                <td>6AGO.2021</td>
                <td>6DEC.2021</td>
              </tr>
              <tr>
                <th scope="row">
                    <button class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-file-earmark-text"></i>
                    </button>
                </th>
                <td>Implementacion de un sistema web para mejorar procesos de bienestar universitario</td>
                <td>Clinton Huaman</td>
                <td>Ingeniería de Sistemas</td>
                <td>Desarrollo y Programación de Sistemas de Gestión</td>
                <td>Desarrollo de Tesis</td>
                <td>Programa de Titulación Profesional</td>
                <td>21NOV.2021</td>
                <td>21FEB.2022</td>
              </tr>
            </tbody>
          </table>
    </div>

    <div class="modal fade" id="exampleModalToggle1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel1" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" id="ModalLabel">Seguimiento del tesista</h6>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless table-sm">
                    <tr>
                        <td>Asesor</td>
                        <td class="fw-light">Nayrobe Marcellano</td>
                    </tr>
                    <tr>
                        <td>Resolución</td>
                        <td class="fw-light">9901</td>
                    </tr>
                    <tr>
                        <td>Título</td>
                        <td class="fw-light">Desarrollar y diseñar sistema web para control en comedor universitario</td>
                    </tr>
                    <tr>
                        <td>Observación</td>
                        <td class="fw-light">Mal hecho. Rehacer.</td>
                    </tr>
                    <tr>
                        <td>Avance</td>
                        <td class="fw-light">21%</td>
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
                <div class="input-group input-group-sm mb-3">
                    <input type="url" class="form-control" placeholder="Documento (Liga)">
                </div>
            </div>
            <div class="modal-footer" style="background-color: #f0f4f7">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Aceptar</button>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" id="ModalLabel">Calificación del informe</h6>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless table-sm">
                    <tr>
                        <td>Asesor</td>
                        <td class="fw-light">Kenet Bustamante</td>
                    </tr>
                    <tr>
                        <td>Presidente</td>
                        <td class="fw-light">Cesar Narro</td>
                    </tr>
                    <tr>
                        <td>Secretario</td>
                        <td class="fw-light">Marilynn Pineda</td>
                    </tr>
                    <tr>
                        <td>Vocal</td>
                        <td class="fw-light">Esteban Medina</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="table-light">Calificación</td>
                    </tr>
                    <tr>
                        <td>Presidente</td>
                        <td class="fw-light">16</td>
                    </tr>
                    <tr>
                        <td>Secretario</td>
                        <td class="fw-light">16</td>
                    </tr>
                    <tr>
                        <td>Vocal</td>
                        <td class="fw-light">17</td>
                    </tr>
                    <tr>
                        <td>Promedio</td>
                        <td class="fw-light">16</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer" style="background-color: #f0f4f7">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Aceptar</button>
            </div>
          </div>
        </div>
    </div>

</body>
</html>