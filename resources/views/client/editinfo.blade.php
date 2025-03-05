@section('titre', 'Home')
@extends('client.master')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl mt-3 flex-grow-1 container-p-y">
            <div class="card-body">
                <h3>Verify your information</h3>
                <form action="{{ route('edit') }}" method="POST" class="form" id="register_form">
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
                        <div class="col-lg-12">
                            <div class="container d-flex justify-content-center">

                                <input type="submit" value="confimer" class="btn btn-dark text-white mt-2">
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('profile') }}" class="btn btn-white text-dark float-start fw-bold">
                        < Back</a>

                </form>
            </div>
        </div>
    </div>

    </div>

@endsection
