<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class AdminController extends Controller
{
    public function dashboard()
    {
        $events = Event::latest()->get();
        return view('admin.dashboard', compact('events'));
    }

    public function registrations($id)
    {
        $event = Event::with('registrations')->findOrFail($id);
        return view('admin.registrations', compact('event'));
    }
}
