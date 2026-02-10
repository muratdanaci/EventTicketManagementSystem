@extends('admin.layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <h2 class="mb-4">Biletlerim</h2>

    @forelse($checkIns as $checkIn)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $checkIn->order->ticket->event->title }}</h5>

                <p>
                    <strong>Bilet:</strong>
                    {{ $checkIn->order->ticket->name }}
                </p>

                <p>
                    <strong>Bilet Kodu:</strong>
                    <span class="badge bg-dark fs-6">
                        {{ $checkIn->code }}
                    </span>
                </p>

                @if($checkIn->checked_in_at)
                    <span class="badge bg-success">Kullanıldı</span>
                @else
                    <span class="badge bg-warning text-dark">
                        Henüz kullanılmadı
                    </span>
                @endif
            </div>
        </div>
    @empty
        <p>Henüz biletiniz yok.</p>
    @endforelse
</div>
@endsection
