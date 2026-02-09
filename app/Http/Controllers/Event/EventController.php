<?php

namespace App\Http\Controllers\Event;
use App\Http\Controllers\Controller;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            $events = Event::latest()->get();
        } else {
            $events = Event::where('user_id', $user->id)
                ->latest()
                ->get();
        }

        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $event = new Event();
        return view('admin.events.form', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        dd($request->all());
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('events', 'public');
        }

        $data['user_id'] = auth()->id();

        Event::create($data);

        return redirect()->route('events.index')->with('success', 'Etkinlik oluşturuldu');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('admin.events.form', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $this->authorizeEvent($event);

        return view('admin.events.form', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $this->authorizeEvent($event);

        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('events', 'public');
        }

        $event->update($data);

        return redirect()->route('events.index')->with('success', 'Etkinlik güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $this->authorizeEvent($event);

        $event->delete();

        return back()->with('success', 'Etkinlik silindi');
    }

    private function authorizeRole(array $roles)
    {
        if (! in_array(Auth::user()->role, $roles)) {
            abort(403);
        }
    }

    private function authorizeEvent(Event $event)
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return true;
        }

        if ($user->role === 'organizer' && $event->user_id === $user->id) {
            return true;
        }

        abort(403);
    }
}
