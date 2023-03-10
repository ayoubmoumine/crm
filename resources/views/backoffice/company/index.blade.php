@extends('backoffice.layout')

@section('css')
  <link rel="stylesheet" href="{{asset('css/backoffice/dataTables.bootstrap4.css')}}">
@endsection

@section('content')
    
<h1 class="page-title">Companies Management</h1>

<div class="row my-4">
  <!-- Small table -->
  <div class="col-md-12">
    <div class="card shadow">
      <div class="card-body">
        <div class="col-md-12 pr-0">
          <a href="{{ route('admin.company.create') }}">
            <button type="button" class="btn mb-2 btn-primary offset-10 col-2">Create Company</button>
          </a>
        </div>
        <!-- table -->
        <table class="table datatables" id="dataTable-1">
          <thead>
            <tr>
              <th>Company Name</th>
              <th>ICE</th>
              <th>Address</th>
              <th>Country</th>
              <th>City</th>
              <th>Phone number</th>
              <th>Created at</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
            @foreach ($companies as $company)
            
              <tr>
                <td>{{ $company->getCompanyName() }}</td>
                <td>{{ $company->getICE() }}</td>
                <td>{{ $company->getAddress() }}</td>
                <td>{{ $company->getCountry() }}</td>
                <td>{{ $company->getCity() }}</td>
                <td>{{ $company->getPhoneNumber() }}</td>
                <td>{{ date('Y-m-d',strtotime($company->getCreatedAt())) }}</td>
                <td class="row">
                  
                  <a href="{{ route('admin.company.edit', $company->getKey() ) }}" class="col-3 text-center">
                    <div class="">
                      <span class="circle circle-sm">
                        <span class="fe fe-24 fe-edit"></span>
                      </span>
                    </div>
                  </a>
                  <a href="{{ route('admin.company.show', $company->getKey() ) }}" class="col-3 text-center">
                    <div class="col-3 text-center">
                      <span class="circle circle-sm">
                        <span class="fe fe-24 fe-eye"></span>
                      </span>
                    </div>
                  </a>
                  <form action="{{ route('admin.company.destroy', $company->getKey() ) }}" method="POST" class="col-3 text-center">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-link pt-0" title="Delete">
                        <span class="circle circle-sm">
                          <span class="fe fe-24 fe-trash-2"></span>
                        </span>
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div> <!-- simple table -->
</div> <!-- end section -->
  
@endsection

@section('script')
  <script src='{{asset('js/backoffice/jquery.dataTables.min.js')}}'></script>
  <script src='{{asset('js/backoffice/dataTables.bootstrap4.min.js')}}'></script>
  <script>
    $(document).ready(function(){
      $('#dataTable-1').DataTable(
      {
        autoWidth: true,
          "lengthMenu": [
            [16, 32, 64, -1],
            [16, 32, 64, "All"]
          ]
        });
    })
  </script>
@endsection