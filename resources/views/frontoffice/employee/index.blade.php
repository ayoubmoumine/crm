@extends('frontoffice.layout')

@section('breadcrumb')
    <ul class="breadcrumb-title">
        <li class="breadcrumb-item">
            <a href="{{ route('user.index') }}"> <i class="fa fa-home"></i> </a>
        </li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">List Employees</a>
        </li>
    </ul>
@endsection

@section('content')
    <h3 class="mb-4"> Employees of {{ auth()->user()->company->getCompanyName() }} </h3>
    <div class="row">
        @if (!$employees->count() || $employees->count() == 1 && $employees->first()->getKey() == auth()->user()->getKey() )
            <div class="card list-empty">
                <div class="m-auto">
                    No Employees were found
                </div>
            </div>
        @else
            @foreach ($employees as $employee)
                @if($employee->getKey() == auth()->user()->getKey()) @continue @endif
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ $employee->getName() }}</h5>
                        </div>
                        <div class="card-block">
                            <form class="form-material">
                                <div class="form-group form-default form-static-label">
                                    <input type="text" name="email" class="form-control" value="{{ $employee->getEmail() }}" readonly>
                                    <span class="form-bar"></span>
                                    <label class="float-label" for="email">Email</label>
                                </div>
                                <div class="form-group form-default form-static-label">
                                    <input type="text" name="address" class="form-control" value="{{ $employee->getAddress() }}" readonly>
                                    <span class="form-bar"></span>
                                    <label class="float-label" for="address">Address</label>
                                </div>
                                <div class="form-group form-default form-static-label">
                                    <input type="text" name="phone_number" class="form-control" value="{{ $employee->getPhoneNumber() }}" readonly>
                                    <span class="form-bar"></span>
                                    <label class="float-label" for="phone_number">Phone number</label>
                                </div>
                                <div class="form-group form-default form-static-label">
                                    <input type="text" name="birthday" class="form-control" value="{{ date('Y-m-d', strtotime($employee->getBirthday()) ) }}" readonly>
                                    <span class="form-bar"></span>
                                    <label class="float-label" for="birthday">Birthday</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection