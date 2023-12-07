@extends('base')
@include('_navbar')

@section('content')


<div class="bg-gray-50 p-8 rounded-md w-full ">
    <div class=" flex items-center justify-between pb-6">
        <div>
            <h2 class="text-gray-600 font-semibold text-2xl">List of Services</h2>

        </div>
        <div class="flex items-center justify-between">
            <div class="lg:ml-40 ml-10 space-x-8 justify-between">
                @if(session('message'))
                    <div class="alert bg-green-500 p-4">
                        {{session('message')}}
                    </div>
                @endif


                <a href="/services/create" type="button" class="bg-blue-500 px-4 py-2 rounded-md text-white font-normal tracking-wide cursor-pointer" >
                    <i class="fa-solid fa-plus"></i> Create Service
                </a>
                {{-- <button class="bg-blue-500 px-4 py-2 rounded-md text-white font-normal tracking-wide cursor-pointer">Create Employee</button> --}}
            </div>
        </div>
    </div>
    <div class="flex-1 pr-4">
        <div class="relative md:w-1/3">
            <input type="search Employee"
                class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                placeholder="Search...">
            <div class="absolute top-0 left-0 inline-flex items-center p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                    <circle cx="10" cy="10" r="7" />
                    <line x1="21" y1="21" x2="15" y2="15" />
                </svg>
            </div>
        </div>
    </div>
    <div>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>

                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Name
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Email
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Position
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Address
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Phone
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Status
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Role
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($employees as $emp) --}}
                            <tr>

                                <td class="px-5 py-5 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap"></p>
                                </td>
                                <td class="px-5 py-5 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap"></p>
                                </td>
                                <td class="px-5 py-5 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap"></p>
                                </td>
                                <td class="px-5 py-5 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap"></p>
                                </td>
                                <td class="px-5 py-5 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap"></p>
                                </td>
                                <td class="px-5 py-5 bg-white text-sm">
                                    <span class="relative inline-block px-3 py-1 font-semibold">
                                        {{-- <span aria-hidden class="absolute inset-0 opacity-50 rounded-full
                                            @if($emp->user->status == 1)
                                            text-green-900 bg-green-400
                                            @else
                                            text-red-900 bg-red-400
                                            @endif
                                            leading-tight
                                        "> --}}

                                        </span>
                                        <span class="relative">
                                            {{-- @if($emp->user->status == 1)
                                                Active
                                            @else
                                                Inactive
                                            @endif --}}
                                        </span>
                                    </span>
                                </td>
                                <td class="px-5 py-5 bg-white text-sm">
                                    {{-- @foreach($emp->user->roles as $role)
                                         <p class="text-gray-900 whitespace-no-wrap">{{ $role->name }}</p>
                                     @endforeach --}}

                                </td>
                                <td class="px-5 py-5 bg-white text-sm">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">

                                            {{-- <a  href="{{ url('/employees/show', $emp->id) }}"  title="Show Employee">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a> --}}
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-gray-500 hover:scale-110">
                                            {{-- <a href="{{ url('/employees/edit', $emp->id) }}"  title="Edit Employee">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a> --}}
                                        </div>

                                        <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                            <a href="#"  class="btn" title="Delete Position">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
                {{-- <div
                    class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                    <span class="text-xs xs:text-sm text-gray-900">
                        Showing 1 to 4 of 50 Entries
                    </span>
                    <div class="inline-flex mt-2 xs:mt-0">
                        <button
                            class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-l">
                            Prev
                        </button>
                        &nbsp; &nbsp;
                        <button
                            class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-r">
                            Next
                        </button>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
