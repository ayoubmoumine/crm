@extends('backoffice.layout')
@section('content')
    
<div>
    <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
  
      <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
  
        <div class="mb-4">
          <h1 class="font-serif text-3xl font-bold underline decoration-gray-400"> Admin Show</h1>
        </div>
  
        <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
          <form method="POST" action="#">
            <!-- Title -->
            <div>
                <div class="flex items-center mb-4 space-x-2">
                    <span class="text-xs text-gray-500"> {{ date('Y-m-d', strtotime($company->getCreatedAt()) ) }}</span>
                </div>
                <h3 class="text-2xl font-semibold">{{ $company->getCompanyName() }}</h3>
                <h3 class="text-2xl font-semibold">{{ $company->getICE() }}</h3>
                <h3 class="text-2xl font-semibold">{{ $company->getAddress() }}</h3>
                <h3 class="text-2xl font-semibold">{{ $company->getCountry() }}</h3>
                <h3 class="text-2xl font-semibold">{{ $company->getCity() }}</h3>
                <h3 class="text-2xl font-semibold">{{ $company->getPhoneNumber() }}</h3>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <a href="{{route('admin.invitations.index')}}">
    <button type="button" class="btn btn-secondary">Get back</button>
  </a>
@endsection