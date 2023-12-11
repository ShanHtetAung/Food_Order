@extends('user.layouts.app')

@section('title', 'Cart List')

@section('content')
    <div class="row d-flex">
        <table class="cart col-lg-8" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Products</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody id="cartList">
                @foreach ($cartLists as $cartList)
                    <tr>
                        <input type="hidden" name="" value="{{ $cartList->product_id }}" id="productId">
                        <input type="hidden" name="" value="{{ $cartList->user_id }}" id="userId">
                        <td> <img src="{{ asset('storage/product/' . $cartList->product_image) }}" alt=""
                                style="width: 50px"> </td>
                        <td> {{ $cartList->product_name }} </td>
                        <td id="product_price"> {{ $cartList->product_price }} </td>
                        <td>
                            <div class="input-group quantity" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm  border-0 text-center"
                                    value="{{ $cartList->quantity }}" id="qty">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                        </td>
                        <td id="total">{{ $cartList->product_price * $cartList->quantity }} kyats</td>
                        <td><button class="btnRemove btn btn-danger btn-sm" data-id="{{ $cartList->id }}"><i
                                    class="fa fa-times"></i></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-lg-4 mt-5 shadow-lg">
            <h5 class="section-title position-relative text-uppercase my-3">
                <span class=" pr-3">Cart Summary</span>
            </h5>
            <div class="bg-light mb-5">
                <div class="pt-2" id="orderList">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total Price</h5>
                        <h5 class="totalPrice">
                            <?php
                            $totalPrice = 0;
                            foreach ($cartLists as $cartList) {
                                $totalPrice += (int) ($cartList->product_price * $cartList->quantity);
                            }
                            echo $totalPrice . 'kyats';
                            ?>
                        </h5>
                    </div>
                    <button class="btn btn-block btn-warning font-weight-bold my-3 py-2 btnOrder">Proceed To
                        Checkout</button>
                    <button class="btn btn-block btn-danger font-weight-bold my-3 py-2 btnClear">Clear Cart</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/user/cart.js') }}"></script>
    <script src=" {{ asset('assets/js/user/delete_cart.js') }}"></script>
    <script src="{{ asset('assets/js/user/order.js') }}"></script>
    <script>
        $(document).ready(() => {
            $('.cart').DataTable({
                "scrollX": "100%"
            });
        });
    </script>
@endsection
