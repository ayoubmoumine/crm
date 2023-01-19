@extends('backoffice.layout')
@section('content')

<h1 class="page-title">Invitation Management</h1>

<div class="row">
  <div class="col-md-12">
    <div class="card shadow mb-4">
      <div class="card-header">
        <strong class="card-title">Create Invitation</strong>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.invitations.store') }}" method="POST">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="company_id">Company ID</label>
              {{-- <input type="text" class="form-control" id="company_id" name="company_id" value="{{ old('company_id') }}"> --}}
              
              <select id="company_id" name="company_id" class="form-control">
                <option readonly>Choose...</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->getKey() }}" @if( old('company_id') == $company->getKey() ) selected @endif> {{ $company->getCompanyName() }} </option>
                @endforeach
              </select>
              <span class="text-danger">
                @error('company_id')
                    {{ $message }}
                @enderror
              </span>
            </div>
            <div class="form-group col-md-6">
              <label for="employee_name">Employee Name</label>
              <input type="text" class="form-control" id="employee_name" name="employee_name" value="{{ old('employee_name') }}">
              <span class="text-danger">
                @error('employee_name')
                    {{ $message }}
                @enderror
              </span>
            </div>
          </div>
          <div class="form-group">
            <label for="employee_email">Employee Email</label>
            <input type="text" class="form-control" id="employee_email" name="employee_email" placeholder="example@gmail.com" value="{{ old('employee_email') }}">
            <span class="text-danger">
              @error('employee_email')
                  {{ $message }}
              @enderror
            </span>
          </div>
          <button type="submit" class="btn btn-primary">Create</button>
          <a href="{{ route('admin.invitations.index') }}">
            <button type="button" class="btn btn-secondary">Back</button>
          </a>
        </form>
      </div> <!-- /. card-body -->
    </div> <!-- /. card -->
  </div> <!-- /. col -->
</div> <!-- /. end-section -->
    @endsection