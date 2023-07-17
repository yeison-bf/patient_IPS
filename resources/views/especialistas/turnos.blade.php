@extends('layouts.app')

@section('name_module', 'Turnos del Especialista')

@section('content')
    <div class="row h-100">
        <div class="col-12 h-100 col-md-12">
            <div class="row">
                <div class="col-lg-3">
                    <section class="card">
                        <div class="card-content">
                            <div class="card-header">
                                <h4>Especialistas</h4>
                            </div>
                            <div class="card-body">
                                <input type="hidden" id="especialistaSeleccionado">
                                <table id="table_especialistas_turno" class="table table-sm nowra" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr style="border:none; margin: none">
                                                <td style="border:none; margin: none; padding:none"><button
                                                        id="especialista_{{ $user->id }}"
                                                        onclick="seleccionarEspecialista('{{ $user->id }}')"
                                                        style="margin: none; padding:none"class="btn btn-success btn-sm col-12 text-left">{{ $user->name }}
                                                        {{ $user->lastname }}</button></td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-9">
                    <section class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="container">
                                    <div id="full_calendar_events"></div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>

        </div>
    </div>



    <script>
        $(document).ready(function() {

            $(document).ready(function() {
                $('#table_especialistas_turno').DataTable({
                    "language": {
                        "url": "{{ asset('assets/js/Spanish.json') }}"
                    },
                    "info": false,
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });

            var SITEURL = "{{ url('/') }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var events = {!! json_encode($eventsFormatted) !!};
            // 

            var calendar = $('#full_calendar_events').fullCalendar({
                editable: true,
                editable: true,
                events:  events,
                overlap: false,
                displayEventTime: true,
                type: "POST",
                eventRender: function(event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                selectable: true,
                selectHelper: true,
                select: function(event_start, event_end, allDay) {
                    var event_name = obtenerDato()

                    if (event_name != "") {
                        var event_start = $.fullCalendar.formatDate(event_start, "Y-MM-DD HH:mm:ss");
                        var event_end = $.fullCalendar.formatDate(event_end, "Y-MM-DD HH:mm:ss");
                        Swal.fire({
                            title: 'Crear cita!',
                            text: "¿Estas seguro, de programar este día?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Si, estoy seguro!',
                            cancelButtonText: 'No,cancelar!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                var datos = {
                                    event_name: event_name,
                                    event_start: event_start,
                                    event_end: event_end,
                                    type: 'create'
                                };
                                $.ajax({
                                    url: '/calendar-crud-ajax',
                                    type: 'POST',
                                    data: datos,
                                    dataType: 'json',
                                    success: function(response) {
                                        // Manejar la respuesta del servidor
                                        if (response.id > 0) {
                                            displayMessage("Turno agendado");
                                            for (let i = 0; i < 1000; i++) {
                                                $("#especialista_" + i).removeClass(
                                                    'btn-primary');
                                                $("#especialista_" + i).addClass(
                                                    'btn-success');
                                            }
                                        }
                                        // Realizar acciones adicionales si es necesario
                                    },
                                    error: function(xhr, status, error) {
                                        // Manejar los errores de la solicitud
                                        console.log(xhr.responseText);
                                    }
                                });

                                $('#especialistaSeleccionado').val("")
                            }
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Los sentimos! debes seleccionar un especialista',
                            showConfirmButton: false,
                        })
                    }

                },
                eventDrop: function(event, delta) {
                    var event_start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                    var event_end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                    $.ajax({
                        url: SITEURL + '/calendar-crud-ajax',
                        data: {
                            title: event.event_name,
                            start: event_start,
                            end: event_end,
                            id: event.id,
                            type: 'edit'
                        },
                        type: "POST",
                        success: function(response) {
                            displayMessage("Event updated");
                        }
                    });
                },
                eventClick: function(event) {
                    var eventDelete = confirm("Are you sure?");
                    if (eventDelete) {
                        $.ajax({
                            type: "POST",
                            url: SITEURL + '/calendar-crud-ajax',
                            data: {
                                id: event.id,
                                type: 'delete'
                            },
                            success: function(response) {
                                calendar.fullCalendar('removeEvents', event.id);
                                displayMessage("Event removed");
                            }
                        });
                    }
                }
            });
        });

        function obtenerDato() {
            return $('#especialistaSeleccionado').val()
        }

        function displayMessage(message) {
            toastr.success(message, 'Event');
        }

        function seleccionarEspecialista(id) {

            for (let i = 0; i < 1000; i++) {
                $("#especialista_" + i).removeClass('btn-primary');
                $("#especialista_" + i).addClass('btn-success');
            }

            $("#especialista_" + id).removeClass('btn-success');
            $("#especialista_" + id).addClass('btn-primary');
            $('#especialistaSeleccionado').val(id)
        }
    </script>
@endsection
