<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\TicketOrder;

class TicketOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = TicketOrder::with(['user', 'ticket.event'])
            ->get()
            ->sortByDesc('created_at');

        return view('admin.tickets.order', compact('orders'));
    }
}
