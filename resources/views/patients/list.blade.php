@extends('layouts.app')
@include('../modals.modals')

@section('name_module')
    <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Pacientes</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Listado de pacientes
                    </li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12">
            <!-- User Profile -->
            <section class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row d-flex justify-content-end align-content-end pr-5">
                            <button data-toggle="modal" data-target="#registerPatiens" class="btn btn-primary">Nuevo
                                paciente</button>
                        </div>
                        <div class="dropdown-divider mb-5"></div>
                        <table id="table_patients" class="table dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>T/D</th>
                                    <th>Documento</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Sexo</th>
                                    <th>Edad</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patients as $patient)
                                    <tr>
                                        <td>{{ $patient->type_document }}</td>
                                        <td>{{ $patient->document }}</td>
                                        <td>{{ $patient->name }} {{ $patient->second_name }}</td>
                                        <td>{{ $patient->surname }} {{ $patient->second_Surname }}</td>
                                        <td>
                                            <button type="button"
                                                class="btn {{ $patient['sex'] === 'M' ? 'btn-primary' : 'btn-danger' }}">
                                                <i class="fa-solid fa-{{ $patient['sex'] === 'M' ? 'mars' : 'venus' }}"></i>
                                                {{ $patient['sex'] === 'M' ? 'Hombre' : 'Mujer' }}
                                            </button>
                                        </td>
                                        <td>{{ $patient->age }} años</td>
                                        <td>
                                            <button type="button" onclick="confirmEditar('{{ $patient->id }}')"
                                                class="btn {{ $patient['estado'] === 1 ? 'btn-primary' : 'btn-danger' }}">
                                                <i
                                                    class="fa-solid fa-{{ $patient['estado'] === 1 ? 'user-large' : 'user-slash' }}"></i>
                                                {{ $patient['estado'] === 1 ? 'Activo' : 'Inactivo' }}
                                            </button>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button title="Ver datos" type="button" class="btn btn-primary"> <i
                                                        class="fa-solid fa-id-badge"></i></button>
                                                <button title="Editar información" type="button"
                                                        class="btn btn-success"><i
                                                        class="fa-regular fa-pen-to-square"></i></button>
                                                <button title="Historia clinica" type="button" class="btn btn-info"><i
                                                        class="fa-sharp fa-solid fa-laptop-medical"></i></button>
                                                <button title="Email" type="button" class="btn btn-light"><i
                                                        class="fa-regular fa-envelope"></i></button>
                                                <button title="Whatsaap" type="button" class="btn btn-success"><i
                                                        class="fa-brands fa-whatsapp"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#table_patients').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });

        function confirmEditar(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Seguro quieres Inabilitar al paciente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, estudoy seguro!',
                cancelButtonText: 'No, cancelar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/patientEdit/${id}`;
                    form.style.display = 'none';
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    const methodField = document.createElement('input');
                    methodField.name = '_method';
                    methodField.value = 'PUT';
                    const csrfField = document.createElement('input');
                    csrfField.name = '_token';
                    csrfField.value = csrfToken;
                    form.appendChild(methodField);
                    form.appendChild(csrfField);
                    document.body.appendChild(form);
                    form.submit();
                }
            })
        }
    </script>
@endsection
