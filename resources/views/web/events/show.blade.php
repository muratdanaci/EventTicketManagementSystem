@extends('web.layouts.app')

@section('cssContent')
        <style>
    .event-details p {
        font-size: 1.1rem;
    }

    .ticket-card h5 {
        color: #007bff;
        font-weight: bold;
    }

    .ticket-info {
        margin-top: 20px;
    }

    .ticket-card {
        background-color: #f8f9fa;
        border-color: #ddd;
    }

    .btn-success {
        width: 100%;
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
</style>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <!-- Event Details -->
            <div class="col-md-12">
                <div class="justify-content-center d-flex mb-4">
                    <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="img-fluid rounded mb-3 shadow">
                </div>
                <h1 class="text-primary">{{ $event->title }}</h1>
                <p class="lead">{{ $event->description }}</p>

                <div class="event-details">
                    <p><strong>Başlangıç Tarihi:</strong> <span class="text-muted">{{ \Carbon\Carbon::parse($event->start_date)->format('d M, Y') }}</span></p>
                    <p><strong>Bitiş Tarihi:</strong> <span class="text-muted">{{ \Carbon\Carbon::parse($event->end_date)->format('d M, Y') }}</span></p>
                    <p><strong>Konum:</strong> <span class="text-muted">{{ $event->location }}</span></p>
                </div>

                <h3 class="mt-4">Bilet Bilgisi</h3>
                <div class="ticket-info">
                    @if ($event->tickets->isEmpty())
                        <p class="text-danger">Bu etkinlik için henüz bilet oluşturulmamış.</p>
                    @endif
                    @foreach($event->tickets as $ticket)
                        <div class="ticket-card mb-3 p-3 border rounded">
                            <h5>{{ $ticket->name }} - {{ $ticket->price }} {{ $ticket->currency }}</h5>
                            <p>{{ $ticket->description }}</p>
                            <p><strong>Kalan Bilet:</strong> {{ $ticket->quantity }}</p>

                            <form class="buy-ticket-form" data-ticket-id="{{ $ticket->id }}">
                                @csrf
                                <input type="number" name="quantity" value="1" min="1" class="form-control mb-2">
                                <button type="submit" class="btn btn-success">
                                    Bilet Satın Al
                                </button>
                            </form>
                            <div class="alert mt-2 d-none"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @section('jsContent')
        <script>
            document.querySelectorAll('.buy-ticket-form').forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const ticketId = this.dataset.ticketId;
                    const quantity = this.querySelector('input[name="quantity"]').value;
                    const alertBox = this.nextElementSibling;

                    fetch(`/tickets/${ticketId}/buy`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ quantity })
                    })
                    .then(res => {
                        if (!res.ok) {
                            return res.json().then(err => { throw err; });
                        }
                        return res.json();
                    })
                    .then(data => {
                        alertBox.classList.remove('d-none', 'alert-danger');
                        alertBox.classList.add('alert-success');
                        alertBox.innerText = data.message;
                    })
                    .catch(err => {
                        alertBox.classList.remove('d-none', 'alert-success');
                        alertBox.classList.add('alert-danger');
                        alertBox.innerText = err.message ?? 'Bir hata oluştu';
                    });
                });
            });
        </script>
        @endsection
@endsection
