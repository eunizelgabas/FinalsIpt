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


        <div class="flex-initial">
            <div class="flex justify-end items-center relative">
                <div class="flex mr-4 items-center">
                    <a class="inline-block py-2 px-3 hover:bg-blue-400 hover:text-white rounded-full" href="/dashboard">
                        <div class="flex items-center relative cursor-pointer whitespace-nowrap">Home</div>
                    </a>
                    @if(auth()->user()->hasRole('admin'))
                        <a class="inline-block py-2 px-3 hover:bg-blue-400 hover:text-white rounded-full" href="/patient">
                            <div class="flex items-center relative cursor-pointer whitespace-nowrap">Patients</div>
                        </a>

                        <a class="inline-block py-2 px-3 hover:bg-blue-400 hover:text-white rounded-full" href="/services">
                            <div class="flex items-center relative   cursor-pointer whitespace-nowrap">Services</div>
                        </a>

                        <a class="inline-block py-2 px-3 hover:bg-blue-400 hover:text-white  rounded-full" href="/appointment">
                            <div class="flex items-center relative   cursor-pointer whitespace-nowrap">Appointments</div>
                        </a>

                        <a class="inline-block py-2 px-3 hover:bg-blue-400 hover:text-white  rounded-full" href="/logs">
                            <div class="flex items-center relative   cursor-pointer whitespace-nowrap">Logs</div>
                        </a>

                    @endif

                    @if(auth()->user()->hasRole('patient'))
                         <a class="inline-block py-2 px-3 hover:bg-blue-400 hover:text-white  rounded-full" href="/services">
                            <div class="flex items-center relative   cursor-pointer whitespace-nowrap">Services</div>
                        </a>
                        <a class="inline-block py-2 px-3 hover:bg-blue-400 hover:text-white  rounded-full" href="/appointment">
                            <div class="flex items-center relative  cursor-pointer whitespace-nowrap">Appointments</div>
                        </a>
                    @endif

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
