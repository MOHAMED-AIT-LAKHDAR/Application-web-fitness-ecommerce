@section ('titre','Create category')
@extends('layouts.master')
@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex mb-4">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Categorys&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;Create Categorys&nbsp;</p>
        </div>
      <div class="card">
          <div class="card-header">
            <h3>Add Category <a href="{{route('category.index')}}" class="btn btn-primary btn-sm text-white float-end">Back</a>
            </h3>
          </div>
          <div class="card-body">
            <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="">Name : </label>
                  <input type="text" class="form-control @error('name') id-invalide @enderror" name="name"/>
                  @error('name')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-md-12 mb-3">
                  <label for="">Description</label>
                  <textarea name="description" id="" class="form-control @error('description') id-invalide @enderror" ></textarea>
                  @error('description')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-md-6 mb-3">
                  <label for="">Image</label>
                  <input type="file" class="form-control @error('image') id-invalide @enderror" name="image"/>
                    @error('image')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-md-6 mb-3">
                  <label for="">Status</label>
                  <input type="checkbox"  name="status"/>

                </div>

                </div>

                <div class="col-md-12 mb-3">
                  <button type="submit" class="btn btn-primary float-end">Save</button>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>

@endsection
