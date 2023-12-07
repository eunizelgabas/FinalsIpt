@extends('base')
@include('_navbar')

@section('content')


<div class="py-5">
    <main class="h-full overflow-y-auto">
        <div class="container  mx-auto grid">

          <!-- Cards -->
          <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
            <!-- Card -->
            <div class="flex items-center p-4  rounded-lg shadow-xs bg-blue-500">
              <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full ">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                </svg>
              </div>
              <div>
                <p class="mb-2 text-lg font-medium text-white dark:text-white">
                 No. of Patients
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                  10
                </p>
              </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4  rounded-lg shadow-xs bg-blue-500">
              <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full ">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                </svg>
              </div>
              <div>
                <p class="mb-2 text-lg font-medium text-white ">
                  No. of Services
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                 24
                </p>
              </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4  rounded-lg shadow-xs bg-blue-500">
                <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full ">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                    </svg>
                  </div>
              <div>
                <p class="mb-2 text-lg font-medium text-white">
                  Total Appointments
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                  376
                </p>
              </div>
            </div>
            <!-- Card -->

          </div>

        </div>
    </main>
</div>
@endsection
