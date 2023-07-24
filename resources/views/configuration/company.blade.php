@extends('layouts.app')

@section('name_module', 'Agendamiento de citas')

@section('content')


    <div class="row h-100">
        <div class="col-12 h-100 col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        @if (session('mensaje'))
                            <script>
                                Swal.fire({
                                    title: 'Lo sentimos!',
                                    text: '{{ session('mensaje') }}',
                                    icon: 'warning',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Ok, aceptar!'
                                })
                            </script>
                        @endif

                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <h4>Logo de la empresa</h4>
                                        <div class="dropdown-divider mb-3"></div>
                                        <div class="form-group">
                                            <form action="{{ route('upload') }}" method="POST"
                                                style="border-style: dashed solid" class="dropzone" id="my-dropzone"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div id="my-dropzone" style="border-style: dashed ; color: gray">
                                                    <!-- Resto del formulario -->
                                                    <div class="dz-message">
                                                        Arrastra y suelta las imágenes aquí o haz clic para seleccionar
                                                        archivos.
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>


                                    <div class="col-md-7">
                                        <form action="{{ route('create.configuration') }}" method="POST">
                                            @csrf
                                            <h4>Información de la empresa</h4>
                                            <div class="dropdown-divider mb-3"></div>
                                            <div class="row">

                                                <input name="logo" type="text" id="rutaImagenGuardada" hidden>

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Nombre de la
                                                                    empresa</label><small class="text-danger h5">*</small>
                                                                <input type="text" name="razonSocial"
                                                                    class="form-control" id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp"
                                                                    value="{{ $company && $company->razonSocial ? $company->razonSocial : '' }}">

                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">NIT / CC</label><small
                                                                    class="text-danger h5">*</small>
                                                                <input type="text" name="nit" class="form-control"
                                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                    value="{{ $company && $company->nit ? $company->nit : '' }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Ciudad</label><small
                                                                    class="text-danger h5">*</small>
                                                                <input type="text" name="ciudad" class="form-control"
                                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                    value="{{ $company && $company->ciudad ? $company->ciudad : '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Dirección</label><small
                                                                    class="text-danger h5">*</small>
                                                                <input type="text" name="direccion" class="form-control"
                                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                    value="{{ $company && $company->direccion ? $company->direccion : '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Telefono</label><small
                                                                    class="text-danger h5">*</small>
                                                                <input type="number" name="telefono" class="form-control"
                                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                    value="{{ $company && $company->telefono ? $company->telefono : '' }}">
                                                            </div>
                                                        </div>
                                                    </div>

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

                            </div>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            Dropzone.autoDiscover = false;

            // Inicializar Dropzone
            var myDropzone = new Dropzone("#my-dropzone", {
                url: "{{ route('upload') }}",
                acceptedFiles: ".jpeg,.jpg,.png",
                maxFilesize: 2, // Tamaño máximo del archivo en MB
                maxFiles: 1, // Establece el límite de archivos a 1
                addRemoveLinks: true, // Mostrar enlaces para eliminar archivos cargados
                dictRemoveFile: "Eliminar archivo", // Texto para eliminar archivo
                dictDefaultMessage: "Haz clic aquí para seleccionar un archivo", // Mensaje para seleccionar archivos
                ignoreHiddenFiles: true, // Ignorar archivos ocultos (como los que se seleccionan por defecto en el área de soltar)
                dragover: function() {
                    this
                        .removeAllFiles(); // Elimina cualquier archivo que se haya arrastrado previamente
                },

                success: function(file, response) {
                    // Lógica adicional después de cargar la imagen con éxito
                    console.log("-> ", response);
                    $("#rutaImagenGuardada").val(response.success)
                },
                error: function(file, response) {
                    // Lógica para manejar errores de carga de imágenes
                    console.log("Error al cargar la imagen: ", response);
                }
            });
        });





        // Función para formatear el tamaño del archivo en megabytes
        function formatBytes(bytes, decimals = 2) {
            if (bytes === 0) {
                return '0 Bytes';
            }

            const k = 1024;
            const dm = decimals < 0 ? 0 : decimals;
            const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

            const i = Math.floor(Math.log(bytes) / Math.log(k));

            return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
        }


        Dropzone.autoDiscover = false;
    </script>

@endsection
