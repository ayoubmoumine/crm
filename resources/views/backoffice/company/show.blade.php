@extends('backoffice.layout')
@section('content')

<h1 class="page-title">Companies Management</h1>
    
<div class="my-4">
                  
  <form>
    
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="company_name">Company Name</label>
        <input type="text" class="form-control" id="company_name" value="{{ $company->getCompanyName() }}">
      </div>
      <div class="form-group col-md-6">
        <label for="ice">ICE</label>
        <input type="text" class="form-control" id="ice" value="{{ $company->getICE() }}">
      </div>
    </div>

    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" class="form-control" id="address" value="{{ $company->getAddress() }}">
    </div>
    <div class="form-group">
      <label for="phone_number">Phone Number</label>
      <input type="text" class="form-control" id="phone_number"  value="{{ $company->getPhoneNumber() }}">
    </div>
    
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="country">Country</label>
        <input type="text" class="form-control" id="country" value="{{ $company->getCountry() }}">
      </div>
      <div class="form-group col-md-6">
        <label for="city">City</label>
        <input type="text" class="form-control" id="city" value="{{ $company->getCity() }}">
      </div>
    </div>
  </form>
</div>
<a href="{{route('admin.company.index')}}">
  <button type="button" class="btn btn-secondary">Get back</button>
</a>
@endsection