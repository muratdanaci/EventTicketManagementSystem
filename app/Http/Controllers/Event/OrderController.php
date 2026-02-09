<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\TicketOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        if ($ticket->stock < $request->quantity) {
            return back()->withErrors('Yeterli bilet yok');
        }

        $total = $ticket->price * $request->quantity;

        TicketOrder::create([
            'user_id' => auth()->id(),
            'ticket_id' => $ticket->id,
            'quantity' => $request->quantity,
            'total_price' => $total,
        ]);

        $ticket->decrement('stock', $request->quantity);

        return redirect()->route('dashboard')
            ->with('success', 'Bilet satın alındı');
    }
}
