@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-lg-12 col-12 mt-5">
        <div class="card-style">
            <h3>{{ $event->title }} – Satış Raporu</h3>

            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Bilet</th>
                        <th>Bilet Tipi</th>
                        <th>Satılan</th>
                        <th>Ciro</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($event->tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->name }}</td>
                            <td>{{ $ticket->type }}</td>
                            <td>{{ $ticket->orders->sum('quantity') }}</td>
                            <td>{{ $ticket->orders->sum('total_price') }} ₺</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a
                href="{{ route('events.sales.pdf', $event) }}"
                class="btn btn-danger mt-3"
            >
                PDF İndir
            </a>
        </div>
    </div>
</div>
@endsection
