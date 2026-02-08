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
                    <a href="#">
                        <span class="text">Etkinlikler</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#">
                        <span class="text">Biletlerim</span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->role === 'organizer')
                <li class="nav-item">
                    <a href="#">
                        <span class="text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item nav-item-has-children">
                    <a href="#0" data-bs-toggle="collapse" data-bs-target="#organizer_events">
                        <span class="text">Etkinlik Yönetimi</span>
                    </a>
                    <ul id="organizer_events" class="collapse dropdown-nav">
                        <li><a href="#">Etkinliklerim</a></li>
                        <li><a href="#">Etkinlik Oluştur</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#">
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

                <li class="nav-item nav-item-has-children">
                    <a href="#0" data-bs-toggle="collapse" data-bs-target="#admin_events">
                        <span class="text">Etkinlikler</span>
                    </a>
                    <ul id="admin_events" class="collapse dropdown-nav">
                        <li><a href="#">Tüm Etkinlikler</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#">
                        <span class="text">Siparişler</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#">
                        <span class="text">Satış Raporları</span>
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
