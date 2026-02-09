@extends('web.layouts.app')

@section('content')
    <!--? Hero Start -->
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Events</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <!--? Brand Area Start -->
    <section class="team-area pt-180 pb-100">
        <div class="container">
            <div class="row">
                @foreach ($events as $event)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-team mb-30">
                            <div class="team-img">
                                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->name }}" class="img-fluid rounded shadow">
                                <!-- Blog Social -->
                                <ul class="team-social">
                                    <li><a href="{{ route('events.show', $event->id) }}"><i class="fas fa-eye"></i></a></li>
                                </ul>
                            </div>
                            <div class="team-caption team-caption2">
                                <h3><a href="{{ route('events.show', $event->id) }}">{{ $event->name }}</a></h3>
                                <p> {{ $event->location }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Brand Area End -->
@endsection
