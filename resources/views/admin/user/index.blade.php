@section('titre', 'Users')
@extends('layouts.master')
@section('content')
    @if (Session::has('success'))
        @include('success')
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex mb-4">
                <i class="mdi mdi-home text-muted hover-cursor"></i>
                <p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;Users&nbsp;</p>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Registred Users
                        {{-- <a href="{{route('category.create')}}" class="btn btn-primary btn-sm float-end">Add Cateogry</a> --}}
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive border userlist-table">
                        <table class="table table-striped" id="myDataTable">
                            <thead>
                                <tr>
                                    <th class="wd-lg-8p"><span>#</span></th>
                                    <th class="wd-lg-8p"><span>Name</span></th>
                                    <th class="wd-lg-8p"><span>Email</span></th>
                                    <th class="wd-lg-8p"><span>Phone</span></th>
                                    <th class="wd-lg-8p"><span>Create</span></th>
                                    <th class="wd-lg-20p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $id = 1 @endphp
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="fw-bold">{{ $id }}</td>
                                        <td class="fw-bold">{{ $user->name . ' ' . $user->lname }}</td>
                                        <td class="fw-bold">{{ $user->email }}</td>
                                        <td class="fw-bold">{{ $user->phone }}</td>

                                        <td class="fw-bold">{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                                        <td>
                                            <a href="{{ route('user.viewuser', $user->id) }}" class="btn btn-sm btn-info">
                                                Show
                                            </a>

                                        </td>
                                    </tr>
                                    @php $id++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $categories->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
