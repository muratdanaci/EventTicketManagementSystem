@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-4">Check-In Onayı</h3>

        <div class="card">
            <div class="card-body">
                <p><strong>Etkinlik:</strong> {{ $checkIn->order->ticket->event->title }}</p>
                <p><strong>Bilet Tipi:</strong> {{ $checkIn->order->ticket->name }}</p>
                <p><strong>Bilet Kodu:</strong> {{ $checkIn->code }}</p>

                <button
                    class="btn btn-success"
                    data-bs-toggle="modal"
                    data-bs-target="#confirmModal"
                >
                    Onayla
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL -->
    <div class="modal fade" id="confirmModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Check-In Onayı</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    Bu bileti check-in yapmak istiyor musunuz?
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                        Vazgeç
                    </button>

                    <button
                        class="btn btn-success"
                        id="confirmCheckInBtn"
                        data-id="{{ $checkIn->id }}"
                    >
                        Onayla
                    </button>
                </div>

            </div>
        </div>
    </div>


    <script>
        document.getElementById('confirmCheckInBtn')
            .addEventListener('click', function () {

            const btn = this;
            const checkInId = btn.dataset.id;

            btn.disabled = true;
            btn.innerText = 'Onaylanıyor...';

            fetch(`/admin/check-in/${checkInId}/confirm`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    window.location.href = "{{ route('checkin.index') }}?success=1";
                } else {
                    alert(data.message ?? 'Bir hata oluştu');
                }
            })
            .catch(() => {
                alert('Bir hata oluştu');
            })
            .finally(() => {
                btn.disabled = false;
                btn.innerText = 'Onayla';
            });
        });
    </script>

@endsection
