<!-- ======== sidebar-nav start =========== -->
<aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
        <a href="index.html">
            <img src="{{ asset('admin/assets/images/logo/logo.svg') }}" alt="logo" />
        </a>
    </div>
    <nav class="sidebar-nav">
        <ul>
            @if(auth()->user()->role === 'attendee')
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}">
                        <span class="text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('mytickets') }}">
                        <span class="text">Biletlerim</span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->role === 'organizer')
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}">
                        <span class="text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item nav-item-has-children">
                    <a href="#" data-bs-toggle="collapse" data-bs-target="#organizer_events">
                        <span class="text">Etkinlik Yönetimi</span>
                    </a>
                    <ul id="organizer_events" class="collapse dropdown-nav">
                        <li><a href="{{ route('events.index') }}">Etkinliklerim</a></li>
                        <li><a href="{{ route('events.create') }}">Etkinlik Oluştur</a></li>
                    </ul>
                </li>

                <li class="nav-item nav-item-has-children">
                    <a href="#" data-bs-toggle="collapse" data-bs-target="#organizer_tickets">
                        <span class="text">Sipariş Yönetimi</span>
                    </a>
                    <ul id="organizer_tickets" class="collapse dropdown-nav">
                            <li><a href="{{ route('ticket-orders.index') }}">Biletler</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('checkin.index') }}">
                        <span class="text">Check-in</span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->role === 'admin')
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}">
                        <span class="text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('events.index') }}">
                        <span class="text">Etkinlikler</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('ticket-orders.index') }}">
                        <span class="text">Siparişler</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('checkin.index') }}">
                        <span class="text">Check-in</span>
                    </a>
                </li>
            @endif

            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-left w-100 btn btn-link">
                        Çıkış Yap
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</aside>
<div class="overlay"></div>
<!-- ======== sidebar-nav end =========== -->
