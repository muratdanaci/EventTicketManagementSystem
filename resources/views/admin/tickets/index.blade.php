@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-lg-12 col-12 mt-5">
        <div class="card-style">
            <div class="container-fluid py-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>{{ $event->title }} – Biletler</h2>

                    <div class="d-flex gap-2">
                        <a href="{{ route('events.tickets.create', $event) }}" class="btn btn-primary mb-3">
                    Yeni Bilet
                        <a href="{{ route('events.index') }}" class="btn btn-secondary mb-3">Etkinliklere Dön</a>
                    </div>

                </a>
                </div>

                <div class="table-wrapper table-responsive">
                    <table class="table  striped-table">
                        <thead>
                            <tr>
                                <th>Ad</th>
                                <th>Fiyat</th>
                                <th>Adet</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($tickets->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center">Bu etkinlik için henüz bilet oluşturulmamış.</td>
                                </tr>
                            @endif
                            @foreach($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->name }}</td>
                                    <td>{{ $ticket->price }} ₺</td>
                                    <td>{{ $ticket->quantity }}</td>
                                    <td>
                                        <a href="{{ route('events.tickets.edit', [$event, $ticket]) }}"
                                        class="btn btn-sm btn-warning">Düzenle</a>

                                        <form action="{{ route('events.tickets.destroy', [$event, $ticket]) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Sil</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
