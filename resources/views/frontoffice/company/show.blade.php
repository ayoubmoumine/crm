@extends('frontoffice.layout')

@section('breadcrumb')
    <ul class="breadcrumb-title">
        <li class="breadcrumb-item">
            <a href="{{ route('user.index') }}"> <i class="fa fa-home"></i> </a>
        </li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $company->getCompanyName() }}</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Company's Info</h5>
        </div>
        <div class="card-block">
            <form>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="company_name">Company Name :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="company_name" value="{{ $company->getCompanyName() }}"  readonly="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="ice">ICE</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ice" value="{{ $company->getICE() }}" readonly="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="address">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="address" value="{{ $company->getAddress() }}" readonly="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="country">Country</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="country" value="{{ $company->getCountry() }}" readonly="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="city">City</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="city" value="{{ $company->getCity() }}" readonly="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="phone_number">Phone Number</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="phone_number" value="{{ $company->getPhoneNumber() }}" readonly="">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection