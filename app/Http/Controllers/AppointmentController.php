<?php

namespace App\Http\Controllers;

use App\Events\UserLog;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    public function index(){
        // $appointment = Appointment::with(['patient.user', 'service'])->orderBy('created_at', 'desc')->get();

        $user = Auth::user();

        if ($user->hasRole('patient')) {
            // // If the user has the 'patient' role, retrieve only their own appointments
            // $appointment = $user->patient->appointment()->with(['service'])->orderBy('created_at', 'desc')->get();
            $appointment = Appointment::with(['patient.user', 'service'])
            ->whereHas('patient', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->orderBy('created_at', 'desc')->get();
        } else {
            // If the user does not have the 'patient' role, retrieve all appointments
            $appointment = Appointment::with(['patient.user', 'service'])->orderBy('created_at', 'desc')->get();
        }
        return view('appointment.index',compact('appointment'));
    }

    public function create(){
        $patient = Patient::with('user')->get();
        $service = Service::all();
        return view('appointment.create', [
            'patient'  => $patient,
            'service' => $service
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'serv_id' => 'required',
            'date'    => 'required|date|after_or_equal:today',
            'time'    => 'required|date_format:H:i',
        ]);

        // Check if the logged-in user has the role "patient"
        if ($user->hasRole('patient')) {
            // If yes, use the user's associated 'pat_id'
            $data['pat_id'] = $user->patient->id; // Adjust accordingly based on your relationship
        } else {
            // If not, set it to some default value or handle it based on your logic
            $data['pat_id'] = $request->input('pat_id'); // Change this to your default 'pat_id' or handle accordingly
        }

     $appointment =  Appointment::create($data);
     if ($user->hasRole('patient')) {
        $log_entry = Auth::user()->name . " requested an appointment with the id# ". $appointment->id;
        event(new UserLog($log_entry));
     }else{
        $log_entry = Auth::user()->name . " created an appointment with ". $appointment->patient->user->name. " with the id# ". $appointment->id;
        event(new UserLog($log_entry));
     }


        return redirect('/appointment')->with('message', ' Appointment added successfully.');
    }

    public function accept(Appointment $appointment){
        $appointment->update(['status' => 'Accepted']);


        $log_entry = Auth::user()->name . " accepted an appointment with ". $appointment->patient->user->name. " with the id# ". $appointment->id;
        event(new UserLog($log_entry));


        return redirect('/appointment')->with('message', 'Appointment approved successfully.');
    }

    public function cancel(Appointment $appointment){
        // Update the appointment status to 'canceled'
        $appointment->update(['status' => 'Cancelled']);


        $log_entry = Auth::user()->name . " cancelled an appointment with ". $appointment->patient->user->name. " with the id# ". $appointment->id;
        event(new UserLog($log_entry));


        // $patient = $appointment->patient;

        // $log_entry = Auth::user()->name . " cancelled an appointment with ". $appointment->patient->user->name. " with the id# ". $appointment->id;
        // event(new UserLog($log_entry));
        // Send an email notification to the patient
        // Mail::send('email.cancel-email', ['patient' => $patient, 'appointment'=>$appointment], function ($message) use ($patient, $appointment) {
        //     $message->to($appointment->email);
        //     $message->subject('Appointment Cancelation');
        // });
        return redirect('/appointment')->with('success', 'Appointment canceled successfully.');
    }
}
