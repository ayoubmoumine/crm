@extends('backoffice.layout')

@section('css')
  <link rel="stylesheet" href="{{asset('css/backoffice/dataTables.bootstrap4.css')}}">
@endsection

@section('content')
    
<h1 class="page-title">Invitations Management</h1>

<div class="row my-4">
  <!-- Small table -->
  <div class="col-md-12">
    <div class="card shadow">
      <div class="card-body">
        <div class="col-md-12 pr-0">
          <a href="{{ route('admin.invitations.create') }}">
            <button type="button" class="btn mb-2 btn-primary offset-10 col-2">Create Invitation</button>
          </a>
        </div>
        <!-- table -->
        <table class="table datatables" id="dataTable-1">
          <thead>
            <tr>
              <th>Company Name</th>
              <th>Employee Name</th>
              <th>Employee Email</th>
              <th>Status</th>
              <th>Created at</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
            @foreach ($invitations as $invitation)
            
              <tr>
                <td>{{ $invitation->company->getCompanyName() }}</td>
                <td>{{ $invitation->getEmployeeName() }}</td>
                <td>{{ $invitation->getEmployeeEmail() }}</td>
                <td>{{  App\Models\Invitation::STATUSES[ $invitation->getStatus() ] }}</td>
                <td>{{ date('Y-m-d',strtotime($invitation->getCreatedAt())) }}</td>
                <td class="text-center">
                  
                  @if ( $invitation->canBeCanceled() )
                  
                    <form action="{{ route('admin.invitations.cancel', $invitation->getKey() ) }}" method="POST" class="text-center">
                      @csrf
                      <button class="btn mb-2 btn-link" title="Delete">
                          <span> Cancel </span>
                      </button>
                    </form>
                  @else
                    -
                  @endif
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