<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="/landingPage/css/bootstrap.min.css">
    <link rel="stylesheet" href="/landingPage/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/landingPage/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/landingPage/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/landingPage/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/landingPage/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="/landingPage/css/daterangepicker.css">
    <link rel="stylesheet" href="/landingPage/css/aos.css">
    <link rel="stylesheet" href="/landingPage/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>kITabantuin</title>
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />

    @yield('css')
</head>

<body>


    @include('layouts.landingPage.navbar')


    @yield('content')

    @include('layouts.landingPage.footer')

    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <script src="/landingPage/js/jquery-3.4.1.min.js"></script>
    <script src="/landingPage/js/popper.min.js"></script>
    <script src="/landingPage/js/bootstrap.min.js"></script>
    <script src="/landingPage/js/owl.carousel.min.js"></script>
    <script src="/landingPage/js/jquery.animateNumber.min.js"></script>
    <script src="/landingPage/js/jquery.waypoints.min.js"></script>
    <script src="/landingPage/js/jquery.fancybox.min.js"></script>
    <script src="/landingPage/js/aos.js"></script>
    <script src="/landingPage/js/moment.min.js"></script>
    <script src="/landingPage/js/daterangepicker.js"></script>

    <script src="/landingPage/js/typed.js"></script>

    @yield('script')

    <script src="/landingPage/js/custom.js"></script>

</body>

</html>
