@section('titre', 'First')
@extends('layouts.master')
@section('content')
    @if (Session::has('success'))
        @include('success')
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex mb-4">
                <i class="mdi mdi-home text-muted hover-cursor"></i>
                <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Products&nbsp;</p>
                <p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;Cree Products&nbsp;</p>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Create Product<a href="{{ route('product.index') }}" class="btn btn-primary btn-sm float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="post" class="form" id="register_form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <p class="mg-b-10">Choose Category</p>
                                    <select class="form-control select2 select2-accessible" tabindex="-1"
                                        aria-hidden="true" name="category_id">
                                        <option label="Choose one">choose one
                                        </option>
                                        @foreach ($categorys as $cat)
                                            <option value="{{ $cat->id }}">
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Name') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}">
                                    @error('name')
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
                                    <label>{{ __('Price Vent') }}<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="prix_vent">
                                    @error('prix_vent')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Price achat') }}<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="prix_achat">
                                    @error('prix_achat')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ __('SKU') }} <span class="text-info">(Stock keeping unit)</span> <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="sku" value="{{ old('sku') }}">
                            @error('sku')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Description') }}<span class="text-danger">*</span></label>
                                    <textarea name="description" rows="3" class="form-control">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Utilisation') }}<span class="text-danger">*</span></label>
                                    <textarea name="utilisation" rows="3" class="form-control">{{ old('utilisation') }}</textarea>
                                    @error('utilisation')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="condition">Condition</label>
                                    <select name="condition" class="form-control">
                                        <option value="">--Select Condition--</option>
                                        <option value="default">Default</option>
                                        <option value="new">New</option>
                                        <option value="hot">Hot</option>
                                    </select>
                                    @error('condition')
                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">Status <span
                                            class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option value="">--Select Status--</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="discount" class="col-form-label">Discount(%)</label>
                                    <input id="discount" type="number" name="discount" min="0" max="80"
                                        placeholder="Enter discount" value="{{ old('discount') }}" class="form-control">
                                    @error('discount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Best </label>
                                    <select name="best" class="form-control">
                                        <option value="">--Select Condition--</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    @error('best')
                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Featured </label>
                                    <select name="featured" class="form-control">
                                        <option value="">--Select Condition--</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    @error('featured')
                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fileInput" class="form-label">Upload image</label><span
                                class="text-danger">*</span>
                            <div class="custom-file">
                                <input type="file" class="form-control" id="fileInput" name="img">
                            </div>
                            @error('img')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn ripple btn-primary my-4">
                                {{ __('Create') }}
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
