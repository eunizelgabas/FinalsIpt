@extends('base')
@include('_navbar')

@section('content')

<div class="bg-white px-6 py-12 sm:py-24 lg:px-8">
    <div class="mx-auto max-w-xl flex flex-col items-center justify-center text-center">
      <h1 class="text-4xl md:text-5xl font-bold tracking-tight text-gray-900">Med U Clinic</h1>
      <p class="mt-3 text-lg text-gray-600">Patient Creation Form.</p>
    </div>
    <form  method="POST" action="{{ route('patient.store') }}" class="mx-auto mt-5 max-w-xl sm:mt-20">
        {{csrf_field()}}
      <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
        <div class="sm:col-span-2">
          <label for="name" class="block text-sm font-semibold leading-6 text-gray-900">Name</label>
          <div class="mt-2.5">
            <input required="" type="text" name="name" id="name" autocomplete="organization" placeholder="e.g. John Doe" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
          </div>
            @error('name')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>
        <div class="sm:col-span-2">
          <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Email</label>
          <div class="mt-2.5">
            <input required="" type="email" name="email" id="email" autocomplete="email" placeholder="test@test.com" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
          </div>
          @error('email')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>
        <div class="sm:col-span-2">
            <label for="address" class="block text-sm font-semibold leading-6 text-gray-900">Address</label>
            <div class="mt-2.5">
              <input required="" type="text" name="address" id="address" autocomplete="address" placeholder="" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
            </div>
            @error('address')
              <p class="text-red-500 text-xs mt-2">{{$message}}</p>
              @enderror
        </div>
        <div class="sm:col-span-2">
        <label for="gender" class="block text-sm font-semibold leading-6 text-gray-900">Gender</label>
        <div class="mt-2.5">
            <select id="gender" name="gender" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                <option disabled selected>Choose a gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                </select>
        </div>
        @error('gender')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>
          <div class="sm:col-span-2">
            <label for="password" class="block text-sm font-semibold leading-6 text-gray-900">Password</label>
            <div class="mt-2.5">
              <input required="" type="password" name="password" id="password" autocomplete="password" placeholder="" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
            </div>
            @error('password')
              <p class="text-red-500 text-xs mt-2">{{$message}}</p>
              @enderror
        </div>
        <div class="sm:col-span-2">
            <label for="password_confirmation" class="block text-sm font-semibold leading-6 text-gray-900">Confirm Password</label>
            <div class="mt-2.5">
              <input required="" type="password" name="password_confirmation" id="password_confirmation" autocomplete="password" placeholder="" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
            </div>
            @error('password_confirmation')
              <p class="text-red-500 text-xs mt-2">{{$message}}</p>
              @enderror
        </div>
      </div>
      <div class="mt-10">
        <button type="submit" class="bg-blue-600 text-white rounded-sm py-2 w-full block">Submit →</button>
      </div>
    </form>
  </div>

@endsection
