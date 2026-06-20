<nav class="navbar navbar-expand-lg fixed-top navbar-aqua">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{route('home')}}">
            <span class="logo-mark"><i class="fa-solid fa-droplet"></i></span> KAMALS SERVICE
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{route('home')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('about-us') ? 'active' : '' }}" href="{{route('about')}}">About Us</a></li>

                <!-- Services Dropdown Start -->
                <li class="nav-item dropdown custom-dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('service*') ? 'active' : '' }}" href="{{route('services')}}" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Services
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                        <li><a class="dropdown-item {{ request()->is('service/sub-service-1') ? 'active' : '' }}" href="{{route('service.details','sub-service-1')}}">Sub Service 1</a></li>
                        <li><a class="dropdown-item {{ request()->is('service/sub-service-2') ? 'active' : '' }}" href="{{route('service.details','sub-service-2')}}">Sub Service 2</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('services') }}">All Services</a></li>
                    </ul>
                </li>
                <!-- Services Dropdown End -->

                <li class="nav-item"><a class="nav-link {{ request()->is('device') ? 'active' : '' }}" href="{{route('device')}}">Device</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('water-filter') ? 'active' : '' }}" href="{{route('water')}}">Water Filter</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('contact-us') ? 'active' : '' }}" href="{{route('contact')}}">Contact Us</a></li>
                <li class="nav-item ms-lg-3 mt-2 mt-lg-0"><a class="btn btn-brand btn-sm" href="{{route('contact')}}">Get a Quote</a></li>
            </ul>
        </div>
    </div>
</nav>


<style>
    /* Desktop screen-e smooth hover ebong animation er jonno */
    @media (min-width: 992px) {
        /* Initital State (Menu lukiye thakbe) */
        .custom-dropdown .dropdown-menu {
            display: block;
            opacity: 0;
            visibility: hidden;
            transform: translateY(15px); /* Ektu niche thakbe */
            transition: all 0.3s ease-in-out;
            pointer-events: none; /* Hover na thakle jate click na pore */
        }

        /* Hover State (Smoothly bheshe uthbe) */
        .custom-dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0); /* Tar nijer jaygay chole ashbe */
            pointer-events: auto; /* Ebar click/hover kaj korbe */
        }
    }

    /* Mobile Screen-e default Bootstrap click animation smooth rakhar jonno */
    @media (max-width: 991.98px) {
        .custom-dropdown .dropdown-menu {
            transition: opacity 0.2s ease-in-out;
        }
    }
</style>
