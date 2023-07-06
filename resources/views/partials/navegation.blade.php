<nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-bg-color">
    <div class="navbar-wrapper">
        <div class="navbar-header d-md-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                        href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item d-md-none"><a class="navbar-brand" href="index.html"><img
                            class="brand-logo d-none d-md-block" alt="CryptoDash admin logo"
                            src="{{ asset('build/assets/images/logo/logo.png') }}"><img
                            class="brand-logo d-sm-block d-md-none" alt="CryptoDash admin logo sm"
                            src="{{ asset('build/assets/images/logo/logo-sm.png') }}"></a></li>
                <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse"
                        data-target="#navbar-mobile"><i class="la la-ellipsis-v"> </i></a></li>
            </ul>
        </div>
        <div class="navbar-container">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                            href="#"><i class="ft-menu"> </i></a></li>
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i
                                class="ficon ft-search"></i></a>
                        <div class="search-input">
                            <input class="input" type="text" placeholder="Explore CryptoDash...">
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                            href="#" data-toggle="dropdown">
                            <span class="avatar avatar-online"><img
                                    src="{{ asset('build/assets/images/portrait/small/avatar-s-1.png') }}"
                                    alt="avatar"></span><span class="mr-1"><span
                                    class="user-name text-bold-700">{{ Auth::user()->fullname }}&nbsp; &#160; </span><i class="fa-solid fa-caret-down"></i></span></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item">
                                <i class="ft-award"></i>{{ Auth::user()->fullname }}
                            </a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('user.profile', ['id' => Auth::user()->id]) }}"><i class="ft-user"></i>
                                Profile</a><a class="dropdown-item" href="wallet.html"><i class="icon-wallet"></i> My
                                Wallet</a><a class="dropdown-item" href="transactions.html"><i
                                    class="ft-check-square"></i> Transactions </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ft-power"></i>
                                <span class="d-sm-inline d-none">{{ __('Logout') }}</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
