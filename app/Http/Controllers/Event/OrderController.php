<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketOrder;
use App\Http\Requests\BuyTicketRequest;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(BuyTicketRequest $request, Ticket $ticket)
    {
        $request->validated();

        if ($ticket->quantity < $request->quantity) {
            return back()->withErrors('Yeterli bilet yok');
        }

        $total = $ticket->price * $request->quantity;

        // Başarısız olması durumunda işlem geri alınacaktır.
        DB::transaction(function () use ($ticket, $request) {
            TicketOrder::create([
                'user_id' => auth()->id(),
                'ticket_id' => $ticket->id,
                'quantity' => $request->quantity,
                'total_price' => $ticket->price * $request->quantity,
            ]);

            $ticket->decrement('quantity', $request->quantity);
        });

        return response()->json([
            'message' => 'Bilet satın alındı',
            'remaining' => $ticket->fresh()->quantity
        ]);
    }
}
