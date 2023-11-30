<?php

namespace App\Http\Controllers;

use App\Jobs\CustomerJob;
use App\Jobs\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

        EmailVerification::dispatch($user);

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
        $regUser = User::all();
        return view('dashboard', compact('user', 'regUser'));
    }

}
