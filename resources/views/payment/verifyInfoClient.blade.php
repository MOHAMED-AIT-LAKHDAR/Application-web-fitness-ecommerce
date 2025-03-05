@section('title', 'Payment')
@extends('payment.master')
@section('content')
    <header class="m-4 ">
        <div class="row">
            <div class="col-md-6 ">
                <div class="float-start ">
                    <h5><img src="{{ asset('images/3.png') }}" width="80px" height="40px" alt=""></h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="progress w-100 float-end">
                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="100" aria-valuemin="0"
                        aria-valuemax="100">50%</div>
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-4">
        <div class="card border-0">
            {{-- <div class="card-header bg-white ">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="float-start ">
                            <h5><img src="{{ asset('images/3.png') }}" width="80px" height="40px" alt=""></h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="progress w-100 float-end">
                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100">0%</div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="card-body">
                <h3>Verify your information</h3>
                <form action="{{ route('verifyinfoclient') }}" method="POST" class="form" id="register_form">
                    @csrf
                    <div class="row row-sm mg-b-20 mt-4">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>first Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="fname"
                                    class="form-control @error('fname') us-invalid @enderror"
                                    value="{{ Auth::user()->name }}">
                                @error('fname')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>last Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="lname"
                                    class="form-control @error('lname') us-invalid @enderror"
                                    value="{{ Auth::user()->lname }}">
                                @error('lname')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Phone Number<span class="text-danger">*</span></label>
                                <input type="text" name="phone_number"
                                    class="form-control @error('phone_number') is-invalid @enderror"
                                    value="{{ Auth::user()->phone }}">
                                @error('phone_number')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row row-sm mg-b-20 mt-4">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Postal code<span class="text-danger">*</span></label>
                                <input type="text" name="postalcode"
                                    class="form-control @error('postalcode') is-invalid @enderror"
                                    value="{{ Auth::user()->postalcd }}">
                                @error('postalcode')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Email<span class="text-danger">*</span></label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" disabled
                                    value="{{ Auth::user()->email }}">
                                @error('email')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>City<span class="text-danger">*</span></label>
                                <select name="city" class="form-control select2 select2-accessible">
                                    @php $listCity=array('Tanger','Agadir','Marrackech','Tétoun','Al Hoceima','Nador','Fés','Meknès','Rabat','Kènitra','Casablanca','Errachidia','Zagora','Béni Mellal','Khouribga','Setta','El Jadida','Safi','Ben Guerir','El Kelâa des Sraghna','Ouarzazate','Essaouira','Guelmim','Smara','Tarfaya','Laâyoune','tan-tan','Dakhla')  @endphp
                                    <option value="{{ Auth::user()->city }}">{{ Auth::user()->city }}</option>
                                    @foreach ($listCity as $city)
                                        <option value="{{ $city }}">{{ $city }}</option>
                                    @endforeach
                                </select>
                                @error('city')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row row-sm mg-b-20 mt-4">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label> Address 1<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="faddress" rows="5">{{ Auth::user()->fadresse }}</textarea>
                                @error('faddress')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label> Address 2 <span class="text-secondary">(optional)</span></label>
                                <textarea class="form-control" name="saddress" rows="5">{{ Auth::user()->sadresse }}</textarea>
                                @error('saddress')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                    </div>
                    @if (App\Models\Panier::count() > 0)
                        <div class="card-footer bg-white d-flex justify-content-center mt-4">
                            <button type="submit" class="btn ripple btn-primary bg-black border-0 fw-bold">
                                Continue Payment
                            </button>
                        </div>
                    @else
                        <div class="card-footer text-center bg-white mt-4">
                            <h2>Your <i class="fa fa-shopping-cart"></i> cart is empty</h2>
                            <a href="{{ route('category') }}" class="btn btn-dark ">Continue shopping</a>
                        </div>
                    @endif

                    <a href="{{ route('viewpanier') }}" class="btn btn-white text-dark float-start fw-bold">
                        < Back</a>

                </form>
            </div>
        </div>

    </div>


@endsection
