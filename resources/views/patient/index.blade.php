@extends('base')
@include('_navbar')

@section('content')


<div class=" p-8 rounded-md w-full ">
    <div class=" flex items-center justify-between pb-6">
        <div>
            <h2 class="text-gray-600 font-semibold text-2xl">List of Patients</h2>

        </div>
        <div class="flex items-center justify-between">
            <div class="lg:ml-40 ml-10 space-x-8 justify-between">
                @if(session('message'))
                    <div class="alert bg-green-400 p-4">
                        {{session('message')}}
                    </div>
                @endif

                @if(session('error'))
                <div class="alert bg-red-400 p-4">
                    {{session('error')}}
                </div>
            @endif

                <a href="/patient/create" type="button" class="bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded-md text-white font-normal tracking-wide cursor-pointer" >
                    <i class="fa-solid fa-plus"></i> Create Patient
                </a>

            </div>
        </div>
    </div>
    <div class="flex-1 pr-4">
        <div class="relative md:w-1/3">
            <input type="search"
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
                                Address
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Gender
                            </th>

                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach($patient as $pat)
                            <tr class="border-b border-gray-200">

                                <td class="px-5 py-2 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{$pat->user->name}}</p>
                                </td>
                                <td class="px-5 py-3 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{$pat->user->email}}</p>
                                </td>


                                <td class="px-5 py-3 bg-white text-sm">
                                   {{$pat->address}}
                                </td>
                                <td class="px-5 py-3 bg-white text-sm">
                                    {{$pat->gender}}
                                 </td>
                                <td class="px-5 py-3 bg-white text-sm">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">

                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-gray-500 hover:scale-110">
                                            <a href="{{ url('/patient/edit', $pat->id) }}"  title="Edit Patient">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </div>

                                        <div class="w-4 mr-2 transform hover:text-gray-500 hover:scale-110">
                                            <form method="POST" action="{{ url('/patient/'. $pat->id) }}">
                                                @csrf
                                                @method('DELETE')
                                            <button type="submit"  title="Delete Patient" class="hover:border-red-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                  </svg>

                                            </button>
                                        </form>
                                        </div>

                                    </div>
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
