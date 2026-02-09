<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Requests\StoreTicketRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Event $event)
    {
        $tickets = $event->tickets;

        return view('admin.tickets.index', compact('event', 'tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Event $event)
    {
        $this->authorizeEvent($event);

        return view('admin.tickets.form', [
            'event' => $event,
            'ticket' => new Ticket()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request, Event $event)
    {
        $this->authorizeEvent($event);

        $data = $request->validated();

        $event->tickets()->create($data);

        return redirect()
            ->route('events.tickets.index', $event)
            ->with('success', 'Bilet oluşturuldu');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket, Event $event)
    {
        $this->authorizeEvent($event);

        return view('admin.tickets.form', compact('event', 'ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $this->authorizeEvent($event);

        $data = $request->validated();

        $ticket->update($data);

        return redirect()
            ->route('events.tickets.index', $event)
            ->with('success', 'Bilet güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event, Ticket $ticket)
    {
        $this->authorizeEvent($event);

        $ticket->delete();

        return back()->with('success', 'Bilet silindi');
    }

    private function authorizeEvent(Event $event)
    {
        if (
            auth()->user()->role === 'organizer' &&
            $event->user_id !== auth()->id()
        ) {
            abort(403);
        }
    }
}
