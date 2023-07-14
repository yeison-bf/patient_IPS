@extends('layouts.app')

@section('name_module', 'Profesiones')

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
    <div class="col-lg-12 vh-100">
        <div class="row  ">
            <div class="row col-md-12">
                <div class="col-lg-3" id="formularioPermisosRegistrar">
                    <!-- Creación Roles -->
                    <section id="menuLateralRoles" class="card">
                        <div class="card-header">
                            <h5>Registro de profesiones</h5>
                        </div>
                        <div class="card-body col-lg-12">
                            <form id="roleForm" method="POST" action="/professions">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">Nombre</label>
                                        <input type="text" name="nameProfession" class="form-control" id="nameProfession"
                                            aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="form-group form-check">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
                <div class="col-lg-9">
                    <!-- Listado roles -->
                    <section class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="dropdown-divider mb-5"></div>
                                <table id="table_professions" class="table dt-responsive table-sm table-striped nowrap"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Nombre</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($professions as $profession)
                                            <tr>
                                                <td>{{ $count }}</td>
                                                <td>{{ $profession->name }}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button
                                                            onclick="verFormularioEditar({{ $profession->id }},'{{ $profession->name }}')"
                                                            title="Editar información" type="button"
                                                            class="btn btn-success"><i
                                                                class="fa-regular fa-pen-to-square"></i></button>
                                                        {{-- <button --}}
                                                            {{-- title="Editar información" type="button" --}}
                                                            {{-- class="btn btn-danger"><i class="fa-solid fa-trash"></i></button> --}}
                                                    </div>
                                                </td>
                                            </tr>
                                            @php
                                                $count++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3" id="formularioPermisosEditar" style="display: none">
                    <!-- Creación Roles -->
                    <section id="menuLateralRoles" class="card">
                        <div class="card-header">
                            <h5>Edición de profesiones</h5>
                        </div>
                        <div class="card-body col-lg-12">
                            <form id="roleForm" method="POST" action="/professionsUpdate">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">Nombre</label>
                                        <input type="text" name="namePrfesionEdit" class="form-control" id="namePrfesionEdit"
                                            aria-describedby="emailHelp">
                                        <input hidden type="text" name="idProfessionEdit" class="form-control" id="idProfessionEdit">

                                    </div>
                                </div>
                                <div class="form-group form-check">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <button onclick="cancelarEditar()" type="button"
                                        class="btn btn-danger">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>
        function verFormularioEditar(id, name) {
            $("#formularioPermisosRegistrar").hide();
            $("#formularioPermisosEditar").show();

            $("#idProfessionEdit").val(id);
            $("#namePrfesionEdit").val(name);
        }



        function cancelarEditar() {
            $("#formularioPermisosRegistrar").show();
            $("#formularioPermisosEditar").hide();
        }

        function validateForm() {

            // Obtener referencias a los elementos del formulario
            var form = document.getElementById('roleForm');
            var nameRoleInput = document.getElementById('nameProfession');
            // Agregar un evento 'input' al campo del rol y a los checkboxes de permisos
            nameRoleInput.addEventListener('input', validateForm);

            // Verificar si el campo del rol está vacío
            var isNameRoleEmpty = nameRoleInput.value.trim() === '';

            // Habilitar o deshabilitar el botón 'Guardar' según las condiciones
            var saveButton = form.querySelector('button[type="submit"]');
            saveButton.disabled = isNameRoleEmpty
        }

        $(document).ready(() => {
       
       $('#table_professions').DataTable({
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

       validateForm()
   });
    </script>

@endsection
