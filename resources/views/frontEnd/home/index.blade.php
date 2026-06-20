@extends('frontEnd.layout.app')

@section('title', 'Premium Facility Management & Engineering Services | AquaNova')

@section('body')
    <!-- ================= PREMIUM CAROUSEL HERO MODULE ================= -->
    <section id="hero-owl-wrapper" class="position-relative overflow-hidden w-100 py-5" style="">
        <div class="owl-carousel owl-theme premium-hero-slider">
            <div class="item hero-slide-item">
                <div class="carousel-bg" style="background-image: linear-gradient(to right, rgba(0,0,0,0.88) 40%, rgba(0,0,0,0.4)), url('{{ asset('banner1.jpg') }}');"></div>
                <div class="container hero-container position-relative">
                    <div class="row w-100 m-0">
                        <div class="col-lg-8 p-0 text-start text-white animate-content-owl">
                        <span class="chip mb-2 bg-brand-light text-white px-3 py-1.5 rounded-pill fs-xs fw-semibold border border-secondary shadow-sm d-inline-block">
                            <i class="fa-solid fa-sparkles text-warning me-2"></i> Corporate Sanitization
                        </span>
                            <h1 class="fw-black mb-2 tracking-tight text-white hero-title">
                                Premium Corporate <br class="d-none d-sm-block">
                                <span class="text-gradient-cyan">Office Cleaning</span>
                            </h1>
                            <p class="lead text-white-50 mb-4 hero-desc">
                                Hospital-grade disinfection, high-frequency deep sanitization, and eco-conscious cleaning protocols mapped out for corporate spaces.
                            </p>
                            <div class="d-flex flex-column flex-sm-row gap-2 mt-3 hero-btn-group">
                                <a href="#core-services" class="btn btn-brand py-2.5 px-4 fw-semibold shadow-lg">Schedule Deep Clean</a>
                                <a href="{{route('contact')}}" class="btn btn-outline-light rounded-pill d-flex align-items-center justify-content-center px-4 py-2.5 fw-medium fs-7">
                                    Custom Contract <i class="fa-solid fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item hero-slide-item">
                <div class="carousel-bg" style="background-image: linear-gradient(to right, rgba(0,0,0,0.88) 40%, rgba(0,0,0,0.4)), url('{{ asset('banner2.jpg') }}');"></div>
                <div class="container hero-container position-relative">
                    <div class="row w-100 m-0">
                        <div class="col-lg-8 p-0 text-start text-white animate-content-owl">
                        <span class="chip mb-2 bg-brand-light text-white px-3 py-2 rounded-pill fs-xs fw-semibold border border-secondary shadow-sm d-inline-block">
                            <i class="fa-solid fa-plug-circle-bolt text-warning me-2"></i> Certified Grid Lines
                        </span>
                            <h1 class="display-3 fw-black mb-2 tracking-tight text-white hero-title">
                                Certified Electrical <br class="d-none d-sm-block">
                                <span class="text-gradient-cyan">Engineering & Faults</span>
                            </h1>
                            <p class="lead text-white-50 mb-4 hero-desc">
                                Emergency diagnostic trip monitoring, distribution control board installations, and smart load-balancing setups backed by safety codes.
                            </p>
                            <div class="d-flex flex-column flex-sm-row gap-2 mt-3 hero-btn-group">
                                <a href="#core-services" class="btn btn-brand py-2.5 px-4 fw-semibold shadow-lg">Request Electrician</a>
                                <a href="{{route('contact')}}" class="btn btn-outline-light rounded-pill d-flex align-items-center justify-content-center px-4 py-2.5 fw-medium fs-7">
                                    Safety Audit Setup <i class="fa-solid fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item hero-slide-item">
                <div class="carousel-bg" style="background-image: linear-gradient(to right, rgba(0,0,0,0.88) 40%, rgba(0,0,0,0.4)), url('{{ asset('banner3.jpg') }}');"></div>
                <div class="container hero-container position-relative">
                    <div class="row w-100 m-0">
                        <div class="col-lg-8 p-0 text-start text-white animate-content-owl">
                        <span class="chip mb-3 bg-brand-light text-white px-3 py-2 rounded-pill fs-xs fw-semibold border border-secondary shadow-sm d-inline-block">
                            <i class="fa-solid fa-screwdriver-wrench text-warning me-2"></i> Restoration Protocols
                        </span>
                            <h1 class="display-3 fw-black mb-2 tracking-tight text-white hero-title">
                                High-Precision Home <br class="d-none d-sm-block">
                                <span class="text-gradient-cyan">Appliance Diagnostics</span>
                            </h1>
                            <p class="lead text-white-50 mb-4 hero-desc">
                                Dynamic thermodynamic profiling, logic board recalibration, and performance tuning for high-end HVAC cooling units and smart arrays.
                            </p>
                            <div class="d-flex flex-column flex-sm-row gap-2 mt-3 hero-btn-group">
                                <a href="#core-services" class="btn btn-brand py-3 px-5 fw-semibold shadow-lg">Book Appliance Audit</a>
                                <a href="{{route('contact')}}" class="btn btn-outline-light rounded-pill d-flex align-items-center justify-content-center px-4 py-3 fw-medium fs-7">
                                    Check OEM Coverage <i class="fa-solid fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                    <h5 class="fs-7 fw-bold text-dark mb-0 tracking-tight metric-title">Certified Engineers</h5>
                                    <p class="fs-8 text-muted mb-0 d-none d-sm-block fw-medium">Vetted elite technicians</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3">
                            <div class="metric-group d-flex flex-column flex-sm-row align-items-center text-center text-sm-start gap-3 px-md-3">
                                <div class="metric-icon flex-shrink-0 d-flex align-items-center justify-content-center rounded-3 bg-amber-soft text-amber-custom">
                                    <i class="fa-solid fa-handshake-angle fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="fs-7 fw-bold text-dark mb-0 tracking-tight metric-title">2-Hour Dispatch</h5>
                                    <p class="fs-8 text-muted mb-0 d-none d-sm-block fw-medium">Instant emergency response</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3">
                            <div class="metric-group d-flex flex-column flex-sm-row align-items-center text-center text-sm-start gap-3 px-md-3">
                                <div class="metric-icon flex-shrink-0 d-flex align-items-center justify-content-center rounded-3 bg-emerald-soft text-emerald-custom">
                                    <i class="fa-solid fa-money-check-dollar fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="fs-7 fw-bold text-dark mb-0 tracking-tight metric-title">100% Transparent</h5>
                                    <p class="fs-8 text-muted mb-0 d-none d-sm-block fw-medium">No hidden fees structural logs</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3">
                            <div class="metric-group d-flex flex-column flex-sm-row align-items-center text-center text-sm-start gap-3 px-md-3">
                                <div class="metric-icon flex-shrink-0 d-flex align-items-center justify-content-center rounded-3 bg-indigo-soft text-indigo-custom">
                                    <i class="fa-solid fa-award fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="fs-7 fw-bold text-dark mb-0 tracking-tight metric-title">SLA Guaranteed</h5>
                                    <p class="fs-8 text-muted mb-0 d-none d-sm-block fw-medium">Strict compliance management</p>
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
                <h2 class="section-title fw-extrabold mt-2 text-dark">Our Premium Core Services</h2>
                <p class="text-muted-2 mx-auto mt-2" style="max-width:600px">Meticulously tailored execution setups managed by top-tier technical crews.</p>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- SERVICE CARD 1: OFFICE CLEANING -->
                <div class="col-md-6 col-lg-4 reveal">
                    <div class="card h-100 border-0 shadow-sm p-4 rounded-4 text-start bg-white service-premium-card">
                        <div class="feature-icon bg-brand-soft text-brand mb-4">
                            <i class="fa-solid fa-building-circle-check"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3">Corporate & Office Cleaning</h4>
                        <p class="text-muted-2 small flex-grow-1 mb-3">
                            Hospital-grade disinfection, smart workstation optimization, and high-frequency space sanitization engineered to maximize workspace safety and productivity logs.
                        </p>
                        <hr class="my-3 opacity-5">
                        <ul class="list-unstyled mb-4 small text-dark fw-medium">
                            <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Contractual & Deep Sanitization</li>
                            <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> HEPA Multi-Stage Filtration Airing</li>
                        </ul>
                        <a class="btn btn-outline-brand btn-sm w-100 py-2.5 fw-semibold" href="#">
                            Explore Scope & Pricing <i class="fa-solid fa-chevron-right ms-1 small"></i>
                        </a>
                    </div>
                </div>

                <!-- SERVICE CARD 2: ELECTRICAL ENGINEERING -->
                <div class="col-md-6 col-lg-4 reveal">
                    <div class="card h-100 border-0 shadow-sm p-4 rounded-4 text-start bg-white service-premium-card feature-active-border">
                        <div class="feature-icon bg-warning-soft text-warning mb-4">
                            <i class="fa-solid fa-plug-circle-bolt"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3">Certified Electrical Work</h4>
                        <p class="text-muted-2 small flex-grow-1 mb-3">
                            Emergency power trip diagnostics, heavy-duty distribution board (DB) upgrades, systemic home rewiring, and smart load-balancing circuits built under safety compliance.
                        </p>
                        <hr class="my-3 opacity-5">
                        <ul class="list-unstyled mb-4 small text-dark fw-medium">
                            <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Fault Isolation & Dynamic Repair</li>
                            <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> 24/7 Crisis Dispatch Line</li>
                        </ul>
                        <a class="btn btn-brand btn-sm w-100 py-2.5 fw-semibold" href="#">
                            Explore Scope & Pricing <i class="fa-solid fa-chevron-right ms-1 small"></i>
                        </a>
                    </div>
                </div>

                <!-- SERVICE CARD 3: HOME APPLIANCE SERVICES -->
                <div class="col-md-6 col-lg-4 reveal">
                    <div class="card h-100 border-0 shadow-sm p-4 rounded-4 text-start bg-white service-premium-card">
                        <div class="feature-icon bg-cyan-soft text-cyan mb-4">
                            <i class="fa-solid fa-laptop-house"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3">Home Appliance Engineering</h4>
                        <p class="text-muted-2 small flex-grow-1 mb-3">
                            High-precision alignment, thermodynamic profiling, and diagnostic restorations for advanced smart refrigeration loops, HVAC air conditioners, and laundry machinery.
                        </p>
                        <hr class="my-3 opacity-5">
                        <ul class="list-unstyled mb-4 small text-dark fw-medium">
                            <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> OEM Factory Components Used</li>
                            <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Post-Repair Performance Metrics</li>
                        </ul>
                        <a class="btn btn-outline-brand btn-sm w-100 py-2.5 fw-semibold" href="#">
                            Explore Scope & Pricing <i class="fa-solid fa-chevron-right ms-1 small"></i>
                        </a>
                    </div>
                </div>
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
                        Why High-End Properties <br>
                        <span class="text-gradient-navy">Rely on AquaNova</span>
                    </h2>
                    <p class="text-slate-500 fs-6 mb-5 leading-relaxed">
                        We don't do quick fixes. We deploy a comprehensive operational infrastructure tracking framework. Every electrician, technician, and cleaning supervisor is rigorously certified, background-checked, and monitored under stringent SLA standards.
                    </p>

                    <!-- Premium Features Sub-Grid -->
                    <div class="row g-4 pt-2">
                        <!-- Feature 1 -->
                        <div class="col-sm-6">
                            <div class="adv-feature-item p-3.5 rounded-4 transition-all">
                                <div class="adv-feature-icon-box bg-blue-soft text-blue-custom rounded-3 mb-3 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-circle-nodes fs-5"></i>
                                </div>
                                <h5 class="fw-bold text-slate-900 fs-6.5 mb-2">Smart Scheduling</h5>
                                <p class="text-slate-500 fs-7 mb-0 leading-relaxed">Book and monitor field crew metrics directly from our integrated live app portal.</p>
                            </div>
                        </div>

                        <!-- Feature 2 -->
                        <div class="col-sm-6">
                            <div class="adv-feature-item p-3.5 rounded-4 transition-all">
                                <div class="adv-feature-icon-box bg-emerald-soft text-emerald-custom rounded-3 mb-3 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-user-shield fs-5"></i>
                                </div>
                                <h5 class="fw-bold text-slate-900 fs-6.5 mb-2">Full Coverage Insurance</h5>
                                <p class="text-slate-500 fs-7 mb-0 leading-relaxed">Complete third-party property damage coverage up to $1M for ultimate peace of mind.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT IMAGE ARCHITECTURE COLUMN -->
                <div class="col-lg-6 reveal position-relative">
                    <div class="image-prestige-frame position-relative mx-auto max-w-500">
                        <!-- Abstract geometric backdrop box (Tailwind design style) -->
                        <div class="position-absolute start-0 top-0 bg-slate-50 border border-slate-100 rounded-5 w-100 h-100 transform translate-x-4 translate-y-4 shadow-sm" style="z-index: -1;"></div>

                        <!-- Floating Stat Badge Overlay -->
                        <div class="position-absolute top-0 start-0 translate-middle-x mt-5 ms-4 bg-white bg-opacity-95 backdrop-blur shadow-prestige rounded-4 p-3 d-none d-sm-flex align-items-center gap-3 border border-slate-100 transition-up" style="z-index: 5;">
                            <div class="rounded-circle bg-emerald-soft text-emerald-custom d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                                <i class="fa-solid fa-circle-check fs-5"></i>
                            </div>
                            <div>
                                <h6 class="fw-black text-slate-900 mb-0 fs-7">100% Vetted</h6>
                                <p class="text-slate-400 fs-8.5 mb-0 fw-semibold">SLA Compliance Locked</p>
                            </div>
                        </div>

                        <!-- Main Cover Image with Wrapper -->
                        <div class="overflow-hidden rounded-5 shadow-prestige image-hover-scale" style="border: 1px solid rgba(255,255,255,0.8);">
                            <img src="{{asset('/')}}Frontend/images/hero.jpg" class="img-fluid w-100 transition-transform-slow" style="max-height: 460px; min-height: 400px; object-fit: cover;" alt="AquaNova Execution Blueprint"/>
                            <!-- Soft premium color overlay -->
                            <div class="position-absolute top-0 start-0 w-100 h-100 image-gradient-tint opacity-20 pointer-events-none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= TESTIMONIAL AUDITS ================= -->
    <section class="py-5 bg-soft border-top border-bottom">
        <div class="container py-3">
            <div class="text-center mb-5 reveal">
                <span class="eyebrow text-brand fw-bold fs-7">Client Audits</span>
                <h2 class="section-title fw-bold mt-1 text-dark">Enterprise Case Studies</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-4 reveal">
                    <div class="card p-4 rounded-4 border-0 shadow-xs text-start h-100 bg-white">
                        <div class="text-warning mb-3 small"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                        <p class="text-muted-2 small flex-grow-1">"The contractual office cleaning protocol implemented across our 4 floors has been impeccable. Absolute focus on subtle detail handling."</p>
                        <hr class="my-3 opacity-5">
                        <strong class="text-dark d-block">Marcus Thorne</strong><span class="text-muted-2 fs-7">Operations Director, Tier-1 Spaces</span>
                    </div>
                </div>
                <div class="col-md-4 reveal">
                    <div class="card p-4 rounded-4 border-0 shadow-xs text-start h-100 bg-white">
                        <div class="text-warning mb-3 small"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                        <p class="text-muted-2 small flex-grow-1">"We faced a complex power-trip issue in our main processing laboratory. AquaNova field crews isolated and rewired the loop in 90 minutes flat."</p>
                        <hr class="my-3 opacity-5">
                        <strong class="text-dark d-block">Elena Rostova</strong><span class="text-muted-2 fs-7">Senior Site Lead, Vertex Lab</span>
                    </div>
                </div>
                <div class="col-md-4 reveal">
                    <div class="card p-4 rounded-4 border-0 shadow-xs text-start h-100 bg-white">
                        <div class="text-warning mb-3 small"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                        <p class="text-muted-2 small flex-grow-1">"Flawless home appliance restoration. They repaired our advanced HVAC unit and gave us a comprehensive calibration map."</p>
                        <hr class="my-3 opacity-5">
                        <strong class="text-dark d-block">Dr. Amit Patel</strong><span class="text-muted-2 fs-7">Residential Administrator</span>
                    </div>
                </div>
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
    <style>
        /* ================= PRESTIGE CUSTOM INTERFACE DESIGN SYSTEM ================= */
        .text-brand { color: #0f4c81 !important; }
        .text-cyan { color: #00aeef !important; }
        .bg-brand-light { background-color: rgba(15, 76, 129, 0.85) !important; }

        /* Soft Background Gradients for Icons */
        .bg-brand-soft { background-color: rgba(15, 76, 129, 0.07) !important; }
        .bg-warning-soft { background-color: rgba(255, 193, 7, 0.09) !important; }
        .bg-cyan-soft { background-color: rgba(0, 174, 239, 0.07) !important; }

        /* Buttons Styling */
        .btn-brand { background-color: #0f4c81 !important; color: #fff !important; font-weight: 600; border-radius: 50px; padding: 12px 32px; transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1); border: 0; }
        .btn-brand:hover { background-color: #0c3d68 !important; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(15, 76, 129, 0.25) !important; }
        .btn-outline-brand { border: 2px solid #0f4c81 !important; color: #0f4c81 !important; border-radius: 50px; font-weight: 600; transition: all 0.2s; }
        .btn-outline-brand:hover { background-color: #0f4c81 !important; color: #fff !important; }

        /* Premium Premium Service Cards Grid Interaction Mapping */
        .service-premium-card { transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1); border: 1px solid rgba(0,0,0,.04) !important; }
        .service-premium-card:hover { transform: translateY(-7px); box-shadow: 0 1.5rem 4rem rgba(0,0,0,.07) !important; border-color: transparent !important; }
        .feature-active-border { border-top: 4px solid #0f4c81 !important; }

        .feature-icon { width: 60px; height: 60px; font-size: 24px; display: flex; align-items: center; justify-content: center; border-radius: 14px; }
        .shadow-xs { box-shadow: 0 4px 12px rgba(0,0,0,.015); }
        .fs-7 { font-size: 0.85rem !important; }
    </style>
    <style>
        /* ================= FULL RESPONSIVE HERO CORE ENGINE ================= */
        .hero-slide-item {
            min-height: 80vh;
            position: relative;
            display: flex;
            align-items: center;
        }
        .hero-container {
            z-index: 3;
            min-height: 80vh;
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
        .carousel-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            z-index: 1;
        }
        .hero-title {
            font-size: calc(1.8rem + 1.5vw);
            line-height: 1.2;
        }
        .hero-desc {
            font-size: 1.1rem;
            max-width: 680px;
            opacity: 0.8;
        }
        .fs-xs {
            font-size: 0.75rem !important;
        }

        /* Custom Navigation Dots Dynamic Alignment */
        .premium-hero-slider .owl-dots {
            position: absolute;
            bottom: 25px;
            width: 100%;
            text-align: center;
            z-index: 10;
        }
        .premium-hero-slider .owl-dot span {
            width: 10px !important;
            height: 10px !important;
            background: rgba(255, 255, 255, 0.35) !important;
            border-radius: 50%;
            display: inline-block;
            margin: 0 5px;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }
        .premium-hero-slider .owl-dot.active span {
            background: #00aeef !important;
            width: 26px !important;
            border-radius: 6px !important;
        }

        /* ================= MOBILE MEDIA BREAKPOINTS (CRITICAL SETUP) ================= */
        @media (max-width: 767.98px) {
            .hero-slide-item, .hero-container {
                min-height: 70vh !important;
            }
            .hero-title {
                font-size: 1.85rem !important;
                font-weight: 800 !important;
                margin-bottom: 12px !important;
            }
            .hero-desc {
                font-size: 0.9rem !important;
                line-height: 1.45 !important;
                margin-bottom: 20px !important;
            }
            .hero-btn-group .btn {
                width: 100% !important; /* Mobile matching fluid block buttons */
                text-align: center;
                padding: 11px 20px !important;
                font-size: 0.9rem !important;
            }
            .premium-hero-slider .owl-dots {
                bottom: 15px !important;
            }
        }
    </style>
    <style>
        /* ================= PREMIUM METRICS BOOTSTRAP ARCHITECTURE ================= */
        .max-w-1200 {
            max-width: 1240px;
        }
        .z-index-10 {
            z-index: 10;
        }
        /* Negative Margin for Stripe/Fixfast style premium overlap */
        .trust-metrics-wrapper {
            margin-top: -38px;
        }
        .backdrop-blur {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        /* Premium Soft Colors */
        .bg-sky-soft { background-color: rgba(14, 165, 233, 0.08); }
        .text-sky-custom { color: #0ea5e9; }

        .bg-amber-soft { background-color: rgba(245, 158, 11, 0.08); }
        .text-amber-custom { color: #d97706; }

        .bg-emerald-soft { background-color: rgba(16, 185, 129, 0.08); }
        .text-emerald-custom { color: #059669; }

        .bg-indigo-soft { background-color: rgba(99, 102, 241, 0.08); }
        .text-indigo-custom { color: #4f46e5; }

        /* Component Metrics Icons Grid Dimensions */
        .metric-icon {
            width: 48px;
            height: 48px;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        /* Typography Overrides */
        .fs-7 { font-size: 0.88rem !important; }
        .fs-8 { font-size: 0.76rem !important; }
        .tracking-tight { tracking-spacing: -0.02em; }

        /* Hover Master Interactions */
        .metric-group {
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .metric-group:hover {
            transform: translateY(-1px);
        }
        .metric-group:hover .metric-title {
            color: #0f4c81 !important; /* Locks into your core corporate identity */
        }

        /* Large Screens Columns Divider Lines */
        @media (min-width: 992px) {
            .divide-lg-col > [class*="col-"]:not(:first-child) {
                border-left: 1px solid rgba(0, 0, 0, 0.06);
            }
        }
    </style>
    <style>
        /* ================= ADVANCED ADVANTAGE LAYER ENGINE ================= */
        .max-w-500 { max-width: 520px; }
        .p-3.5 { padding: 1.15rem !important; }
        .fs-6.5 { font-size: 1.05rem !important; }

        /* Feature Item Interactivity */
        .adv-feature-item {
            background-color: transparent;
            border: 1px solid transparent;
        }
        .adv-feature-item:hover {
            background-color: #f8fafc;
            border-color: #f1f5f9;
            transform: translateY(-2px);
        }

        /* Icon Boxes Dimensions inside features */
        .adv-feature-icon-box {
            width: 46px;
            height: 46px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .adv-feature-item:hover .adv-feature-icon-box {
            transform: scale(1.08);
        }

        /* Floating Interactive Badge */
        .transition-up {
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }
        .image-prestige-frame:hover .transition-up {
            transform: translate(-5px, -5px) !important;
            box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.12) !important;
        }

        /* Slow Cinematic Image Zoom Effect on Hover */
        .image-hover-scale {
            perspective: 1000px;
        }
        .transition-transform-slow {
            transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .image-prestige-frame:hover .transition-transform-slow {
            transform: scale(1.04);
        }

        /* Image Color Blueprint Tint Overlay */
        .image-gradient-tint {
            background: linear-gradient(135deg, #0f4c81, #0ea5e9);
        }
    </style>
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
        </script>
    @endpush
@endpush
