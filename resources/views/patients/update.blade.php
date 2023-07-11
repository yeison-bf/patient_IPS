@extends('layouts.app')
@section('name_module', "Actualización del Paciente")

@section('content')
    <div class="row h-100">
        <div class="col-md-12 h-100 col-md-12">
            <section class="card">
                <div class="card-content">
                    <div class="card-body p-5">
                        <div class="row">
                            <form class="col-md-12" method="POST" action="/patientEdit/{{$patients->id}}">
                                @csrf
                                <h4>Información básica</h4>
                                <div class="dropdown-divider"></div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tipo documento</label> <small
                                                class="text-danger h5">*</small>
                                            <select placeholder="Seleccione..." list="dataListTipoDocumento"
                                                name="tipoDocvumento" id="search-input-pais" class="form-control">
                                                <option selected>Seleccione</option>
                                                @foreach ($typeDocuments as $typeDocument)
                                                    @if ($typeDocument->id == $patients->type_document)
                                                        <option selected value="{{ $typeDocument->id }}">
                                                            {{ $typeDocument->name }}</option>
                                                    @else
                                                        <option value="{{ $typeDocument->id }}">
                                                            {{ $typeDocument->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Documento</label><small
                                                class="text-danger h5">*</small>
                                            <input value="{{ $patients->document }}" type="number" name="documento"
                                                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Expedición</label><small
                                                class="text-danger h5">*</small>
                                            <input value="{{ $patients->expedition }}" placeholder="Seleccione..." list="dataList" name="expedicion"
                                                id="search-input" class="form-control">
                                            <datalist id="dataList">
                                                @foreach ($dataCity as $item)
                                                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                                @endforeach
                                            </datalist>

                                            <script>
                                                var dataList = document.getElementById('dataList');
                                                var input = document.getElementById('search-input');

                                                input.addEventListener('input', function(e) {
                                                    var selectedId = e.target.value;
                                                    var selectedName = '';

                                                    for (var i = 0; i < dataList.options.length; i++) {
                                                        var option = dataList.options[i];

                                                        if (option.value === selectedId) {
                                                            selectedName = option.text;
                                                            break;
                                                        }
                                                    }
                                                    input.value = selectedName || e.target.value;
                                                });
                                            </script>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Primer nombre</label><small
                                                class="text-danger h5">*</small>
                                            <input value="{{ $patients->name }}" type="text" name="primerNombre"
                                                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Segundo nombre</label>
                                            <input value="{{ $patients->second_name }}" type="text" name="segundoNombre"
                                                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Primer apellido</label> <small
                                                class="text-danger h5">*</small>
                                            <input value="{{ $patients->surname }}" type="text" name="primerApellido"
                                                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Segundo apellido</label>
                                            <input value="{{ $patients->second_Surname }}" type="text"
                                                name="segundoApellido" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Sexo</label><small
                                                class="text-danger h5">*</small>
                                            <select placeholder="Seleccione..." list="dataListSexo" name="sexo"
                                                id="search-input-pais" class="form-control">
                                                <option selected>Seleccione</option>
                                                @foreach ($sexes as $sex)
                                                    @if ($sex->id == $patients->sex)
                                                        <option selected value="{{ $sex->id }}">
                                                            {{ $sex->name }}</option>
                                                    @else
                                                        <option value="{{ $sex->id }}">
                                                            {{ $sex->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Fecha de nacimiento</label><small
                                                class="text-danger h5">*</small>
                                            <input value="{{ $patients->birth_date }}" name="fechsNacimiento"
                                                onchange="calcularEdad()" id="fecha_nacimiento" type="date"
                                                class="form-control" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Edad</label><small
                                                class="text-danger h5">*</small>
                                            <input value="{{ $patients->age }}" type="number" name="edad"
                                                class="form-control" readonly id="edadPaciente"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mt-4">Información de contacto</h4>
                                <div class="dropdown-divider"></div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pais</label><small
                                                class="text-danger h5">*</small>
                                            <select placeholder="Seleccione..." list="dataListPais" name="pais"
                                                id="search-input-pais" class="form-control">
                                                <option selected>Seleccione</option>
                                                @foreach ($countries as $country)
                                                    @if ($country->id == $patients->pais)
                                                        <option selected value="{{ $country->id }}">
                                                            {{ $country->name }}</option>
                                                    @else
                                                        <option value="{{ $country->id }}">
                                                            {{ $country->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Ciudad / Municipio</label><small
                                                class="text-danger h5">*</small>
                                            <input value="{{ $patients->city }}" type="text" class="form-control"
                                                name="ciudad" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Dirección</label>
                                            <input value="{{ $patients->location }}" type="text" name="direccion"
                                                class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Estrato</label><small
                                                class="text-danger h5">*</small>
                                            <input value="{{ $patients->estrato }}" type="number" name="estrato"
                                                class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Celular</label><small
                                                class="text-danger h5">*</small>
                                            <input value="{{ $patients->celular }}" type="number" name="celular"
                                                class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Telefono residencia</label>
                                            <input value="{{ $patients->telefono }}" type="number" name="telefono"
                                                class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">E-mail</label><small
                                                class="text-danger h5">*</small>
                                            <input value="{{ $patients->email }}" type="email" name="email"
                                                class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Estado civil</label>
                                            <select type="text" name="estadoCivil" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                                @foreach ($stateCivils as $stateCivil)
                                                    @if ($stateCivil->id == $patients->estadoCivil)
                                                        <option selected value="{{ $stateCivil->id }}">
                                                            {{ $stateCivil->name }}</option>
                                                    @else
                                                        <option value="{{ $stateCivil->id }}">
                                                            {{ $stateCivil->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mt-4">Información medica</h4>
                                <div class="dropdown-divider"></div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Regimen</label><small
                                                class="text-danger h5">*</small>
                                            <select placeholder="Seleccione..." list="dataListRegimen" name="regimen"
                                                id="search-input-pais" class="form-control">
                                                <option selected>Seleccione</option>
                                                @foreach ($regimenEPSs as $regimenEPS)
                                                    @if ($regimenEPS->id == $patients->regimen)
                                                        <option selected value="{{ $regimenEPS->id }}">
                                                            {{ $regimenEPS->name }}</option>
                                                    @else
                                                        <option value="{{ $regimenEPS->id }}">
                                                            {{ $regimenEPS->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Administradora de salud</label><small
                                                class="text-danger h5">*</small>
                                            <input value="{{ $patients->eps }}" type="text" name="eps"
                                                class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        <div class="form-group form-check">
                                            <input checked type="checkbox" name="terminosCondiciones" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Acepto terminos y
                                                condiciones</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary"
                                        data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Actualizar registro</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


    <script>
        function calcularEdad() {
            var fechaNacimiento = document.getElementById('fecha_nacimiento').value;
            var hoy = new Date();
            var fechaNac = new Date(fechaNacimiento);
            var edad = hoy.getFullYear() - fechaNac.getFullYear();
            var mes = hoy.getMonth() - fechaNac.getMonth();

            if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNac.getDate())) {
                edad--;
            }

            //   return edad;
            console.log(edad);
            document.getElementById('edadPaciente').value = edad;

        }
    </script>
@endsection
