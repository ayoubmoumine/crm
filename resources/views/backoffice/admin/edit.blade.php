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
        <form action="{{ route('admin.manage.update', $admin->getKey()) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Full name" value="{{ old('name', $admin->getName()) }}">
            <span class="text-danger">
              @error('name')
                  {{ $message }}
              @enderror
            </span>
          </div>
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="email@example.com" value="{{ old('email', $admin->getEmail() ) }}">
            <span class="text-danger">
              @error('email')
                  {{ $message }}
              @enderror
            </span>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{ route('admin.manage.index') }}">
              <button type="button" class="btn btn-secondary">Get back</button>
          </a>
        </form>
      </div> <!-- /. card-body -->
    </div> <!-- /. card -->
  </div> <!-- /. col -->
</div> <!-- /. end-section -->
    @endsection