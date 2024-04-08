@extends('frontend.master_dashboard')
@section('main')
    @include('frontend.body.header')


    <div class="utf-dashboard-content-container-aera" data-simplebar>
        <div id="dashboard-titlebar" class="utf-dashboard-headline-item">
            <div class="row">
                <div class="col-xl-12">
                    <h3>Privacy Policy</h3>
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li>Privacy Policy</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>




<div class="container">
    <blockquote class="margin-top-20 margin-bottom-20">
     <h1>Privacy Policy</h1>
    <p>This Privacy Policy governs the manner in which our job portal collects, uses, maintains, and discloses information collected from users (each, a "User") of the job portal website ("Site").</p>

    <h2>Personal identification information</h2>
    <p>We may collect personal identification information from Users in a variety of ways, including, but not limited to, when Users visit our site, register on the site, fill out a form, and in connection with other activities, services, features, or resources we make available on our Site. Users may be asked for, as appropriate, name, email address, mailing address, phone number, and educational and employment history.</p>

    <h2>How we use collected information</h2>
    <p>We may collect and use Users' personal information for the following purposes:</p>
    <ul>
        <li>To improve customer service</li>
        <li>To personalize user experience</li>
        <li>To send periodic emails</li>
    </ul>

    <h2>How we protect your information</h2>
    <p>We adopt appropriate data collection, storage, and processing practices and security measures to protect against unauthorized access, alteration, disclosure, or destruction of your personal information, username, password, transaction information, and data stored on our Site.</p>

    <h2>Changes to this privacy policy</h2>
    <p>Our job portal has the discretion to update this privacy policy at any time. When we do, we will revise the updated date at the bottom of this page. We encourage Users to frequently check this page for any changes to stay informed about how we are helping to protect the personal information we collect. You acknowledge and agree that it is your responsibility to review this privacy policy periodically and become aware of modifications.</p>

    <h2>Your acceptance of these terms</h2>
    <p>By using this Site, you signify your acceptance of this policy. If you do not agree

</blockquote>
    
</div>



        @include('frontend.body.footer')
        @endsection
