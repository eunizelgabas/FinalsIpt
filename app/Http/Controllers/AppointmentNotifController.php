<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\AppointmentNotif;
use Illuminate\Http\Request;

class AppointmentNotifController extends Controller
{
    public function sendTestNotification() {

        $user = User::first();

        $appointmentData = [
            'body' => 'You have received a notification.',
            'enrollmentText' => 'Your appointment is acceptedas.',
            'url' => url('/'),
            'thankyou' => ' We look forward to providing you with our healthcare services.'
        ];

       $user->notify(new AppointmentNotif($appointmentData));
    }
}
