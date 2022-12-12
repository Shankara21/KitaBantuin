<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="/" class="app-brand-link">
      <span class=" demo menu-text fw-bolder" style="font-size: 1.7em;">K<span class="text-warning"
          style="font-size: 1em;">IT</span>aBantuin.co</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
      <a href="/dashboard" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>
    <li class="menu-item {{ Request::is('/') ? 'active' : '' }}">
      <a href="/" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home"></i>
        <div data-i18n="Analytics">Homepage</div>
      </a>
    </li>

    <!-- Layouts -->
    {{-- <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Layouts">Layouts</div>
      </a>

      <ul class="menu-sub">
        <li class="menu-item">
          <a href="layouts-without-menu.html" class="menu-link">
            <div data-i18n="Without menu">Without menu</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="layouts-without-navbar.html" class="menu-link">
            <div data-i18n="Without navbar">Without navbar</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="layouts-container.html" class="menu-link">
            <div data-i18n="Container">Container</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="layouts-fluid.html" class="menu-link">
            <div data-i18n="Fluid">Fluid</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="layouts-blank.html" class="menu-link">
            <div data-i18n="Blank">Blank</div>
          </a>
        </li>
      </ul>
    </li> --}}

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Pages</span>
    </li>
    <li class="menu-item {{ Request::is('bank*') || Request::is('bank-user*') ? 'active' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon fa-solid fa-building-columns"></i>
        <div data-i18n="Account Settings">Bank</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ Request::is('bank*') ? 'active' : '' }}">
          <a href="{{ route('bank.index') }}" class="menu-link">
            <div data-i18n="Account">Bank Admin</div>
          </a>
        </li>
        <li class="menu-item {{ Request::is('bank-user*') ? 'active' : '' }}"">
            <a href=" {{ route('bank-user.index') }}" class="menu-link ">
          <div data-i18n="Notifications">Bank User</div>
          </a>
        </li>
      </ul>
    </li>
    <li class="menu-item {{ Request::is('categories*') || Request::is('subCategories*') ? 'active' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-grid-alt"></i>
        <div data-i18n="Account Settings">Categories</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ Request::is('categories*') ? 'active' : '' }}">
          <a href="{{ route('categories.index') }}" class="menu-link">
            <div data-i18n="Account">Category</div>
          </a>
        </li>
        <li class="menu-item {{ Request::is('subCategories*') ? 'active' : '' }}"">
          <a href=" {{ route('subCategories.index') }}" class="menu-link ">
          <div data-i18n="Notifications">SubCategory</div>
          </a>
        </li>
      </ul>
    </li>
    <li class="menu-item {{ Request::is('admin*') || Request::is('user*')|| Request::is('workers*') ? 'active' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon fa-solid fa-users-rays"></i>
        <div data-i18n="Account Settings">Users</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ Request::is('admin*') ? 'active' : '' }}">
          <a href="{{ route('admin.index') }}" class="menu-link">
            <div data-i18n="Account">Admin</div>
          </a>
        </li>
        <li class="menu-item {{ Request::is('workers*') ? 'active' : '' }}">
          <a href=" {{ route('workers.index') }}" class="menu-link ">
            <div data-i18n="Notifications">Worker</div>
          </a>
        </li>
        <li class="menu-item {{ Request::is('user*') ? 'active' : '' }}">
          <a href=" {{ route('user.index') }}" class="menu-link ">
            <div data-i18n="Notifications" id="user">User</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Skill -->
    <li class="menu-item {{ Request::is('skill*') ? 'active' : '' }}">
      <a href="{{ route('skill.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-collection"></i>
        <div data-i18n="Basic">Skill</div>
      </a>
    </li>

    <li class="menu-item {{ Request::is('project*') || Request::is('result*') ? 'active' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div data-i18n="Project">Project</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ Request::is('project*') ? 'active' : '' }}">
          <a href="/project" class="menu-link">
            <div data-i18n="Project" id="project">Project</div>
          </a>
        </li>
        <li class="menu-item {{ Request::is('result*') ? 'active' : '' }}">
          <a href="/result" class="menu-link">
            <div data-i18n="Project Result">Project Result</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item {{ Request::is('payment*') || Request::is('balance*') ? 'active' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon fa-regular fa-credit-card"></i>
        <div data-i18n="Basic">Pembayaran</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ Request::is('payment*') ? 'active' : '' }}">
          <a href="/payment" class="menu-link">
            <div data-i18n="Under Maintenance">Payment</div>
          </a>
        </li>
        <li class="menu-item {{ Request::is('balance*') ? 'active' : '' }}">
          <a href="/balance" class="menu-link">
            <div data-i18n="Under Maintenance">Balance</div>
          </a>
        </li>
      </ul>
    </li>
    <!-- Pembayaran -->
    {{-- <li class="menu-item {{ Request::is('payment*') ? 'active' : '' }}">
    <a href="payment" class="menu-link">
      <i class="menu-icon fa-regular fa-credit-card"></i>
      <div data-i18n="Basic">Pembayaran</div>
    </a>
    </li> --}}


    <!-- Testimoni -->
    <li class="menu-item {{ Request::is('testimoni*') ? 'active' : '' }}">
      <a href="{{ route('testimoni.index') }}" class="menu-link">
        <i class="menu-icon fa-regular fa-comments"></i>
        <div data-i18n="Basic">Testimoni</div>
      </a>
    </li>
    <!-- Pengajuan -->
    <li class="menu-item {{ Request::is('worker-details*') ? 'active' : '' }}">
      <a href="{{ route('worker-details.index') }}" class="menu-link">
        <i class="menu-icon fa-regular fa-handshake"></i>
        <div data-i18n="Basic">Pengajuan</div>
      </a>
    </li>
  </ul>
</aside>
<!-- / Menu -->