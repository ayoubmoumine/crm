@extends('backoffice.layout')

@section('css')
  <link rel="stylesheet" href="{{asset('css/backoffice/dataTables.bootstrap4.css')}}">
@endsection

@section('content')
  <h1 class="page-title">Adminitrators Management</h1>
  <div class="row my-4">
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-body">
          <div class="col-md-12 pr-0">
            <a href="{{ route('admin.manage.create') }}">
              <button type="button" class="btn mb-2 btn-primary offset-10 col-2">Create Admin</button>
            </a>
          </div>
          <table class="table datatables" id="dataTable-1">
            <thead>
              <tr>
                <th class="w-25">Name</th>
                <th class="w-25">Email</th>
                <th class="w-25">Created at</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              
              @foreach ($admins as $admin)
              
                <tr>
                  <td>{{ $admin->getName() }}</td>
                  <td>{{ $admin->getEmail() }}</td>
                  <td>{{ date('Y-m-d',strtotime($admin->getCreatedAt())) }}</td>
                  <td class="row">
                    <a href="{{ route('admin.manage.edit', $admin->getKey() ) }}" class="col-3 text-center">
                      <div class="">
                        <span class="circle circle-sm">
                          <span class="fe fe-24 fe-edit"></span>
                        </span>
                      </div>
                    </a>
                    <a href="{{ route('admin.manage.show', $admin->getKey() ) }}" class="col-3 text-center">
                      <div class="col-3 text-center">
                        <span class="circle circle-sm">
                          <span class="fe fe-24 fe-eye"></span>
                        </span>
                      </div>
                    </a>
                    <form action="{{ route('admin.manage.destroy', $admin->getKey() ) }}" method="POST" class="col-3 text-center">
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