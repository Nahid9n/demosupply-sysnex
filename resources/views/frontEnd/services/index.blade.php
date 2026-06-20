@extends('frontEnd.layout.app')
@section('title', 'Our Services')
@section('body')

    <!-- Hero Section -->
    <section class="product-hero bg-soft">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-12 reveal">
                    <span class="eyebrow">What We Offer</span>
                    <h1 class="section-title mb-3">Our Premium Wellness & Water Services</h1>
                    <p class="lead text-muted-2">We provide advanced solutions ranging from smart electrolyte systems to high-tech water filtration, ensuring your home or business always has access to pure, healthy hydration.</p>
                    <div class="d-flex flex-wrap gap-3 mt-3">
                        <a href="{{route('contact')}}" class="btn btn-brand"><i class="fa-solid fa-headset me-2"></i>Consult an Expert</a>
                    </div>
                </div>
                {{--<div class="col-lg-6 reveal">
                    <!-- Ekhane apnar custom image asset link diye diben -->
                    <img src="{{asset('/')}}Frontend/images/services-hero.jpg" class="img-fluid rounded-4 shadow-lg" alt="AquaNova Services Overview"/>
                </div>--}}
            </div>
        </div>
    </section>

    <!-- Services Grid Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5 reveal">
                <span class="eyebrow">Core Expertise</span>
                <h2 class="section-title">Explore Our Core Services</h2>
                <p class="text-muted-2">Click on any service to learn more or get custom configurations.</p>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Service 1: Electrolite -->
                <div class="col-md-6 col-lg-4 reveal">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 feature-card text-start">
                        <div class="feature-icon mb-3" style="background: rgba(15, 76, 129, 0.1); color: #0f4c81; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; rounded-radius: 12px; font-size: 24px;">
                            <i class="fa-solid fa-bolt"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Electrolite System</h4>
                        <p class="text-muted-2 flex-grow-1">Advanced multi-sensor electrolyte profiling to monitor and optimize your body's essential mineral balance seamlessly.</p>
                        <a href="{{route('electrolite')}}" class="btn btn-outline-brand btn-sm mt-3 w-100">Explore Service <i class="fa-solid fa-arrow-right ms-1"></i></a>
                    </div>
                </div>

                <!-- Service 2: Device Tracking -->
                <div class="col-md-6 col-lg-4 reveal">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 feature-card text-start">
                        <div class="feature-icon mb-3" style="background: rgba(15, 76, 129, 0.1); color: #0f4c81; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; rounded-radius: 12px; font-size: 24px;">
                            <i class="fa-solid fa-microchip"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Smart Devices</h4>
                        <p class="text-muted-2 flex-grow-1">Beautifully designed wellness tech pairing with your phone to track water quality, temperature, and daily volume goals.</p>
                        <a href="{{route('device')}}" class="btn btn-outline-brand btn-sm mt-3 w-100">Explore Device <i class="fa-solid fa-arrow-right ms-1"></i></a>
                    </div>
                </div>

                <!-- Service 3: Water Filtration -->
                <div class="col-md-6 col-lg-4 reveal">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 feature-card text-start">
                        <div class="feature-icon mb-3" style="background: rgba(15, 76, 129, 0.1); color: #0f4c81; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; rounded-radius: 12px; font-size: 24px;">
                            <i class="fa-solid fa-filter"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Water Filtration</h4>
                        <p class="text-muted-2 flex-grow-1">Premium structural water filters that remove heavy metals and microplastics while keeping healthy essentials intact.</p>
                        <a href="{{route('water')}}" class="btn btn-outline-brand btn-sm mt-3 w-100">Explore Filtration <i class="fa-solid fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Custom Solutions / CTA Section -->
    <section class="py-5">
        <div class="container">
            <div class="glass p-5 text-center reveal" style="background:linear-gradient(135deg,rgba(15,76,129,.92),rgba(0,174,239,.85));color:#fff; border-radius: 24px;">
                <h2 class="section-title mb-3" style="color:#fff">Need a Custom Commercial Solution?</h2>
                <p class="lead mb-4" style="opacity:.95">We provide corporate wellness setups, institutional water monitoring, and large scale tracking configurations.</p>
                <a href="{{route('contact')}}" class="btn btn-light rounded-pill px-4 fw-semibold">Talk to Our Engineering Team <i class="fa-solid fa-envelope ms-2"></i></a>
            </div>
        </div>
    </section>

@endsection
