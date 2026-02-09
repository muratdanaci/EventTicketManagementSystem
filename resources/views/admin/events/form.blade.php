@extends('admin.layouts.app')

@section('content')
    <div class="container py-4">
        <h1>{{ $event->exists ? 'Etkinliği Güncelle' : 'Yeni Etkinlik Oluştur' }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ $event->exists ? route('events.update', $event->id) : route('events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if ($event->exists)
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="title" class="form-label">Başlık</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $event->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Açıklama</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $event->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Konum</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $event->location) }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Görsel</label>
                <input type="file" class="form-control" id="image" name="image">
                @if ($event->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $event->image) }}" alt="Etkinlik Görseli" style="max-width: 200px;">
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Başlangıç Tarihi</label>
                <input type="date" class="form-control" id="start_date" name="start_date"
                    value="{{ old('start_date', \Carbon\Carbon::parse($event->start_date)->format('Y-m-d')) }}" required>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">Bitiş Tarihi</label>
                <input type="date" class="form-control" id="end_date" name="end_date"
                    value="{{ old('end_date', \Carbon\Carbon::parse($event->end_date)->format('Y-m-d')) }}" required>
            </div>



            <button type="submit" class="btn btn-primary">{{ $event->exists ? 'Güncelle' : 'Oluştur' }}</button>
        </form>
    </div>
@endsection
