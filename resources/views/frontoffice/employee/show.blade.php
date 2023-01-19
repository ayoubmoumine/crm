@extends('frontoffice.layout')

@section('breadcrumb')
    <ul class="breadcrumb-title">
        <li class="breadcrumb-item">
            <a href="{{ route('user.index') }}"> <i class="fa fa-home"></i> </a>
        </li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Information</h5>
        </div>
        <div class="card-block">
            <form>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="employee_name">Full Name :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="employee_name" value="{{ $employee->getName() }}"  readonly="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="address">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="address" value="{{ $employee->getAddress() }}" readonly="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="phone_number">Phone Number</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="phone_number" value="{{ $employee->getPhoneNumber() }}" readonly="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="birthday">Birthday</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="birthday" value="{{ date('Y-m-d', strtotime($employee->getBirthday())) }}" readonly="">
                    </div>
                </div>
            </form>
            <div class="">
                <a href="{{ route('user.edit', auth()->user()->getKey() ) }}">
                    <button class="btn btn-primary waves-effect waves-light offset-10 col-md-2">edit</button>
                </a>
            </div>
        </div>
    </div>
@endsection