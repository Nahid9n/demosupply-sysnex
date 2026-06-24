@extends('frontEnd.layout.app')
@section('title', $service->name)
@section('body')
    <section class="py-4 bg-soft border-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Services</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $service->name }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-4">

                <div class="col-lg-4 col-md-5 order-lg-1 order-2">
                    <div class="card border-0 shadow-sm rounded-4 p-3 sticky-top" style="top: 100px; z-index: 10;">
                        <h5 class="fw-bold mb-3 px-2 text-brand">Our Services</h5>
                        <div class="list-group list-group-flush custom-service-list">
                            {{-- Database internal loop layout update dynamically handled via controllers sharing all services data variable like $all_services --}}
                            @isset($services)
                                @foreach($services as $item)
                                    <a href="{{ route('service.details', $item->slug) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center rounded-3 {{ $service->id == $item->id ? 'active bg-brand border-0' : 'border-0 bg-light-hover' }} py-3 mb-2">

                                        <span>
                                            <i class="fa-solid fa-bolt me-2 me-2"></i>
                                            {{ $item->name }}
                                        </span>

                                        <i class="fa-solid fa-chevron-right small {{ $service->id == $item->id ? '' : 'text-muted' }}"></i>
                                    </a>
                                @endforeach
                            @else
                                {{-- Default fallback if sidebar iteration is not assigned --}}
                                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center rounded-3 active bg-brand border-0 py-3 mb-2">
                                    <span><i class="{{ $service->icon_class }} me-2"></i> {{ $service->name }}</span>
                                    <i class="fa-solid fa-chevron-right small"></i>
                                </a>
                            @endisset
                        </div>

                        <div class="glass p-4 text-center mt-4 text-white rounded-4" style="background: linear-gradient(135deg, #0f4c81, #00aeef);">
                            <h6 class="fw-bold mb-2">{{ $service->cta_title ?? 'Need Urgent Repair?' }}</h6>
                            <p class="small opacity-90 mb-3">{{ $service->cta_subtitle ?? '24/7 Professional emergency support at your doorstep.' }}</p>
                            <a href="tel:{{ $service->phone ?? '' }}" class="btn btn-light btn-sm w-100 rounded-pill fw-semibold"> <i class="fa-solid fa-phone me-2"></i> Call Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-7 order-lg-2 order-1 reveal">
                    <div class="">
                        <h2 class="fw-bold mb-3 text-dark">{{ $service->page_title }}</h2>
                    </div>
                    <div class="mb-4">
                        {{-- Cover Image Dynamic Asset Path Checker --}}
                        <img src="{{ $service->hero_image ? asset($service->hero_image) : asset('Frontend/images/device.jpg') }}" class="img-fluid rounded-4 shadow-sm w-100" style="max-height: 400px; object-fit: cover;" alt="{{ $service->name }}"/>
                    </div>

                    <p class="lead">{{ $service->short_description }}</p>

                    {{-- Long Description parsing safe raw HTML rendering --}}
                    <div class="text-muted-2 entry-content" align="justify">
                        {!! $service->long_description !!}
                    </div>

                    @if($service->gallery && $service->gallery->count() > 0)
                        <h4 class="fw-bold mt-5 mb-4"><i class="fa-solid fa-images text-brand me-2"></i>{{ $service->gallery_title ?? 'Work Portfolio Gallery' }}</h4>
                        <div class="row g-3" id="dynamic-gallery">
                            @foreach($service->gallery as $index => $img)
                                <div class="col-sm-4 col-6">
                                    {{-- Cursor pointer design styling logic tracking index pointer --}}
                                    <div class="overflow-hidden rounded-3 shadow-sm border h-100 position-relative gallery-item" style="cursor: pointer;" data-index="{{ $index }}" data-src="{{ asset($img->image_path) }}">
                                        <img src="{{ asset($img->image_path) }}" class="img-fluid w-100 h-100 object-fit-cover" style="min-height: 150px;" alt="Gallery">
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true" style="background: rgba(0,0,0,0.85);">
                            <div class="modal-dialog modal-dialog-centered modal-lg position-relative">
                                <div class="modal-content bg-transparent border-0 text-end">
                                    <button type="button" class="btn-close btn-close-white ms-auto mb-2 fs-5" data-bs-dismiss="modal" aria-label="Close"></button>

                                    <div class="modal-body p-0 position-relative d-flex align-items-center justify-content-center">

                                        <button class="btn btn-dark rounded-circle position-absolute start-0 m-3 d-flex align-items-center justify-content-center gallery-nav-btn" id="prev-gallery-btn" style="width: 45px; height: 45px; opacity: 0.8; z-index: 1050;">
                                            <i class="fa-solid fa-chevron-left text-white fs-5"></i>
                                        </button>

                                        <img id="gallery-modal-img" src="" class="img-fluid rounded-3 shadow-lg" style="max-height: 80vh; object-fit: contain;" alt="Enlarged View">

                                        <button class="btn btn-dark rounded-circle position-absolute end-0 m-3 d-flex align-items-center justify-content-center gallery-nav-btn" id="next-gallery-btn" style="width: 45px; height: 45px; opacity: 0.8; z-index: 1050;">
                                            <i class="fa-solid fa-chevron-right text-white fs-5"></i>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($service->items && $service->items->count() > 0)
                        <h4 class="fw-bold mt-5 mb-3">
                            <i class="fa-solid fa-gear text-brand me-2"></i>{{ $service->features_title ?? 'Transparent Pricing' }}
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle text-start">
                                <tbody>
                                @foreach($service->items as $item)
                                    <tr>
                                        <td>
                                            <div class="fw-semibold text-dark">{{ $item->title }}</div>
                                        </td>
                                        <td class="fw-bold text-brand">
                                            @if($item->description)
                                                <small class="text-muted d-block mt-1" style="font-size: 12px; line-height: 1.4;">
                                                    {{ $item->description }}
                                                </small>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                    @if($service->pricings && $service->pricings->count() > 0)
                        <h4 class="fw-bold mt-5 mb-3"><i class="fa-solid fa-tags text-brand me-2"></i>{{ $service->pricing_title ?? 'Transparent Pricing' }}</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle text-start">
                                <thead class="bg-soft">
                                <tr>
                                    <th style="width: 50%">Service Scope</th>
                                    <th>Estimated Rate</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($service->pricings as $pricing)
                                    <tr>
                                        <td>{{ $pricing->scope_name }}</td>
                                        <td class="fw-bold text-brand">{{ $pricing->estimated_rate ?? 'Quote Required' }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                    @if($service->faqs)
                        @if(is_array($service->faqs) && count($service->faqs) > 0)
                            <h4 class="fw-bold mt-5 mb-4"><i class="fa-solid fa-circle-question text-brand me-2"></i>{{ $service->faq_title ?? 'Frequently Asked Questions' }}</h4>
                            <div class="accordion" id="faqAccordion">
                                @foreach($service->faqs as $index => $faq)
                                    <div class="accordion-item border rounded-3 mb-2 overflow-hidden">
                                        <h2 class="accordion-header" id="heading{{ $index }}">
                                            <button class="accordion-button fw-bold {{ $index == 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                                {{ $faq['question'] }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body text-muted-2">
                                                {{ $faq['answer'] }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endif

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
        .bg-light-hover:hover {
            background-color: #f8f9fa !important;
            color: #0f4c81 !important;
            padding-left: 20px;
            transition: all 0.2s ease-in-out;
        }
        .custom-service-list .list-group-item {
            transition: all 0.2s ease-in-out;
        }
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
        /* Rich Text styling wrapper rules */
        .entry-content p {
            margin-bottom: 1rem;
            line-height: 1.6;
        }
    </style>
        <style>
            /* ==========================================================================
               Rich Text Content (.entry-content) Dynamic Styling Blueprint
               ========================================================================== */

            /* 1. General Paragraph & Base Text Color */
            .entry-content {
                color: #0a0b0c !important; /* Elegant slate/dark gray text color */
                line-height: 1.8;
                font-size: 15.5px;
            }
            .entry-content p {
                margin-bottom: 1.5rem;
            }

            /* 2. Headings Custom Accents (H1 to H6) */
            .entry-content h1, .entry-content h2, .entry-content h3,
            .entry-content h4, .entry-content h5, .entry-content h6 {
                color: #0f4c81 !important; /* Brand theme dark blue */
                font-weight: 700;
                margin-top: 2rem;
                margin-bottom: 1rem;
                line-height: 1.4;
            }
            .entry-content h1 { font-size: 2rem; }
            .entry-content h2 { font-size: 1.65rem; border-bottom: 2px solid #f1f5f9; padding-bottom: 8px; }
            .entry-content h3 { font-size: 1.4rem; }
            .entry-content h4 { font-size: 1.2rem; }

            /* 3. Unordered List (ul, li) Bullet Point Architecture */
            .entry-content ul {
                list-style: none; /* Default boring bullets remove */
                padding-left: 1.5rem;
                margin-bottom: 1.5rem;
            }
            .entry-content ul li {
                position: relative;
                margin-bottom: 0.5rem;
                padding-left: 1.5rem;
            }
            /* Custom dynamic custom icon element for Unordered List */
            .entry-content ul li::before {
                content: "\f00c"; /* FontAwesome check icon code */
                font-family: "Font Awesome 6 Free";
                font-weight: 900;
                position: absolute;
                left: 0;
                top: 2px;
                color: #00aeef; /* Light blue secondary accent color */
                font-size: 13px;
            }

            /* 4. Ordered List (ol, li) Number Architecture */
            .entry-content ol {
                list-style-type: decimal;
                padding-left: 2rem;
                margin-bottom: 1.5rem;
            }
            .entry-content ol li {
                margin-bottom: 0.5rem;
                padding-left: 0.25rem;
                font-weight: 500;
            }
            .entry-content ol li::marker {
                color: #0f4c81; /* Bold numbers utilizing main brand asset color */
                font-weight: 700;
            }

            /* 5. In-content Images (Responsive & Framed Setup) */
            .entry-content img {
                max-width: 100%;
                height: auto !important;
                border-radius: 12px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
                margin: 1.75rem 0;
                border: 1px solid #f1f5f9;
                object-fit: cover;
            }

            /* 6. Strong/Bold Text emphasis element style */
            .entry-content strong {
                color: #0f4c81;
                font-weight: 700;
            }

            /* 7. Blockquotes (যদি এডমিন প্যানেলে সাইটেশনের কোনো উক্তি থাকে) */
            .entry-content blockquote {
                background-color: #f8fafc;
                border-left: 4px solid #0f4c81;
                padding: 1rem 1.5rem;
                margin: 1.5rem 0;
                font-style: italic;
                border-radius: 0 8px 8px 0;
            }
        </style>
@endpush
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const galleryItems = document.querySelectorAll('.gallery-item');

            // Check elements exist wrapper fallback checker rules
            if (galleryItems.length > 0) {
                const modalElement = new bootstrap.Modal(document.getElementById('galleryModal'));
                const modalImg = document.getElementById('gallery-modal-img');
                const prevBtn = document.getElementById('prev-gallery-btn');
                const nextBtn = document.getElementById('next-gallery-btn');

                // Dynamic state data arrays mapping indices variables
                let currentIndex = 0;
                let imagesArray = [];

                // Dynamic extraction of asset route sources mapping paths template loop arrays
                galleryItems.forEach((item, index) => {
                    imagesArray.push(item.getAttribute('data-src'));

                    // Register click handler component events sequence
                    item.addEventListener('click', function () {
                        currentIndex = parseInt(this.getAttribute('data-index'));
                        updateModalImage();
                        modalElement.show();
                    });
                });

                // Function updating core layout visual container dynamically mapping index
                function updateModalImage() {
                    modalImg.src = imagesArray[currentIndex];
                }

                // Previous Action Slide Navigation Trigger Click Loop Layer
                prevBtn.addEventListener('click', function (e) {
                    e.stopPropagation(); // Modal internal click bounce events safety prevent bypass loops
                    currentIndex = (currentIndex === 0) ? imagesArray.length - 1 : currentIndex - 1;
                    updateModalImage();
                });

                // Next Action Slide Navigation Trigger Click Loop Layer
                nextBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    currentIndex = (currentIndex === imagesArray.length - 1) ? 0 : currentIndex + 1;
                    updateModalImage();
                });

                // Keyboard navigation events mapping hooks helper shortcuts (Left/Right Arrows support)
                document.addEventListener('keydown', function (e) {
                    // Check mapping tracking modal target window lifecycle logic wrapper
                    if (document.getElementById('galleryModal').classList.contains('show')) {
                        if (e.key === 'ArrowRight') {
                            nextBtn.click();
                        } else if (e.key === 'ArrowLeft') {
                            prevBtn.click();
                        }
                    }
                });
            }
        });
    </script>
@endpush
