@extends('backoffice.layout')

@section('css')
  <link rel="stylesheet" href="{{asset('css/backoffice/dataTables.bootstrap4.css')}}">
@endsection

@section('content')
    
  <h1 class="page-title">Employees Management</h1>

  <div class="row my-4">
    <!-- Small table -->
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-body">
          <!-- table -->
          <table class="table datatables" id="dataTable-1">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Company Name</th>
                <th>Is Complete</th>
                <th>Interaction Status</th>
                <th>Created at</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($employees as $employee)
                <tr>
                  <td>{{ $employee->getName() }}</td>
                  <td>{{ $employee->getEmail() }}</td>
                  <td>{{ $employee->company->getCompanyName() }}</td>
                  <td>{{ $employee->isComplete() }}</td>
                  <td>{{ $employee->getInteractionStatus() }}</td>
                  <td>{{ date('Y-m-d',strtotime($employee->getCreatedAt())) }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
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