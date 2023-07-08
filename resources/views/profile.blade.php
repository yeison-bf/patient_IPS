@extends('layouts.app')

@section('content')
    {{-- <div class="row">
        <div class="col-12 col-md-8">
            <!-- User Profile -->
            <section class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-2 col-12">
                                    <img src="{{ asset('build/assets/images/portrait/medium/avatar-m-1.png') }}"
                                        class="rounded-circle height-100" alt="Card image" />
                                </div>
                                @foreach ($user as $info)
                                    <div class="col-md-10 col-12">
                                        <div class="row">
                                            <div class="col-12 col-md-8">
                                                <p class="text-bold-700 text-uppercase mb-0">Especialización</p>
                                                <p class="mb-0">{{ $info->name }}</p>
                                            </div>
                                        </div>
                                        <hr />
                                        <form class="form-horizontal form-user-profile row mt-2"
                                            action="{{ route('user.update', ['id' => $info->id]) }}">
                                            <div class="col-6">
                                                <fieldset class="form-label-group">
                                                    <input name="document" type="text" class="form-control"
                                                        id="first-name" value="{{ $info->document }}" required=""
                                                        autofocus="">
                                                    <label for="first-name">Documento</label>
                                                </fieldset>
                                            </div>
                                            <div class="col-6">
                                                <fieldset class="form-label-group">
                                                    <input name="fullname" type="text" class="form-control"
                                                        id="last-name" value="{{ $info->fullname }}" required=""
                                                        autofocus="">
                                                    <label for="last-name">Nombre completo</label>
                                                </fieldset>
                                            </div>
                                            <div class="col-6">
                                                <fieldset class="form-label-group">
                                                    <input readonly type="text" class="form-control" id="user-name"
                                                        value="{{ $info->email }}" required="" autofocus="">
                                                    <label for="user-name">Usuario</label>
                                                </fieldset>
                                            </div>
                                            <div class="col-6">
                                                <fieldset class="form-label-group">
                                                    <input name="email" type="text" class="form-control"
                                                        id="email-address" value="{{ $info->email }}" required=""
                                                        autofocus="">
                                                    <label for="email-address">Email</label>
                                                </fieldset>
                                            </div>
                                            <div class="col-6">
                                                <fieldset class="form-label-group">
                                                    <input name="password_new" type="password" class="form-control"
                                                        id="old-password" placeholder="Enter Password" autofocus="">
                                                    <label for="old-password">Nueva contraseña</label>
                                                </fieldset>
                                            </div>
                                            <div class="col-6">
                                                <fieldset class="form-label-group">
                                                    <input type="password" class="form-control" id="new-password"
                                                        placeholder="Enter Password" autofocus="">
                                                    <label for="new-password">Confirmación de la contraseña</label>
                                                </fieldset>
                                            </div>
                                            <div class="col-6">
                                                <fieldset class="form-label-group">
                                                    <select name="role" type="text" class="form-control"
                                                        id="first-name" autofocus="">
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-6">
                                                <fieldset class="form-label-group">
                                                    <select name="profession" type="text" class="form-control"
                                                        id="first-name" required="" autofocus="">
                                                        @foreach ($profession as $profession)
                                                            <option value="{{ $profession->id }}"
                                                                {{ $info->profession_id == $profession->id ? 'selected' : '' }}>
                                                                {{ $profession->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 text-right">
                                                <button type="submit" class="btn-gradient-primary my-1">Guardar</button>
                                            </div>
                                        </form>
                                        <h5>Link Página web</h5>
                                        <hr />
                                        <form class="form-horizontal form-referral-link row mt-2" action="index.html">
                                            <div class="col-12">
                                                <fieldset class="form-label-group">
                                                    <input type="text" class="form-control" id="referral-link"
                                                        value="https://yeisonPediatra.com/" required=""
                                                        autofocus="">
                                                    <label for="first-name">link pagina web</label>
                                                </fieldset>
                                            </div>
                                        </form>
                                        <h5 class="mt-3">Seguridad y Permisos</h5>
                                        <hr />
                                        <div class="row">
                                            <div class="col-9">
                                                <p>Agenda</p>
                                            </div>
                                            <div class="col-3">
                                                <input type="checkbox" id="switcherySize2" class="switchery"
                                                    data-size="sm" checked />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-9">
                                                <p>Pacientes</p>
                                            </div>
                                            <div class="col-3">
                                                <input type="checkbox" id="switcherySize2" class="switchery"
                                                    data-size="sm" />
                                            </div>
                                        </div>
                                    </div>


                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div> --}}

    @foreach ($user as $info)

        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{ asset('build/assets/img/damir-bosnjak.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray"
                                    src="{{ asset('build/assets/login/images/portrait/medium/avatar-m-1.png') }}"
                                    alt="...">
                                <h5 class="title"> {{ $info->name }}  {{ $info->lastname }}</h5>
                            </a>
                            <p class="description">
                                @ {{ $info->name }}
                            </p>
                        </div>
                        <p class="description text-center">
                            Profesional<br>
                            en la mejor atención <br>
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Contactos</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled team-members">
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <div class="avatar">
                                            <img src="{{ asset('build/assets/login/images/portrait/medium/avatar-m-1.png')}}" alt="Circle Image"
                                                class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        {{ $info->numberPhone }}
                                        <br />
                                        <span class="text-success"><small>WhatsApp</small></span>
                                    </div>
                                    <div class="col-md-3 col-3 text-right">
                                        <a target="_black" href="https://api.whatsapp.com/send?phone=57{{ $info->numberPhone }}&text=Hola%20%F0%9F%91%8B" class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                            class="fa-brands fa-whatsapp"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <div class="avatar">
                                            <img src="{{ asset('build/assets/login/images/portrait/medium/avatar-m-1.png')}}" alt="Circle Image"
                                                class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-ms-7 col-7">
                                        {{ $info->email }}
                                        <br />
                                        <span class="text-danger"><small>Email</small></span>
                                    </div>
                                    <div class="col-md-3 col-3 text-right">
                                        <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                                class="fa fa-envelope"></i></button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Edit Profile</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label>Profesión</label>
                                        <input type="text" class="form-control" disabled="" placeholder="Company"
                                            value="{{ $info->profesion }}">
                                    </div>
                                </div>
                                <div class="col-md-3 px-1">
                                    <div class="form-group">
                                        <label>Perfil</label>
                                        <input type="text" class="form-control" placeholder="Username"
                                            value="{{ $info->role }}">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input  value="{{ $info->email }}" type="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Nombres</label>
                                        <input type="text" class="form-control" placeholder="Company" value="{{ $info->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Apellidos</label>
                                        <input type="text" class="form-control" placeholder="Last Name"
                                            value="{{ $info->lastname }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Ciudad</label>
                                        <input type="text" class="form-control" placeholder="City" value="{{ $info->city }}">
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Dirección</label>
                                        <input type="text" class="form-control" placeholder="Country"
                                            value="{{ $info->location }}">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Celular</label>
                                        <input type="number" class="form-control" placeholder="ZIP Code" value="{{ $info->numberPhone }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Actualizar perfil</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
@endsection
