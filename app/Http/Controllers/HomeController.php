<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::latest()->take(3)->get();
        return view('user.home', compact('events'));
    }
}
