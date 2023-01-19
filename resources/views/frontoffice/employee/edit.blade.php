@extends('frontoffice.layout')

@section('breadcrumb')
    <ul class="breadcrumb-title">
        <li class="breadcrumb-item">
            <a href="{{ route('user.index') }}"> <i class="fa fa-home"></i> </a>
        </li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit Profil</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Edit Profil</h5>
        </div>
        <div class="card-block">
            <form action="{{ route('user.update', auth()->user()->getKey()) }}" method="POST" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="employee_name">Full Name :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="employee_name" value="{{ old('name', $employee->getName()) }}"  required="">
                        <div class="col-form-label">
                            @error('name')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="address">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="address" id="address" value="{{ old('address', $employee->getAddress()) }}" required="">
                        <div class="col-form-label">
                            @error('address')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="phone_number">Phone Number</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ old('phone_number', $employee->getPhoneNumber()) }}" required="">
                        <div class="col-form-label">
                            @error('phone_number')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="birthday">Birthday</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="birth_date" id="birthday" value="{{ old('birth_date', date('Y-m-d', strtotime($employee->getBirthday()))) }}" required="">
                        <div class="col-form-label">
                            @error('birth_date')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary waves-effect waves-light offset-10 col-md-2">Update</button>
            </form>
        </div>
    </div>
@endsection