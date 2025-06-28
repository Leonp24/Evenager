<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.dashboard', compact('events'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'quota' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $validated['image'] = $imageName;
        Event::create($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'quota' => 'required|integer',
            'price' => 'required|integer',
        ]);

        $event->update($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $imagePath = public_path('images/' . $event->image);
        if (file_exists($imagePath)) unlink($imagePath);

        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus.');
    }
}
