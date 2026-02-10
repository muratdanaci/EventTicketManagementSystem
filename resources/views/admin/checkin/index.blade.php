@extends('admin.layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <h2 class="mb-4">Bilet Check-In</h2>

        @if(request('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Check-in işlemi başarılı.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $errors->first() }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('checkin.search') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Bilet Kodu</label>
            <input
                type="text"
                name="code"
                class="form-control"
                maxlength="6"
                required
                placeholder="Örn: A7K9Q2"
            >
        </div>

        <button class="btn btn-primary">
            Kontrol Et
        </button>
    </form>
</div>
@endsection
