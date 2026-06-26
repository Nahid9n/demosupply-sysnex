@extends('backEnd.layout.master')
@section('title', $service->name)
@section('body')
    <div class="py-4">
        <!-- Route and Method Mapping -->
        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold text-slate-900 mb-0">Update Service</h4>
                    <p class="text-muted small mb-0">Editing: /service/{{ $service->slug }}</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.services.index') }}" class="btn btn-light border rounded-3 px-4 py-2 fw-semibold">Cancel</a>
                    <button type="submit" class="btn btn-primary rounded-3 px-4 py-2 fw-semibold">Update Service</button>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-8">
                    <!-- CORE SETTINGS -->
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                        <h5 class="fw-bold text-slate-800 mb-3 border-bottom pb-2">Core Information</h5>
                        <div class="row g-3">
                            <!-- 🚀 SUB SERVICE SYSTEM: Parent Service Selector (Edit Mode) -->
                            <div class="col-12 mb-2">
                                <label class="form-label fw-semibold text-slate-700">Service Category Type (Parent Service)</label>
                                <select name="parent_id" class="form-select border-2 border-primary border-opacity-25" id="parentServiceSelect">
                                    <option value="" {{ is_null($service->parent_id) ? 'selected' : '' }}>None</option>
                                    @foreach($mainServices ?? [] as $mainService)
                                        @if($mainService->id !== $service->id) {{-- নিজেকে যেন নিজের সাব-সার্ভিস না বানানো যায় --}}
                                        <option value="{{ $mainService->id }}" {{ $service->parent_id == $mainService->id ? 'selected' : '' }}>
                                            {{ $mainService->name }}
                                        </option>
                                        @endif
                                    @endforeach
                                </select>
                                <small class="text-muted">যদি এটি কোনো মেইন সার্ভিসের ভেতরের সাব-সার্ভিস হয়, তবে উপর থেকে মেইন সার্ভিসটি সিলেক্ট করুন।</small>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Service Name *</label>
                                <input type="text" name="service_name" class="form-control" value="{{ $service->name }}" placeholder="Enter service name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Page Headline / Main Banner Title</label>
                                <input type="text" name="banner_title" class="form-control" value="{{ $service->page_title }}" placeholder="e.g., Professional Electrical Work">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold text-slate-700">Short Description</label>
                                <textarea name="teaser_text" class="form-control" rows="2" placeholder="Enter brief intro lines here...">{{ $service->short_description }}</textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold text-slate-700">Long Description</label>
                                <textarea name="details_content" id="editor" class="form-control summernote" rows="6" placeholder="Enter full technical or service explanation...">{{ $service->long_description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- INCLUSIONS MATRIX (What's Included) -->
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                            <h5 class="fw-bold text-slate-800 mb-0">Service Included</h5>
                            <button type="button" onclick="addInclusionRow()" class="btn btn-sm btn-outline-primary rounded-pill px-3"><i class="ri-add-line"></i>  Add Feature</button>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-slate-700">Section Title</label>
                            <input type="text" name="features_section_title" class="form-control" value="{{ $service->features_title }}" placeholder="Section Heading (Default: What's Included)">
                        </div>

                        <div id="inclusion-container">
                            @foreach($service->items as $item)
                                <div class="row g-2 mb-2 alignment-item-node">
                                    <div class="col-md-4">
                                        <input type="text" name="item_titles[]" class="form-control" value="{{ $item->title }}" placeholder="Feature Title">
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" name="item_details[]" class="form-control" value="{{ $item->description }}" placeholder="Feature short description">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-light border text-danger w-100" onclick="this.closest('.alignment-item-node').remove()"><i class="ri-delete-bin-line"></i></button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- PRICING MATRIX -->
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                            <h5 class="fw-bold text-slate-800 mb-0">Rates & Pricing Table</h5>
                            <button type="button" onclick="addPriceRow()" class="btn btn-sm btn-outline-primary rounded-pill px-3"><i class="ri-add-line"></i> Add Rate Line</button>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-slate-700">Section Title</label>
                            <input type="text" name="pricing_section_title" class="form-control" value="{{ $service->pricing_title }}" placeholder="Section Heading (Default: Transparent Pricing)">
                        </div>

                        <div id="pricing-container">
                            @foreach($service->pricings as $prc)
                                <div class="row g-2 mb-2 alignment-item-node">
                                    <div class="col-md-7">
                                        <input type="text" name="rates_titles[]" class="form-control" value="{{ $prc->scope_name }}" placeholder="Service Scope Bounds (e.g., Per Hour)">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="rates_prices[]" class="form-control" value="{{ $prc->estimated_rate }}" placeholder="Price Range (e.g., $40 - $60)">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-light border text-danger w-100" onclick="this.closest('.alignment-item-node').remove()"><i class="ri-delete-bin-line"></i></button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- FAQs SECTION -->
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                            <h5 class="fw-bold text-slate-800 mb-0">Frequently Asked Questions (FAQs)</h5>
                            <button type="button" onclick="addFaqRow()" class="btn btn-sm btn-outline-primary rounded-pill px-3"><i class="ri-add-line"></i> Add FAQ</button>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-slate-700">Section Title</label>
                            <input type="text" name="faq_section_title" class="form-control" value="{{ $service->faq_title }}" placeholder="Section Heading (Default: Frequently Asked Questions)">
                        </div>

                        <div id="faq-container">
                            @if(!empty($service->faqs))
                                @foreach($service->faqs as $faq)
                                    <div class="border rounded-3 p-3 mb-2 alignment-item-node position-relative bg-light bg-opacity-50">
                                        <button type="button" class="btn btn-sm btn-circle btn-danger position-absolute top-0 end-0 m-2" onclick="this.closest('.alignment-item-node').remove()">×</button>
                                        <div class="mb-2">
                                            <label class="form-label small fw-semibold text-slate-700">Question</label>
                                            <input type="text" name="questions[]" class="form-control fw-semibold" value="{{ $faq['question'] }}" placeholder="Enter Question Here">
                                        </div>
                                        <div>
                                            <label class="form-label small fw-semibold text-slate-700">Answer</label>
                                            <textarea name="answers[]" class="form-control small" rows="2" placeholder="Enter Answer Here...">{{ $faq['answer'] }}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <!-- SIDEBAR CONTROLS -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                        <h5 class="fw-bold text-slate-800 mb-3 border-bottom pb-2">Visibility Status</h5>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-slate-700">Publication Status</label>
                            <select name="is_active" class="form-select">
                                <option value="1" {{ $service->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $service->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-slate-700">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control mb-2" value="{{ $service->phone }}" placeholder="e.g., +123456789">

                            <label class="form-label fw-semibold text-slate-700">WhatsApp Number</label>
                            <input type="text" name="whatsapp_number" class="form-control" value="{{ $service->whatsApp }}" placeholder="e.g., +123456789">
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                        <h5 class="fw-bold text-slate-800 mb-3 border-bottom pb-2">Main Cover Image</h5>
                        @if($service->hero_image)
                            <img src="{{ asset($service->hero_image) }}" class="img-fluid rounded-3 mb-2 w-50" style="max-height: 120px; object-fit: cover;">
                        @endif
                        <div class="mt-2">
                            <label class="form-label fw-semibold text-slate-700">Choose Cover Image</label>
                            <input type="file" name="cover_image" class="form-control">
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                        <h5 class="fw-bold text-slate-800 mb-3 border-bottom pb-2">Work Portfolio Gallery</h5>

                        <div class="d-flex flex-wrap gap-2 mb-3">
                            @foreach($service->gallery as $gl)
                                <div class="position-relative portfolio-image-wrapper" style="width: 100px; height: 100px;">
                                    <img src="{{ asset($gl->image_path) }}" class="img-thumbnail w-100 h-100" style="object-fit: cover;">
                                    <button type="button"
                                            class="btn btn-danger btn-sm p-0 d-flex align-items-center justify-content-center position-absolute rounded-circle delete-gallery-img"
                                            style="top: -5px; right: -5px; width: 22px; height: 22px; font-size: 11px; z-index: 10;"
                                            data-id="{{ $gl->id }}"
                                            title="Delete Image">
                                        <i class="ri-delete-bin-2-line"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-slate-700">Upload Gallery Images</label>
                            <input type="file" name="portfolio_images[]" class="form-control" multiple>
                        </div>
                        <div>
                            <label class="form-label fw-semibold text-slate-700">Gallery Section Heading</label>
                            <input type="text" name="gallery_section_title" class="form-control" value="{{ $service->gallery_title }}" placeholder="e.g., Our Latest Projects">
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                        <h5 class="fw-bold text-slate-800 mb-3 border-bottom pb-2">Bottom CTA Box</h5>
                        <div class="mb-2">
                            <label class="form-label fw-semibold text-slate-700">CTA Title</label>
                            <input type="text" name="action_title" class="form-control" value="{{ $service->cta_title }}" placeholder="e.g., Ready to get started?">
                        </div>
                        <div>
                            <label class="form-label fw-semibold text-slate-700">CTA Subtitle</label>
                            <textarea name="action_subtitle" class="form-control" rows="2" placeholder="e.g., Contact us today for a free consultation.">{{ $service->cta_subtitle }}</textarea>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <h5 class="fw-bold text-slate-800 mb-3 border-bottom pb-2">SEO Configurations</h5>
                        <div class="mb-2">
                            <label class="form-label fw-semibold text-slate-700">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" value="{{ $service->meta_title }}" placeholder="Enter SEO Meta Title">
                        </div>
                        <div>
                            <label class="form-label fw-semibold text-slate-700">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3" placeholder="Enter SEO Meta Description String...">{{ $service->meta_description }}</textarea>
                        </div>
                        <div>
                            <label class="form-label fw-semibold text-slate-700">Meta Keywords</label>
                            <textarea name="meta_keywords" class="form-control" rows="3" placeholder="Enter SEO Meta Keywords...">{{ $service->meta_keywords }}</textarea>
                            <small class="text-danger">Comma separated keywords</small>
                        </div>
                        <div>
                            <label class="form-label fw-semibold text-slate-700">Service Target Cities</label>
                            <textarea name="target_city" class="form-control" rows="3" placeholder="Enter SEO Target Cities...">{{ $service->target_city }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 border-start border-4 border-primary">
        <h5 class="fw-bold text-slate-800 mb-3 border-bottom pb-2 d-flex align-items-center">
            <i class="ri-search-eye-line text-primary me-2"></i> Advanced SEO Management
        </h5>

        @php
            // কনফিগারেশন সহজ করার জন্য রিলেশন ডেটা ভেরিয়েবলে সেট করা হলো
            $seo = $service->seo ?? null;
        @endphp

        <form action="{{ route('admin.seo.update_page', [ 'service' => 'service' , 'id' => $seo->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold text-slate-700">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ $seo->meta_title }}" placeholder="Enter SEO Meta Title">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold text-slate-700">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3" placeholder="Enter SEO Meta Description String...">{{ $seo->meta_description }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold text-slate-700">Meta Keywords</label>
                    <textarea name="meta_keywords" class="form-control" rows="3" placeholder="Enter SEO Meta Keywords...">{{ $seo->meta_keywords }}</textarea>
                    <small class="text-danger">Comma separated keywords</small>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold text-slate-700">Canonical URL</label>
                    <input type="url" name="canonical_url" class="form-control" value="{{ $seo->canonical_url ?? '' }}" placeholder="https://example.com/custom-link">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold text-slate-700">Meta Robots Directive</label>
                    <select name="meta_robots" class="form-select">
                        <option value="index, follow" {{ ($seo->meta_robots ?? 'index, follow') == 'index, follow' ? 'selected' : '' }}>INDEX, FOLLOW (Default)</option>
                        <option value="noindex, nofollow" {{ ($seo->meta_robots ?? '') == 'noindex, nofollow' ? 'selected' : '' }}>NOINDEX, NOFOLLOW</option>
                        <option value="index, nofollow" {{ ($seo->meta_robots ?? '') == 'index, nofollow' ? 'selected' : '' }}>INDEX, NOFOLLOW</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold text-slate-700">Social Share Image (Meta Image)</label>
                    @if($seo && $seo->meta_image)
                        <div class="mb-2">
                            <img src="{{ asset($seo->meta_image) }}" class="img-thumbnail" style="max-height: 80px;">
                        </div>
                    @endif
                    <input type="file" name="meta_image" class="form-control">
                    <small class="text-muted">Recommended size: 1200x630px (OG Image Ratio)</small>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold text-slate-700 text-danger d-flex align-items-center">
                        <i class="ri-code-box-line me-1"></i> Structured Schema Script (LD+JSON)
                    </label>
                    <textarea name="schema_script" class="form-control text-monospace small" rows="20" style="font-family: monospace; font-size: 13px;" placeholder="<script type='application/ld+json'>\n...\n</script>">{{ $seo->schema_script ?? '' }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold text-slate-700 text-info d-flex align-items-center">
                        <i class="ri-braces-line me-1"></i> GTM DataLayer JSON
                    </label>
                    <textarea name="datalayer_json" class="form-control text-monospace small" rows="20" style="font-family: monospace; font-size: 13px;" placeholder="{ 'event': 'service_view', 'category': 'Cleaning' }">{{ $seo->datalayer_json ?? '' }}</textarea>
                </div>
            </div>
            <div class="p-3 text-end">
                <button type="submit" class="btn btn-primary px-5 fw-bold rounded-3">Save Seo Configurations</button>
            </div>
        </form>

    </div>
    <!-- Dynamic Fields Handler Script -->
    <script>
        function addInclusionRow() {
            let node = `<div class="row g-2 mb-2 alignment-item-node">
                <div class="col-md-4"><input type="text" name="item_titles[]" class="form-control" placeholder="Feature Title"></div>
                <div class="col-md-7"><input type="text" name="item_details[]" class="form-control" placeholder="Feature short description"></div>
                <div class="col-md-1"><button type="button" class="btn btn-light border text-danger w-100" onclick="this.closest('.alignment-item-node').remove()"><i class="ri-delete-bin-line"></i></button></div>
            </div>`;
            document.getElementById('inclusion-container').insertAdjacentHTML('beforeend', node);
        }
        function addPriceRow() {
            let node = `<div class="row g-2 mb-2 alignment-item-node">
                <div class="col-md-7"><input type="text" name="rates_titles[]" class="form-control" placeholder="Service Scope Bounds (e.g., Per Hour)"></div>
                <div class="col-md-4"><input type="text" name="rates_prices[]" class="form-control" placeholder="Price Range (e.g., $40 - $60)"></div>
                <div class="col-md-1"><button type="button" class="btn btn-light border text-danger w-100" onclick="this.closest('.alignment-item-node').remove()"><i class="ri-delete-bin-line"></i></button></div>
            </div>`;
            document.getElementById('pricing-container').insertAdjacentHTML('beforeend', node);
        }
        function addFaqRow() {
            let node = `<div class="border rounded-3 p-3 mb-2 alignment-item-node position-relative bg-light bg-opacity-50">
                <button type="button" class="btn btn-sm btn-circle btn-danger position-absolute top-0 end-0 m-2" onclick="this.closest('.alignment-item-node').remove()">×</button>
                <div class="mb-2">
                    <label class="form-label small fw-semibold text-slate-700">Question</label>
                    <input type="text" name="questions[]" class="form-control fw-semibold" placeholder="Enter Question Here">
                </div>
                <div>
                    <label class="form-label small fw-semibold text-slate-700">Answer</label>
                    <textarea name="answers[]" class="form-control small" rows="2" placeholder="Enter Answer Here..."></textarea>
                </div>
            </div>`;
            document.getElementById('faq-container').insertAdjacentHTML('beforeend', node);
        }
    </script>
    <script>
        document.querySelectorAll('.delete-gallery-img').forEach(button => {
            button.addEventListener('click', function() {
                let wrapper = this.closest('.portfolio-image-wrapper');
                let imageId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Are you sure to delete ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes , Delete the file',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let baseUrl = "{{ route('gallery.image.delete', ':id') }}";
                        let deleteUrl = baseUrl.replace(':id', imageId);
                        fetch(deleteUrl, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            }
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    wrapper.remove();
                                    Swal.fire('delete!', data.message, 'success');
                                } else {
                                    Swal.fire('Failed!', 'Please try again', 'error');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                Swal.fire('wrong!', 'server did not responde', 'error');
                            });

                    }
                });
            });
        });
    </script>
@endsection
