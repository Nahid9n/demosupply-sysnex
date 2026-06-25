@extends('frontEnd.layout.app')
@section('title', 'Articles & Insights')
@section('body')
    <section class="product-hero bg-soft mt-lg-5 mt-0 py-0 py-lg-5 position-relative overflow-hidden" style="background: linear-gradient(180deg, #f4f8fb 0%, #ffffff 100%);">
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

    <section class="py-0 py-lg-5">
        <div class="container">
            <div class="row g-4" id="articles-wrapper">
                @foreach($articles as $article)
                    <div class="col-md-6 col-lg-4 reveal article-item">
                        @include('frontEnd.component.articleCard',[ 'article' => $article ])
                    </div>
                @endforeach
            </div>

            @if($articles->hasMorePages())
                <div class="text-center mt-5 pt-3 reveal">
                    <button id="load-more-btn" data-page="2" class="btn btn-brand rounded-pill px-5 py-3 fw-semibold shadow-sm" style="background-color: #0f4c81; color: white;">
                        Load More Articles <i class="fa-solid fa-spinner fa-spin ms-2 d-none" id="loader-icon"></i>
                    </button>
                </div>
            @endif
        </div>
    </section>

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
@push('js')
    <script>
        $(document).ready(function() {
            $('#load-more-btn').click(function() {
                let button = $(this);
                let page = button.data('page');
                let loader = $('#loader-icon');

                console.log(page);
                // Loader show and disable button
                loader.removeClass('d-none');
                button.prop('disabled', true);

                $.ajax({
                    // Laravel Route Name dynamic dynamic use kora holo ekhane
                    url: "{{ route('articles') }}",
                    type: "GET",
                    data: {
                        page: page // Request page query parameter standard hishebe pas hocche
                    },
                    dataType: "json",
                    success: function(response) {
                        // Check korun data ashche kina directly length diye (trim jhamela mukto)
                        if(!response.html || response.html.trim().length === 0) {
                            button.remove();
                            return;
                        }

                        // Loader off and push content
                        loader.addClass('d-none');
                        button.prop('disabled', false);

                        // New HTML object/node generate kore wrapper section-e pathano hocche
                        let $newItems = $(response.html);

                        // UI layout freeze thaka/hide thaka rodh korte initial dynamic filter apply
                        // Jodi element automatic load na hoy, reveal dynamic override korbe
                        $newItems.css('opacity', '1').css('visibility', 'visible');

                        // New cards push to main row
                        $('#articles-wrapper').append($newItems);

                        // Increment page count for next click
                        button.data('page', page + 1);

                        // If no more data remains, remove button
                        if(!response.hasMore) {
                            button.remove();
                        }

                        // [IMPORTANT] Jodi ScrollReveal / AOS wrapper plugin thake, seta dynamic reload kora:
                        // typeof ScrollReveal !== 'undefined' && ScrollReveal().sync();
                    },
                    error: function(xhr) {
                        console.log('Something went wrong!');
                        loader.addClass('d-none');
                        button.prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endpush

