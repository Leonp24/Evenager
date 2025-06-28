<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Registration;

class EventController extends Controller
{
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('user.detail', compact('event'));
    }

    public function register(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:registrations,email,NULL,id,event_id,' . $id,
            'phone' => 'required|numeric|digits_between:10,15',
        ]);

        $event = Event::findOrFail($id);

        $event->registrations()->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return back()->with('success', 'Kamu berhasil mendaftar ke event!');
    }

    public function all()
    {
        $events = Event::latest()->paginate(6); // bisa kamu sesuaikan
        return view('user.events', compact('events'));
    }
}
