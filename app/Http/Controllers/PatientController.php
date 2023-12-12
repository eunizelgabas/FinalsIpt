<?php

namespace App\Http\Controllers;

use App\Events\UserLog;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class PatientController extends Controller
{
    public function index(){
        $patient = Patient::with([ 'user.roles'])->orderBy('created_at','desc')->get();
        return view('patient.index', [
            'patient' => $patient
        ]);
    }

    public function create(){
        return view('patient.create');
    }

    public function store(Request $request)
    {
       $data = $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|email|unique:users,email',
            'password'   =>'required|confirmed|string|min:6',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']), // Ensure to hash the password
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $patient = new Patient([
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
        ]);
        $user->patient()->save($patient);
        $log_entry = Auth::user()->name . " added ". $patient->user->name . " as patient in the system with the id# ". $patient->id;
        event(new UserLog($log_entry));

        $patientRole = Role::where('name', 'patient')->first();
        $user->assignRole($patientRole);

        return redirect('/patient')->with('message', ' Patient added successfully.');
    }

    public function edit(Patient $patient)
    {
        $patient->load([ 'user.roles'])->get();
        return view('patient.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $user = $patient->user;

        $data = $request->validate([
            'name'      => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $patient->update([
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
        ]);

        $log_entry = Auth::user()->name . " updated patient". $patient->user->name . " details in the system with the id# ". $patient->id;
        event(new UserLog($log_entry));

        return redirect('/patient')->with('message', 'Patient updated successfully');
    }


    public function destroy(Patient $patient){
        $patient->delete();
        $log_entry = Auth::user()->name . " deleted patient". $patient->user->name . " details in the system with the id# ". $patient->id;
        event(new UserLog($log_entry));
        return redirect('/patient')->with('message', 'Patient deleted successfully');
    }
}
