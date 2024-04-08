@extends('frontend.master_dashboard')
@section('main')
    @include('frontend.body.header')



  <!-- Titlebar -->
  <div id="titlebar" class="gradient">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Job Categories</h2>
          <nav id="breadcrumbs">
            <ul>
              <li><a href="{{ url('/') }}">Home</a></li>
			  <li><a href="#">Pages</a></li>
              <li>Job Categories</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>

 <!-- Jobs Category Boxes -->
 <div class="section margin-top-60 margin-bottom-60">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
                    <span>Jobs Categories</span>
                    <h3>Top Trending Categories</h3>
                    <div class="utf-headline-display-inner-item">Jobs Categories</div>
                    <p class="utf-slogan-text">Job categories span various industries, including technology, healthcare,
                        finance, education, engineering, marketing, hospitality, offering diverse career opportunities.
                    </p>
                </div>
                <div class="utf-categories-container-block">

                    @php
                        $categories = App\Models\jobcategory::orderBy('cat_name', 'Asc')->get();
                    @endphp

                    @foreach ($categories as $item)
                        <a href="{{ route('jobs.category', ['cat_name' => $item->cat_name]) }}" class="utf-category-box">
                            <div class="utf-category-box-icon-item"> <i class="icon-line-awesome-briefcase"></i>
                            </div>
                            <div class="utf-category-box-content">
                                <h3>{{ $item->cat_name }}</h3>
                            </div>
                            <div class="utf-category-box-counter-item">Jobs</div>
                        </a>
                    @endforeach


                </div>



               
            </div>
        </div>
    </div>
</div>
<!-- Jobs Category Boxes / End -->





@include('frontend.body.footer')
@endsection
