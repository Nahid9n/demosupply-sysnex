@extends('frontEnd.layout.app')
@section('title', 'Project Gallery')
@section('body')
    <!-- Hero Section -->
    <section class="product-hero bg-soft mt-lg-5 mt-0 py-0 py-lg-5 position-relative overflow-hidden" style="background: linear-gradient(180deg, #f4f8fb 0%, #ffffff 100%);" >
        <div class="container" style="padding-top: 60px">
            <div class="row align-items-center g-5">
                <div class="col-lg-8 reveal mx-auto text-center">
                    <span class="eyebrow px-3 py-1 bg-white shadow-sm rounded-pill mb-3 d-inline-block fw-semibold text-uppercase tracking-wider" style="font-size: 12px; color: #0f4c81;">Portfolio</span>
                    <h1 class="section-title mb-3 fw-bold display-5" style="color: #0f4c81;">Our Project Showcase</h1>
                    <p class="lead text-muted-2 px-md-5">Explore our commercial installations, smart water systems, and advanced purification setups across multiple industries.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Premium Gallery Grid Section -->
    <section class="py-0 py-lg-5 mb-5">
        <div class="container">
            <div class="row g-4" id="projectGallery">
                @foreach($galleries as $index => $project)
                    <div class="col-sm-6 col-md-4 col-lg-4 reveal">
                        <div class="gallery-card position-relative overflow-hidden rounded-4 border-0 shadow-sm bg-white h-100"
                             style="cursor: pointer; transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);"
                             onclick="openGalleryModal({{ $index }})">

                            <!-- Project Image -->
                            <div class="img-wrapper overflow-hidden position-relative" style="aspect-ratio: 4/3; background: #eee;">
                                <img src="{{ asset($project->image) }}"
                                     alt="{{ $project->title }}"
                                     class="w-100 h-100 object-fit-cover gallery-img"
                                     style="transition: transform 0.6s ease;">

                                <!-- Premium Overlay Gradient -->
                                <div class="card-overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-end p-3"
                                     style="background: linear-gradient(0deg, rgba(15, 76, 129, 0.9) 0%, rgba(15, 76, 129, 0.2) 60%, transparent 100%); opacity: 0; transition: opacity 0.4s ease;">
                                    <div class="overlay-icon text-white mb-2 transform-y" style="transform: translateY(15px); transition: transform 0.4s ease;">
                                        <i class="fa-solid fa-expand fa-lg bg-blur p-2 rounded-circle" style=" backdrop-filter: blur(5px);"></i>
                                    </div>
                                    <h5 class="text-white fw-bold mb-0 transform-y" style="transform: translateY(15px); transition: transform 0.4s ease; font-size: 16px;">{{ $project->alt_text ?? 'Commercial Installation'  }}</h5>
{{--                                    <span class="text-white-50 small transform-y" style="transform: translateY(15px); transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1); font-size: 12px;">{{ $project->category ?? 'Commercial Installation' }}</span>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Premium Lightbox Modal -->
    <div class="modal fade" id="galleryLightboxModal" tabindex="-1" aria-hidden="true" style="background: rgba(10, 25, 47, 0.95); backdrop-filter: blur(10px);">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 bg-transparent text-white position-relative">

                <!-- Close Button -->
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 z-3 shadow-none" data-bs-dismiss="modal" aria-label="Close" style="width: 2rem; height: 2rem; border-radius: 50%; background-color: rgba(255,255,255,0.1); padding: 0.5rem;"></button>

                <div class="modal-body p-0 position-relative text-center">
                    <!-- Image Container -->
                    <div class="modal-img-container d-inline-block position-relative rounded-4 overflow-hidden shadow-lg bg-dark" style="max-height: 75vh;">
                        <img src="" id="lightboxImage" class="img-fluid" alt="Project Preview" style="max-height: 75vh; object-fit: contain;">

                        <!-- Fixed Info Overlay at bottom -->
                        <div class="position-absolute bottom-0 start-0 w-100 text-start p-4" style="background: linear-gradient(180deg, transparent, rgba(0,0,0,0.85));">
                            <h4 id="lightboxTitle" class="fw-bold mb-1 text-white"></h4>
                            <p id="lightboxCategory" class="text-white-50 small mb-0"></p>
                        </div>
                    </div>

                    <!-- Navigation Arrow Buttons -->
                    <button class="btn nav-btn position-absolute top-50 start-0 translate-middle-y ms-2 ms-md-4 rounded-circle border-0 text-white d-flex align-items-center justify-content-center"
                            onclick="navigateGallery(-1)"
                            style="width: 50px; height: 50px; background: rgba(255,255,255,0.1); backdrop-filter: blur(5px); transition: all 0.3s;">
                        <i class="fa-solid fa-chevron-left fa-lg"></i>
                    </button>
                    <button class="btn nav-btn position-absolute top-50 end-0 translate-middle-y me-2 me-md-4 rounded-circle border-0 text-white d-flex align-items-center justify-content-center"
                            onclick="navigateGallery(1)"
                            style="width: 50px; height: 50px; background: rgba(255,255,255,0.1); backdrop-filter: blur(5px); transition: all 0.3s;">
                        <i class="fa-solid fa-chevron-right fa-lg"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom CSS inside push/stack or directly inline for ease of setup -->
    <style>
        /* Card Hover Effects */
        .gallery-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(15, 76, 129, 0.15) !important;
        }
        .gallery-card:hover .gallery-img {
            transform: scale(1.08);
        }
        .gallery-card:hover .card-overlay {
            opacity: 1 !important;
        }
        .gallery-card:hover .transform-y {
            transform: translateY(0) !important;
        }

        /* Modal & Arrow Hover Effects */
        .nav-btn:hover {
            background: rgba(255, 255, 255, 0.25) !important;
            color: #0f4c81 !important;
            transform: translateY(-50%) scale(1.05);
        }
        #lightboxImage {
            animation: fadeInSmooth 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }
        @keyframes fadeInSmooth {
            from { opacity: 0; transform: scale(0.97); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>

    <!-- Gallery Interaction Logic Script -->
    <script>
        // Controller configuration to load backend array into JS safely
        const galleryData = @json($galleries).map(proj => ({
            image: "{{ asset('') }}" + proj.image,
            title: proj.title,
            category: proj.category || 'Commercial Installation'
        }));

        let currentActiveIndex = 0;
        let bootstrapModalInstance = null;

        document.addEventListener("DOMContentLoaded", function() {
            bootstrapModalInstance = new bootstrap.Modal(document.getElementById('galleryLightboxModal'));

            // Keyboard Navigation (Left/Right Arrow and Esc keys)
            document.addEventListener('keydown', function(event) {
                if (!document.getElementById('galleryLightboxModal').classList.contains('show')) return;

                if (event.key === 'ArrowLeft') {
                    navigateGallery(-1);
                } else if (event.key === 'ArrowRight') {
                    navigateGallery(1);
                }
            });
        });

        function openGalleryModal(index) {
            currentActiveIndex = index;
            updateLightboxContent();
            bootstrapModalInstance.show();
        }

        function navigateGallery(direction) {
            currentActiveIndex += direction;

            // Loop functionality (First dynamically wraps around bounds)
            if (currentActiveIndex >= galleryData.length) {
                currentActiveIndex = 0;
            } else if (currentActiveIndex < 0) {
                currentActiveIndex = galleryData.length - 1;
            }

            updateLightboxContent();
        }

        function updateLightboxContent() {
            const project = galleryData[currentActiveIndex];
            const imgElement = document.getElementById('lightboxImage');

            // Set elements
            imgElement.src = project.image;
            document.getElementById('lightboxTitle').textContent = project.title;
            document.getElementById('lightboxCategory').textContent = project.category;
        }
    </script>

@endsection
