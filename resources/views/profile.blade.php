@extends('layouts.app')

@section('name_module')
    <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Profil del Usuario</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Perfil del usuario
                    </li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
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
                                        <form class="form-horizontal form-user-profile row mt-2" action="{{ route('user.update', ['id' => $info->id]) }}">
                                            <div class="col-6">
                                                <fieldset class="form-label-group">
                                                    <input name="document" type="text" class="form-control" id="first-name"
                                                        value="{{ $info->document }}" required="" autofocus="">
                                                    <label for="first-name">Documento</label>
                                                </fieldset>
                                            </div>
                                            <div class="col-6">
                                                <fieldset class="form-label-group">
                                                    <input name="fullname" type="text" class="form-control" id="last-name"
                                                        value="{{ $info->fullname }}" required="" autofocus="">
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
                                                    <input name="email" type="text" class="form-control" id="email-address"
                                                        value="{{ $info->email }}" required="" autofocus="">
                                                    <label for="email-address">Email</label>
                                                </fieldset>
                                            </div>
                                            <div class="col-6">
                                                <fieldset class="form-label-group">
                                                    <input name="password_new" type="password" class="form-control" id="old-password"
                                                        placeholder="Enter Password" autofocus="">
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
                                                    <select name="role" type="text" class="form-control" id="first-name" autofocus="">
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-6">
                                                <fieldset class="form-label-group">
                                                    <select name="profession" type="text" class="form-control" id="first-name" required="" autofocus="">
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
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title text-center">ATENCIONES</h6>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="text-center row clearfix mb-2">
                            <div class="col-12">
                                <i
                                    class="icon-layers font-large-3 bg-warning bg-glow white rounded-circle p-3 d-inline-block"></i>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-de mb-0">
                            <tbody>
                                <tr>
                                    <td>CIC Token</td>
                                    <td><i class="icon-layers"></i> 3,258 CIC</td>
                                </tr>
                                <tr>
                                    <td>CIC Referral</td>
                                    <td><i class="icon-layers"></i> 200.88 CIC</td>
                                </tr>
                                <tr>
                                    <td>CIC Price</td>
                                    <td><i class="cc BTC-alt"></i> 0.0001 BTC</td>
                                </tr>
                                <tr>
                                    <td>Raised BTC</td>
                                    <td><i class="cc BTC-alt"></i> 2154 BTC</td>
                                </tr>
                                <tr>
                                    <td>Raised USD</td>
                                    <td><i class="la la-dollar"></i> 4.52 M</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title text-center">Cantidad atencipon a pacientes</h6>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="progress progress-sm my-1 box-shadow-2">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 65%"
                                aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="font-small-3 clearfix">
                            <span class="float-left">Distributed <br> <strong>6,235</strong></span>
                            <span class="float-right text-right">Contributed <br> <strong>5478 ETH | 80
                                    BTC</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
