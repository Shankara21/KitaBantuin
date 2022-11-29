<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - {{ $title ?? 'kITaBantuin' }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
  {{-- <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}" /> --}}
  <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
  integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.statically.io/gh/Firgisotya/AssetKitaBantuin/main/fontawesome-free-6.2.0-web/css/all.css">
  <link rel="stylesheet" href="https://cdn.statically.io/gh/Firgisotya/AssetKitaBantuin/main/fontawesome-free-6.2.0-web/css/all.css">
  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="https://cdn.statically.io/gh/Firgisotya/AssetKitaBantuin/main/assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="https://cdn.statically.io/gh/Firgisotya/AssetKitaBantuin/main/assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="https://cdn.statically.io/gh/Firgisotya/AssetKitaBantuin/main/assets/vendor/css/theme-default.css"
    class="template-customizer-theme-css" />
  <link rel="stylesheet" href="https://cdn.statically.io/gh/Firgisotya/AssetKitaBantuin/main/assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="https://cdn.statically.io/gh/Firgisotya/AssetKitaBantuin/main/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="https://cdn.statically.io/gh/Firgisotya/AssetKitaBantuin/main/assets/vendor/libs/apex-charts/apex-charts.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="https://cdn.statically.io/gh/Firgisotya/AssetKitaBantuin/main/assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="https://cdn.statically.io/gh/Firgisotya/AssetKitaBantuin/main/assets/js/config.js"></script>
  <script src="https://kit.fontawesome.com/088aa140a4.js" crossorigin="anonymous"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  </head>

  <body style="font-family: 'Poppins', sans-serif;">
    @include('sweetalert::alert')

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
       @include('layouts.sidebar')

        <!-- Layout container -->
        <div class="layout-page">
          @include('layouts.navbar')
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            @yield('content')
            <!-- / Content -->

            @include('layouts.footer')

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    @yield('script')

     <!-- Core JS -->
  <script src="https://github.com/Firgisotya/AssetKitaBantuin/blob/main/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="https://cdn.statically.io/gh/Firgisotya/AssetKitaBantuin/main/assets/vendor/libs/popper/popper.js"></script>
  <script src="https://cdn.statically.io/gh/Firgisotya/AssetKitaBantuin/main/assets/vendor/js/bootstrap.js"></script>
  <script src="https://cdn.statically.io/gh/Firgisotya/AssetKitaBantuin/main/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="https://cdn.statically.io/gh/Firgisotya/AssetKitaBantuin/main/assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="https://cdn.statically.io/gh/Firgisotya/AssetKitaBantuin/main/assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="https://cdn.statically.io/gh/Firgisotya/AssetKitaBantuin/main/assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="https://cdn.statically.io/gh/Firgisotya/AssetKitaBantuin/main/assets/js/dashboards-analytics.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  </body>
</html>
