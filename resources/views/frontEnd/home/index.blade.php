@extends('frontEnd.layout.app')
@section('title','Home')
@section('body')
    <section class="hero">
        <div class="bg" style="background-image:url('{{asset('/')}}hero.jpg')"></div>
        <div class="container hero-inner">
            <div class="row">
                <div class="col-lg-8">
                    <span class="chip mb-3"><i class="fa-solid fa-bolt"></i> Trusted by 25,000+ homes</span>
                    <h1 class="fw-bold mb-3">Smart Solutions for <span style="background:linear-gradient(90deg,#7DD3FC,#fff);-webkit-background-clip:text;-webkit-text-fill-color:transparent">Modern Living</span></h1>
                    <p class="lead mb-4">AquaNova engineers premium Electrolite supplements, intelligent devices and high-performance water filters — designed to make every day healthier, simpler and smarter.</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#products" class="btn btn-brand"><i class="fa-solid fa-cart-shopping me-2"></i>Explore Products</a>
                        <a href="{{route('contact')}}" class="btn btn-outline-light rounded-pill d-flex align-items-center px-4">Contact Sales <i class="fa-solid fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="features" class="bg-soft">
        <div class="container">
            <div class="text-center mb-5 reveal">
                <span class="eyebrow">Why AquaNova</span>
                <h2 class="section-title">Built on quality, designed for life</h2>
                <p class="text-muted-2 mx-auto" style="max-width:640px">Every product we ship is engineered around three principles: science-backed performance, clean design, and lasting reliability.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 reveal"><div class="feature-card"><div class="feature-icon"><i class="fa-solid fa-flask"></i></div><h5>Lab Tested</h5><p class="text-muted-2 mb-0">Independently verified for purity, accuracy and safety in certified labs.</p></div></div>
                <div class="col-md-6 col-lg-3 reveal"><div class="feature-card"><div class="feature-icon"><i class="fa-solid fa-leaf"></i></div><h5>Eco-Conscious</h5><p class="text-muted-2 mb-0">Recyclable packaging and energy-efficient devices that respect the planet.</p></div></div>
                <div class="col-md-6 col-lg-3 reveal"><div class="feature-card"><div class="feature-icon"><i class="fa-solid fa-shield-halved"></i></div><h5>2-Year Warranty</h5><p class="text-muted-2 mb-0">Industry-leading coverage with 24/7 customer support across the globe.</p></div></div>
                <div class="col-md-6 col-lg-3 reveal"><div class="feature-card"><div class="feature-icon"><i class="fa-solid fa-truck-fast"></i></div><h5>Fast Delivery</h5><p class="text-muted-2 mb-0">Free expedited shipping on every order over $50, delivered carbon-neutral.</p></div></div>
            </div>
        </div>
    </section>
    <section id="products">
        <div class="container">
            <div class="text-center mb-5 reveal">
                <span class="eyebrow">Our Products</span>
                <h2 class="section-title">Three categories. One standard of excellence.</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 reveal">
                    <div class="product-card">
                        <img src="{{asset('/')}}Frontend/images/electrolite.jpg" alt="Electrolite supplement product"/>
                        <h4>Electrolite</h4>
                        <p class="text-muted-2">Advanced hydration powders with balanced electrolytes for daily wellness and peak performance.</p>
                        <a class="btn btn-outline-brand btn-sm" href="{{route('electrolite')}}">View Details <i class="fa-solid fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 reveal">
                    <div class="product-card">
                        <img src="{{asset('/')}}Frontend/images/device.jpg" alt="Smart wellness device"/>
                        <h4>Device</h4>
                        <p class="text-muted-2">Smart, connected wellness devices that monitor, measure and improve your everyday health.</p>
                        <a class="btn btn-outline-brand btn-sm" href="{{route('device')}}">View Details <i class="fa-solid fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 reveal">
                    <div class="product-card">
                        <img src="{{asset('/')}}Frontend/images/water-filter.jpg" alt="Premium water filter"/>
                        <h4>Water Filter</h4>
                        <p class="text-muted-2">Multi-stage water filtration systems delivering pure, mineral-balanced water on demand.</p>
                        <a class="btn btn-outline-brand btn-sm" href="{{route('water')}}">View Details <i class="fa-solid fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-soft">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 reveal">
                    <span class="eyebrow">About AquaNova</span>
                    <h2 class="section-title mb-3">A decade of engineering wellness into everyday products.</h2>
                    <p class="text-muted-2">Founded in 2014, AquaNova brings together scientists, designers and engineers from over 20 countries. Our mission is simple — to make premium wellness accessible through products you can trust, every single day.</p>
                    <ul class="list-unstyled mt-4">
                        <li class="mb-2"><i class="fa-solid fa-check text-brand me-2"></i> Operating in 18+ countries</li>
                        <li class="mb-2"><i class="fa-solid fa-check text-brand me-2"></i> 200+ engineers and scientists</li>
                        <li class="mb-2"><i class="fa-solid fa-check text-brand me-2"></i> ISO-9001 and FDA registered facility</li>
                    </ul>
                    <a href="{{route('contact')}}" class="btn btn-brand mt-3">Talk to our team</a>
                </div>
                <div class="col-lg-6 reveal">
                    <img src="{{asset('/')}}Frontend/images/hero.jpg" class="img-fluid rounded-4 shadow-lg" alt="AquaNova about"/>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="stats reveal">
                <div class="row text-center g-4">
                    <div class="col-6 col-md-3"><div class="num" data-count="25000" data-suffix="+">0</div><div>Happy Customers</div></div>
                    <div class="col-6 col-md-3"><div class="num" data-count="18" data-suffix="+">0</div><div>Countries Served</div></div>
                    <div class="col-6 col-md-3"><div class="num" data-count="120" data-suffix="+">0</div><div>Products Shipped</div></div>
                    <div class="col-6 col-md-3"><div class="num" data-count="99" data-suffix="%">0</div><div>Satisfaction Rate</div></div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-soft">
        <div class="container">
            <div class="text-center mb-5 reveal">
                <span class="eyebrow">Testimonials</span>
                <h2 class="section-title">Loved by customers worldwide</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-4 reveal"><div class="feature-card"><div class="text-warning mb-2"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div><p class="text-muted-2">"The Electrolite mix is a game-changer for my training schedule. Clean taste, no jitters."</p><strong>Maya R.</strong><div class="text-muted-2 small">Athlete</div></div></div>
                <div class="col-md-4 reveal"><div class="feature-card"><div class="text-warning mb-2"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div><p class="text-muted-2">"Installation of the Water Filter took 15 minutes — the water tastes incredible."</p><strong>Daniel K.</strong><div class="text-muted-2 small">Homeowner</div></div></div>
                <div class="col-md-4 reveal"><div class="feature-card"><div class="text-warning mb-2"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div><p class="text-muted-2">"Their device app is beautifully designed and the support team is genuinely helpful."</p><strong>Priya S.</strong><div class="text-muted-2 small">Wellness Coach</div></div></div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="glass p-5 text-center reveal" style="background:linear-gradient(135deg,rgba(15,76,129,.92),rgba(0,174,239,.85));color:#fff">
                <h2 class="section-title mb-3" style="color:#fff">Ready to upgrade your everyday?</h2>
                <p class="lead mb-4" style="opacity:.95">Explore the AquaNova catalogue or talk to a specialist about the perfect setup for your home.</p>
                <a href="{{route('contact')}}" class="btn btn-light rounded-pill px-4 fw-semibold">Get in Touch <i class="fa-solid fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </section>
@endsection
