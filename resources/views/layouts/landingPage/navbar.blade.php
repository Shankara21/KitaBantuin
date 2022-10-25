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
            <a href="/" class="logo m-0">kITabantuin <span class="text-primary">.</span></a>

            <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
                <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
                <li class="has-children">
                    <a href="#">Dropdown</a>
                    <ul class="dropdown">
                        <li><a href="elements.html">Elements</a></li>
                        <li><a href="#">Menu One</a></li>
                        <li class="has-children">
                            <a href="#">Menu Two</a>
                            <ul class="dropdown">
                                <li><a href="#">Sub Menu One</a></li>
                                <li><a href="#">Sub Menu Two</a></li>
                                <li><a href="#">Sub Menu Three</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Menu Three</a></li>
                    </ul>
                </li>
                <li class="{{ Request::is('service') ? 'active' : '' }}"><a href="/service">Services</a></li>
                <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="about">About</a></li>
                <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="contact">Contact Us</a></li>
                @guest
                <li>
                    <a href="login" class="btn btn-outline-white">Login</a>
                </li>
                @else
                <li class="has-children">
                    <a href="#">{{ Auth::user() -> name }}</a>
                    <ul class="dropdown">
                        <li><a href="/dashboard"><i class="fa-solid fa-paper-plane"></i> Dashboard</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="elements.html"><i class="fa-solid fa-user"></i> Profile</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                                                       document.getElementById('logout-form').submit();">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle"><i class="fa-solid fa-right-from-bracket"></i> Log Out</span>
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