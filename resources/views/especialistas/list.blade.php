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
                            <a href="{{route('show.registerEsp')}}" class="btn btn-primary">Nuevo
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
                                    <th>Role</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($users as $user)
                                    
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->document}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->lastname}}</td>
                                        <td>{{$user->professions_name}}</td>
                                        <td>{{$user->nameRole}}</td>
                                        <td>
                                            <button type="button" onclick="confirmActivación('{{ $user->id }}')"
                                                class="btn {{ $user['estado'] === 1 ? 'btn-primary' : 'btn-danger' }}">
                                                <i
                                                    class="fa-solid fa-{{ $user['estado'] === 1 ? 'user-large' : 'user-slash' }}"></i>
                                                {{ $user['estado'] === 1 ? 'Activo' : 'Inactivo' }}
                                            </button>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('specialists.show.edit', $user->id ) }}" title="Editar información" type="button" class="btn btn-success"><i
                                                        class="fa-regular fa-pen-to-square"></i></a>
                                                <button title="Email" type="button" class="btn btn-light"><i
                                                        class="fa-regular fa-envelope"></i></button>
                                                <a title="Whatsaap" target="_black" href="https://api.whatsapp.com/send?phone=57{{ $user->numberPhone }}&text=Hola%20%F0%9F%91%8B" type="button" class="btn btn-success"><i
                                                            class="fa-brands fa-whatsapp"></i></a>
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

        function confirmActivación(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¿Seguro quieres Activar/Inabilitar al profesional medico?",
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
                    form.action = `/especialistActive/${id}`;
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
