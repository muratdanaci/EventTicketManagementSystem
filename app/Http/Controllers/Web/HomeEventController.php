<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::latest()->get();

        $nextEvent = Event::where('start_date', '>=', now())
            ->orderBy('start_date', 'asc')
            ->first();

        return view('web.index', compact('events', 'nextEvent'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $event->load('tickets');

        return view('web.events.show', compact('event'));
    }

    /**
     * Tüm event listesi
     */
    public function events()
    {
        $events = Event::get()->sortByDesc('start_date');

        return view('web.events.index', compact('events'));
    }
}
