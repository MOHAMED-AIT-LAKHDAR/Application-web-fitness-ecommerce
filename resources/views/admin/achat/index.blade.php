@section('titre', 'Achat')
@extends('layouts.master')
@section('content')
    @if (Session::has('success'))
        @include('alert.success')
    @elseif(Session::has('danger'))
        @include('alert.danger')
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap mb-4">

                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;Achat&nbsp;</p>
                    </div>
                </div>

            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Achat <a href="{{ route('buy.create') }}" class="btn btn-primary btn-sm float-end">Add Achat</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive border userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0" id="myDataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Reference</th>
                                    <th>supplier</th>
                                    <th>User</th>
                                    <th>Price Total</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $id = 1;
                                @endphp
                                @foreach ($buys as $buy)
                                    <tr>
                                        <td class="fw-bold">{{ $id }}</td>
                                        <td class="fw-bold">{{ $buy->reference }}</td>
                                        <td class="fw-bold">{{ $buy->fournisseur->name }}</td>
                                        <td class="fw-bold">{{ $buy->user->name }}</td>
                                        <td class="text-success fw-bold">{{ $buy->prix_total }} MAD</td>
                                        <td class="fw-bold">{{ $buy->quantity }}</td>
                                        <td class="fw-bold">{{ $buy->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <a href="{{ route('buy.details', $buy->reference) }}"
                                                class="btn btn-sm btn-primary">plus</a>
                                            <a href="{{ route('buy.pdf', $buy->reference) }}"
                                                class="btn ripple btn-sm btn-dark">print</a>
                                            <a href="{{ route('buy.delete', $buy->reference) }}"
                                                class="btn btn-sm btn-danger" onclick="confirmation(event)">delete</a>



                                        </td>
                                    </tr>
                                    @php $id++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
