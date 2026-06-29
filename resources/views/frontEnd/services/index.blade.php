@extends('frontEnd.layout.app')
@section('title', 'Our Services')
@section('body')

    <!-- Hero Section -->
    <section class="product-hero bg-soft">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-12 reveal">
                    <span class="eyebrow">What We Offer</span>
                    <h1 class="section-title mb-3">Our Premium Lifestyle & Essential Services</h1>
                    <p class="lead text-muted-2">We deliver expert solutions ranging from elite appliance and smart device repairs to reliable rides, express deliveries, and top-tier office cleaning—ensuring your home, business, and daily commute always run with peak efficiency and absolute comfort.</p>
                    <div class="d-flex flex-wrap gap-3 mt-3">
                        <a href="{{route('request-quote')}}" class="btn btn-brand"><i class="fa-solid fa-headset me-2"></i>Consult an Expert</a>
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
                @foreach($services as $service)
                <div class="col-md-6 col-lg-4 reveal">
                    @include('frontEnd.component.serviceCard',[ 'service' => $service ])
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Custom Solutions / CTA Section -->
    <section class="py-5">
        <div class="container">
            <div class="glass p-5 text-center reveal" style="background:linear-gradient(135deg,rgba(15,76,129,.92),rgba(0,174,239,.85));color:#fff; border-radius: 24px;">
                <h2 class="section-title mb-3" style="color:#fff">Need a Custom Commercial Solution?</h2>
                <p class="lead mb-4" style="opacity:.95">We provide corporate fleet accounts, high-end commercial appliance maintenance contracts, and large-scale office deep-cleaning packages tailored to keep your business operating flawlessly.</p>
                <a href="{{route('request-quote')}}" class="btn btn-light rounded-pill px-4 fw-semibold">Talk to Our Team <i class="fa-solid fa-envelope ms-2"></i></a>
            </div>
        </div>
    </section>

@endsection
