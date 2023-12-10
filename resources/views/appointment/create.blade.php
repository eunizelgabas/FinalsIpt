@extends('base')
@include('_navbar')

@section('content')

<div class="bg-white px-6 py-12 sm:py-24 lg:px-8">
    <div class="mx-auto max-w-xl flex flex-col items-center justify-center text-center">
      <h1 class="text-4xl md:text-5xl font-bold tracking-tight text-gray-900">Med U Clinic</h1>
      <p class="mt-3 text-lg text-gray-600">Appointment Creation Form.</p>
    </div>
    <form  method="POST" action="{{ route('appointment.store') }}" class="mx-auto mt-5 max-w-xl sm:mt-20">
        {{csrf_field()}}
      <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
        <div class="sm:col-span-2">
            <label for="pat_id" class="block text-sm font-semibold leading-6 text-gray-900">Patient Name</label>
            <div class="mt-2.5">
                {{-- <select id="pat_id" name="pat_id" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    <option disabled selected>Choose a Patient</option>
                    @foreach($patient as $pat)
                                <option value="{{ $pat->id }}">{{ $pat->user->name }}</option>
                             @endforeach
                    </select> --}}
                    @if(auth()->user()->hasRole('patient'))
            <!-- Show the name of the logged-in patient -->
            <input type="text" value="{{ auth()->user()->name }}" readonly class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 bg-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
        @else
            <!-- Show the dropdown for selecting patients -->
            <select id="pat_id" name="pat_id" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                <option disabled selected>Choose a Patient</option>
                @foreach($patient as $pat)
                    <option value="{{ $pat->id }}">{{ $pat->user->name }}</option>
                @endforeach
            </select>
        @endif
            </div>
            @error('pat_id')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
        </div>
        <div class="sm:col-span-2">
            <label for="serv_id" class="block text-sm font-semibold leading-6 text-gray-900">Service</label>
            <div class="mt-2.5">
                <select id="serv_id" name="serv_id" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    <option disabled selected>Choose a Service</option>
                    @foreach($service as $serv)
                                <option value="{{ $serv->id }}">{{ $serv->name }}</option>
                             @endforeach
                    </select>
            </div>
            @error('serv_id')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
        </div>

        <div class="sm:col-span-2">
            <label for="date" class="block text-sm font-semibold leading-6 text-gray-900">Date</label>
            <div class="mt-2.5">
              <input required="" type="date" name="date" id="date" autocomplete="date" placeholder="" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
            </div>
            @error('date')
              <p class="text-red-500 text-xs mt-2">{{$message}}</p>
              @enderror
        </div>

        <div class="sm:col-span-2">
            <label for="time" class="block text-sm font-semibold leading-6 text-gray-900">Time</label>
            <div class="mt-2.5">
              <input required="" type="time" name="time" id="time" autocomplete="time" placeholder="" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
            </div>
            @error('time')
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
