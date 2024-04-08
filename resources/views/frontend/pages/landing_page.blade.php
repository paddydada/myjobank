@extends('frontend.master_dashboard')
@section('main')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">
    @include('frontend.body.header')



<section class="utf_cta_area_item utf_cta_area2_block">
    <div class="container">
        <div class="row">
                        @php
        $setting = App\Models\sitesetting::find(1);
    @endphp
            <div class="col-md-12">
                <div class="utf_subscribe_block">
                    <div class="col-xl-4">
                        <div class="section-heading">
                            <!--<h2 class="utf_sec_title_item utf_sec_title_item2">Find your dream job in Australia or Canada</h2>-->
                           <!--<a href="{{ url('/') }}"><img src="{{ asset('upload/logo/' . $setting->logo) }}"-->
                           <!-- style="height:30px;"></a>-->
               
                           <img src="{{asset('frontend/images/bg.png')}}">
                        </div>
                    </div>
                    <div class="col-xl-8 col-sm-12">
                        <div class="contact-form-action">
                            <section id="contact" class="margin-bottom-50">
          
		  <div class="utf-contact-form-item">
			  <form method="post" action="{{ route('landing.store') }}" enctype="multipart/form-data">
			      @csrf
				<div class="row">
				  
				  <div class="col-md-12">
					<div class="utf-no-border">
					      <lable>Name</lable>
					  <input class="utf-with-border" name="name" type="text" id="name" value="{{ old('name') }}"  placeholder="Name" required="" >
					   
					</div>
				
				  </div>
				  <div class="col-md-6">
					<div class="utf-no-border">
					     <lable>Email</lable>
					  <input class="utf-with-border" name="email" type="email" id="email" value="{{ old('email') }}" placeholder="Email Address" required="">
					</div>
					
				  </div>
				  
				


				   <div class="col-md-6">
					<div class="utf-no-border">
					     <lable>Phone</lable>
					  <input class="utf-with-border" type="tel" id="phone" name="phone" value="{{ old('phone') }}"  required="">
					</div>
					
				  </div>
				  
				  
				 <div class="col-md-12">
    <div class="utf-no-border">
        <label>Upload CV</label>
        <input class="utf-with-border" name="resume" type="file" required="">
       
    </div>
</div>

				  
				  
				  
				</div>
			
				<div class="utf-centered-button margin-top-10">
					<input type="submit" class="submit button" name="submit" value="Submit Message">
				</div>
			  </form>
		  </div>
        </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
  
  
  <script>
  $(document).ready(function () {
    // Initialize the plugin
    var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
      initialCountry: "",
      separateDialCode: true,
      utilsScript:
        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/utils.js",
    });

    // Fetch user's country based on their IP address
    $.get(
      "https://ipinfo.io",
      function (response) {
        var countryCode = response.country;
        iti.setCountry(countryCode);
      },
      "jsonp"
    );

    // Listen for the form submission
    $("#phoneForm").submit(function (event) {
      event.preventDefault();
      var phoneNumber = iti.getNumber();
      console.log(phoneNumber);
      // You can now send the phone number to your server for further processing
    });
  });
</script>


@include('frontend.body.footer')
@endsection