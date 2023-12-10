@extends('base')
@include('_navbar')

@section('content')

<div class="bg-white px-6 py-12 sm:py-24 lg:px-8">
    <div class="mx-auto max-w-xl flex flex-col items-center justify-center text-center">
      <h1 class="text-4xl md:text-5xl font-bold tracking-tight text-gray-900">Med U Clinic</h1>
      <p class="mt-3 text-lg text-gray-600">Medical Services Update Form.</p>
    </div>
    <form  method="POST" action="{{ route('services.update' , $service->id) }}" class="mx-auto mt-5 max-w-xl sm:mt-20">
        @csrf
        @method('PUT')
      <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
        <div class="sm:col-span-2">
          <label for="name" class="block text-sm font-semibold leading-6 text-gray-900">Service</label>
          <div class="mt-2.5">
            <input  value="{{ old('service', $service->name) }}" type="text" name="name" id="name"  class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6" >
          </div>
            @error('name')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>
        <div class="sm:col-span-2">
          <label for="description" class="block text-sm font-semibold leading-6 text-gray-900">Description</label>
          <div class="mt-2.5">
            <input type="text" name="description" id="description" value="{{ old('service', $service->description) }}" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
          </div>
          @error('description')
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
