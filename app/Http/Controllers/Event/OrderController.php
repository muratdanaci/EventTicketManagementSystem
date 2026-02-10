<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketOrder;
use App\Models\TicketCheckIn;
use App\Http\Requests\BuyTicketRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(BuyTicketRequest $request, Ticket $ticket)
    {
        if ($ticket->quantity < $request->quantity) {
            return response()->json([
                'message' => 'Yeterli bilet yok'
            ], 422);
        }

        try {
            DB::transaction(function () use ($request, $ticket) {

                $order = TicketOrder::create([
                    'user_id' => auth()->id(),
                    'ticket_id' => $ticket->id,
                    'quantity' => $request->quantity,
                    'total_price' => $ticket->price * $request->quantity,
                ]);

                // Stok düş
                $ticket->decrement('quantity', $request->quantity);

                // Her bilet için check-in kodu oluştur
                for ($i = 0; $i < $request->quantity; $i++) {
                    TicketCheckIn::create([
                        'ticket_order_id' => $order->id,
                        'code' => $this->generateUniqueCode(),
                    ]);
                }
            });

            return response()->json([
                'message' => 'Bilet satın alındı'
            ]);

        } catch (\Throwable $e) {
            logger()->error('Bilet satın alma hatası', [
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'message' => 'Satın alma sırasında hata oluştu'
            ], 500);
        }
    }

    private function generateUniqueCode(): string
    {
        do {
            $code = strtoupper(Str::random(6));
        } while (TicketCheckIn::where('code', $code)->exists());

        return $code;
    }
}
