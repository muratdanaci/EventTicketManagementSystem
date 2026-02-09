@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-lg-12 col-12 mt-5">
        <div class="card-style">
            <div class="container-fluid py-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3">Etkinlikler</h1>

                    <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">
                        Yeni Etkinlik
                    </a>
                </div>

                <div class="mb-4">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Görsel</th>
                            <th>Başlık</th>
                            <th>Kalan Bilet</th>
                            <th>Etkinlik Tarihi</th>
                            <th>Güncelleme Tarihi</th>
                            <th>İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>{{ $event->id }}</td>
                                <td>
                                    @if($event->image)
                                        <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->image }}" width="100">
                                    @else
                                        Görsel Yok
                                    @endif
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->tickets->sum('quantity') }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->start_date)->format('d.m.Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->updated_at)->format('d.m.Y') }}</td>
                                <td>
                                    <a href="{{ route('events.edit', $event) }}" class="btn btn-sm btn-outline-primary">Düzenle</a>
                                    <a href="{{ route('events.tickets.index', $event) }}" class="btn btn-sm btn-primary">
                                        Biletleri Yönet
                                    </a>
                                    <form method="POST" action="{{ route('events.destroy', $event) }}" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Sil</button>
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
@endsection
