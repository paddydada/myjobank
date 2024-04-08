


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="">
    @php
    $seo = App\Models\seo::find(1);
@endphp
    <meta name="theme-color" content="#ff8a00">
      <meta name="title" content="{{ $seo->meta_title }}">
    <meta name="author" content="{{ $seo->meta_author }}">
    <meta name="keywords" content="{{ $seo->meta_keyword }}">
    <meta name="description" content="{{ $seo->meta_description }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
        $setting = App\Models\sitesetting::find(1);
    @endphp
    
    <title>Job Portal : Home</title>

    <!--  Favicon -->
    <link rel="shortcut icon" href="{{ asset('upload/favicon/' . $setting->favicon) }}">

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
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/65eeab5f9131ed19d977b74c/1hom4qs7d';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<!--End of Tawk.to Script-->
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
            strings: ["Engineers", "IT Professions", "Finance and Accountant"],
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

