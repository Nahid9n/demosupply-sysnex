@extends('frontEnd.layout.app')
@section('title', 'Articles & Insights')
@section('body')
    <!-- Hero Section -->
    <section class="product-hero bg-soft py-5 position-relative overflow-hidden" style="background: linear-gradient(180deg, #f4f8fb 0%, #ffffff 100%);">
        <div class="container py-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-8 reveal mx-auto text-center">
                    <span class="eyebrow px-3 py-1 bg-white shadow-sm rounded-pill mb-3 d-inline-block fw-semibold text-uppercase tracking-wider" style="font-size: 12px; color: #0f4c81;">Knowledge Hub</span>
                    <h1 class="section-title mb-3 fw-bold display-5" style="color: #0f4c81;">Insights, Research & Wellness Tips</h1>
                    <p class="lead text-muted-2 px-md-5">Stay ahead with expert articles on advanced hydration science, smart tracking technology, and cutting-edge water purification systems.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog / Articles Section (SEO-Friendly & Premium Grid) -->
    <section class="py-5">
        <div class="container">
            <!-- Filter / Top Bar (Optional but gives a premium feel) -->
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-5 pb-2 border-bottom reveal">
                <div>
                    <h3 class="fw-bold mb-1" style="color: #1a1a1a;">All Publications</h3>
                    <p class="text-muted small mb-0">Showing the latest research and guides</p>
                </div>
                <div class="mt-3 mt-md-0">
                    <span class="text-muted small me-2">Sort by:</span>
                    <select class="form-select form-select-sm d-inline-block w-auto border-0 bg-light rounded-pill px-3 fw-semibold text-secondary">
                        <option>Latest Articles</option>
                        <option>Trending</option>
                    </select>
                </div>
            </div>

            <!-- Blog Grid -->
            <div class="row g-4">

                @foreach($articles as $article)
                    <div class="col-md-6 col-lg-4 reveal">
                        @include('frontEnd.component.articleCard',[ 'article' => $article ])
                    </div>
                @endforeach

            </div>

            <!-- View All Button / Pagination Area -->
            <div class="text-center mt-5 pt-3 reveal">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center m-0">
                        <li class="page-item disabled"><a class="page-line rounded-circle me-2 d-flex align-items-center justify-content-center" href="#" style="width:40px; height:40px; border:1px solid #eee; text-decoration:none; color:#ccc;"><i class="fa-solid fa-chevron-left"></i></a></li>
                        <li class="page-item active"><a class="page-link rounded-circle me-2 bg-brand text-white d-flex align-items-center justify-content-center border-0" href="#" style="width:40px; height:40px;">1</a></li>
                        <li class="page-item"><a class="page-link rounded-circle me-2 text-dark d-flex align-items-center justify-content-center" href="#" style="width:40px; height:40px; border:1px solid #eee;">2</a></li>
                        <li class="page-item"><a class="page-link rounded-circle d-flex align-items-center justify-content-center text-dark" href="#" style="width:40px; height:40px; border:1px solid #eee;"><i class="fa-solid fa-chevron-right"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>

    <!-- Custom Solutions / CTA Section -->
    <section class="py-5">
        <div class="container">
            <div class="glass p-5 text-center reveal" style="background: linear-gradient(135deg, rgba(15, 76, 129, 0.95), rgba(0, 174, 239, 0.9)); color: #fff; border-radius: 24px; box-shadow: 0 15px 35px rgba(0, 174, 239, 0.25);">
                <h2 class="section-title mb-3" style="color:#fff">Need a Custom Commercial Solution?</h2>
                <p class="lead mb-4" style="opacity:.95">We provide corporate wellness setups, institutional water monitoring, and large scale tracking configurations.</p>
                <a href="{{route('contact')}}" class="btn btn-light rounded-pill px-4 py-2 fw-semibold shadow-sm">Talk to Our Engineering Team <i class="fa-solid fa-envelope ms-2"></i></a>
            </div>
        </div>
    </section>

@endsection
