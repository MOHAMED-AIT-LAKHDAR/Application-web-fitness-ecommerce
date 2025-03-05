@section ('titre','New Produit')
@extends('layouts.master')
@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            <p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;Cree un nouveau produit&nbsp;</p>
        </div>
      <div class="card">
          <div class="card-header">
            <h3>Add new produit <a href="{{route('category.index')}}" class="btn btn-primary btn-sm text-white float-end">Back</a>
            </h3>
          </div>
          <div class="card-body">
            <form action="{{route('buy.prod')}}" method="POST" class="form" id="register_form" enctype="multipart/form-data">
                    @csrf
                    <div class="row row-sm mg-b-20">
                    <div class="col-lg-4">
                        <div class="form-group">
                        <p class="mg-b-10">Choose Category<span class="text-danger">*</span></p>

                        <select class="form-control select2 select2-accessible"
                            tabindex="-1" aria-hidden="true" name="category_id">
                            <option label="Choose one">
                            </option>
                            @foreach ($categorys as $cat)
                                <option value="{{ $cat->id }}">
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-danger">
                            <strong>{{$message}}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label>{{__('Name')}}
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                        @error('name')
                        <span class="text-danger">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label>{{__('SKU')}} <span class="text-info">(Stock keeping unit)</span> <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('sku') is-invalid @enderror" name="sku"  value="{{old('sku')}}">
                        @error('sku')
                        <span class="text-danger">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                        </div>
                    </div>
                    </div>
                    <div class="row row-sm mg-b-20">
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label>{{__('selling price')}}<span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('selling_price') is-invalid @enderror"  name="selling_price">
                        @error('selling_price')
                            <span class="text-danger">
                            <strong>{{$message}}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label>{{__('purchase price')}}<span class="text-danger">*</span></label>
                        <input type="number" class="form-control pricebuy @error('purchase_price') is-invalid @enderror" name="purchase_price">
                        @error('purchase_price')
                            <span class="text-danger">
                            <strong>{{$message}}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label class="mg-b-10">Reference Buy : </label>
                        <span class="text-danger">*</span>
                        <input type="text" name="reference" placeholder="Enter the reference sale"
                            class="form-control @error('reference') is-invalid @enderror">
                        @error('reference')
                            <span class="text-danger">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                    <div class="row row-sm mg-b-20">
                    <div class="col-lg-6 quantitysection">
                        <label for="">Quantity</label>
                        <span class="text-danger">*</span>
                        <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-default decrease-qte" type="button">-</button>
                        </span>
                        <input type="number" class="form-control quantity" value="1"
                            name="quantity" readonly>
                        <span class="input-group-btn">
                            <button class="btn btn-default increase-qte" type="button">+</button>
                        </span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="mg-b-10">Total Price : </label>
                        <input type="number" name="total_price"
                            class="form-control totalPrice" readonly>

                    </div>
                    </div>
                    <div class="row row-sm mg-b-20">
                    <div class="col-lg-6 mt-4">
                        <div class="form-group">
                        <label class="tx-medium">Upload Image <span class="text-danger">*</span></label>
                            <div>
                            <input id="demo" type="file" name="img" class="form-control">
                            </div>
                        @error('img')
                        <span class="text-danger">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4">
                        <div class="form-group">
                        <label class="mg-b-10">fournisseur : </label>
                        <span class="text-danger">*</span>
                        <select class="form-control select2 select2-accessible"
                            tabindex="-1" aria-hidden="true" name="fournisseur_id">
                            <option label="Choose one">
                            </option>
                            @foreach ($fournisseurs as $four)
                                <option value="{{ $four->id }}">
                                    {{ $four->name }}
                                </option>
                            @endforeach
                        </select>
                            @error('fournisseur_id')
                        <span class="text-danger">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                        </div>
                    </div>
                    </div>
                    <div class="row row-sm mg-b-20">
                    <div class="col-lg-12">
                        <label>{{__('Description')}}</label>
                        <textarea name="description" rows="3" class="form-control">{{old('description')}}</textarea>
                        @error('description')
                        <span class="text-danger">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    </div>

                    <div>
                    <button type="submit" class="btn ripple btn-primary my-4">
                        {{__('Create')}}
                    </button>
                    </div>
                </form>
          </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script>
    $(document).ready(function(){

      // Decrease quantity button
      $('.quantitysection').on('click', '.decrease-qte', function() {
          var quantityInput = $(this).closest('.input-group').find('.quantity');
          var currentQuantity = parseInt(quantityInput.val());
          if (currentQuantity >= 2) {
              quantityInput.val(currentQuantity - 1);
          }
      });
      // Increase quantity button
      $('.quantitysection').on('click', '.increase-qte', function() {
          var quantityInput = $(this).closest('.input-group').find('.quantity');
          var currentQuantity = parseInt(quantityInput.val());
          quantityInput.val(currentQuantity + 1);
      });

      $('.increase-qte').on('click', function() {
        var quantity = parseInt($('.quantity').val());
        var priceBuy = parseFloat($('.pricebuy').val());
        var total = (quantity + 1) * priceBuy;
        total = total.toFixed(2);
        $('.totalPrice').val(total);
      });
      $('.decrease-qte').click(function() {
          var quantity = parseInt($('.quantity').val());
          var priceBuy = parseFloat($('.pricebuy').val());
          if (quantity >= 1) {
              var total = (quantity - 1) * priceBuy;
              total = total.toFixed(2);
              $('.totalPrice').val(total);
          }
      });
    })
  </script>
@endsection
