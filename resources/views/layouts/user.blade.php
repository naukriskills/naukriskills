<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="">
    <meta name="theme-color" content="#ff8a00">
    <title>Nanukri Skills</title>
    <meta name="description" content="Naukri Skills Job Portal">
    <meta name="keywords" content="Employment, Naukri,
        Shine, Indeed, Job Posting, Job Provider">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&amp;display=swap" rel="stylesheet">
</head>

<body>
    <!-- Preloader Start -->
    <div class="preloader">
        <div class="utf-preloader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div id="wrapper">
        <x-Header />
        <div class="clearfix"></div>
        <!-- Dashboard Container -->
        <div class="utf-dashboard-container-aera">
            <!-- Dashboard Sidebar -->
            <x-menu></x-menu>
            <!-- Dashboard Sidebar / End -->
            @yield('content')
        </div>
    </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate-3.0.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/mmenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/tippy.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/snackbar.js') }}"></script>
    <script src="{{ asset('assets/js/clipboard.min.js') }}"></script>
    <script src="{{ asset('assets/js/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom_jquery.js') }}"></script>

    <script>
    if ($('.utf-intro-banner-search-form-block')[0]) {
        setTimeout(function() {
            $(".pac-container").prependTo(".utf-intro-search-field-item.with-autocomplete");
        }, 300);
    }
    $(document).ready(function() {
        $('.hmenu a').click(function() {
            //removing the previous selected menu state
            $('.hmenu').find('li.active').removeClass('active');
            //adding the state for this parent menu
            $(this).parents("li").addClass('active');

        });
    });
    </script>
</body>

</html>