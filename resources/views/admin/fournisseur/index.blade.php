@section('titre', 'First')
@extends('layouts.master')
@section('content')
    @if (Session::has('success'))
        {{ session('alert.success') }}
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex mb-4">
                <i class="mdi mdi-home text-muted hover-cursor"></i>
                <p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;Fournisseur&nbsp;</p>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Fournisseur<a href="{{ route('fournisseur.create') }}" class="btn btn-primary btn-sm float-end">Add
                            fournisseur</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive border userlist-table">
                        <table class="table table-striped" id="myDataTable">
                            <thead>
                                <tr>
                                    <th class="wd-lg-8p"><span>#</span></th>
                                    <th class="wd-lg-8p"><span>picture</span></th>
                                    <th class="wd-lg-8p"><span>Name of Supplier</span></th>
                                    <th class="wd-lg-8p"><span>city</span></th>
                                    <th class="wd-lg-8p"><span>Number</span></th>
                                    <th class="wd-lg-20p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $id = 1 @endphp
                                @foreach ($fours as $fournisseur)
                                    <tr>
                                        <td class="fw-bold">{{ $id }}</td>
                                        <td><img src="{{ asset('images/fournisseur/' . $fournisseur->logo) }}"
                                                alt="" width="100px" height="100px">
                                        </td>
                                        <td class="fw-bold">{{ $fournisseur->name }}</td>

                                        <td class="fw-bold">{{ $fournisseur->city }}</td>
                                        <td class="fw-bold">{{ $fournisseur->phone_number }}</td>
                                        <td>
                                            <a href="{{ route('fournisseur.show', $fournisseur->id) }}"
                                                class="btn btn-dark ripple btn-block">Afficher Plus</a>

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
