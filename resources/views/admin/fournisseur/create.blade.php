@section ('titre','First')
@extends('layouts.master')
@section('content')
@if(Session::has('success'))
  @include('success')
@endif
 <div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex mb-4">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Fournisseur&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;Cree Fournisseur&nbsp;</p>
        </div>
      <div class="card">
          <div class="card-header">
            <h3>Fournisseur<a href="{{route('fournisseur.index')}}" class="btn btn-primary btn-sm float-end">Back</a>
            </h3>
          </div>
          <div class="card-body">
            <form action="{{route('fournisseur.store')}}" method="post" class="form" id="register_form" enctype="multipart/form-data">
                    @csrf
                    <div class="row row-sm mg-b-20">
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>Name
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="name" class="form-control @error('name') us-invalid @enderror"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>Phone Number<span class="text-danger">*</span></label>
                            <input type="text" name="phone_number"
                                class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}">
                            @error('phone_number')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row row-sm mg-b-20">
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>Email<span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>City<span class="text-danger">*</span></label>
                            <select name="city" class="form-control select2 select2-accessible">
                                @php $listCity=array('Tanger','Agadir','Marrackech','Tétoun','Al Hoceima','Nador','Fés','Meknès','Rabat','Kènitra','Casablanca','Errachidia','Zagora','Béni Mellal','Khouribga','Setta','El Jadida','Safi','Ben Guerir','El Kelâa des Sraghna','Ouarzazate','Essaouira','Guelmim','Smara','Tarfaya','Laâyoune','tan-tan','Dakhla')  @endphp
                                <option value="">Citys</option>
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
                    <div class="form-group">
                        <label> Address <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="address" rows="5">{{ old('address') }}</textarea>
                        @error('address')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="fileInput" class="form-label">Choose a file to upload</label>
                        <div class="custom-file">
                            <input type="file" class="form-control" id="fileInput" name="logo" >
                        </div>
                        @error('logo')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn ripple btn-primary ">
                            Create
                        </button>
                    </div>

            </form>
          </div>
      </div>
    </div>
  </div>
@endsection
