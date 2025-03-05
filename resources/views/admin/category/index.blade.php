@section('titre', 'Categories')
@extends('layouts.master')
@section('content')
    @if (Session::has('success'))
        @include('alert.success')
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex mb-4">
                <i class="mdi mdi-home text-muted hover-cursor"></i>
                <p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;Categorys&nbsp;</p>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Category <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm float-end">Add
                            Cateogry</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive border userlist-table">
                        <table class="table table-striped" id="myDataTable">
                            <thead>
                                <tr>
                                    <th class="wd-lg-8p"><span>#</span></th>
                                    <th class="wd-lg-8p"><span>Name of categorys</span></th>
                                    <th class="wd-lg-8p"><span>Description</span></th>
                                    <th class="wd-lg-8p"><span>Status</span></th>
                                    <th class="wd-lg-8p"><span>Create</span></th>
                                    <th class="wd-lg-20p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $id = 1 @endphp
                                @foreach ($categories as $cat)
                                    <tr>
                                        <td class="fw-bold">{{ $id }}</td>
                                        <td class="fw-bold">{{ $cat->name }}</td>
                                        <td class="fw-bold">{{ Str::limit($cat->description, 30) }}</td>
                                        <td class="fw-bold">

                                            @if ($cat->status == '1')
                                                <span class="badge bg-danger">Hidden</span>
                                            @else
                                                <span class="badge bg-success">Visible</span>
                                            @endif
                                        </td>
                                        <td class="fw-bold">{{ $cat->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <a href="{{ route('category.edit', $cat->id) }}" class="btn btn-sm btn-info">
                                                <i class="mdi mdi-border-color"></i>
                                            </a>
                                            <a href="{{ route('category.delete', $cat->id) }}" onclick="confirmation(event)"
                                                class="btn btn-sm btn-danger">
                                                <i class="mdi mdi-delete-forever"></i>
                                            </a>
                                            <a href="{{ route('category.toggleVisibility', $cat->id) }}"
                                                class="btn btn-sm btn-primary">
                                                @if ($cat->status == '1')
                                                    <i class="mdi mdi-eye"></i>
                                                @else
                                                    <i class="mdi mdi-eye-off"></i>
                                                @endif
                                            </a>
                                        </td>
                                    </tr>
                                    @php $id++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
