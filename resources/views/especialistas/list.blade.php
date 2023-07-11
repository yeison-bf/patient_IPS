@extends('layouts.app')
{{-- @include('../modals.modals') --}}

@section('name_module', "Especialistas")
    
@section('content')

<style>
    div.dataTables_wrapper div.dataTables_filter input {
  margin-left: 0.5em;
  display: inline-block;
  width: 300px;
  height: 40px;
  margin: 20px 0 20px 0;
}

</style>
    <div class="row h-100">
        <div class="col-12 h-100 col-md-12">
            <!-- User Profile -->
            <section class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row d-flex justify-content-end align-content-end pr-5">
                            <a href="{{route('show.register')}}" class="btn btn-primary">Nuevo
                                profesional</a>
                        </div>
                        <div class="dropdown-divider mb-5"></div>
                        <table id="table_especialistas" class="table dt-responsive table-sm table-striped nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>T/D</th>
                                    <th>Documento</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Especialidad</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody> 
                                    <tr>
                                        <td>CC</td>
                                        <td>1051822599</td>
                                        <td>Rafael Gustavo</td>
                                        <td>Barrios Gutierrez</td>
                                        <td>CARDIOLOGO</td>
                                        <td>
                                            <button type="button" 
                                                class="btn btn-primary ">
                                                <i class="fa-solid fa-user-large"></i>
                                                Activo
                                            </button>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a  title="Editar información" type="button" class="btn btn-success"><i
                                                        class="fa-regular fa-pen-to-square"></i></a>
                                                <a  title="Historia clinica" type="button" class="btn btn-info"><i
                                                        class="fa-sharp fa-solid fa-laptop-medical"></i></a>
                                                <button title="Email" type="button" class="btn btn-light"><i
                                                        class="fa-regular fa-envelope"></i></button>
                                                <a title="Whatsaap" target="_black"  type="button" class="btn btn-success"><i
                                                        class="fa-brands fa-whatsapp"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#table_especialistas').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                "info": false,
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });

            
        });

        // function confirmEditar(id) {
        //     Swal.fire({
        //         title: '¿Estás seguro?',
        //         text: "Seguro quieres Inabilitar al paciente!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Si, estudoy seguro!',
        //         cancelButtonText: 'No, cancelar!'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             const form = document.createElement('form');
        //             form.method = 'POST';
        //             form.action = `/patientActive/${id}`;
        //             form.style.display = 'none';
        //             const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        //             const methodField = document.createElement('input');
        //             methodField.name = '_method';
        //             methodField.value = 'PUT';
        //             const csrfField = document.createElement('input');
        //             csrfField.name = '_token';
        //             csrfField.value = csrfToken;
        //             form.appendChild(methodField);
        //             form.appendChild(csrfField);
        //             document.body.appendChild(form);
        //             form.submit();
        //         }
        //     })
        // }
    </script>
@endsection
