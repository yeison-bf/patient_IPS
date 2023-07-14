@extends('layouts.app')

@section('name_module', 'Roles')

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
                            <h5>Registro de Rol</h5>
                        </div>
                        <div class="card-body col-lg-12">
                            <form id="roleForm" method="POST" action="/roles">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">Nombre del rol</label>
                                        <input type="text" name="nameRole" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                Modulos
                                            </div>
                                            <div class="card-body">
                                                @foreach ($permissions as $permission)
                                                    <div class="custom-control custom-switch">
                                                        <input value="{{ $permission->id }}" name="permissionList[]"
                                                            type="checkbox"
                                                            {{ $permission->name == 'INICIO' ? 'checked' : '' }}
                                                            class="custom-control-input" id="{{ $permission->id }}">
                                                        <label class="custom-control-label" for="{{ $permission->id }}">
                                                            {{ $permission->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
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
                                <div class="row d-flex justify-content-end align-content-end pr-5">
                                    
                                </div>
                                <div class="dropdown-divider mb-5"></div>
                                <table id="table_roles" class="table dt-responsive table-sm table-striped nowrap"
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
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td>{{ $count }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button
                                                            onclick="verFormularioEditar({{ $role->id }},'{{ $role->name }}',{{ $role->permissions }})"
                                                            title="Editar información" type="button"
                                                            class="btn btn-success"><i
                                                                class="fa-regular fa-pen-to-square"></i></button>

                                                        <div class="btn-group" role="group">
                                                            <button type="button" title="Ver permisos"
                                                                class="btn btn-secondary dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-solid fa-eye"></i> Ver permisos
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                @foreach ($role->permissions as $permission)
                                                                    <a class="dropdown-item"
                                                                        href="#">{{ $permission->name }}</a>
                                                                @endforeach
                                                            </div>
                                                        </div>

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
                            <h5>Edición de Rol</h5>
                        </div>
                        <div class="card-body col-lg-12">
                            <form id="roleForm" method="POST" action="/rolesEditar">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">Nombre del rol</label>
                                        <input type="text" name="nameRoleEditar" class="form-control" id="nameRoleEditar"
                                            aria-describedby="emailHelp">
                                        <input hidden type="text" name="idRoleEditar" class="form-control" id="idRoleEditar">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                Modulos
                                            </div>
                                            <div class="card-body">
                                                @foreach ($permissions as $permission)
                                                    <div class="custom-control custom-switch">
                                                        <input onclick="verFormularioEditar('{{ $role->name }}', $permissions)" value="{{ $permission->id }}" name="permissionListEditar[]"
                                                            type="checkbox"
                                                            class="elementoCreadiEditar custom-control-input"
                                                            id="p_{{ $permission->id }}">
                                                        <label class="custom-control-label" for="p_{{ $permission->id }}">
                                                            {{ $permission->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
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
        function verFormularioEditar(id, name, data) {
            $("#formularioPermisosRegistrar").hide();
            $("#formularioPermisosEditar").show();

            $("#idRoleEditar").val(id);
            $("#nameRoleEditar").val(name);

            for (let i = 0; i < 40; i++) {
                $("#p_" + i).prop("checked", false);
            }

            data.forEach(function(permissionId) {
                $("#p_" + permissionId.id).prop("checked", true);
            });

        }

        

        function cancelarEditar() {
            $("#formularioPermisosRegistrar").show();
            $("#formularioPermisosEditar").hide();
        }

        function validateForm() {

            // Obtener referencias a los elementos del formulario
            var form = document.getElementById('roleForm');
            var nameRoleInput = document.getElementById('exampleInputEmail1');
            var permissionCheckboxes = document.querySelectorAll('input[name="permissionList[]"]');

            // Agregar un evento 'input' al campo del rol y a los checkboxes de permisos
            nameRoleInput.addEventListener('input', validateForm);
            permissionCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', validateForm);
            });

            // Verificar si el campo del rol está vacío
            var isNameRoleEmpty = nameRoleInput.value.trim() === '';

            // Verificar si al menos un checkbox de permiso está seleccionado
            var isAnyPermissionChecked = Array.from(permissionCheckboxes).some(function(checkbox) {
                return checkbox.checked;
            });

            // Habilitar o deshabilitar el botón 'Guardar' según las condiciones
            var saveButton = form.querySelector('button[type="submit"]');
            saveButton.disabled = isNameRoleEmpty || !isAnyPermissionChecked;
        }

        $(document).ready(() => {
       
            $('#table_roles').DataTable({
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
