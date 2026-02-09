<!--? Brand Area Start -->
<section class="team-area pt-180 pb-100 section-bg" data-background="{{ asset('web/assets/img/gallery/section_bg02.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-9">
                <!-- Section Tittle -->
                <div class="section-tittle section-tittle2 mb-50">
                    <h2>The Best Events</h2>
                    <p>Discover the most exciting events in our collection.</p>
                </div>
            </div>
            @foreach ($events as $event)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <a href="{{ route('events.show', $event->id) }}"><img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->name }}"></a>
                            <!-- Blog Social -->
                            <ul class="team-social">
                                <li><a href="{{ route('events.show', $event->id) }}"><i class="fas fa-eye"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-caption">
                            <h3><a href="{{ route('events.show', $event->id) }}">{{ $event->name }}</a></h3>
                            <p> {{ Str::limit($event->description, 75) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Brand Area End -->
