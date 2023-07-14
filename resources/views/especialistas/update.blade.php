@extends('layouts.app')
@section('name_module', "Registro del Especialistas")

@section('content')
    <div class="row h-100">
        <div class="col-md-12 h-100 col-md-12">
            <section class="card">
                <div class="card-content">
                    <div class="card-body p-5">
                        <div class="row">
                            <form class="col-md-12" method="POST" action="/especislists/{{$user->id}}">
                                @csrf
                                <h4>Información básica</h4>
                                <div class="dropdown-divider"></div>
                                
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Documento</label><small
                                                class="text-danger h5">*</small>
                                            <input type="number" value="{{$user->document}}" name="documento" class="form-control"
                                                id="documento" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nombres</label><small
                                                class="text-danger h5">*</small>
                                            <input value="{{$user->name}}" type="text" name="nombres" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Apellidos</label> <small
                                                class="text-danger h5">*</small>
                                            <input value="{{$user->lastname}}" type="text" name="apellidos" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Rol</label><small
                                                class="text-danger h5">*</small>
                                            <select placeholder="Seleccione..." list="dataListSexo" name="roles"
                                                id="search-input-pais" class="form-control">
                                                @foreach ($roles as $role)
                                                    @if ($role->id === $user->role)
                                                        <option selected value="{{ $role->id }}">
                                                           {{ $role->name }}</option>
                                                    @else
                                                        <option value="{{ $role->id }}">
                                                            {{ $role->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label><small
                                                class="text-danger h5">*</small>
                                            <input value="{{$user->email}}" name="email"  id="fecha_nacimiento"
                                                type="email" class="form-control" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Password</label><small
                                                class="text-danger h5">*</small>
                                            <input value="************************" readonly type="password"  class="form-control" 
                                                 aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mt-4">Información de contacto</h4>
                                <div class="dropdown-divider"></div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Profesión</label><small
                                                class="text-danger h5">*</small>
                                            <select placeholder="Seleccione..." list="dataListPais" name="profesion"
                                                id="search-input-pais" class="form-control">
                                                <option selected>Seleccione</option>
                                                @foreach ($professions as $profesion)
                                                    @if ($profesion->id === $user->profesion)
                                                    <option selected value="{{ $profesion->id }}">
                                                       {{ $profesion->name }}</option>
                                                @else
                                                    <option value="{{ $profesion->id }}">
                                                        {{ $profesion->name }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Ciudad / Municipio</label><small
                                                class="text-danger h5">*</small>
                                            <input value="{{$user->city}}" type="text" class="form-control" name="ciudad"
                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Dirección</label><small
                                            class="text-white h5">*</small>
                                            <input value="{{$user->location}}" type="text" name="direccion" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Celular</label><small
                                                class="text-danger h5">*</small>
                                            <input value="{{$user->numberPhone}}" type="number" name="celular" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp">
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
                                    <button type="submit" class="btn btn-primary">Guardar registro</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
