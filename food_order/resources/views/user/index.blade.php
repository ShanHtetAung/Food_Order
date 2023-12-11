@extends('user.layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row d-flex text-box-row nav-bg">
            <div class="col-12 col-md-6">
                @php
                    // Get a random product from the list of products
                    $randomProduct = $products->random();
                @endphp
                <img src="{{ asset('storage/product/' . $randomProduct->image) }}" class="img-fluid"
                    alt="{{ $randomProduct->name }}">
            </div>

            <div class="col-12 col-md-6 mt-5">
                <h1 class="text-danger mt-md-0">{{ $randomProduct->name }}</h1>
                <h4>{{ $randomProduct->price }} MMK</h4>
                <p class="text-wrap text-muted">{{ $randomProduct->description }}</p>
                <form action="javascript:void(0);" class="order-now-form">
                    @csrf
                    <button class="btn btn-primary order-now-btn" data-product-id="{{ $randomProduct->id }}" type="button">
                        Order Now
                    </button>
                </form>
            </div>
        </div>

        <div class="row mb-4 justify-content-between mt-4">
            <div class="col-md-6 mb-3 mb-md-0">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a href="javascript:void(0);" class="filter-category" data-id="all">
                        <button type="button" class="btn btn-outline-danger me-1">All</button>
                    </a>
                    @foreach ($categories as $c)
                        <a href="javascript:void(0);" class="filter-category" data-id="{{ $c->id }}">
                            <button type="button" class="btn btn-outline-danger me-1 ">{{ $c->name }}</button>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4 offset-md-2">
                <div class="input-group">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                    <div class="input-group-append">
                        <button class="btn btn-outline-danger" id="searchBtn" type="button"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                        @if (auth()->user())
                            <a href="{{ route('cart.list') }}" method="get">
                                <button type="button" class="btn btn-danger position-relative">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary"
                                        id="cartCount">
                                        <?php echo $cartListCount; ?>
                                    </span>
                                </button>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="productsContainer">
            @foreach ($products as $p)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card mb-4 rounded-4 shadow-lg bg-color border-0">
                        <div class="card-body text-center">
                            <img src="{{ asset('storage/product/' . $p->image) }}" alt="bla.jpg" width="200"
                                height="200">
                            <div class="card-header pt-2 pb-0 bg-0">
                                <h5 class="">{{ $p->name }}</h5>
                            </div>
                            <span class="font-monospace">{{ $p->price }} kyats</span>
                            @if (auth()->user())
                                <a href="javascript:void(0);" class="add-to-cart btn btn-danger col-12 float-end mt-2"
                                    data-product-id="{{ $p->id }}">
                                    Add to Cart <i class="fa-solid fa-cart-plus"></i>
                                </a>
                            @else
                                <a href="{{ route('loginPage') }}"
                                    class="add-to-cart btn btn-danger col-12 float-end mt-2">
                                    Add to Cart <i class="fa-solid fa-cart-plus"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script>
        var isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
    </script>
    <script src="{{ asset('assets/js/user/user_home.js') }}"></script>
@endsection
