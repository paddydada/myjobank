
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
<title>Jobseeker: Dashboard</title>

<!--  Favicon -->
<link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}">

<!-- CSS -->
<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-grid.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/icons.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>


<!-- Wrapper -->
<div id="wrapper">
  <!-- Header Container -->
@include('frontend.body.header')
  {{-- <div class="clearfix"></div> --}}
  <!-- Header Container / End -->

  <!-- Dashboard Container -->
  <div class="utf-dashboard-container-aera">
    <!-- Dashboard Sidebar -->
    <div class="utf-dashboard-sidebar-item">
      <div class="utf-dashboard-sidebar-item-inner" data-simplebar>
        <div class="utf-dashboard-nav-container">
          <!-- Responsive Navigation Trigger -->
          <a href="#" class="utf-dashboard-responsive-trigger-item"> <span class="hamburger utf-hamburger-collapse-item" > <span class="utf-hamburger-box-item"> <span class="utf-hamburger-inner-item"></span> </span> </span> <span class="trigger-title">Dashboard Navigation Menu</span> </a>
          <!-- Navigation -->
		@include('frontend.body.dashboard_sidebar')
        </div>
      </div>
    </div>
    <!-- Dashboard Sidebar / End -->

    <!-- Dashboard Content -->

 @yield('user')

</div>
<!-- Wrapper / End -->

<!-- Leave a Review for Freelancer Popup -->

<!-- Leave a Review Popup / End -->
@include('frontend.body.dashboard_footer')
