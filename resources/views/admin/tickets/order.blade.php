@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-lg-12 col-12 mt-5">
        <div class="card-style">
            <div class="container-fluid py-4">
                <h1>Ticket Orders</h1>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Bilet Kodu</th>
                            <th>User</th>
                            <th>Event</th>
                            <th>Ticket Type</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Ordered At</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order )
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->checkIn?->code }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td><a href="{{ route('events.show', $order->ticket->event->id) }}">{{ $order->ticket->event->title }}</a></td>
                                <td>{{ $order->ticket->name }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ number_format($order->total_price, 2) }}₺</td>
                                <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    @if($order->checkIn)
                                        <span class="badge bg-success">Kullanıldı</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Kullanılmadı</span>
                                    @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
