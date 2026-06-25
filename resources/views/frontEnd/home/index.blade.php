@extends('frontEnd.layout.app')

@section('title', 'Premium Facility Management & Engineering Services | AquaNova')

@section('body')
    <!-- ================= PREMIUM CAROUSEL HERO MODULE ================= -->
    <section id="hero-owl-wrapper" class="position-relative overflow-hidden w-100 py-5" style="">
        <div class="owl-carousel owl-theme premium-hero-slider">
            @foreach($sliders as $slider)
            <div class="item hero-slide-item">
                <div class="carousel-bg" style="background-image: linear-gradient(to right, rgba(0,0,0,0.88) 40%, rgba(0,0,0,0.4)), url('{{ asset($slider->image) }}');"></div>
                <div class="container hero-container position-relative">
                    <div class="row w-100 m-0">
                        <div class="col-lg-8 p-0 text-start text-white animate-content-owl">
                        <span class="chip mb-2 bg-brand-light text-white px-3 py-1.5 rounded-pill fs-xs fw-semibold border border-secondary shadow-sm d-inline-block">
                            <i class="fa fa-spark text-warning me-2"></i> {{$slider->heading_top}}
                        </span>
                            <h2 class="fw-black mb-2 tracking-tight text-white hero-title">
                                {{ $slider->heading_one }}
                            </h2>
                            <p class="lead text-white-50 mb-4 hero-desc">
                                {!! $slider->description !!}
                            </p>
                            <div class="d-flex flex-column flex-sm-row gap-2 mt-3 hero-btn-group">
                                <a href="{{$slider->button_one_url ? $slider->button_one_url : '#core-services'}}" class="btn btn-brand py-2.5 px-4 fw-semibold shadow-lg">{{ $slider->button_one ?? 'Hire Us' }}</a>
                                <a href="{{ $slider->button_two_url }}" class="btn btn-outline-light rounded-pill d-flex align-items-center justify-content-center px-4 py-2.5 fw-medium fs-7">
                                    {{ $slider->button_two ?? 'Contact Us'}} <i class="fa-solid fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- ================= QUICK TRIMS MATRIX ================= -->
    <section class="trust-metrics-wrapper position-relative z-index-10 mx-3 mx-md-auto max-w-1200 py-4">
        <div class="container px-2">
            <div class="card border-0 shadow-lg bg-white bg-opacity-95 backdrop-blur rounded-4 overflow-hidden">
                <div class="card-body py-4 px-3 px-md-4">
                    <div class="row g-4 align-items-center justify-content-center divide-lg-col">

                        <div class="col-6 col-lg-3">
                            <div class="metric-group d-flex flex-column flex-sm-row align-items-center text-center text-sm-start gap-3 px-md-3">
                                <div class="metric-icon flex-shrink-0 d-flex align-items-center justify-content-center rounded-3 bg-sky-soft text-sky-custom">
                                    <i class="fa-solid fa-user-tie fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="fs-7 fw-bold text-dark mb-0 tracking-tight metric-title">{{$web_setting->metric_1_title}}</h5>
                                    <p class="fs-8 text-muted mb-0 d-none d-sm-block fw-medium">{{$web_setting->metric_1_desc}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3">
                            <div class="metric-group d-flex flex-column flex-sm-row align-items-center text-center text-sm-start gap-3 px-md-3">
                                <div class="metric-icon flex-shrink-0 d-flex align-items-center justify-content-center rounded-3 bg-amber-soft text-amber-custom">
                                    <i class="fa-solid fa-handshake-angle fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="fs-7 fw-bold text-dark mb-0 tracking-tight metric-title">{{$web_setting->metric_2_title}}</h5>
                                    <p class="fs-8 text-muted mb-0 d-none d-sm-block fw-medium">{{$web_setting->metric_2_desc}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3">
                            <div class="metric-group d-flex flex-column flex-sm-row align-items-center text-center text-sm-start gap-3 px-md-3">
                                <div class="metric-icon flex-shrink-0 d-flex align-items-center justify-content-center rounded-3 bg-emerald-soft text-emerald-custom">
                                    <i class="fa-solid fa-money-check-dollar fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="fs-7 fw-bold text-dark mb-0 tracking-tight metric-title">{{$web_setting->metric_3_title}}</h5>
                                    <p class="fs-8 text-muted mb-0 d-none d-sm-block fw-medium">{{$web_setting->metric_3_desc}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3">
                            <div class="metric-group d-flex flex-column flex-sm-row align-items-center text-center text-sm-start gap-3 px-md-3">
                                <div class="metric-icon flex-shrink-0 d-flex align-items-center justify-content-center rounded-3 bg-indigo-soft text-indigo-custom">
                                    <i class="fa-solid fa-award fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="fs-7 fw-bold text-dark mb-0 tracking-tight metric-title">{{$web_setting->metric_4_title}}</h5>
                                    <p class="fs-8 text-muted mb-0 d-none d-sm-block fw-medium">{{$web_setting->metric_4_desc}}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= CORE ADVANCED SERVICES ================= -->
    <section id="core-services" class="py-5 bg-soft">
        <div class="container py-4">
            <div class="text-center mb-5 reveal">
                <span class="eyebrow text-uppercase tracking-widest text-brand fw-bold fs-7">Our Focus Verticals</span>
                <h1 class="section-title fw-extrabold mt-2 text-dark">Our Premium Core Services</h1>
                <p class="text-muted-2 mx-auto mt-2" style="max-width:600px">Meticulously tailored execution setups managed by top-tier technical crews.</p>
            </div>

            <div class="row g-4 justify-content-center">

                <!-- SERVICE CARD 1: OFFICE CLEANING -->
                @foreach($services as $service)
                    <div class="col-md-6 col-lg-4 reveal mb-4">
                        @include('frontEnd.component.serviceCard',[ 'service' => $service ])
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- ================= ADVANCED CORPORATE ADVANTAGE SECTION ================= -->
    <section class="py-5 position-relative overflow-hidden" style="background-color: #ffffff;">
        <!-- Minimalist background accents -->
        <div class="position-absolute top-50 start-100 translate-middle opacity-10 pointer-events-none" style="width: 400px; height: 400px; background: radial-gradient(circle, #0f4c81 0%, transparent 70%);"></div>

        <div class="container py-5 position-relative z-index-2">
            <div class="row align-items-center g-5">

                <!-- LEFT CONTENT COLUMN -->
                <div class="col-lg-6 reveal text-start">
                <span class="d-inline-flex align-items-center gap-2 px-3 py-1.5 rounded-pill bg-brand-soft text-brand-custom fw-bold fs-8 text-uppercase tracking-wider shadow-xs mb-3">
                    <span class="d-inline-block rounded-circle bg-brand-custom" style="width: 5px; height: 5px;"></span>
                    The Premium Advantage
                </span>
                    <h2 class="display-6 fw-black text-slate-900 tracking-tight mb-4" style="font-weight: 800;">
                        {{$web_setting->advantage_title}}
                    </h2>
                    <p class="text-slate-500 fs-6 mb-5 leading-relaxed">
                        {{$web_setting->advantage_description}}
                    </p>

                    <!-- Premium Features Sub-Grid -->
                    <div class="row g-4 pt-2">
                        <!-- Feature 1 -->
                        <div class="col-sm-6">
                            <div class="adv-feature-item p-3.5 rounded-4 transition-all">
                                <div class="adv-feature-icon-box bg-blue-soft text-blue-custom rounded-3 mb-3 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-circle-nodes fs-5"></i>
                                </div>
                                <h5 class="fw-bold text-slate-900 fs-6.5 mb-2">{{$web_setting->feature_1_title}}</h5>
                                <p class="text-slate-500 fs-7 mb-0 leading-relaxed">{{$web_setting->feature_1_desc}}</p>
                            </div>
                        </div>

                        <!-- Feature 2 -->
                        <div class="col-sm-6">
                            <div class="adv-feature-item p-3.5 rounded-4 transition-all">
                                <div class="adv-feature-icon-box bg-emerald-soft text-emerald-custom rounded-3 mb-3 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-user-shield fs-5"></i>
                                </div>
                                <h5 class="fw-bold text-slate-900 fs-6.5 mb-2">{{$web_setting->feature_2_title}}</h5>
                                <p class="text-slate-500 fs-7 mb-0 leading-relaxed">{{$web_setting->feature_2_desc}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT IMAGE ARCHITECTURE COLUMN -->
                <div class="col-lg-6 reveal position-relative">
                    <div class="image-prestige-frame position-relative mx-auto max-w-500">
                        <!-- Abstract geometric backdrop box (Tailwind design style) -->
                        <div class="position-absolute start-0 top-0 bg-slate-50 border border-slate-100 rounded-5 w-100 h-100 transform translate-x-4 translate-y-4 shadow-sm" style="z-index: -1;"></div>

                        {{--<!-- Floating Stat Badge Overlay -->
                        <div class="position-absolute top-0 start-0 translate-middle-x mt-5 ms-4 bg-white bg-opacity-95 backdrop-blur shadow-prestige rounded-4 p-3 d-none d-sm-flex align-items-center gap-3 border border-slate-100 transition-up" style="z-index: 5;">
                            <div class="rounded-circle bg-emerald-soft text-emerald-custom d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                                <i class="fa-solid fa-circle-check fs-5"></i>
                            </div>
                            <div>
                                <h6 class="fw-black text-slate-900 mb-0 fs-7">100% Vetted</h6>
                                <p class="text-slate-400 fs-8.5 mb-0 fw-semibold">SLA Compliance Locked</p>
                            </div>
                        </div>--}}

                        <!-- Main Cover Image with Wrapper -->
                        <div class="overflow-hidden rounded-5 shadow-prestige image-hover-scale" style="border: 1px solid rgba(255,255,255,0.8);">

                            <img src="{{ asset($web_setting->advantage_image) }}" class="img-fluid w-100 transition-transform-slow" style="max-height: 460px; min-height: 400px; object-fit: cover;" alt="AquaNova Execution Blueprint"/>

                            <!-- Soft premium color overlay -->
{{--                            <div class="position-absolute top-0 start-0 w-100 h-100 image-gradient-tint opacity-20 pointer-events-none"></div>--}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= TESTIMONIAL AUDITS ================= -->
    <section class="py-5 bg-soft border-top border-bottom overflow-hidden">
        <div class="container py-3">
            <div class="text-center mb-5 reveal">
                <span class="eyebrow text-brand fw-bold fs-7">Client Audits</span>
                <h2 class="section-title fw-bold mt-1 text-dark">Enterprise Case Studies</h2>
            </div>

            <div class="infinite-ticker-container">
                <div class="infinite-ticker-track" id="tickerTrack">
                    @foreach($testimonials as $testimonial)
                        <div class="ticker-item">
                            <div class="card p-4 rounded-4 border-0 shadow-sm text-start h-100 bg-white d-flex flex-column">
                                <div class="text-warning mb-3 small">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= ($testimonial->rating ?? 5))
                                            {{-- একটিভ বা ভরাট স্টার --}}
                                            <i class="fa-solid fa-star"></i>
                                        @else
                                            {{-- ইন-একটিভ বা খালি স্টার --}}
                                            <i class="fa-regular fa-star text-muted opacity-50"></i>
                                        @endif
                                    @endfor
                                </div>
                                <p class="text-secondary small flex-grow-1 mb-3" style="line-height: 1.6;">
                                    "{!! strip_tags($testimonial->review ?? $testimonial->review) !!}"
                                </p>
                                <hr class="my-3 opacity-25">
                                <div class="mt-auto d-flex align-items-center gap-3">
                                    <div class="flex-shrink-0">
                                        @if(!empty($testimonial->image) && file_exists($testimonial->image))
                                            <img class="rounded-circle object-cover shadow-sm"
                                                 src="{{ asset($testimonial->image) }}"
                                                 alt="{{ $testimonial->name }}"
                                                 style="width: 48px; height: 48px; object-fit: cover; border: 2px solid #fff;">
                                        @else
                                            <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white bg-brand-soft text-brand shadow-sm"
                                                 style="width: 48px; height: 48px; font-size: 0.95rem; background-color: rgba(var(--bs-primary-rgb), 0.1); border: 2px solid #fff;">
                                                {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="user-info">
                                        <strong class="text-dark d-block mb-0" style="font-size: 0.95rem; line-height: 1.2;">{{ $testimonial->name }}</strong>
                                        <span class="text-muted fs-7 d-block mt-0.5" style="font-size: 0.8rem;">{{ $testimonial->designation ?? 'Verified Client' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

    <!-- ================= Latest Articles ================= -->
    <section class="py-5">
        <div class="container">
            <!-- Filter / Top Bar (Optional but gives a premium feel) -->
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-5 pb-2 border-bottom reveal">
                <div>
                    <h3 class="fw-bold mb-1" style="color: #1a1a1a;">Latest Articles</h3>
                </div>
                <div class="mt-3 mt-md-0">
                    <a href="#" class="btn btn-brand-soft btn-sm px-3 py-1.5 rounded-pill fw-medium text-decoration-none small transition-all">
                        View All <i class="fa-solid fa-chevron-right ms-1 opacity-75" style="font-size: 0.7rem;"></i>
                    </a>
                </div>
            </div>
            <style>
                .btn-brand-soft {
                    background-color: rgba(var(--bs-primary-rgb), 0.1);
                    color: var(--brand-color, #5e35b1);
                }
                .btn-brand-soft:hover {
                    background-color: var(--brand-color, #5e35b1);
                    color: #fff;
                }
            </style>

            <!-- Blog Grid -->
            <div class="row g-4">
                <!-- Blog Post 1 -->
                @foreach($articles as $article)
                <div class="col-md-6 col-lg-4 reveal">
                    @include('frontEnd.component.articleCard',[ 'article' => $article ])
                </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- ================= INDUSTRIAL CTA ================= -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="glass p-5 text-center reveal" style="background: linear-gradient(135deg, rgba(15,76,129,.98), rgba(0,174,239,.9)); color: #fff; border-radius: 28px;">
                <h2 class="section-title mb-3 fw-bold" style="color:#fff;">Deploy Immediate Operational Excellence</h2>
                <p class="lead mb-4 mx-auto text-white-50 fs-6" style="max-width: 650px;">Connect with our scheduling office. Our localized field technical units will prepare deployment scopes and clear estimation brackets for your estate.</p>
                <a href="{{route('contact')}}" class="btn btn-light rounded-pill px-5 py-3 fw-bold text-brand shadow-md">
                    Instant Quote Engine <i class="fa-solid fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

@endpush
@push('js')
    @push('js')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

        <script>
            $(document).ready(function(){
                $(".premium-hero-slider").owlCarousel({
                    items: 1,
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 5500,
                    animateOut: 'fadeOut',
                    animateIn: 'fadeIn',
                    smartSpeed: 700,
                    nav: false,
                    dots: true,
                    mouseDrag: true,
                    touchDrag: true
                });
            });
            $(document).ready(function() {
                $(".premium-client-testimonial").owlCarousel({
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 0,        // 🚀 ০ দেওয়ার মানে কোনো থামাথামি (delay) থাকবে না
                    slideTransition: 'linear', // 🚀 অ্যানিমেশন একদম সমান গতিতে (Linear) চলবে
                    autoplaySpeed: 8000,       // 🚀 স্লাইড স্পিড (মিলিসেকেন্ডে), যত বেশি দেবেন তত আস্তে ও স্মুথলি চলবে
                    smartSpeed: 8000,
                    nav: false,
                    dots: false,               // ❌ ডটস বন্ধ রাখতে হবে, কারণ ডটস থাকলে লাস্ট আইটেম চেনা যায়
                    margin: 24,
                    mouseDrag: true,
                    touchDrag: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        768: {
                            items: 2
                        },
                        992: {
                            items: 3
                        }
                    }
                });
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const track = document.getElementById("tickerTrack");
                const container = document.querySelector(".infinite-ticker-container");
                if (!track || !container) return;

                // ১. ট্রু ইনফিনিট লুপের জন্য আইটেমগুলো ক্লোন করা (ডাবল করা)
                const items = Array.from(track.children);
                items.forEach(item => {
                    const clone = item.cloneNode(true);
                    track.appendChild(clone);
                });

                let speed = 1; // অটো-প্লে স্পিড (বাড়িয়ে কমিয়ে স্পিড কন্ট্রোল করতে পারবেন)
                let currentX = 0;
                let isDragging = false;
                let startX, scrollLeft;
                let animationFrameId;

                // ২. অটো-প্লে অ্যানিমেশন ফাংশন
                function step() {
                    if (!isDragging) {
                        currentX -= speed;

                        // যদি অর্ধেক ট্র্যাকে চলে যায় (অর্থাৎ অরিজিনাল আইটেম শেষ), রিসেট করো ০ তে
                        const halfWidth = track.scrollWidth / 2;
                        if (Math.abs(currentX) >= halfWidth) {
                            currentX = 0;
                        }
                        track.style.transform = `translateX(${currentX}px)`;
                    }
                    animationFrameId = requestAnimationFrame(step);
                }

                // অটো-প্লে শুরু
                animationFrameId = requestAnimationFrame(step);

                // ৩. মাউস দিয়ে ড্র্যাগ করার লজিক (যাতে লাস্ট আইটেম কখনোই না বোঝা যায়)
                container.addEventListener("mousedown", (e) => {
                    isDragging = true;
                    startX = e.pageX - currentX;
                    cancelAnimationFrame(animationFrameId);
                });

                window.addEventListener("mouseup", () => {
                    if (!isDragging) return;
                    isDragging = false;
                    animationFrameId = requestAnimationFrame(step);
                });

                container.addEventListener("mousemove", (e) => {
                    if (!isDragging) return;
                    e.preventDefault();
                    const x = e.pageX;
                    currentX = x - startX;

                    const halfWidth = track.scrollWidth / 2;
                    // ড্র্যাগ করে ডান বা বামে সীমানা পার হলে পজিশন রিসেট
                    if (currentX > 0) {
                        currentX = -halfWidth;
                        startX = x - currentX;
                    } else if (Math.abs(currentX) >= halfWidth) {
                        currentX = 0;
                        startX = x - currentX;
                    }

                    track.style.transform = `translateX(${currentX}px)`;
                });

                // টাচ স্ক্রিন (মোবাইল) সাপোর্ট
                container.addEventListener("touchstart", (e) => {
                    isDragging = true;
                    startX = e.touches[0].pageX - currentX;
                    cancelAnimationFrame(animationFrameId);
                });

                window.addEventListener("touchend", () => {
                    if (!isDragging) return;
                    isDragging = false;
                    animationFrameId = requestAnimationFrame(step);
                });

                container.addEventListener("touchmove", (e) => {
                    if (!isDragging) return;
                    const x = e.touches[0].pageX;
                    currentX = x - startX;
                    const halfWidth = track.scrollWidth / 2;
                    if (currentX > 0) { currentX = -halfWidth; startX = x - currentX; }
                    else if (Math.abs(currentX) >= halfWidth) { currentX = 0; startX = x - currentX; }
                    track.style.transform = `translateX(${currentX}px)`;
                });
            });
        </script>
    @endpush
@endpush
