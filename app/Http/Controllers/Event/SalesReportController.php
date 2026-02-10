<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Barryvdh\DomPDF\Facade\Pdf;

class SalesReportController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        if (
            auth()->user()->role === 'organizer' &&
            $event->organizer_id !== auth()->id()
        ) {
            abort(403);
        }

        $tickets = $event->tickets()->with('orders')->get();

        $totalSold = 0;
        $totalRevenue = 0;

        foreach ($tickets as $ticket) {
            $sold = $ticket->orders->sum('quantity');
            $revenue = $ticket->orders->sum('total_price');

            $ticket->sold = $sold;
            $ticket->revenue = $revenue;

            $totalSold += $sold;
            $totalRevenue += $revenue;
        }

        return view('admin.sales.report', compact(
            'event',
            'tickets',
            'totalSold',
            'totalRevenue'
        ));
    }

    public function salesPdf(Event $event)
    {
        if (
            auth()->user()->role === 'organizer' &&
            $event->organizer_id !== auth()->id()
        ) {
            abort(403);
        }

        $event->load('tickets.orders');

        return Pdf::loadView(
            'admin.sales.sales-pdf',
            compact('event')
        )->download($event->title . '-sales-report.pdf');
    }
}
