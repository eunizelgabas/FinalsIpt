<?php

namespace App\Http\Controllers;

use App\Events\UserLog;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index(){
        $service = Service::all();
        return view('services.index', [
            'service' => $service
        ]);
    }

    public function create(){
        return view('services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string',
            'description'     => 'required|string',
        ]);

      $service =  Service::create($request->all());
        $log_entry = Auth::user()->name . " added a ". $service->name . " service in the system with the id# ". $service->id;
        event(new UserLog($log_entry));

        return redirect('/services')->with('message', ' Services added successfully.');
    }

    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'string',
            'description' => 'string'

        ]);

        $service->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),

        ]);
        $log_entry = Auth::user()->name . " updated ". $service->name . " service details in the system with the id# ". $service->id;
        event(new UserLog($log_entry));
        return redirect('/services')->with('message', 'Service updated successfully');
    }

    public function destroy(Service $service){
        $service->delete();
        $log_entry = Auth::user()->name . " deleted ". $service->name . " service in the system with the id# ". $service->id;
        event(new UserLog($log_entry));
        return redirect('/services')->with('message', 'Service deleted successfully');
    }

}
