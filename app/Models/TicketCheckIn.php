<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TicketOrder;

class TicketCheckIn extends Model
{
    protected $fillable = [
        'ticket_order_id',
        'code',
        'checked_in_at',
    ];

    protected $casts = [
        'checked_in_at' => 'datetime',
    ];

    public function order()
    {
        return $this->belongsTo(TicketOrder::class, 'ticket_order_id');
    }
}
