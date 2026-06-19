@extends('frontEnd.layout.app')
@section('title','Water Filter')
@section('body')

    <section class="product-hero">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 reveal">
                    <span class="eyebrow">Pure Water Every Day</span>
                    <h1 class="section-title mb-3">AquaNova Water Filter</h1>
                    <p class="lead text-muted-2">A multi-stage filtration system that removes contaminants while preserving healthy minerals — delivering crisp, clean water straight from your tap.</p>
                    <div class="d-flex flex-wrap gap-3 mt-3">
                        <a href="{{route('contact')}}" class="btn btn-brand"><i class="fa-solid fa-bag-shopping me-2"></i>Request a Quote</a>
                        <a href="#specs" class="btn btn-outline-brand">View Specifications</a>
                    </div>
                </div>
                <div class="col-lg-6 reveal">
                    <img src="{{asset('/')}}Frontend/images/water-filter.jpg" class="img-fluid rounded-4 shadow-lg" alt="AquaNova Water Filter"/>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="text-center mb-5 reveal">
                <span class="eyebrow">Key Features</span>
                <h2 class="section-title">Why customers love the AquaNova Water Filter</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 reveal"><div class="feature-card"><div class="feature-icon"><i class="fa-solid fa-droplet"></i></div><h5>5-Stage Filtration</h5><p class="text-muted-2 mb-0">Sediment, carbon, ultra-filtration, mineral balance, polish.</p></div></div>
                <div class="col-md-6 col-lg-4 reveal"><div class="feature-card"><div class="feature-icon"><i class="fa-solid fa-mountain"></i></div><h5>Mineral Balanced</h5><p class="text-muted-2 mb-0">Adds calcium and magnesium for great taste.</p></div></div>
                <div class="col-md-6 col-lg-4 reveal"><div class="feature-card"><div class="feature-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div><h5>Easy Install</h5><p class="text-muted-2 mb-0">Tool-free setup in under 15 minutes.</p></div></div>
                <div class="col-md-6 col-lg-4 reveal"><div class="feature-card"><div class="feature-icon"><i class="fa-solid fa-house"></i></div><h5>Whole-Home Ready</h5><p class="text-muted-2 mb-0">Modular design scales to whole-home plumbing.</p></div></div>
                <div class="col-md-6 col-lg-4 reveal"><div class="feature-card"><div class="feature-icon"><i class="fa-solid fa-gauge-high"></i></div><h5>High Flow</h5><p class="text-muted-2 mb-0">2.1 L/min sustained without pressure loss.</p></div></div>
                <div class="col-md-6 col-lg-4 reveal"><div class="feature-card"><div class="feature-icon"><i class="fa-solid fa-leaf"></i></div><h5>Eco Cartridges</h5><p class="text-muted-2 mb-0">Cartridges last 6 months — recyclable shell.</p></div></div></div>
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
                            <tbody><tr><th style='width:35%'>Stages</th><td>5</td></tr><tr><th style='width:35%'>Flow Rate</th><td>2.1 L / min</td></tr><tr><th style='width:35%'>Cartridge Life</th><td>6 months / 4,000 L</td></tr><tr><th style='width:35%'>Removes</th><td>Chlorine, lead, microplastics, VOCs</td></tr><tr><th style='width:35%'>Retains</th><td>Calcium, magnesium, trace minerals</td></tr><tr><th style='width:35%'>Dimensions</th><td>36 × 12 × 12 cm</td></tr><tr><th style='width:35%'>Warranty</th><td>2 years</td></tr></tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6 reveal">
                    <span class="eyebrow">FAQs</span>
                    <h2 class="section-title mb-4">Frequently asked</h2>
                    <div class="accordion" id="faq-water-filter">
                        <div class="accordion-item">
                            <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqwater-filter0">Do I need a plumber to install it?</button></h2>
                            <div id="faqwater-filter0" class="accordion-collapse collapse" data-bs-parent="#faq-water-filter"><div class="accordion-body text-muted-2">No — the kit includes everything for a standard under-sink install.</div></div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqwater-filter1">How often do I change cartridges?</button></h2>
                            <div id="faqwater-filter1" class="accordion-collapse collapse" data-bs-parent="#faq-water-filter"><div class="accordion-body text-muted-2">Every 6 months or 4,000 liters, whichever comes first.</div></div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqwater-filter2">Does it remove fluoride?</button></h2>
                            <div id="faqwater-filter2" class="accordion-collapse collapse" data-bs-parent="#faq-water-filter"><div class="accordion-body text-muted-2">An optional fluoride-removal cartridge is available.</div></div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqwater-filter3">Is the housing BPA-free?</button></h2>
                            <div id="faqwater-filter3" class="accordion-collapse collapse" data-bs-parent="#faq-water-filter"><div class="accordion-body text-muted-2">Yes, all water-contact parts are BPA-free and NSF certified.</div></div>
                        </div></div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="glass p-5 text-center reveal" style="background:linear-gradient(135deg,rgba(15,76,129,.92),rgba(0,174,239,.85));color:#fff">
                <h2 class="section-title mb-3" style="color:#fff">Bring the AquaNova Water Filter home</h2>
                <p class="lead mb-4" style="opacity:.95">Our team will help you choose the perfect configuration and answer every question.</p>
                <a href="{{route('contact')}}" class="btn btn-light rounded-pill px-4 fw-semibold">Contact Sales <i class="fa-solid fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </section>


@endsection
