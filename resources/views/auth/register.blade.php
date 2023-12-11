@extends('base')

{{-- @include('_navbar') --}}
@section('content')
<section class="py-3 py-md-5 py-xl-8">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-12 col-md-6 col-xl-5 ">
            <div class="card border-0 rounded-4">
                    <div class="card-body p-3 p-md-4 p-xl-5 rounded-4" style="background-color: #7fceee">
                        <div class="row">
                            <div class="col-12">
                            <div class="mb-4 ">
                                <h3>Register Account</h3>
                                <p>Already have an account? <a href="{{ '/' }}" >Sign in</a></p>
                            </div>
                            </div>
                        </div>
                        <form action="{{ '/register' }}" method="POST">
                            {{ csrf_field() }}

                            <div class="row gy-3 overflow-hidden">
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="name" class="form-control" name="name" id="name" placeholder="John Doe" required>
                                        <label for="name" class="form-label">Name</label>
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                                        <label for="email" class="form-label">Email</label>
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="sm:col-span-2">

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="address" id="address" placeholder="name@example.com" required>
                                        <label for="address" class="form-label">Address</label>
                                        @error('address')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    @error('address')
                                      <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                                      @enderror
                                </div>
                                <div class="sm:col-span-2">
                                {{-- <label for="gender" class="block text-sm font-semibold leading-6 text-gray-900">Gender</label> --}}
                                <div class="form-floating mb-3">
                                    <select type="text" class="form-control" name="gender" id="gender" placeholder="name@example.com" required>
                                        <option disabled selected>Choose a gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <label for="gender" class="form-label">Gender</label>
                                    @error('gender')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- <div class="mt-2.5">
                                    <select id="gender" name="gender" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                        <option disabled selected>Choose a gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        </select>
                                </div> --}}
                                @error('gender')
                                    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                                        <label for="password" class="form-label">Password</label>
                                        @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="" placeholder="Password Confirmation" required>
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        @error('password_confirmation')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn btn-lg" type="submit" style="background-color: #142f5d; color:#ffff">Register</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-7">
                <div class="d-flex justify-content-center">
                <div class="col-12 col-xl-9">
                    <img class="img-fluid rounded mb-2"  loading="lazy" src="./images/samo.png" width="400" height="100" alt="">
                    <hr class=" mb-4">
                    <h2 class="h1 mb-4" style="color: #3869bd">Elevating Care, Empowering Presence: Your Digital Wellness Partner.</h2>
                    <p class="lead mb-5">At our clinic, scheduling appointments is effortless and convenient, allowing you to book at your own pace and on your terms.</p>
                    <div class="text-endx">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-grip-horizontal" viewBox="0 0 16 16">
                            <path d="M2 8a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
