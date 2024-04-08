@extends('frontend.master_dashboard')
@section('main')
    @include('frontend.body.header')


    <div class="utf-dashboard-content-container-aera" data-simplebar>
        <div id="dashboard-titlebar" class="utf-dashboard-headline-item">
            <div class="row">
                <div class="col-xl-12">
                    <h3>Term & Conditions</h3>
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li>Term & Conditions</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>





<div class="container">
    <blockquote class="margin-top-20 margin-bottom-20">
   
   
   
   
   
   
   
   
   
   
   
   

    <h1>Terms and Conditions</h1>
    <p>Please read these terms and conditions carefully before using our job portal website.</p>

    <h2>1. Acceptance of Terms</h2>
    <p>By accessing this website, you agree to be bound by these terms and conditions, all applicable laws, and regulations, and agree that you are responsible for compliance with any applicable local laws. If you do not agree with any of these terms, you are prohibited from using or accessing this site.</p>

    <h2>2. Use License</h2>
    <p>Permission is granted to temporarily download one copy of the materials (information or software) on our website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license, you may not:</p>
    <ul>
        <li>modify or copy the materials;</li>
        <li>use the materials for any commercial purpose, or for any public display (commercial or non-commercial);</li>
        <li>attempt to decompile or reverse engineer any software contained on our website;</li>
        <li>remove any copyright or other proprietary notations from the materials; or</li>
        <li>transfer the materials to another person or "mirror" the materials on any other server.</li>
    </ul>

    <h2>3. Disclaimer</h2>
    <p>The materials on our website are provided on an 'as is' basis. We make no warranties, expressed or implied, and hereby disclaim and negate all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</p>

    <h2>4. Limitations</h2>
    <p>In no event shall we or our suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on our website, even if we or an authorized representative has been notified orally or in writing of the possibility of such damage.</p>

    <h2>5. Revisions and Errata</h2>
    <p>The materials appearing on our website could include technical, typographical, or photographic errors. We do not warrant that any of the materials on its website are accurate, complete, or current. We may make changes to the materials contained on our website at any time without notice.</p>

    <h2>6. Governing Law</h2>
    <p>Any claim relating to our website shall be governed by the laws of [Your Country], without regard to its conflict of law provisions.</p>

    <p>By using our website, you agree to abide by these terms and conditions. If you do not agree to these terms and conditions, please do not use our website.</p>

   
   
   
   
</blockquote>
    
</div>








        @include('frontend.body.footer')
        @endsection
