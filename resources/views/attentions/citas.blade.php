@extends('layouts.app')

@section('name_module', 'Agendamiento de citas')

@section('content')


    <div class="row h-100">
        <div class="col-12 h-100 col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form class="col-md-12" method="POST" action="/patientsPost">
                                    @csrf
                                    <h4>Información del paciente</h4>
                                    <div class="dropdown-divider mb-3"></div>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label for="exampleInputEmail1">Documento del paciente</label><small
                                                class="text-danger h5">*</small>
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control"
                                                        aria-label="Recipient's username" aria-describedby="button-addon2">
                                                </div>
                                                <div class="col-lg-4">
                                                    <button class="btn btn-outline-secondary" type="button"><i
                                                            class="fa-solid fa-magnifying-glass"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Fecha solicitud</label>
                                                <input readonly style="background: none; border:none; color:black"
                                                    id="fechaActualCita" id="search-input-pais" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nombres y apellidos</label><small
                                                    class="text-danger h5">*</small>
                                                <input readonly style="background: none" type="text" name="primerNombre"
                                                    class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Fecha nacimiento</label>
                                                <input readonly style="background: none" type="text" name="segundoNombre"
                                                    class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Edad</label> <small
                                                    class="text-danger h5">*</small>
                                                <input readonly style="background: none" type="text"
                                                    name="primerApellido" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="mt-4">Agendamiento</h4>
                                    <div class="dropdown-divider mb-3"></div>
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Medio solicitud</label><small
                                                            class="text-danger h5">*</small>
                                                        <select placeholder="Seleccione..." name="medioSolicitud"
                                                            id="search-input-pais" class="form-control">
                                                            <option selected>Seleccione</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Tipo consulta</label><small
                                                            class="text-danger h5">*</small>
                                                        <select placeholder="Seleccione..." name="tipoConsulta"
                                                            id="search-input-pais" class="form-control">
                                                            <option selected>Seleccione</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Tipo de cita</label><small
                                                            class="text-danger h5">*</small>
                                                        <select placeholder="Seleccione..." name="tipoCita"
                                                            id="search-input-pais" class="form-control">
                                                            <option selected>Seleccione</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Especialista</label><small
                                                            class="text-danger h5">*</small>
                                                        <select placeholder="Seleccione..." name="medioSolicitud"
                                                            id="search-input-pais" class="form-control">
                                                            <option selected>Seleccione</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Documento</label><small
                                                            class="text-danger h5">*</small>
                                                        <input readonly style="background: none"
                                                            placeholder="Seleccione..." name="medioSolicitud"
                                                            id="search-input-pais" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Profesión</label><small
                                                            class="text-danger h5">*</small>
                                                        <input readonly style="background: none"
                                                            placeholder="Seleccione..." name="tipoCita"
                                                            id="search-input-pais" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Observación</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div id="calendario"></div>
                                        </div>
                                    </div>
                                    <div class="modal-footer mt-3">
                                        <button type="reset" class="btn btn-secondary"
                                            data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Guardar registro</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>


                </div>
            </div>

        </div>
    </div>
    <style>
        .highlight {
            background-color: blue;
            color: white;
        }
    </style>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Incluye jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        //   <script src="//code.jquery.com/jquery-3.6.0.min.js">
    </script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            var events = {!! json_encode($turnos) !!};

            $('#calendario').datepicker({
                beforeShowDay: function(date) {
                    var dateString = $.datepicker.formatDate('yy-mm-dd', date);
                    for (var i = 0; i < events.length; i++) {

                        if (events[i].event_start === dateString) {
                            return [true, 'highlight', events[i].title];
                        }
                    }
                    return [true];
                }
            });


            // Obtener referencia al elemento de input
            var fechaActualInput = document.getElementById('fechaActualCita');

            // Obtener la fecha actual
            var fechaActual = new Date();

            // Formatear la fecha actual según el formato deseado
            var options = {
                year: 'numeric',
                month: '2-digit',
                day: '2-digit'
            };
            var fechaFormateada = fechaActual.toLocaleDateString('es-ES', options);

            // Asignar la fecha formateada al valor del input
            fechaActualInput.value = fechaFormateada;
        });
    </script>
@endsection
