@extends('dashboard')
@section('user')

<div class="utf-dashboard-content-container-aera" data-simplebar>
    <div id="dashboard-titlebar" class="utf-dashboard-headline-item">
      <div class="row">
          <div class="col-xl-12">
              <h3>Dashboard</h3>
              <nav id="breadcrumbs">
                  <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Dashboard</li>
                  </ul>
              </nav>
          </div>
      </div>
    </div>
    <div class="utf-dashboard-content-inner-aera">
      <div class="notification success closeable">
        <p>You are Currently Signed in as <strong>{{ Auth::user()->name }}</strong> Has Been Approved!</p>
        <a class="close" href="#"></a>
      </div>

      <div class="utf-funfacts-container-aera">
        <div class="fun-fact" data-fun-fact-color="#2a41e8">
          <div class="fun-fact-icon"><i class="icon-feather-home"></i></div>
          <div class="fun-fact-text">
            <h4>1502</h4>
            <span>Companies View</span>
          </div>
        </div>
        <div class="fun-fact" data-fun-fact-color="#36bd78">
          <div class="fun-fact-icon"><i class="icon-feather-briefcase"></i></div>
          <div class="fun-fact-text">
            <h4>152</h4>
            <span>Applied Jobs</span>
          </div>
        </div>
        <div class="fun-fact" data-fun-fact-color="#efa80f">
          <div class="fun-fact-icon"><i class="icon-feather-heart"></i></div>
          <div class="fun-fact-text">
            <h4>549</h4>
            <span>Favourite Jobs</span>
          </div>
        </div>
        <div class="fun-fact" data-fun-fact-color="#0fc5bf">
          <div class="fun-fact-icon"><i class="icon-brand-telegram-plane"></i></div>
          <div class="fun-fact-text">
            <h4>120</h4>
            <span>Subscribe Plan</span>
          </div>
        </div>
        <div class="fun-fact" data-fun-fact-color="#f02727">
          <div class="fun-fact-icon"><i class="icon-feather-trending-up"></i></div>
          <div class="fun-fact-text">
            <h4>2250</h4>
            <span>Month Views</span>
          </div>
        </div>
      </div>



      <div class="utf-dashboard-footer-spacer-aera"></div>


      @include('frontend.body.footer_copyright')

    </div>
  </div>



</div>


  @endsection


