@section('title', 'Payment')
@extends('payment.master')
{{-- @section('style')
    <style>
        .form-check-input input[type="radio"] {
            /* Customize the appearance of the radio button */
            width: 30px;
            /* Adjust the width */
            height: 30px;
            /* Adjust the height */
            margin-right: 10px;
            /* Adjust the spacing between the radio button and label */
            /* Change the color */
        }

        /* Change the color of the radio button when it is checked */
        .form-check-input input[type="radio"]:checked {
            background-color: black;
            /* Change the background color */
        }
    </style>
@endsection --}}
@section('content')
    @if (App\Models\Panier::count() > 0)
        <header class="m-4">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="float-start ">
                        <h5><img src="{{ asset('images/3.png') }}" width="80px" height="40px" alt=""></h5>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="progress w-100 float-end">
                        <div class="progress-bar " role="progressbar" style="width: 100%;" aria-valuenow="100"
                            aria-valuemin="0" aria-valuemax="100">100%</div>
                    </div>
                </div>
            </div>
        </header>
        <div class="container mt-4 d-flex justify-content-center" style="width: 45%">
            <div class="card border-0 w-80">
                {{-- <div class="card-header bg-white ">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="float-start ">
                            <h5><img src="{{ asset('images/3.png') }}" width="80px" height="40px" alt=""></h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="progress w-100 float-end">
                            <div class="progress-bar text-dark" role="progressbar" style="width: 50%;" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100">50%</div>
                        </div>
                    </div>
                </div>
            </div> --}}
                <div class="card-body border-1">
                    <h1 class="d-flex justify-content-center">Choose a payment method</h1>
                    <div class="row w-100 mt-4">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input checkcard"
                                            style="width: 30px; height: 30px;margin-right: 10px;" type="radio"
                                            name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label h4" for="flexRadioDefault1">
                                            Card
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img src="{{ asset('images/payment/visa.png') }}"class="position-relative float-end"
                                        width="20%" height="45%" alt="" srcset="">
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12 affichedatacard " style="display: none">
                            <form action="{{ route('placeorder') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-4">
                                    <div class="col-md-12 mb-3">
                                        <label for="" class="fw-bold">Card Number <span
                                                class="text-danger fw-bold">*</span> </label>
                                        <input type="text"
                                            class="form-control @error('cardnumber') id-invalide @enderror"
                                            name="cardnumber" placeholder="1111 2222 3333 4444" />
                                        @error('cardnumber')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-6">
                                            <label for="" class="fw-bold">Expiration Date <span
                                                    class="text-danger fw-bold">*</span></label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="expiration_month"
                                                        placeholder="MM" maxlength="2">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="expiration_year"
                                                        placeholder="YYYY" maxlength="4">
                                                </div>
                                            </div>
                                        </div>
                                        @error('cardnumber')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="fw-bold">Security code <span
                                                class="text-danger fw-bold">*</span> </label>
                                        <input type="text" class="form-control @error('security') id-invalide @enderror"
                                            name="security" placeholder="123" />
                                        @error('security')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3 d-flex justify-content-center mt-4">
                                    <button type="submit" class="btn btn-dark float-end shadow fw-bold"
                                        style="width: 100% ;border-radius: 20px;padding:10px">Confirme</button>
                                </div>
                            </form>
                        </div>
                        <hr class="mt-4">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input checkpaypal" type="radio"
                                            style="width: 30px; height: 30px;margin-right: 10px;" name="flexRadioDefault"
                                            id="flexRadioDefault2">
                                        <label class="form-check-label h4" for="flexRadioDefault2">
                                            Pay with PayPal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <img src="{{ asset('images/payment/paypal.png') }}"class="position-relative float-end"
                                        width="20%" height="45%" alt="" srcset="">
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12 affichedatapaypal" style="display: none">
                            <p class="fw-bold text-secondary mt-3">Continuing will take you to your PayPal account. You'll
                                be
                                able to review and submit your order after you log in.</p>
                            <a href="" class="btn bg-black text-white shadow fw-bold"
                                style="width: 100% ;border-radius: 20px;padding:10px">Continue to paypal</a>
                        </div>
                        <hr class="mt-4">
                        <div class="col-lg-12">
                            <div class="form-check">
                                <input class="form-check-input checkorder" type="radio"
                                    style="width: 30px; height: 30px;margin-right: 10px;" name="flexRadioDefault"
                                    id="flexRadioDefault2">
                                <label class="form-check-label h4" for="flexRadioDefault2">
                                    Pay When you get the products
                                </label>
                            </div>
                        </div>
                        <div class="col-lf-12 affiche" style="display: none">
                            <p class="fw-bold text-secondary mt-3">You will be able to pay the products when u get it</p>
                            <a href="{{ route('placeorder') }}" class="btn bg-black text-white shadow fw-bold"
                                style="width: 100% ;border-radius: 20px;padding:10px">Place order</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <a href="{{ route('checkout') }}" class="btn btn-white text-dark float-start fw-bold">
                        < Back</a>

                </div>
            </div>
        </div>
    @else
        <div class="card-body text-center">
            <h2>Your <i class="fa fa-shopping-cart"></i> cart is empty</h2>
            <a href="{{ route('category') }}" class="btn btn-dark ">Continue shopping</a>
        </div>
    @endif
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $('.checkcard').click(function() {
            $('.affichedatacard').css({
                'display': 'block'
            });
            $('.affichedatapaypal').css({
                'display': 'none'
            });
            $('.affiche').css({
                'display': 'none'
            });
        });
        $('.checkpaypal').click(function() {
            $('.affichedatacard').css({
                'display': 'none'
            });
            $('.affichedatapaypal').css({
                'display': 'block'
            });
            $('.affiche').css({
                'display': 'none'
            });
        });
        $('.checkorder').click(function() {
            $('.affichedatacard').css({
                'display': 'none'
            });
            $('.affichedatapaypal').css({
                'display': 'none'
            });
            $('.affiche').css({
                'display': 'block'
            });
        });
    </script>
    <script
        src="https://www.paypal.com/sdk/js?client-id=AayVSyOHvSUlsbTk9wKV8dEV7oK67BS9PpFDoGovcGVLsJBKnWjx3-RFv-tZktL2HVIXBEtO6ynSR7fu">
    </script>
@endsection
