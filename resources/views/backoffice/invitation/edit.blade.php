@extends('backoffice.layout')
@section('content')
    
    <!-- Edit Post -->
    <div>
      <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
        <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
          <div class="mb-4">
            <h1 class="font-serif text-3xl font-bold underline decoration-gray-400">
              Edit Post
            </h1>
          </div>

          <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
            <form method="POST" action="{{ route('admin.company.update', $company->getKey()) }}">
                @csrf
                @method('PUT')
              <!-- Title -->
              <div>
                <label class="block text-sm font-bold text-gray-700" for="company_name">
                  Company Name
                </label>

                <input
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="text" name="company_name" id="company_name" value="{{ old('company_name', $company->getCompanyName()) }}" />
                  
                  <span class="text-danger">
                    @error('company_name')
                        {{ $message }}
                    @enderror
                  </span>
              </div>

              <div>
                <label class="block text-sm font-bold text-gray-700" for="ice">
                  ICE
                </label>

                <input
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="text" name="ice" id="ice" value="{{ old('ice', $company->getICE()) }}" />
                  
                  <span class="text-danger">
                    @error('ice')
                        {{ $message }}
                    @enderror
                  </span>
              </div>
              
              <div>
                <label class="block text-sm font-bold text-gray-700" for="address">
                  Address
                </label>

                <input
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="text" name="address" id="address" value="{{ old('address', $company->getAddress()) }}" />
                  
                  <span class="text-danger">
                    @error('address')
                        {{ $message }}
                    @enderror
                  </span>
              </div>
              
              <div>
                <label class="block text-sm font-bold text-gray-700" for="country">
                  Country
                </label>

                <input
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="text" name="country" id="country" value="{{ old('country', $company->getCountry() ) }}" />
                  
                  <span class="text-danger">
                    @error('country')
                        {{ $message }}
                    @enderror
                  </span>
              </div>
              
              <div>
                <label class="block text-sm font-bold text-gray-700" for="city">
                  city
                </label>

                <input
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="text" name="city" id="city" value="{{ old('city', $company->getCity()) }}" />
                  
                  <span class="text-danger">
                    @error('city')
                        {{ $message }}
                    @enderror
                  </span>
              </div>
              
              <div>
                <label class="block text-sm font-bold text-gray-700" for="phone_number">
                  Phone number
                </label>

                <input
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $company->getPhoneNumber()) }}" />
                  
                  <span class="text-danger">
                    @error('phone_number')
                        {{ $message }}
                    @enderror
                  </span>
              </div>

              <div class="flex items-center justify-start mt-4 gap-x-2">
                <button type="submit"
                  class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                  Update
                </button>
                <button type="submit"
                  class="px-6 py-2 text-sm font-semibold text-gray-100 bg-gray-400 rounded-md shadow-md hover:bg-gray-600 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                  Cancel
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection