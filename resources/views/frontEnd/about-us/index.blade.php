@extends('frontEnd.layout.app')
@section('title','About Us')
@section('body')

    <!-- Hero Section -->
    <section class="product-hero about-hero mt-5 text-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <span class="badge bg-warning text-dark mb-3">About Our Company</span>
                    <h1 class="display-4 fw-bold mb-4">
                        Building Trust Through Quality & Innovation
                    </h1>
                    <p class="lead">
                        We are committed to delivering exceptional products and services
                        that create long-term value for our customers and partners.
                    </p>

                    <a href="{{ route('contact') }}" class="btn btn-warning btn-lg mt-3">
                        Contact Us
                    </a>
                </div>

                <div class="col-lg-6 text-center">
                    <img src="https://images.unsplash.com/photo-1497366412874-3415097a27e7?auto=format&fit=crop&w=1200&q=80"
                         class="img-fluid rounded-4 shadow"
                         alt="About Us">
                </div>
            </div>
        </div>
    </section>

    <!-- About Company -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 mb-4">
                    <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72"
                         class="img-fluid rounded-4 shadow"
                         alt="">
                </div>

                <div class="col-lg-6">
                    <span class="text-success fw-bold">WHO WE ARE</span>
                    <h2 class="fw-bold mb-4">
                        Dedicated To Excellence Since Day One
                    </h2>

                    <p class="text-muted">
                        Our company provides innovative solutions and premium-quality
                        products designed to improve everyday life. We focus on
                        customer satisfaction, reliability, and long-term partnerships.
                    </p>

                    <p class="text-muted">
                        With years of experience and a highly skilled team, we continue
                        to deliver outstanding results while maintaining the highest
                        standards of quality and professionalism.
                    </p>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="d-flex mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <span>Professional Team</span>
                            </div>

                            <div class="d-flex mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <span>Quality Assurance</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <span>Customer Satisfaction</span>
                            </div>

                            <div class="d-flex mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <span>Timely Delivery</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Vision Mission -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row">

                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow h-100">
                        <div class="card-body p-4">
                            <h3 class="fw-bold mb-3">Our Vision</h3>
                            <p class="text-muted mb-0">
                                To become a trusted leader in our industry by
                                consistently delivering innovative and sustainable
                                solutions that exceed customer expectations.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow h-100">
                        <div class="card-body p-4">
                            <h3 class="fw-bold mb-3">Our Mission</h3>
                            <p class="text-muted mb-0">
                                To provide high-quality products and services while
                                fostering strong relationships with our customers,
                                employees, and business partners.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center">

                <div class="col-md-3 col-6 mb-4">
                    <h2 class="fw-bold text-success">10+</h2>
                    <p>Years Experience</p>
                </div>

                <div class="col-md-3 col-6 mb-4">
                    <h2 class="fw-bold text-success">500+</h2>
                    <p>Projects Completed</p>
                </div>

                <div class="col-md-3 col-6 mb-4">
                    <h2 class="fw-bold text-success">1000+</h2>
                    <p>Happy Clients</p>
                </div>

                <div class="col-md-3 col-6 mb-4">
                    <h2 class="fw-bold text-success">50+</h2>
                    <p>Expert Team</p>
                </div>

            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="bg-light py-5">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="fw-bold">Why Choose Us</h2>
                <p class="text-muted">
                    We deliver value, quality, and reliability in every project.
                </p>
            </div>

            <div class="row">

                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow text-center h-100">
                        <div class="card-body p-4">
                            <i class="bi bi-award fs-1 text-success"></i>
                            <h5 class="mt-3">Premium Quality</h5>
                            <p class="text-muted">
                                We maintain the highest standards in every service.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow text-center h-100">
                        <div class="card-body p-4">
                            <i class="bi bi-people fs-1 text-success"></i>
                            <h5 class="mt-3">Expert Team</h5>
                            <p class="text-muted">
                                Experienced professionals committed to excellence.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow text-center h-100">
                        <div class="card-body p-4">
                            <i class="bi bi-shield-check fs-1 text-success"></i>
                            <h5 class="mt-3">Trusted Service</h5>
                            <p class="text-muted">
                                Building long-term relationships through trust.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- CTA -->
    <section class="py-5 text-center bg-success text-white">
        <div class="container">
            <h2 class="fw-bold mb-3">
                Ready To Work With Us?
            </h2>

            <p class="mb-4">
                Let's discuss your project and create something exceptional together.
            </p>

            <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                Get In Touch
            </a>
        </div>
    </section>

@endsection

@push('css')
    <style>
        .about-hero{
            position: relative;
            min-height: 85vh;
            display: flex;
            align-items: center;
            overflow: hidden;
            background:
                linear-gradient(rgba(0,0,0,.75), rgba(0,0,0,.75)),
                url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=2000&q=80');
            background-size: cover;
            background-position: center;
        }

        .about-hero::before{
            content:'';
            position:absolute;
            width:500px;
            height:500px;
            background:rgba(255,255,255,.08);
            border-radius:50%;
            top:-150px;
            right:-150px;
        }

        .about-hero::after{
            content:'';
            position:absolute;
            width:350px;
            height:350px;
            background:rgba(255,255,255,.05);
            border-radius:50%;
            bottom:-100px;
            left:-100px;
        }
    </style>

@endpush
