<nav class="navbar navbar-expand-lg fixed-top navbar-aqua">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{route('home')}}">
            <span class="logo-mark"><i class="fa-solid fa-droplet"></i></span> AquaNova
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{route('home')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('electrolite') ? 'active' : '' }}" href="{{route('electrolite')}}">Electrolite</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('device') ? 'active' : '' }}" href="{{route('device')}}">Device</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('water-filter') ? 'active' : '' }}" href="{{route('water')}}">Water Filter</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('contact-us') ? 'active' : '' }}" href="{{route('contact')}}">Contact Us</a></li>
                <li class="nav-item ms-lg-3 mt-2 mt-lg-0"><a class="btn btn-brand btn-sm" href="{{route('contact')}}">Get a Quote</a></li>
            </ul>
        </div>
    </div>
</nav>
