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
                <li>
                    <a href="{{ route('patiens.list') }}">
                        <i class="nc-icon nc-single-02"></i>
                        <p>Pacientes</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('specialists.list') }}">
                        <i class="nc-icon nc-single-02"></i>
                        <p>Especialistas</p>
                    </a>
                </li>
                <li>
                    <a href="./notifications.html">
                        <i class="nc-icon nc-bell-55"></i>
                        <p>Notifications</p>
                    </a>
                </li>
                <li>
                    <a href="./user.html">
                        <i class="nc-icon nc-single-02"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="./tables.html">
                        <i class="nc-icon nc-tile-56"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li>
                    <a href="./typography.html">
                        <i class="nc-icon nc-caps-small"></i>
                        <p>Typography</p>
                    </a>
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
