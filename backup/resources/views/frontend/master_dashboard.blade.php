<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="">
    <meta name="theme-color" content="#ff8a00">
    <meta name="description" content="Job Portal HTML Template">
    <meta name="keywords" content="Employment, Naukri, Shine, Indeed, Job Posting, Job Provider">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal : Home</title>

    <!--  Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body>


    <!-- Wrapper -->
    <div id="wrapper">
      @yield('main')
    </div>
    <!-- Wrapper / End -->

    <!-- Sign In Popup -->

    <!-- Sign In Popup / End -->

    <!-- Scripts -->
    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-migrate-3.0.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/mmenu.min.js') }}"></script>
    <script src="{{ asset('frontend/js/tippy.all.min.js') }}"></script>
    <script src="{{ asset('frontend/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/snackbar.js') }}"></script>
    <script src="{{ asset('frontend/js/clipboard.min.js') }}"></script>
    <script src="{{ asset('frontend/js/counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/js/typed.js') }}"></script>
    <script src="{{ asset('frontend/js/custom_jquery.js') }}"></script>

    <script>
        if ($('.utf-intro-banner-search-form-block')[0]) {
            setTimeout(function() {
                $(".pac-container").prependTo(".utf-intro-search-field-item.with-autocomplete");
            }, 300);
        }
    </script>
    <script>
        var typed = new Typed('.typed-words', {
            strings: ["Web Designer.", " Graphic Designer.", " Logo Designer.", " Sales Marketing."],
            typeSpeed: 80,
            backSpeed: 80,
            backDelay: 4000,
            startDelay: 1000,
            loop: true,
            showCursor: true
        });
    </script>
</body>

</html>

