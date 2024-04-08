<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa Answer Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/australia/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        
        <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WLBF4FB8');</script>
<!-- End Google Tag Manager -->
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WLBF4FB8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div class="top-navbar">
        <div class="container">
            <div class="ul">
                <ul>
                    <li class="free-consult">
                        <ul>
                            <li>
                               <i class="fa-solid fa-envelope"></i>

                            </li>
                            <li>
                               contact@visanswer.com
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>
                                <i class="fa-solid fa-envelope"></i>
                            </li>
                            <li>
                                info@visanswer.com
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <section class="hero-backgroung">
        <div class="menuBar">
            <div class="container">
                <ul>
                    <li>
                  
                    </li>
                  
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="hero-section">
               <center> <center> <img src="{{ asset('frontend/australia/images/visa-logo.png') }}" alt="company logo" width="80"> </center>
               
               <h1>VISA ANSWER</h1> </center> 
               <center> <img src="{{ asset('frontend/australia/images/thankyou.png') }}" class="img-fluid"> </center> 

                <h2 style=" border-left: none;"><span>Thank You For Submitting</span></h2>
                
              <center>
    <ul class="heroBtn">
        <li class="freeBtn">
            <a href="http://www.visanswer.com" target="_blank">Go To Visanswer <i class="fa-solid fa-arrow-right"></i></a>
        </li>
        <li class="callBtn">
            <a href="https://visanswer.com/code-of-conduct/" target="_blank">Learn More <i class="fa-solid fa-arrow-right"></i></a>
        </li>
    </ul>
</center>

            </div>
        </div>
    </section>
   
    <div class="copyright">
        <p>Copyright © 2024. MY JOb BANK</p>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('frontend/australia/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/australia/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/australia/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">
    

    
  

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
       case 'info':
       toastr.info(" {{ Session::get('message') }} ");
       break;

       case 'success':
       toastr.success(" {{ Session::get('message') }} ");
       break;

       case 'warning':
       toastr.warning(" {{ Session::get('message') }} ");
       break;

       case 'danger':
       toastr.warning(" {{ Session::get('message') }} ");
       break;

       case 'error':
       toastr.error(" {{ Session::get('message') }} ");
       break;
    }
    @endif
   </script>


</body>

</html>
