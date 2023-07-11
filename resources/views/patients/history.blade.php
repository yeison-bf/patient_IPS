@extends('layouts.app')
@section('name_module', "Historial medico del paciente")

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="row">
                <div class="col-lg-2">
                    <img src="{{ asset('build/assets/login/images/portrait/medium/avatar-m-1.png') }}" alt="...">
                </div>
                <div class="col-lg-8 p-3 pl-3">
                    @foreach ($patients as $patient)
                        <h5 class="title">{{ $patient->name }} {{ $patient->second_name }} {{ $patient->surname }}
                            {{ $patient->second_Surname }}</h5>
                        <p>
                            {{ $patient->document }}<br>
                            Sexo: {{ $patient->sex_name == 'M' ? 'Masculino' : 'Femenino' }} <br>
                            Edad: {{ $patient->age }} años <br>
                            Celular: {{ $patient->numberPhone }} <br>
                            Email: {{ $patient->email }} <br>
                            EPS: {{ $patient->eps }} <br>
                        </p>
                    @endforeach
                </div>
            </div>
        </div>

        <section class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="dropdown-divider mb-5"></div>
                    <table id="table_patients" class="table dt-responsive table-sm table-striped nowrap"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Código</th>
                                <th>Fecha Atención</th>
                                <th>Atención</th>
                                <th>Especialista</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody> 
                                <tr>
                                    <td>1</td>
                                    <td>526352412</td>
                                    <td>09/07/2023</td>
                                    <td>Pediatría</td>
                                    <td>Margoth Funieles Padilla</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a  title="Descargar PDF" type="button" class="btn btn-info"><i class="fa-regular fa-file-pdf"></i></a>
                                            <button title="Enviar por email" type="button" class="btn btn-light"><i
                                                    class="fa-regular fa-envelope"></i></button>
                                            <a title="Imprimir" type="button" class="btn btn-success"><i class="fa-solid fa-print"></i></a>
                                        </div>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
