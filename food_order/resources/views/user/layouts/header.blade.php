<nav class="navbar navbar-expand-lg navbar-bg animate__animated animate__fadeInDown about-delay-1 sticky-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('assets/images/logo1.png') }}" alt="Logo" width="100" height="50">
        </a>
        <!-- Toggle button -->
        <button class="bg-white navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation links -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 text-center align-items-center">
                @auth
                    <li class="nav-item m-1">
                        <a href="{{ route('index') }}" class="nav-link {{ Request::is('/') ? 'text-danger' : '' }}">
                            <i class="fa-solid fa-house"></i> Home
                        </a>
                    </li>
                    <li class="nav-item m-1">
                        <a href="{{ route('orderHistoryPage') }}"
                            class="nav-link {{ Request::is('order-history') ? 'text-danger' : '' }}">
                            <i class="fa-solid fa-list"></i> Orders
                        </a>
                    </li>
                    <li class="nav-item m-1">
                        <a href="{{ route('cart.list') }}"
                            class="nav-link {{ Request::is('cart/list') ? 'text-danger' : '' }}">
                            <i class="fa-solid fa-cart-shopping"></i> Cart
                        </a>
                    </li>
                    <li class="nav-item m-1">
                        <a href="{{ route('contactus') }}"
                            class="nav-link {{ Request::is('contactus') ? 'text-danger' : '' }}">
                            <i class="fa-solid fa-envelope"></i> Contact Us
                        </a>
                    </li>
                    <li class="nav-item m-1">
                        <!-- User Name and Dropdown -->
                        <div class="dropdown dropdown_btn">
                            @if (auth()->user()->image)
                                <button class="btn btn-outline-transparent dropdown-toggle w-100" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="rounded-5" src="{{ Storage::url(Auth::user()->image) }}"
                                        alt="{{ Auth::user()->name }}" width="50" height="50">
                                </button>
                            @else
                                <button class="btn btn-outline-success dropdown-toggle w-100" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user"></i> {{ auth()->user()->name }}
                                </button>
                            @endif
                            <ul class="dropdown-menu">
                                <li class="nav-item m-1">
                                    <a href="{{ route('profilePage') }}"
                                        class="nav-link {{ Request::is('profile*') ? 'text-danger' : '' }}">
                                        <i class="fa-solid fa-address-card"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                @else
                    <li class="nav-item m-1">
                        <a href="{{ route('index') }}" class="nav-link {{ Request::is('/') ? 'text-danger' : '' }}">
                            <i class="fa-solid fa-house"></i> Home
                        </a>
                    </li>
                    <li class="nav-item m-1">
                        <a href="{{ route('loginPage') }}"
                            class="nav-link {{ Request::is('login*') ? 'text-danger' : '' }}">
                            <i class="fa-solid fa-right-to-bracket"></i> Login
                        </a>
                    </li>
                    <li class="nav-item m-1">
                        <a href="{{ route('registerPage') }}"
                            class="nav-link {{ Request::is('register*') ? 'text-danger' : '' }}">
                            <i class="fa-solid fa-registered"></i> Register
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
