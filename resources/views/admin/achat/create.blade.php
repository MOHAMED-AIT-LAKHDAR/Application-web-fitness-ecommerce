@section('titre', 'Cree Une Achat')
@extends('layouts.master')
@section('content')
    @if (Session::has('success'))
        @include('success')
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex align-items-end flex-wrap mb-4">
                <div class="me-md-3 me-xl-5">
                    @if (session()->has('success'))
                        @include('success')
                    @endif
                </div>
                <div class="d-flex mb-4">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Achat&nbsp;</p>
                    <p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;Create Achat&nbsp;</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Cree des Achats<a href="{{ route('buy.index') }}" class="btn btn-primary btn-sm float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('buy.store') }}" class="form">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <label class="mg-b-10">Reference Buy : </label>
                                    <input type="text" name="reference" placeholder="Enter the reference sale"
                                        class="form-control">
                                    @error('reference')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label class="mg-b-10">Choose Supplier : </label>
                                        <select class="form-control select2 select2-accessible" tabindex="-1"
                                            aria-hidden="true" name="fournisseur_id">
                                            <option label="Choose one">
                                            </option>
                                            @foreach ($fournisseurs as $fourf)
                                                <option value="{{ $fourf->id }}">
                                                    {{ $fourf->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('fournisseur_id')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                        <a class="btn ripple bg-black my-4 text-white" type="submit" id="addRow">Add Row</a>
                        <div class="table-responsive border userlist-table">
                            <table class="table card-table table-striped table-vcenter text-nowrap mb-0" id="saleTable">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th class="text-center">Quantity</th>
                                        <th>Price Unity</th>
                                        <th>Price Totale</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="saleRow">
                                        <td>
                                            <select class="form-control select2 select2-accessible getprod" tabindex="-1"
                                                aria-hidden="true" name="products[]">
                                                <option label="Choose one"></option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">
                                                        {{ $product->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default decrease-qte" type="button">-</button>
                                                </span>
                                                <input type="number" class="form-control quantity" value="1"
                                                    name="qte[]" readonly>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default increase-qte" type="button">+</button>
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control priceUnity" name="price_unity[]"
                                                placeholder="Enter Price">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control totalPrice" name="total_price[]"
                                                readonly>
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <table class="table mt-4" style="width: 50%">
                            <div class="header">

                                <div class="btn btn-info mt-4" id="calc">Calculate the price</div>
                            </div>
                            <tr>
                                <th>Price Total</th>
                                <td>
                                    <input type="number" class="form-control totalFinal" name="price_total" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th>total quantity</th>
                                <td>
                                    <input type="number" class="form-control totalquantity" name="quantity" readonly>
                                </td>

                            </tr>
                        </table>
                        <div class="form-group">
                            <button class="btn ripple btn-primary my-4" type="submit">
                                Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            //using jquery and ajax to get the price of product
            $('.getprod').on('change', function() {
                var id = this.value;
                $.ajax({
                    url: "{{ route('buy.getproduct', ':id') }}".replace(':id', id),
                    type: "get",
                    dataType: 'json',
                    success: function(result) {
                        $('.priceUnity').val(result.prix_vent);
                    },
                });
            });
            $('#addRow').click(function() {
                var newRow = `
            <tr class="saleRow">
              <td>
                <select class="form-control select2 select2-accessible getprod" tabindex="-1" aria-hidden="true" name="products[]">
                  <option label="Choose one" ></option>
                  @foreach ($products as $product)
                  <option value="{{ $product->id }}">
                    {{ $product->name }}
                  </option>
                  @endforeach
                </select>
              </td>
              <td>
                <div class="input-group">
                  <span class="input-group-btn">
                    <button class="btn btn-default decrease-qte" type="button">-</button>
                  </span>
                  <input type="number" class="form-control quantity" readonly value="1" name="qte[]">
                  <span class="input-group-btn">
                    <button class="btn btn-default increase-qte" type="button">+</button>
                  </span>
                </div>
              </td>
              <td>
                <input type="number" class="form-control priceUnity" name="price_unity[]" placeholder="Enter Price">
              </td>
              <td>
                <input type="number" class="form-control totalPrice" name="total_price[]" readonly>
                </td>
                <td>
                  <a href="#"  class="btn ripple btn-danger removeRow">Delete</a>

                </td>
            </tr>
          `;

                $('#saleTable tbody').append(newRow);
                //
                $(document).on('click', '.removeRow', function(e) {
                    e.preventDefault();
                    let row_item = $(this).parent().parent();
                    $(row_item).remove();
                })
                var newRowElement = $('.saleRow:last');
                newRowElement.find('.getprod').on('change', function() {
                    var id = this.value;
                    var row = $(this).closest('.saleRow');
                    $.ajax({
                        url: "{{ route('buy.getproduct', ':id') }}".replace(':id', id),
                        type: "get",
                        dataType: 'json',
                        success: function(result) {
                            row.find('.priceUnity').val(result.prix_vent);
                        },
                    });
                });

                newRowElement.find('.increase-qte').on('click', function() {
                    var selectIndex = $('.increase-qte').index(this);
                    var quantity = parseInt($('.quantity').eq(selectIndex).val());
                    var priceUnity = parseFloat($('.priceUnity').eq(selectIndex).val());
                    var total = (quantity + 1) * priceUnity;
                    total = total.toFixed(2);
                    $('.totalPrice').eq(selectIndex).val(total);
                });
                newRowElement.find('.decrease-qte').click(function() {
                    var selectIndex = $('.decrease-qte').index(this);
                    var quantity = parseInt($('.quantity').eq(selectIndex).val());
                    var priceUnity = parseFloat($('.priceUnity').eq(selectIndex).val());
                    if (quantity >= 1) {
                        var total = (quantity - 1) * priceUnity;
                        total = total.toFixed(2);
                        $('.totalPrice').eq(selectIndex).val(total);
                    }
                });
            });
            $('.increase-qte').on('click', function() {
                var selectIndex = $('.increase-qte').index(this);
                var quantity = parseInt($('.quantity').eq(selectIndex).val());
                var priceUnity = parseFloat($('.priceUnity').eq(selectIndex).val());
                var total = (quantity + 1) * priceUnity;
                total = total.toFixed(2);
                $('.totalPrice').eq(selectIndex).val(total);
            });
            $('.decrease-qte').click(function() {
                var selectIndex = $('.decrease-qte').index(this);
                var quantity = parseInt($('.quantity').eq(selectIndex).val());
                var priceUnity = parseFloat($('.priceUnity').eq(selectIndex).val());
                if (quantity >= 1) {
                    var total = (quantity - 1) * priceUnity;
                    total = total.toFixed(2);
                    $('.totalPrice').eq(selectIndex).val(total);
                }
            });
            // Decrease quantity button
            $('.table-striped').on('click', '.decrease-qte', function() {
                var quantityInput = $(this).closest('.input-group').find('.quantity');
                var currentQuantity = parseInt(quantityInput.val());
                if (currentQuantity >= 2) {
                    quantityInput.val(currentQuantity - 1);
                }
            });

            // Increase quantity button
            $('.table-striped').on('click', '.increase-qte', function() {
                var quantityInput = $(this).closest('.input-group').find('.quantity');
                var currentQuantity = parseInt(quantityInput.val());
                quantityInput.val(currentQuantity + 1);
            });

            $('#calc').on('click', function() {
                var total = 0;
                var totalquantity = 0
                for (var i = 0; i < $('.totalPrice').length; i++) {
                    total += parseFloat($('.totalPrice').eq(i).val());
                    totalquantity += parseInt($('.quantity').eq(i).val());
                }
                total = total.toFixed(2);
                $('.totalFinal').val(total);
                $('.totalquantity').val(totalquantity);
            });


        });
    </script>

@endsection
