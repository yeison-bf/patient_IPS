    <div class="sidebar" data-color="white" data-active-color="danger" style="overflow-x: hidden;">
        <div class="logo">
            <a href="{{ route('home') }}" class="simple-text logo-mini">
                <div class="logo-image-small">
                    <img src="{{ asset('build/assets/img/logo-small.png') }}">
                </div>
                <!-- <p>CT</p> -->
            </a>
            <a href="{{ route('home') }}" class="simple-text logo-normal">
                <Main>ATENCIÓN PUNTUAL</Main>
                <!-- <div class="logo-image-big">
            <img src="{{ asset('build/assets/img/logo-big.png') }}">
          </div> -->
            </a>
        </div>
        <div class="sidebar-wrapper" style="overflow-x: hidden;">
            <ul class="nav">
                <li class="active ">
                    <a href="{{ route('home') }}">
                        <i class="nc-icon nc-bank"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                {{-- Configuraciones --}}
                <li>
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="nc-icon nc-settings"></i>
                        <small style="font-size: 0.8rem" class="p">Configuraciones</small>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg-right border">
                        <a href="{{ route('roles.list') }}" class="dropdown-item" type="button"><i class="fa-solid fa-caret-right"></i>Roles</a>
                        <a href="{{ route('professions.list') }}" class="dropdown-item" type="button"><i class="fa-solid fa-caret-right"></i>Profesiones</a>
                    </div>
                </li>

                {{-- Pacientes --}}
                <li>
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-users"></i>
                        <small style="font-size: 0.8rem" class="p">Pacientes</small>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg-right border">
                        <a href="{{ route('patiens.list') }}" class="dropdown-item" type="button"><i class="fa-solid fa-caret-right"></i>Pacientes</a>
                        <a class="dropdown-item" type="button"><i class="fa-solid fa-caret-right"></i>Historias clinicas</a>
                    </div>
                </li>

                {{-- Especialistas --}}
                <li>
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user-tie"></i>
                        <small style="font-size: 0.8rem" class="p">Especialistas</small>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg-right border">
                        <a href="{{ route('specialists.list') }}" class="dropdown-item" type="button"><i class="fa-solid fa-caret-right"></i>Especialistas</a>
                        <a class="dropdown-item" type="button"><i class="fa-solid fa-caret-right"></i>Turnos</a>
                    </div>
                </li>

                {{-- Atenciones --}}
                <li>
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-kit-medical"></i>
                        <small style="font-size: 0.8rem" class="p">Atenciones</small>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg-right border">
                        <a href="{{ route('specialists.list') }}" class="dropdown-item" type="button"><i class="fa-solid fa-caret-right"></i>Citas</a>
                        <a class="dropdown-item" type="button"><i class="fa-solid fa-caret-right"></i>Agendas</a>
                    </div>
                </li>


                
                <li class="active-pro">
                    <a href="./upgrade.html">
                        <i class="nc-icon nc-spaceship"></i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
