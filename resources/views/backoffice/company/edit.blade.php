@extends('backoffice.layout')
@section('content')

<h1 class="page-title">Companies Management</h1>

<div class="row">
  <div class="col-md-12">
    <div class="card shadow mb-4">
      <div class="card-header">
        <strong class="card-title">Edit Company</strong>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.company.update', $company->getKey()) }}" method="POST">
          @csrf
          @method('PUT')
          
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="company_name">Company Name</label>
              <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name', $company->getCompanyName()) }}">
              <span class="text-danger">
                @error('company_name')
                    {{ $message }}
                @enderror
              </span>
            </div>
            <div class="form-group col-md-6">
              <label for="ice">ICE</label>
              <input type="text" class="form-control" id="ice" name="ice" value="{{ old('ice', $company->getICE()) }}">
              <span class="text-danger">
                @error('ice')
                    {{ $message }}
                @enderror
              </span>
            </div>
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Address line" value="{{ old('address', $company->getAddress()) }}">
            <span class="text-danger">
              @error('address')
                  {{ $message }}
              @enderror
            </span>
          </div>
          <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="06XXXXXXXX" value="{{ old('phone_number', $company->getPhoneNumber()) }}">
            <span class="text-danger">
              @error('phone_number')
                  {{ $message }}
              @enderror
            </span>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="country">Country</label>
              <input type="text" class="form-control" id="country" name="country" placeholder="Country..." value="{{ old('country', $company->getCountry()) }}">
              <span class="text-danger">
                @error('country')
                    {{ $message }}
                @enderror
              </span>
            </div>
            <div class="form-group col-md-6">
              <label for="city">City</label>
              <input type="text" class="form-control" id="city" name="city" placeholder="City..." value="{{ old('city', $company->getCity()) }}">
              <span class="text-danger">
                @error('city')
                    {{ $message }}
                @enderror
              </span>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{ route('admin.company.index') }}">
              <button type="button" class="btn btn-secondary">Get back</button>
          </a>
        </form>
      </div> <!-- /. card-body -->
    </div> <!-- /. card -->
  </div> <!-- /. col -->
</div> <!-- /. end-section -->
    @endsection