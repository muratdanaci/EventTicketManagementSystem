<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\TicketCheckIn;
use Illuminate\Http\Request;

class CheckInController extends Controller
{
    public function index()
    {
        return view('admin.checkin.index');
    }

    public function search(Request $request)
    {
        $request->validate([
            'code' => 'required|string|size:6'
        ]);

        $checkIn = TicketCheckIn::where('code', $request->code)
            ->with('order.ticket.event')
            ->first();

        if (!$checkIn) {
            return back()->withErrors('Bilet kodu bulunamadı');
        }

        if ($checkIn->checked_in_at) {
            return back()->withErrors('Bu bilet daha önce kullanılmış');
        }

        // Organizer sadece kendi event'inin biletini kontrol edebilir
        if (
            auth()->user()->role === 'organizer' &&
            $checkIn->order->ticket->event->user_id !== auth()->id()
        ) {
            abort(403, 'Bu bileti kontrol etme yetkin yok');
        }

        return view('admin.checkin.confirm', compact('checkIn'));
    }


    public function confirm(TicketCheckIn $checkIn)
    {
        if ($checkIn->checked_in_at) {
            return response()->json([
                'success' => false,
                'message' => 'Bu bilet zaten kullanılmış'
            ], 422);
        }

        $checkIn->update([
            'checked_in_at' => now()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Check-in başarılı'
        ]);
    }
}
