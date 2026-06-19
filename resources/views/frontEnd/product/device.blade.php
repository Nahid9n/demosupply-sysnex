@extends('frontEnd.layout.app')
@section('title','Device')
@section('body')


    <section class="product-hero">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 reveal">
                    <span class="eyebrow">Connected Wellness</span>
                    <h1 class="section-title mb-3">AquaNova Smart Device</h1>
                    <p class="lead text-muted-2">A beautifully designed wellness device that pairs with your phone to track hydration, water quality and daily wellness goals — all in one elegant unit.</p>
                    <div class="d-flex flex-wrap gap-3 mt-3">
                        <a href="{{route('contact')}}" class="btn btn-brand"><i class="fa-solid fa-bag-shopping me-2"></i>Request a Quote</a>
                        <a href="#specs" class="btn btn-outline-brand">View Specifications</a>
                    </div>
                </div>
                <div class="col-lg-6 reveal">
                    <img src="{{asset('/')}}Frontend/images/device.jpg" class="img-fluid rounded-4 shadow-lg" alt="AquaNova Smart Device"/>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="text-center mb-5 reveal">
                <span class="eyebrow">Key Features</span>
                <h2 class="section-title">Why customers love the AquaNova Smart Device</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 reveal"><div class="feature-card"><div class="feature-icon"><i class="fa-solid fa-mobile-screen"></i></div><h5>App Connected</h5><p class="text-muted-2 mb-0">iOS and Android companion app with insights.</p></div></div>
                <div class="col-md-6 col-lg-4 reveal"><div class="feature-card"><div class="feature-icon"><i class="fa-solid fa-microchip"></i></div><h5>Smart Sensors</h5><p class="text-muted-2 mb-0">Multi-sensor array for accurate, real-time readings.</p></div></div>
                <div class="col-md-6 col-lg-4 reveal"><div class="feature-card"><div class="feature-icon"><i class="fa-solid fa-bell"></i></div><h5>Smart Reminders</h5><p class="text-muted-2 mb-0">Personalized goals and gentle nudges.</p></div></div>
                <div class="col-md-6 col-lg-4 reveal"><div class="feature-card"><div class="feature-icon"><i class="fa-solid fa-battery-full"></i></div><h5>Long Battery</h5><p class="text-muted-2 mb-0">Up to 21 days on a single USB-C charge.</p></div></div>
                <div class="col-md-6 col-lg-4 reveal"><div class="feature-card"><div class="feature-icon"><i class="fa-solid fa-shield-halved"></i></div><h5>Privacy First</h5><p class="text-muted-2 mb-0">Data stays encrypted and on-device by default.</p></div></div>
                <div class="col-md-6 col-lg-4 reveal"><div class="feature-card"><div class="feature-icon"><i class="fa-solid fa-cloud"></i></div><h5>Cloud Sync</h5><p class="text-muted-2 mb-0">Optional sync across all your devices.</p></div></div></div>
        </div>
    </section>

    <section id="specs" class="bg-soft">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 reveal">
                    <span class="eyebrow">Specifications</span>
                    <h2 class="section-title mb-4">Technical details</h2>
                    <div class="table-responsive">
                        <table class="table spec-table align-middle">
                            <tbody><tr><th style='width:35%'>Display</th><td>1.4-inch AMOLED</td></tr><tr><th style='width:35%'>Connectivity</th><td>Bluetooth 5.3, Wi-Fi</td></tr><tr><th style='width:35%'>Battery</th><td>Up to 21 days</td></tr><tr><th style='width:35%'>Charging</th><td>USB-C, 0–80% in 45 min</td></tr><tr><th style='width:35%'>Water Resistance</th><td>IP68</td></tr><tr><th style='width:35%'>Compatibility</th><td>iOS 15+, Android 11+</td></tr><tr><th style='width:35%'>Warranty</th><td>2 years</td></tr></tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6 reveal">
                    <span class="eyebrow">FAQs</span>
                    <h2 class="section-title mb-4">Frequently asked</h2>
                    <div class="accordion" id="faq-device">
                        <div class="accordion-item">
                            <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqdevice0">Does it work without a phone?</button></h2>
                            <div id="faqdevice0" class="accordion-collapse collapse" data-bs-parent="#faq-device"><div class="accordion-body text-muted-2">Yes, the device functions stand-alone and syncs whenever your phone is in range.</div></div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqdevice1">Is my data private?</button></h2>
                            <div id="faqdevice1" class="accordion-collapse collapse" data-bs-parent="#faq-device"><div class="accordion-body text-muted-2">All readings are encrypted; cloud sync is opt-in.</div></div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqdevice2">What's in the box?</button></h2>
                            <div id="faqdevice2" class="accordion-collapse collapse" data-bs-parent="#faq-device"><div class="accordion-body text-muted-2">Device, magnetic USB-C cable, quick-start guide.</div></div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqdevice3">Can I get replacement parts?</button></h2>
                            <div id="faqdevice3" class="accordion-collapse collapse" data-bs-parent="#faq-device"><div class="accordion-body text-muted-2">Yes, all components are user-serviceable and available on our store.</div></div>
                        </div></div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="glass p-5 text-center reveal" style="background:linear-gradient(135deg,rgba(15,76,129,.92),rgba(0,174,239,.85));color:#fff">
                <h2 class="section-title mb-3" style="color:#fff">Bring the AquaNova Smart Device home</h2>
                <p class="lead mb-4" style="opacity:.95">Our team will help you choose the perfect configuration and answer every question.</p>
                <a href="{{route('contact')}}" class="btn btn-light rounded-pill px-4 fw-semibold">Contact Sales <i class="fa-solid fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </section>

@endsection
