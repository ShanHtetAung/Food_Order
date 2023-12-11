<footer>
    <div class="container">
        <div class="row footer-bg pt-4">
            <div class="col-lg-3 col-md-6 col-6">
                <!-- Logo -->
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img src="{{ asset('assets/images/logo1.png') }}" alt="Logo" width="200" height="100">
                </a>
                <p class="mt-2">
                    <strong>Address: </strong>
                    <a class="nav-link text-primary d-inline" target="_blank"
                        href="https://maps.app.goo.gl/pHWbqN82FjCmU1do8">
                        Junction City Shopping mall
                    </a>
                </p>
                <p>
                    <strong>Phone: </strong>
                    <a class="nav-link text-primary d-inline" target="_blank" href="tel:067 409 883">
                        067 409 883
                    </a>
                </p>
                <p>
                    <strong>Mail: </strong>
                    <a class="nav-link text-primary d-inline" target="_blank" href="mailto:food@gmail.com">
                        food@gmail.com
                    </a>
                </p>
            </div>
            <div class="col-lg-3 col-md-6 col-6 mt-2">
                <h5 class="mb-3">Quick Links</h5>
                <ul class="footer_ul">
                    <li class="mb-2"><a class="nav-link text-primary" href="{{ route('index') }}">Home</a></li>
                    <li class="mb-2"><a class="nav-link text-primary"
                            href="{{ route('orderHistoryPage') }}">Orders</a></li>
                    @auth
                        <li class="mb-2"><a class="nav-link text-primary" href="{{ route('cart.list') }}">Cart</a></li>
                    @else
                        <li class="mb-2"><a class="nav-link text-primary" href="{{ route('loginPage') }}">Cart</a></li>
                    @endauth
                    <li class="mb-2"><a class="nav-link text-primary" href="{{ route('contactus') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-6 mt-2">
                <h5 class="mb-3">My Account</h5>
                <ul class="footer_ul">
                    <li class="mb-2"><a class="nav-link text-primary" href="{{ route('profilePage') }}">Profile</a>
                    </li>
                    <li class="mb-2"><a class="nav-link text-primary" href="{{ route('changePasswordPage') }}">Change
                            Password</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-6 mt-2">
                <h5 class="mb-3">Payment</h5>
                <h6 class="mb-3">Cash on Delivery</h6>
                <ul class="list-inline f-social">
                    <li class="list-inline-item"><a target="_blank" href="https://www.facebook.com"><i
                                class="fa-brands fa-facebook text-warning"></i></a>
                    </li>
                    <li class="list-inline-item"><a target="_blank" href="https://www.twitter.com"><i
                                class="fa-brands fa-twitter text-warning"></i></a>
                    </li>
                    <li class="list-inline-item"><a target="_blank" href="https://www.linkedin.com"><i
                                class="fa-brands fa-linkedin text-warning"></i></i></a></li>
                    <li class="list-inline-item"><a target="_blank" href="https://www.google.com"><i
                                class="fa-brands fa-google text-warning"></i></a>
                    </li>
                    <li class="list-inline-item"><a target="_blank" href="https://www.instagram.com"><i
                                class="fa-brands fa-instagram text-warning"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 text-center p-1">
                <p><i>All Rights Reserved. &copy; 2023 </i><span><i> Food</i></span>
            </div>
        </div>
    </div>
</footer>
