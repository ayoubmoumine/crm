@extends('backoffice.layout')
@section('content')
    
<div class="my-4">
                  
  <form>
    <div class="form-group">
      <label for="name">Full Name</label>
      <input type="text" class="form-control" id="name" value="{{ $admin->getName() }}">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="email"  value="{{ $admin->getEmail() }}">
    </div>
  </form>
</div>
<a href="{{route('admin.manage.index')}}">
  <button type="button" class="btn btn-secondary">Get back</button>
</a>
@endsection