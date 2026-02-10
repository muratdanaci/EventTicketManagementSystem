<?php

namespace App\Http\Controllers\Event;

use App\Models\TicketCheckIn;
use Illuminate\Http\Request;

class TicketCheckInController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($ticket, $request) {

            $order = TicketOrder::create([
                'user_id' => auth()->id(),
                'ticket_id' => $ticket->id,
                'quantity' => $request->quantity,
                'total_price' => $ticket->price * $request->quantity,
            ]);

            TicketCheckIn::create([
                'ticket_order_id' => $order->id,
                'code' => strtoupper(Str::random(6)),
            ]);

            $ticket->decrement('quantity', $request->quantity);
        });
    }
}
