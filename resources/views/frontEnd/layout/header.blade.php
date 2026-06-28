@php
    $services = \App\Models\Service::where('status',1)->whereNull('parent_id')->latest()->get();
@endphp

<!-- ================= TOPBAR START ================= -->
<div class="topbar-marquee-bg fixed-top">
    <div class="container-fluid px-0">
        <div class="d-flex align-items-center justify-content-between">
            <!-- স্ক্রলিং টেক্সট (Marquee) -->
            <div class="marquee-container flex-grow-1">
                <div class="marquee-text">
                    {{ $web_setting->header_top_text }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================= TOPBAR END ================= -->

<!-- Navbar-এ সামান্য পরিবর্তন করা হয়েছে (topbar এর কারণে e.g., navbar-position-adjust) -->
<nav class="navbar navbar-expand-lg fixed-top navbar-aqua navbar-position-adjust">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{route('home')}}">
            <span class="logo-mark"><i class="fa-solid fa-droplet"></i></span> {{$web_setting->company_name}}
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
                    <a class="nav-link dropdown-toggle" href="{{route('services')}}" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Services
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                        @foreach($services as $service)
                            <li><a class="dropdown-item" href="{{route('service.details',$service->slug)}}">{{$service->name}}</a></li>
                        @endforeach
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('services') }}">All Services</a></li>
                    </ul>
                </li>
                <!-- Services Dropdown End -->
                <li class="nav-item"><a class="nav-link {{ request()->is('project-gallery') ? 'active' : '' }}" href="{{route('project.gallery')}}">Project Gallery</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('article') ? 'active' : '' }}" href="{{route('articles')}}">Articles</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('contact-us') ? 'active' : '' }}" href="{{route('contact')}}">Contact Us</a></li>
                <li class="nav-item ms-lg-3 mt-2 mt-lg-0"><a class="btn btn-brand btn-sm" href="{{route('request-quote')}}">Get a Quote</a></li>
            </ul>
        </div>
    </div>
</nav>


<style>
    /* ================= TOPBAR STYLES ================= */
    .topbar-marquee-bg {
        background-color: #0f2c59; /* নেভি ব্লু থিম, আপনার থিম কালারের সাথে চেঞ্জ করতে পারেন */
        height: 34px;
        z-index: 1040; /* বুটস্ট্র্যাপ ফিক্সড নেভবারের উপরে রাখার জন্য */
        display: flex;
        align-items: center;
        overflow: hidden;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .topbar-badge {
        background-color: #00bcd4; /* Aqua বা আপনার ব্রান্ড কালার */
        font-size: 12px;
        height: 34px;
        display: flex;
        align-items: center;
        z-index: 5;
        position: relative;
        box-shadow: 3px 0 10px rgba(0,0,0,0.2);
    }

    /* CSS দিয় মার্কি টেক্সট এনিমেশন (HTML marquee ট্যাগ এখন অবসোলেট, তাই CSS বেস্ট) */
    .marquee-container {
        overflow: hidden;
        white-space: nowrap;
        position: relative;
        display: flex;
        align-items: center;
    }

    .marquee-text {
        display: inline-block;
        padding-left: 100%;
        animation: marqueeAnimation 35s linear infinite; /* স্পিড কমাতে চাইলে ২৫ সেকেণ্ড বাড়িয়ে ৩০ করতে পারেন */
        font-size: 13.5px;
        color: #ffffff;
    }

    /* টেক্সট এর উপর মাউস নিলে স্ক্রলিং থেমে যাবে (User-friendly) */
    .marquee-container:hover .marquee-text {
        animation-play-state: paused;
    }

    @keyframes marqueeAnimation {
        0% { transform: translate3d(0, 0, 0); }
        100% { transform: translate3d(-100%, 0, 0); }
    }

    /* টপবার আসার কারণে মেইন নেভবারকে একটু নিচে নামানোর জন্য */
    .navbar-position-adjust {
        top: 34px !important;
    }

    /* ================= DROPDOWN ANIMATION (YOUR EXISTING STYLES) ================= */
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
