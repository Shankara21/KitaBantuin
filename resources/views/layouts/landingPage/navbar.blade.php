<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav">
    <div class="container">
        <div class="site-navigation">
            <a href="/" class="logo m-0">k<span class="text-warning">IT</span>aBantuin.co</span>

                <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Beranda</a></li>
                    <li
                        class="has-children {{ Request::is('list-project') || Request::is('create-project') ? 'active' : '' }}">
                        <a href="#">Proyek</a>
                        <ul class="dropdown">
                            <li><a href="{{ route('list-project') }}"><i class="fa-solid fa-magnifying-glass"></i> Cari Proyek</a></li>
                            <li><a href="{{ route('create-project') }}"><i class="fa-solid fa-pen-to-square"></i> Buat Proyek</a></li>
                        </ul>
                    </li>

                    <li class="{{ Request::is('list-worker') ? 'active' : '' }}"><a
                            href="{{ route('worker') }}">Pekerja</a>
                    </li>
                    
                    <li
                        class="has-children {{ Request::is('about') || Request::is('contact') || Request::is('video-conference') ? 'active' : '' }}">
                        <a href="#">Menu</a>
                        <ul class="dropdown">
                            <li><a href="{{ route('about') }}"><i class="fa-brands fa-discourse"></i> Tentang</a></li>
                            <li><a href="{{ route('contact') }}"><i class="fa-solid fa-envelope"></i> Kontak</a></li>
                            <li><a href="{{ route('video-conference') }}"><i class="fa-solid fa-video"></i> Conference</a></li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('service') ? 'active' : '' }}"><a href="{{ route('service') }}">Layanan</a>
                    </li>
                    @guest
                    <li>
                        <a href="{{ route('login') }}" class="btn btn-outline-white">Masuk</a>
                    </li>
                    @else
                    <li class="has-children">
                        <a href="#">{{ Auth::user()->name }}</a>
                        <ul class="dropdown">
                            <li><a href="/change-password"><i class="fa-solid fa-key"></i> Ganti Password</a></li>
                            @if (Auth::user()->role == 'Admin')
                            <li><a href="/dashboard"><i class="fa-solid fa-paper-plane"></i> Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            @endif
                            <li>
                                @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'User')
                                <a href="{{ route('profile') }}"><i class="fa-solid fa-user"></i> Profil</a>
                                @else
                                <a href="{{ route('profileWorker') }}"><i class="fa-solid fa-user"></i> Profil</a>
                                @endif
                            </li>
                            @if (Auth::user()->role == 'User')
                            <li><a href="{{ route('myProject') }}"><i class="fa-solid fa-list-check"></i> Proyek
                                    Saya</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            @endif
                            @if (Auth::user()->role == 'Worker')
                            <li><a href="{{ route('myBid') }}"><i class="fa-solid fa-list-check"></i> Bid Saya</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            @endif
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                                                       document.getElementById('logout-form').submit();">
                                    <i class="bx bx-power-off me-2"></i>
                                    <span class="align-middle"><i
                                            class="fa-solid fa-right-from-bracket"></i> Keluar</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest

                </ul>

                <a href="#"
                    class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light"
                    data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>

        </div>
    </div>
</nav>
