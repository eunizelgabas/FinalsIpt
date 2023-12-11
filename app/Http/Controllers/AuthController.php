<?php

namespace App\Http\Controllers;

use App\Events\UserLog;
use App\Jobs\CustomerJob;
use App\Jobs\EmailVerification;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function loginForm(){
        return view('auth.login');

        if(Auth::check()){
            return redirect()->back();
        }
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || $user->email_verified_at == null){
            return redirect('/')->with('error', 'Sorry your account is not yet verified or does not exist');
        }

        $login = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if(!$login){
            return back()->with('error', 'Invalid credentials');
        }
        return redirect('/dashboard');
    }

    public function registerForm(){
        return view('auth.register');
        if(Auth::check()){
            return redirect()->back();
        }
    }

    public function register(Request $request){
        $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed|string|min:6'

        ]);

        $token = Str::random(24);

        $user = User::create([
            'name'              => $request->name,
            'email'             => $request->email,
            'password'          => bcrypt($request->password),
            'remember_token'     => $token
        ]);
        $patient = new Patient([
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
        ]);
        $user->patient()->save($patient);

        $patientRole = Role::where('name', 'patient')->first();
        $user->assignRole($patientRole);
        EmailVerification::dispatch($user);

        $log_entry = $user->name . " registered in the system with the id# ". $patient->id;
        event(new UserLog($log_entry));

        return redirect('/')->with('message', ' Your account has been created. Please check your email for the verification link.');
    }

    public function verification(User $user, $token){

        if($user->remember_token !== $token){
            return redirect('/')->with('error', 'Invalid Token');
        }

        $user->email_verified_at = now();
        $user->save();

        dispatch(new EmailVerification($user));
        return redirect('/')->with('message', 'Your account has been verified');

    }

    public function logout(Request $request) {
        // auth()->logout();
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'Log out successfully');
    }

    public function dashboard(){
        $user = auth()->user();
        // $appointment = Appointment::count();
        if (Auth::user()->hasRole('patient')) {
            // User has the role of "patient"
            $appointment = Appointment::where('pat_id', Auth::user()->patient->id)->count();
        } else {
            // User does not have the role of "patient" (count all appointments)
            $appointment = Appointment::count();
        }
        $service = Service::count();
        $patient = Patient::count();
        return view('dashboard', compact('patient', 'service', 'appointment', 'user'));
    }

}
