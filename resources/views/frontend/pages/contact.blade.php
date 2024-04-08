@extends('frontend.master_dashboard')
@section('main')
    @include('frontend.body.header')


    <!-- Titlebar -->
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Contact Us</h2>
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li>Contact Us</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="utf-contact-location-info-aera margin-bottom-50">
                    <div id="utf-single-job-map-container-item">
                        <div class="row">
                            <div class="col-md-6">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d831370.9597208301!2d147.89839346150305!3d-35.51558153130797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b164cdfa09b104b%3A0xe75844385c6e7803!2sAustralian%20Capital%20Territory%2C%20Australia!5e0!3m2!1sen!2sin!4v1709237304617!5m2!1sen!2sin"
                                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="col-md-6">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d36553983.44087083!2d-96!3d56!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4b0d03d337cc6ad9%3A0x9968b72aa2438fa5!2sCanada!5e0!3m2!1sen!2sin!4v1709237368642!5m2!1sen!2sin"
                                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

 @php
        $setting = App\Models\sitesetting::find(1);
    @endphp
            <div class="col-xl-4 col-lg-4">
                <div class="utf-boxed-list-headline-item margin-bottom-35">
                    <h3><i class="icon-feather-map-pin"></i> Office Address</h3>
                </div>
                <div class="utf-contact-location-info-aera margin-bottom-50">
                    <div class="contact-address">
                        <ul>
                          
                            <li><strong>E-Mail:-</strong> <a href="#">{{ $setting->email }}</a></li>
                            <li><strong>Address:-</strong> {{ $setting->company_address }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8">
                <section id="contact" class="margin-bottom-50">
                    <div class="utf-boxed-list-headline-item margin-bottom-35">
                        <h3><i class="icon-material-outline-description"></i> Contact Form</h3>
                    </div>
                    <div class="utf-contact-form-item">


                        <form method="post" action="{{ route('submit.form') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="utf-no-border">
                                        <input class="utf-with-border" name="firstname" type="text" placeholder="First Name" value="{{ old('firstname') }}" />
                                    </div>
                                    @error('firstname')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="utf-no-border">
                                        <input class="utf-with-border" name="lastname" type="text" placeholder="Last Name" value="{{ old('lastname') }}" />
                                    </div>
                                    @error('lastname')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="utf-no-border">
                                        <input class="utf-with-border" name="email" type="email" placeholder="Email Address" value="{{ old('email') }}" />
                                    </div>
                                    @error('email')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="utf-no-border">
                                        <input class="utf-with-border" name="subject" type="text" placeholder="Subject" value="{{ old('subject') }}" />
                                    </div>
                                    @error('subject')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <textarea class="utf-with-border" name="comments" cols="40" rows="3" placeholder="Message...">{{ old('comments') }}</textarea>
                                @error('comments')
                                    <p style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="utf-centered-button margin-top-10">
                                <input type="submit" class="submit button" id="submit" value="Submit Message" />
                            </div>
                        </form>




                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- Container / End -->




    @include('frontend.body.footer')



@endsection
