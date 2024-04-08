<!-- Footer -->
<div id="footer">
    <div class="utf-footer-section-item-block">
        <div class="container">
            <div class="row">

                @php
                $setting = App\Models\sitesetting::find(1);
                @endphp
                <div class="col-md-3 col-sm-6">
                    <div class="utf-footer-item-links">
                        <a href="{{url('/')}}"><img class="footer-logo" src="{{ asset('upload/logo/' . $setting->logo) }}" alt=""></a>
                        <p style="text-align:justify;">Discover your dream career on our job portal website – where opportunities meet talent
                            seamlessly. Join us today!</p>
                    </div>



                    <div class="utf-detail-social-sharing margin-top-25">
                        <span><strong>Social Sharing:-</strong></span>
                        <ul class="margin-top-15">
                            <li><a href="{{ Str::startsWith($setting->facebook, ['http', 'https']) ? $setting->facebook : 'http://' . $setting->facebook }}" data-tippy-placement="top" data-tippy="" data-original-title="Facebook"><i class="icon-brand-facebook-f"></i></a></li>
                            <li><a href="{{ Str::startsWith($setting->instagram, ['http', 'https']) ? $setting->instagram : 'http://' . $setting->instagram }}" data-tippy-placement="top" data-tippy="" data-original-title="Instagram" aria-describedby="tippy-4"><i class="icon-brand-instagram"></i></a></li>
                            <li><a href="{{ Str::startsWith($setting->twitter, ['http', 'https']) ? $setting->twitter : 'http://' . $setting->twitter }}" data-tippy-placement="top" data-tippy="" data-original-title="LinkedIn"><i class="icon-brand-linkedin-in"></i></a></li>

                        </ul>
                    </div>





                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="utf-footer-item-links">
                        <h3>Job Categories</h3>
                        <ul>
                            @php

                            $categories = App\Models\jobcategory::orderBy('cat_name', 'asc')->limit(5)->get();
                            @endphp

                            @foreach ($categories as $item)
                            <li>
                                <a href="#">
                                    
                                    <span>{{ $item->cat_name }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>



                <div class="col-md-3 col-sm-6">
                    <div class="utf-footer-item-links">
                        <h3>Resources</h3>
                        <ul>
                            <li><a href="#"> <span>My
                                        Account</span></a></li>
                            <li><a href="#">
                                    <span>Support</span></a></li>
                            <li><a href="#"> <span>How It
                                        Works</span></a></li>
                            <li><a href="#">
                                    <span>Underwriting</span></a></li>
                            <li><a href="#">
                                    <span>Employers</span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="utf-footer-item-links">
                        <h3>Quick Links</h3>
                        <ul>
                            </li>
                            <li><a href="{{ url('/about') }}"> <span>About Us</span></a></li>
                            <li><a href="{{ url('/contact') }}">
                                    <span>Contact Us</span></a></li>
                            <li><a href="{{ url('/blog') }}">
                                    <span>Blogs</span></a></li>
                            <li><a href="{{ route('privacy.policy') }}">
                                    <span>Privacy Policy</span></a></li>
                            <li><a href="{{ route('term.condition') }}">
                                    <span>Term & Condition</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Copyrights -->
    <div class="utf-footer-copyright-item">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">Copyright &copy; 2024 All Rights Reserved.</div>
            </div>
        </div>
    </div>
    <!-- Footer Copyrights / End -->
</div>
<!-- Footer / End -->