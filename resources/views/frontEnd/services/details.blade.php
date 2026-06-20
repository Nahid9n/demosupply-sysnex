@extends('frontEnd.layout.app')
@section('title', 'Electrical Work Services') @section('body')

    <section class="py-4 bg-soft border-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Services</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Electrical Work Services</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-4">

                <div class="col-lg-4 col-md-5">
                    <div class="card border-0 shadow-sm rounded-4 p-3 sticky-top" style="top: 100px; z-index: 10;">
                        <h5 class="fw-bold mb-3 px-2 text-brand">Our Services</h5>
                        <div class="list-group list-group-flush custom-service-list">
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center rounded-3 active bg-brand border-0 py-3 mb-2">
                                <span><i class="fa-solid fa-bolt me-2"></i> Electrical Work</span>
                                <i class="fa-solid fa-chevron-right small"></i>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center rounded-3 py-3 mb-2 border-0 bg-light-hover">
                                <span><i class="fa-solid fa-faucet-drip me-2"></i> Plumbing Services</span>
                                <i class="fa-solid fa-chevron-right small text-muted"></i>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center rounded-3 py-3 mb-2 border-0 bg-light-hover">
                                <span><i class="fa-solid fa-screwdriver-wrench me-2"></i> Handyman Services</span>
                                <i class="fa-solid fa-chevron-right small text-muted"></i>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center rounded-3 py-3 border-0 bg-light-hover">
                                <span><i class="fa-solid fa-snowflake me-2"></i> Aircon Services</span>
                                <i class="fa-solid fa-chevron-right small text-muted"></i>
                            </a>
                        </div>

                        <div class="glass p-4 text-center mt-4 text-white rounded-4" style="background: linear-gradient(135deg, #0f4c81, #00aeef);">
                            <h6 class="fw-bold mb-2">Need Urgent Repair?</h6>
                            <p class="small opacity-90 mb-3">24/7 Professional emergency support at your doorstep.</p>
                            <a href="tel:+12345678" class="btn btn-light btn-sm w-100 rounded-pill fw-semibold"><i class="fa-solid fa-phone me-2"></i>Call Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-7 reveal">
                    <div class="mb-4">
                        <img src="{{ asset('/') }}Frontend/images/device.jpg" class="img-fluid rounded-4 shadow-sm w-100" style="max-height: 400px; object-fit: cover;" alt="Electrical Services"/>
                    </div>

                    <h2 class="fw-bold mb-3 text-dark">Professional Electrical Work & Repair Services</h2>
                    <p class="text-muted-2 lead">From sudden power trips to complex short-circuit faults, our certified and experienced electricians provide safe, reliable, and premium technical troubleshooting for residential and commercial spaces.</p>

                    <p class="text-muted-2">We prioritize safety compliance. Whether you need to install a new smart switch panel, rewire your entire workspace, or replace faulty power sockets, we ensure seamless execution with zero hassle.</p>

                    <h4 class="fw-bold mt-5 mb-4"><i class="fa-solid fa-circle-check text-brand me-2"></i>What's Included in This Service</h4>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="p-3 border rounded-3 bg-soft h-100">
                                <h6 class="fw-bold mb-2 text-dark">Power Trip Troubleshooting</h6>
                                <p class="small text-muted-2 mb-0">Instant diagnostic checkup for continuous circuit breaks.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 border rounded-3 bg-soft h-100">
                                <h6 class="fw-bold mb-2 text-dark">Light & Switch Installations</h6>
                                <p class="small text-muted-2 mb-0">Fitting modern LEDs, smart control panels, and regulators.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 border rounded-3 bg-soft h-100">
                                <h6 class="fw-bold mb-2 text-dark">Full Property Rewiring</h6>
                                <p class="small text-muted-2 mb-0">Replacing obsolete wiring networks with high-grade copper loops.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 border rounded-3 bg-soft h-100">
                                <h6 class="fw-bold mb-2 text-dark">DB Box Upgrades</h6>
                                <p class="small text-muted-2 mb-0">Upgrading regular distribution boards with smart RCBO safety cuts.</p>
                            </div>
                        </div>
                    </div>

                    <h4 class="fw-bold mt-5 mb-3"><i class="fa-solid fa-tags text-brand me-2"></i>Transparent Pricing</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle text-start">
                            <thead class="bg-soft">
                            <tr>
                                <th style="width: 70%">Service Scope</th>
                                <th>Estimated Rate</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr><td>Standard Electrical Inspection & Diagnosis</td><td class="fw-bold text-brand">$40 - $60</td></tr>
                            <tr><td>Power Socket / Switch Replacement (Per Unit)</td><td class="fw-bold text-brand">$25 - $45</td></tr>
                            <tr><td>Distribution Board (DB Box) Complete Rewire</td><td class="fw-bold text-brand">Quote Required</td></tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card border-0 bg-brand text-white p-4 p-md-5 rounded-4 mt-5">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h4 class="fw-bold mb-2 text-white">Ready to book an elite technician?</h4>
                                <p class="mb-md-0 opacity-90 small">Get transparent estimations and dynamic execution timelines tailored to your structure.</p>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <a href="{{ route('contact') }}" class="btn btn-light rounded-pill px-4 py-2 fw-semibold shadow-sm">Get Free Quote <i class="fa-solid fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
@push('css')
    <style>
        /* Sidebar hover state fixing */
        .bg-light-hover:hover {
            background-color: #f8f9fa !important;
            color: #0f4c81 !important;
            padding-left: 20px;
            transition: all 0.2s ease-in-out;
        }
        .custom-service-list .list-group-item {
            transition: all 0.2s ease-in-out;
        }
        /* Main brand color assignment placeholder */
        .bg-brand {
            background-color: #0f4c81 !important;
        }
        .text-brand {
            color: #0f4c81 !important;
        }
        .btn-brand {
            background-color: #0f4c81;
            color: white;
        }
    </style>
@endpush
