@section('cssContent')
    <style>
        .custom-image {
            width: 470px;
            height: 629px;
            object-fit: cover;
            object-position: center;
            border-radius: 7px;
        }
    </style>
@endsection
<!--? About Law Start-->
@if (isset($nextEvent))
    <section class="about-low-area section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-35">
                            <h2>{{ $nextEvent->title }}</h2>
                        </div>
                        <p>{{ $nextEvent->description }}</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
                            <div class="single-caption mb-20">
                                <div class="caption-icon">
                                    <span class="flaticon-communications-1"></span>
                                </div>
                                <div class="caption">
                                    <h5>Nerede</h5>
                                    <p>{{ $nextEvent->location }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
                            <div class="single-caption mb-20">
                                <div class="caption-icon">
                                    <span class="flaticon-education"></span>
                                </div>
                                <div class="caption">
                                    <h5>Ne Zaman</h5>
                                    <p>{{ \Carbon\Carbon::parse($nextEvent->start_date)->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('events.show', $nextEvent) }}" class="btn mt-50">Biletini Al</a>
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        @if ($nextEvent->image)
                            <img src="{{ asset('storage/' . $nextEvent->image) }}" alt="{{ $nextEvent->title }}" class="img-fluid custom-image">
                        @else
                            <img src="{{ asset('web/assets/img/gallery/about1.png') }}" alt="{{ $nextEvent->title }}" class="img-fluid custom-image">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endif
