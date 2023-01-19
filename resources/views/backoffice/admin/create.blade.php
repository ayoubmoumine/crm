@extends('backoffice.layout')
@section('content')

<h1 class="page-title">Adminitrators Management</h1>

<div class="row">
  <div class="col-md-12">
    <div class="card shadow mb-4">
      <div class="card-header">
        <strong class="card-title">Create Admin</strong>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Full name" value="{{ old('name') }}">
            <span class="text-danger">
              @error('name')
                  {{ $message }}
              @enderror
            </span>
          </div>
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="email@example.com" value="{{ old('email') }}">
            <span class="text-danger">
              @error('email')
                  {{ $message }}
              @enderror
            </span>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password">
              <span class="text-danger">
                @error('password')
                    {{ $message }}
                @enderror
              </span>
            </div>
            <div class="form-group col-md-6">
              <label for="confirmPassword">Confirm Password</label>
              <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
              <span class="text-danger">
                @error('confirmPassword')
                    {{ $message }}
                @enderror
              </span>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Create</button>
        </form>
      </div> <!-- /. card-body -->
    </div> <!-- /. card -->
  </div> <!-- /. col -->
</div> <!-- /. end-section -->
    @endsection