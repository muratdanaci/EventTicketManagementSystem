@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>{{ $ticket->exists ? 'Bilet Güncelle' : 'Yeni Bilet' }}</h2>
        </div>

        <form method="POST"
            action="{{ $ticket->exists
                ? route('events.tickets.update', [$event, $ticket])
                : route('events.tickets.store', $event) }}">

            @csrf
            @if($ticket->exists)
                @method('PUT')
            @endif

            <div class="mb-3">
                <label>Bilet Adı</label>
                <input type="text" name="name"
                    value="{{ old('name', $ticket->name) }}"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label>Fiyat (₺)</label>
                <input type="number" step="0.01" name="price"
                    value="{{ old('price', $ticket->price) }}"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label>Adet</label>
                <input type="number" name="quantity"
                    value="{{ old('quantity', $ticket->quantity) }}"
                    class="form-control">
            </div>

            <button class="btn btn-success">
                {{ $ticket->exists ? 'Güncelle' : 'Oluştur' }}
            </button>
        </form>
    </div>
@endsection
