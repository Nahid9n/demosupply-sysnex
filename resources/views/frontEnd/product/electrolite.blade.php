@extends('frontEnd.layout.app')
@section('title','Electrolite')
@section('body')

    <section class="product-hero">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 reveal">
                    <span class="eyebrow">Premium Electrolytes</span>
                    <h1 class="section-title mb-3">Electrolite Hydration</h1>
                    <p class="lead text-muted-2">A precisely balanced blend of sodium, potassium, magnesium and trace minerals to replenish fluids, sharpen focus and support recovery — without sugar crashes.</p>
                    <div class="d-flex flex-wrap gap-3 mt-3">
                        <a href="{{route('contact')}}" class="btn btn-brand"><i class="fa-solid fa-bag-shopping me-2"></i>Request a Quote</a>
                        <a href="#specs" class="btn btn-outline-brand">View Specifications</a>
                    </div>
                </div>
                <div class="col-lg-6 reveal">
                    <img src="{{asset('/')}}Frontend/images/electrolite.jpg" class="img-fluid rounded-4 shadow-lg" alt="Electrolite Hydration"/>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="text-center mb-5 reveal">
                <span class="eyebrow">Key Features</span>
                <h2 class="section-title">Why customers love the Electrolite Hydration</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 reveal"><div class="feature-card"><div class="feature-icon"><i class="fa-solid fa-bolt"></i></div><h5>Rapid Absorption</h5><p class="text-muted-2 mb-0">Optimized osmolarity for fast cellular hydration.</p></div></div>
                <div class="col-md-6 col-lg-4 reveal"><div class="feature-card"><div class="feature-icon"><i class="fa-solid fa-seedling"></i></div><h5>Clean Ingredients</h5><p class="text-muted-2 mb-0">No artificial colors, no added sugar, vegan-friendly.</p></div></div>
                <div class="col-md-6 col-lg-4 reveal"><div class="feature-card"><div class="feature-icon"><i class="fa-solid fa-heart-pulse"></i></div><h5>Daily Wellness</h5><p class="text-muted-2 mb-0">Supports nerve function, muscle recovery and energy.</p></div></div>
                <div class="col-md-6 col-lg-4 reveal"><div class="feature-card"><div class="feature-icon"><i class="fa-solid fa-flask"></i></div><h5>Lab Verified</h5><p class="text-muted-2 mb-0">Third-party tested for purity and potency.</p></div></div>
                <div class="col-md-6 col-lg-4 reveal"><div class="feature-card"><div class="feature-icon"><i class="fa-solid fa-mug-hot"></i></div><h5>Great Taste</h5><p class="text-muted-2 mb-0">Three refreshing flavors with a smooth finish.</p></div></div>
                <div class="col-md-6 col-lg-4 reveal"><div class="feature-card"><div class="feature-icon"><i class="fa-solid fa-recycle"></i></div><h5>Eco Packaging</h5><p class="text-muted-2 mb-0">Recyclable sachets and compostable outer carton.</p></div></div></div>
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
                            <tbody><tr><th style='width:35%'>Servings</th><td>30 per pack</td></tr><tr><th style='width:35%'>Sodium</th><td>500 mg / serving</td></tr><tr><th style='width:35%'>Potassium</th><td>200 mg / serving</td></tr><tr><th style='width:35%'>Magnesium</th><td>60 mg / serving</td></tr><tr><th style='width:35%'>Sugar</th><td>0 g</td></tr><tr><th style='width:35%'>Flavors</th><td>Citrus, Berry, Cucumber-Lime</td></tr><tr><th style='width:35%'>Certifications</th><td>Vegan, Gluten-Free, Non-GMO</td></tr></tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6 reveal">
                    <span class="eyebrow">FAQs</span>
                    <h2 class="section-title mb-4">Frequently asked</h2>
                    <div class="accordion" id="faq-electrolite">
                        <div class="accordion-item">
                            <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqelectrolite0">When should I drink Electrolite?</button></h2>
                            <div id="faqelectrolite0" class="accordion-collapse collapse" data-bs-parent="#faq-electrolite"><div class="accordion-body text-muted-2">Anytime you need hydration — before, during or after exercise, in hot weather, or as a daily wellness boost.</div></div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqelectrolite1">Is it safe for daily use?</button></h2>
                            <div id="faqelectrolite1" class="accordion-collapse collapse" data-bs-parent="#faq-electrolite"><div class="accordion-body text-muted-2">Yes. The formulation is balanced for everyday consumption by healthy adults.</div></div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqelectrolite2">Does it contain caffeine?</button></h2>
                            <div id="faqelectrolite2" class="accordion-collapse collapse" data-bs-parent="#faq-electrolite"><div class="accordion-body text-muted-2">No, Electrolite is caffeine-free.</div></div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqelectrolite3">How is it shipped?</button></h2>
                            <div id="faqelectrolite3" class="accordion-collapse collapse" data-bs-parent="#faq-electrolite"><div class="accordion-body text-muted-2">Free expedited shipping on orders above $50, delivered carbon-neutral.</div></div>
                        </div></div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="glass p-5 text-center reveal" style="background:linear-gradient(135deg,rgba(15,76,129,.92),rgba(0,174,239,.85));color:#fff">
                <h2 class="section-title mb-3" style="color:#fff">Bring the Electrolite Hydration home</h2>
                <p class="lead mb-4" style="opacity:.95">Our team will help you choose the perfect configuration and answer every question.</p>
                <a href="{{route('contact')}}" class="btn btn-light rounded-pill px-4 fw-semibold">Contact Sales <i class="fa-solid fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </section>


@endsection
