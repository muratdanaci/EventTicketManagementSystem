<!--? slider Area Start-->
@if($nextEvent)
    <div class="slider-area position-relative">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-9 col-sm-10">
                            <div class="hero__caption">
                                <span data-animation="fadeInLeft" data-delay=".1s">Yaklaşan Etkinlik</span>
                                <h1 data-animation="fadeInLeft" data-delay=".5s">
                                    {{ $nextEvent->title }}
                                </h1>
                                <h2 class="text-white mb-4" data-animation="fadeInLeft" data-delay=".7s">{{ \Carbon\Carbon::parse($nextEvent->start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($nextEvent->end_date)->format('d M Y') }}</h2>
                                <!-- Hero-btn -->
                                <div class="slider-btns">
                                    <a data-animation="fadeInLeft" data-delay="1.0s" href="{{ route('events.show', $nextEvent->id) }}" class="btn hero-btn">Detaylar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
@endif
