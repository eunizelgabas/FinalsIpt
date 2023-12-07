<!-- component -->
<nav class=" bg-white w-full flex relative justify-between items-center mx-auto px-8 h-20">
    <!-- logo -->
    <div class="inline-flex">
        <a class="_o6689fn" href="/"
            ><div class="hidden md:flex items-center">
                <img src="/images/loogo-modified.png" class="w-21 h-10" alt="Image">
                <h1 class="text-blue-500 text-3xl font-bold">Med U Clinic</h1>
            </div>
        </a>
    </div>

    <!-- end logo -->

    {{-- <!-- search bar -->
    <div class="hidden sm:block flex-shrink flex-grow-0 justify-start px-2">
        <div class="inline-block">
            <div class="inline-flex items-center max-w-full">
                <button class="flex items-center flex-grow-0 flex-shrink pl-2 relative w-60 border rounded-full px-1  py-1" type="button">
                    <div class="block flex-grow flex-shrink overflow-hidden">Start your search</div>
                    <div class="flex items-center justify-center relative  h-8 w-8 rounded-full">
                        <svg
                            viewBox="0 0 32 32"
                            xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                            role="presentation"
                            focusable="false"
                            style="
                                display: block;
                                fill: none;
                                height: 12px;
                                width: 12px;
                                stroke: currentcolor;
                                stroke-width: 5.33333;
                                overflow: visible;
                            "
                        >
                            <g fill="none">
                                <path
                                    d="m13 24c6.0751322 0 11-4.9248678 11-11 0-6.07513225-4.9248678-11-11-11-6.07513225 0-11 4.92486775-11 11 0 6.0751322 4.92486775 11 11 11zm8-3 9 9"
                                ></path>
                            </g>
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    </div> --}}
    <!-- end search bar -->

    <!-- login -->
        <div class="flex-initial">
            <div class="flex justify-end items-center relative">
                <div class="flex mr-4 items-center">
                    <a class="inline-block py-2 px-3 hover:bg-blue-400 hover:text-white rounded-full" href="/dashboard">
                        <div class="flex items-center relative cursor-pointer whitespace-nowrap">Home</div>
                    </a>
                    {{-- @if(auth()->user()->hasRole('admin')) --}}
                        <a class="inline-block py-2 px-3 hover:bg-blue-400 hover:text-white rounded-full" href="/patients">
                            <div class="flex items-center relative cursor-pointer whitespace-nowrap">Patients</div>
                        </a>
                        <a class="inline-block py-2 px-3 hover:bg-blue-400 hover:text-white rounded-full" href="/services">
                            <div class="flex items-center relative   cursor-pointer whitespace-nowrap">Services</div>
                        </a>

                        <a class="inline-block py-2 px-3 hover:bg-blue-400 hover:text-white  rounded-full" href="/appointments">
                            <div class="flex items-center relative   cursor-pointer whitespace-nowrap">Appointments</div>
                        </a>

                    {{-- @endif --}}

                    {{-- @if(auth()->user()->hasRole('employee')) --}}
                        {{-- <a class="inline-block py-2 px-3 hover:bg-blue-400 hover:text-white  rounded-full" href="/cashAdvance">
                            <div class="flex items-center relative   cursor-pointer whitespace-nowrap">Cash Advance</div>
                        </a>
                        <a class="inline-block py-2 px-3 hover:bg-blue-400 hover:text-white  rounded-full" href="/payroll">
                            <div class="flex items-center relative  cursor-pointer whitespace-nowrap">Pay slip</div>
                        </a> --}}
                    {{-- @endif --}}

                </div>

                <div class="flex justify-end items-center relative">
                    <form action="{{url('/logout')}}" method="POST" class="inline-block py-2 px-3 hover:bg-blue-400 hover:text-white rounded-full">
                        {{csrf_field()}}
                        <button class="flex items-center relative  cursor-pointer whitespace-nowrap"  type="submit">Logout</button>
                    </form>
                    {{-- <a class="inline-block py-2 px-3 hover:bg-blue-400 hover:text-white rounded-full" href="/positions">
                        <div class="flex items-center relative text-white  cursor-pointer whitespace-nowrap">Logout</div>
                    </a> --}}

                </div>
            </div>
        </div>
    </div>
    <!-- end login -->
</nav>

<style scoped>

</style>
