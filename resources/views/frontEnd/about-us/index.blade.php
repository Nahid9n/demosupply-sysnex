@extends('frontEnd.layout.app')
@section('title', 'About Us')
@section('body')

    <!-- Premium Hero Section -->
    <section class="product-hero position-relative overflow-hidden py-5 d-flex align-items-center" style="min-height: 75vh;">
        <div class="container position-relative" style="z-index: 2;">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 reveal">
                    <span class="eyebrow text-warning mb-2 d-inline-block">Elite Craftsmanship</span>
                    <h1 class="display-4 fw-bold mb-4 text-dark" style="line-height: 1.2;">
                        Engineering Trust Through <span class="text-brand">Quality & Innovation</span>
                    </h1>
                    <p class="lead text-muted-2 mb-4">
                        We don't just build technical systems; we deliver exceptional architectural wellness infrastructures designed to create long-term value for smart residential and modern workspace environments.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('contact') }}" class="btn btn-brand shadow-sm"><i class="fa-solid fa-envelope me-2"></i>Connect With Us</a>
                        <a href="#story" class="btn btn-outline-brand">Our Blueprint</a>
                    </div>
                </div>
                <div class="col-lg-6 reveal text-center">
                    <div class="position-relative d-inline-block">
                        <!-- Premium image frame effect -->
                        <div class="position-absolute translate-middle start-0 top-100 bg-warning rounded-4 shadow-lg d-none d-md-block" style="width: 120px; height: 120px; z-index: -1; transform: translate(-30px, -30px) !important;"></div>
                        <img src="https://images.unsplash.com/photo-1497366412874-3415097a27e7?auto=format&fit=crop&w=1200&q=80"
                             class="img-fluid rounded-4 shadow-lg border border-4 border-white"
                             alt="AquaNova Headquarters" style="max-height: 450px; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Who We Are / Story Section -->
    <section id="story" class="py-5 border-top">
        <div class="container py-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 order-2 order-lg-1 reveal">
                    <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72"
                         class="img-fluid rounded-4 shadow-sm w-100"
                         alt="Our Workflow" style="max-height: 400px; object-fit: cover;">
                </div>
                <div class="col-lg-6 order-1 order-lg-2 reveal">
                    <span class="eyebrow">Who We Are</span>
                    <h2 class="section-title mb-4">Dedicated To Absolute Excellence Since Day One</h2>
                    <p class="text-muted-2 mb-3">
                        Our enterprise provides high-precision technical integration and premium-quality architectural setups designed to improve everyday spatial life. We lock focus onto customer satisfaction, structural reliability, and long-term diagnostic calibration.
                    </p>
                    <p class="text-muted-2 mb-4">
                        Backed by years of field experience and a highly synchronized engineering crew, we continuously deliver outstanding results while holding the line on global technical compliance benchmarks.
                    </p>

                    <!-- Feature Grid inside About -->
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center p-2 rounded-3 bg-soft border">
                                <i class="fa-solid fa-circle-check text-brand me-3 fs-5"></i>
                                <span class="fw-semibold text-dark">Elite Engineering Crew</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center p-2 rounded-3 bg-soft border">
                                <i class="fa-solid fa-circle-check text-brand me-3 fs-5"></i>
                                <span class="fw-semibold text-dark">Premium Quality Logs</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center p-2 rounded-3 bg-soft border">
                                <i class="fa-solid fa-circle-check text-brand me-3 fs-5"></i>
                                <span class="fw-semibold text-dark">100% Assurance Rate</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center p-2 rounded-3 bg-soft border">
                                <i class="fa-solid fa-circle-check text-brand me-3 fs-5"></i>
                                <span class="fw-semibold text-dark">Real-Time Calibration</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Strategic Pillars: Vision & Mission (Re-designed with premium cards) -->
    <section class="bg-soft py-5 border-top border-bottom">
        <div class="container py-4">
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 reveal">
                    <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white border-start border-4 border-brand">
                        <div class="d-flex align-items-center mb-3">
                            <div class="feature-icon me-3 m-0" style="width: 50px; height: 50px; font-size: 20px;"><i class="fa-solid fa-eye"></i></div>
                            <h3 class="fw-bold m-0 text-dark">Our Vision</h3>
                        </div>
                        <p class="text-muted-2 mb-0">
                            To scale as the most trusted leader in our specialized technical industry by consistently setting terms with innovative, high-efficiency, and sustainable solutions that exceed core architectural parameters.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 reveal">
                    <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white border-start border-4 border-warning">
                        <div class="d-flex align-items-center mb-3">
                            <div class="feature-icon me-3 m-0 bg-warning-light text-warning" style="width: 50px; height: 50px; font-size: 20px;"><i class="fa-solid fa-bullseye"></i></div>
                            <h3 class="fw-bold m-0 text-dark">Our Mission</h3>
                        </div>
                        <p class="text-muted-2 mb-0">
                            To provision premium certified setups and integrated engineering modules while fostering unbreakable strategic relationships with our consumers, technical teams, and ecosystem partners.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Metrics Tracking Grid -->
    <section class="py-5">
        <div class="container py-3">
            <div class="row text-center g-4">
                <div class="col-md-3 col-6 reveal">
                    <div class="p-3 border rounded-4 bg-white shadow-xs">
                        <h1 class="display-5 fw-bold text-brand mb-1">10+</h1>
                        <p class="text-muted-2 mb-0 fw-medium">Years Active</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 reveal">
                    <div class="p-3 border rounded-4 bg-white shadow-xs">
                        <h1 class="display-5 fw-bold text-brand mb-1">500+</h1>
                        <p class="text-muted-2 mb-0 fw-medium">Deployments Managed</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 reveal">
                    <div class="p-3 border rounded-4 bg-white shadow-xs">
                        <h1 class="display-5 fw-bold text-brand mb-1">1000+</h1>
                        <p class="text-muted-2 mb-0 fw-medium">Corporate Clients</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 reveal">
                    <div class="p-3 border rounded-4 bg-white shadow-xs">
                        <h1 class="display-5 fw-bold text-brand mb-1">50+</h1>
                        <p class="text-muted-2 mb-0 fw-medium">System Engineers</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Structural Values Area -->
    <section class="bg-soft py-5 border-top">
        <div class="container py-3">
            <div class="text-center mb-5 reveal">
                <span class="eyebrow">Our Values</span>
                <h2 class="section-title">Why Structural Spaces Trust Us</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-4 reveal">
                    <div class="feature-card text-start bg-white p-4 rounded-4 shadow-sm border-0 h-100">
                        <div class="feature-icon mb-3"><i class="fa-solid fa-award"></i></div>
                        <h5 class="fw-bold mb-2">Premium Compliance</h5>
                        <p class="text-muted-2 mb-0">Every calibration, deployment, and structural setup follows rigid global verification protocols.</p>
                    </div>
                </div>
                <div class="col-md-4 reveal">
                    <div class="feature-card text-start bg-white p-4 rounded-4 shadow-sm border-0 h-100">
                        <div class="feature-icon mb-3"><i class="fa-solid fa-users-gear"></i></div>
                        <h5 class="fw-bold mb-2">Elite System Operations</h5>
                        <p class="text-muted-2 mb-0">Our technicians receive deep tactical training on dynamic infrastructure mechanics before hitting your floor.</p>
                    </div>
                </div>
                <div class="col-md-4 reveal">
                    <div class="feature-card text-start bg-white p-4 rounded-4 shadow-sm border-0 h-100">
                        <div class="feature-icon mb-3"><i class="fa-solid fa-shield-heart"></i></div>
                        <h5 class="fw-bold mb-2">Unbreakable Trust</h5>
                        <p class="text-muted-2 mb-0">We build transparent operational data pipelines so you know exactly what is configured and why.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bottom Action Frame -->
    <section class="py-5">
        <div class="container">
            <div class="glass p-5 text-center reveal" style="background: linear-gradient(135deg, rgba(15,76,129,.95), rgba(0,174,239,.88)); color: #fff; border-radius: 24px;">
                <h2 class="section-title mb-3" style="color: #fff;">Ready To Deploy Exceptional Infrastructure?</h2>
                <p class="lead mb-4" style="opacity: .95; max-width: 650px; margin: 0 auto;">Let's map out your next system configuration, scale requirements, and customized quote blueprints together.</p>
                <a href="{{ route('contact') }}" class="btn btn-light rounded-pill px-4 py-2 fw-semibold mt-3 shadow-sm">Get System Audit <i class="fa-solid fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </section>

@endsection

@push('css')
    <style>
        /* Reusable classes matching the site theme mapping */
        .text-brand {
            color: #0f4c81 !important;
        }
        .btn-brand {
            background-color: #0f4c81 !important;
            color: #fff !important;
        }
        .btn-brand:hover {
            background-color: #0c3d68 !important;
        }
        .btn-outline-brand {
            border-color: #0f4c81 !important;
            color: #0f4c81 !important;
        }
        .btn-outline-brand:hover {
            background-color: #0f4c81 !important;
            color: #fff !important;
        }
        .bg-warning-light {
            background-color: rgba(255, 193, 7, 0.1) !important;
        }
        .shadow-xs {
            box-shadow: 0 2px 4px rgba(0,0,0,.02);
        }
    </style>
@endpush
