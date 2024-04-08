
        <!-- Footer -->
        <div id="footer">
            <div class="utf-footer-section-item-block">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-md-12">
                            <div class="utf-footer-item-links">
                                <a href="index-1.html"><img class="footer-logo" src="{{ asset('frontend/images/footer_logo.png') }}"
                                        alt=""></a>
                                <p>Discover your dream career on our job portal website – where opportunities meet talent seamlessly. Join us today!</p>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-3 col-sm-6">
                            <div class="utf-footer-item-links">
                                <h3>Job Categories</h3>
                                <ul>
                                    @php

                                    $categories = App\Models\jobcategory::orderBy('cat_name', 'asc')->limit(5)->get();
                                @endphp

                                @foreach ($categories as $item)
                                    <li>
                                        <a href="#">
                                            <i class="icon-feather-chevron-right"></i>
                                            <span>{{ $item->cat_name }}</span>
                                        </a>
                                    </li>
                                @endforeach








                                </ul>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-3 col-sm-6">
                            <div class="utf-footer-item-links">
                                <h3>Job Type</h3>
                                <ul>
                                    <li><a href="#"><i
                                                class="icon-feather-chevron-right"></i> <span>Work from Home</span></a>
                                    </li>
                                    <li><a href="#"><i
                                                class="icon-feather-chevron-right"></i> <span>Internship Job</span></a>
                                    </li>
                                    <li><a href="#"><i
                                                class="icon-feather-chevron-right"></i> <span>Freelancer Job</span></a>
                                    </li>
                                    <li><a href="#"><i
                                                class="icon-feather-chevron-right"></i> <span>Part Time Job</span></a>
                                    </li>
                                    <li><a href="#"><i
                                                class="icon-feather-chevron-right"></i> <span>Full Time Job</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-3 col-sm-6">
                            <div class="utf-footer-item-links">
                                <h3>Resources</h3>
                                <ul>
                                    <li><a href="#"><i class="icon-feather-chevron-right"></i> <span>My
                                                Account</span></a></li>
                                    <li><a href="#"><i class="icon-feather-chevron-right"></i>
                                            <span>Support</span></a></li>
                                    <li><a href="#"><i class="icon-feather-chevron-right"></i> <span>How It
                                                Works</span></a></li>
                                    <li><a href="#"><i class="icon-feather-chevron-right"></i>
                                            <span>Underwriting</span></a></li>
                                    <li><a href="#"><i class="icon-feather-chevron-right"></i>
                                            <span>Employers</span></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-3 col-sm-6">
                            <div class="utf-footer-item-links">
                                <h3>Quick Links</h3>
                                <ul>
                                    <li><a href="#"><i
                                                class="icon-feather-chevron-right"></i> <span>Jobs Listing</span></a>
                                    </li>
                                    <li><a href="about-us.html"><i class="icon-feather-chevron-right"></i> <span>About
                                                Us</span></a></li>
                                    <li><a href="contact.html"><i class="icon-feather-chevron-right"></i>
                                            <span>Contact Us</span></a></li>
                                    <li><a href="privacy-policy.html"><i class="icon-feather-chevron-right"></i>
                                            <span>Privacy Policy</span></a></li>
                                    <li><a href="terms-condition.html"><i class="icon-feather-chevron-right"></i>
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
