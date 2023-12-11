<?php

namespace App\Http\Controllers;

use App\Events\UserLog;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Service;
use App\Models\User;
use App\Notifications\AppointmentNotif;
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

    // public function store(Request $request)
    // {
    //     $user = Auth::user();

    //     $data = $request->validate([
    //         'serv_id' => 'required',
    //         'date'    => 'required|date|after_or_equal:today',
    //         'time'    => 'required|date_format:H:i',
    //         'status'  => 'string'
    //     ]);

    //     // Check if the logged-in user has the role "patient"
    //     if ($user->hasRole('patient')) {
    //         // If yes, use the user's associated 'pat_id'
    //         $data['pat_id'] = $user->patient->id; // Adjust accordingly based on your relationship
    //     } else {
    //         // If not, set it to some default value or handle it based on your logic
    //         $data['pat_id'] = $request->input('pat_id'); // Change this to your default 'pat_id' or handle accordingly
    //         $data['status'] = 'Accepted';
    //     }

    //  $appointment =  Appointment::create($data);
    //  if ($user->hasRole('patient')) {
    //     $log_entry = Auth::user()->name . " requested an appointment with the id# ". $appointment->id;
    //     event(new UserLog($log_entry));
    //  }else{
    //     $log_entry = Auth::user()->name . " created an appointment with ". $appointment->patient->user->name. " with the id# ". $appointment->id;
    //     event(new UserLog($log_entry));
    //  }

    //  if ($user->hasRole('admin')) {
    //     $patient = $appointment->patient;
    //     $user = $patient->user;

    //     $appointmentData = [
    //         'body' => "Hi $user->name ,",
    //         'appointmentBody' => "Just a friendly that we have an upcoming appointment for " . $appointment->service->name . " service scheduled for " . $appointment->date . " at " . $appointment->time .
    //                         " Please arrived ahead of the scheduled time.",
    //         'appointmentText' => "Check here.",
    //         'url' => url('/'),
    //         'thankyou' => 'We look forward to providing you with our healthcare services.'
    //     ];
    //     $user->notify(new AppointmentNotif($appointmentData));
    //  }




    //  $successMessage = $user->hasRole('patient')
    //  ? 'Appointment request submitted successfully. Please check email for notification'
    //  : 'Appointment added successfully.';

    //     // return redirect('/appointment')->with('message', ' Appointment added successfully.');
    //     return redirect('/appointment')->with('message', $successMessage);
    // }

    public function store(Request $request)
{
    $user = Auth::user();

    $data = $request->validate([
        'serv_id' => 'required',
        'date'    => 'required|date|after_or_equal:today',
        'time'    => 'required|date_format:H:i',
        'status'  => 'string'
    ]);

    // Check if the logged-in user has the role "patient"
    if ($user->hasRole('patient')) {
        // If yes, use the user's associated 'pat_id'
        $data['pat_id'] = $user->patient->id; // Adjust accordingly based on your relationship
    } else {
        // If not, set it to some default value or handle it based on your logic
        $data['pat_id'] = $request->input('pat_id'); // Change this to your default 'pat_id' or handle accordingly
        $data['status'] = 'Accepted';
    }

    $appointment =  Appointment::create($data);

    // Log the event based on the user's role
    if ($user->hasRole('patient')) {
        $log_entry = Auth::user()->name . " requested an appointment with the id# " . $appointment->id;
    } else {
        $log_entry = Auth::user()->name . " created an appointment with " . $appointment->patient->user->name . " with the id# " . $appointment->id;
    }
    event(new UserLog($log_entry));



    $successMessage = $user->hasRole('patient')
        ? 'Appointment request submitted successfully. Please check email for notification'
        : 'Appointment added successfully.';


        if ($user->hasRole('admin')) {
            $patient = $appointment->patient;
            $user = $patient->user;

            $appointmentData = [
                'body' => "Hi $user->name ,",
                'appointmentBody' => "Just a friendly reminder that we have scheduled an appointment for " . $appointment->service->name . " service scheduled for " . $appointment->date . " at " . $appointment->time .
                    " Please arrive ahead of the scheduled time.",
                'appointmentText' => "Check here.",
                'url' => url('/'),
                'thankyou' => 'We look forward to providing you with our healthcare services.'
            ];
            $user->notify(new AppointmentNotif($appointmentData));
        }
        return redirect('/appointment')->with('message', $successMessage);

         // Send notification for admin users

}


    public function accept(Appointment $appointment){
        $appointment->update(['status' => 'Accepted']);


        $log_entry = Auth::user()->name . " accepted an appointment with ". $appointment->patient->user->name. " with the id# ". $appointment->id;
        event(new UserLog($log_entry));

        $patient = $appointment->patient;

        $user = $patient->user;

        $appointmentData = [
            'body' => "Hi $user->name ,",
            'appointmentBody' => "Your appointment for " . $appointment->service->name . " service scheduled for " . $appointment->date . " at " . $appointment->time .
                            " has been accepted. Please arrived ahead of the scheduled time.",
            'appointmentText' => "Check here.",
            'url' => url('/'),
            'thankyou' => 'We look forward to providing you with our healthcare services.'
        ];

       $user->notify(new AppointmentNotif($appointmentData));


        return redirect('/appointment')->with('message', 'Appointment approved successfully.');
    }

    public function cancel(Appointment $appointment){
        // Update the appointment status to 'canceled'
        $appointment->update(['status' => 'Cancelled']);


        $log_entry = Auth::user()->name . " cancelled an appointment with ". $appointment->patient->user->name. " with the id# ". $appointment->id;
        event(new UserLog($log_entry));


        $patient = $appointment->patient;

        // $user = User::first();

        $user = $patient->user;

        $appointmentData = [
            'body' => "Hi $user->name",
            'appointmentBody' => "Due to a scheduling conflict, I will have to cancel " . $appointment->service->name. " service scheduled for " . $appointment->date . " at " . $appointment->time.
                                " I understand that this is short notice, and I apologize for any inconvenience this may cause.
                                Given the circumstances, I believe we should reschedule the meeting to a time when the group can be fully engaged.",
            'appointmentText' => "Check here.",
            'url' => url('/'),
            'thankyou' => 'We look forward to providing you with our healthcare services.'
        ];

       $user->notify(new AppointmentNotif($appointmentData));

        return redirect('/appointment')->with('success', 'Appointment canceled successfully.');
    }
}
