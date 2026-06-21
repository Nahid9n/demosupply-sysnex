@extends('backEnd.layout.master')
@section('body')
    <div class=" py-4">
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold text-slate-900 mb-0">Create Service</h4>
                    <p class="text-muted small mb-0">Fill out service operational modules.</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.services.index') }}" class="btn btn-light border rounded-3 px-4 py-2 fw-semibold">Cancel</a>
                    <button type="submit" class="btn btn-primary rounded-3 px-4 py-2 fw-semibold">Save Service</button>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-8">
                    <!-- CORE SETTINGS -->
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                        <h5 class="fw-bold text-slate-800 mb-3 border-bottom pb-2">1. Core Information</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Service Name *</label>
                                <input type="text" name="service_name" class="form-control" placeholder="e.g., Electrical Work" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Page Headline / Main Banner Title</label>
                                <input type="text" name="banner_title" class="form-control" placeholder="e.g., Professional Electrical Work & Repair Services">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold text-slate-700">Short Description</label>
                                <textarea name="teaser_text" class="form-control" rows="2" placeholder="Enter brief intro lines here..."></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold text-slate-700">Detailed Description</label>
                                <textarea name="details_content" id="editor" class="form-control summernote" rows="5" placeholder="Enter full technical or service explanation..."></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- INCLUSIONS MATRIX (What's Included) -->
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                            <h5 class="fw-bold text-slate-800 mb-0">2. Service Inclusions</h5>
                            <button type="button" onclick="addInclusionRow()" class="btn btn-sm btn-outline-primary rounded-pill px-3">+ Add Feature</button>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-slate-700">Section Title</label>
                            <input type="text" name="features_section_title" class="form-control" placeholder="Section Heading (Default: What's Included in This Service)">
                        </div>

                        <div id="inclusion-container">
                            <div class="row g-2 mb-2 alignment-item-node">
                                <div class="col-md-4">
                                    <input type="text" name="item_titles[]" class="form-control" placeholder="Feature Title">
                                </div>
                                <div class="col-md-7">
                                    <input type="text" name="item_details[]" class="form-control" placeholder="Feature short description">
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-light border text-danger w-100" onclick="this.closest('.alignment-item-node').remove()">×</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PRICING MATRIX -->
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                            <h5 class="fw-bold text-slate-800 mb-0">3. Rates & Pricing Table</h5>
                            <button type="button" onclick="addPriceRow()" class="btn btn-sm btn-outline-primary rounded-pill px-3">+ Add Rate Line</button>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-slate-700">Section Title</label>
                            <input type="text" name="pricing_section_title" class="form-control" placeholder="Section Heading (Default: Transparent Pricing)">
                        </div>

                        <div id="pricing-container">
                            <div class="row g-2 mb-2 alignment-item-node">
                                <div class="col-md-7">
                                    <input type="text" name="rates_titles[]" class="form-control" placeholder="Service Scope Bounds (e.g., Per Hour)">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="rates_prices[]" class="form-control" placeholder="Price Range (e.g., $40 - $60 / Quote Only)">
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-light border text-danger w-100" onclick="this.closest('.alignment-item-node').remove()">×</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FAQs SECTION -->
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                            <h5 class="fw-bold text-slate-800 mb-0">4. Frequently Asked Questions (FAQs)</h5>
                            <button type="button" onclick="addFaqRow()" class="btn btn-sm btn-outline-primary rounded-pill px-3">+ Add FAQ</button>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-slate-700">Section Title</label>
                            <input type="text" name="faq_section_title" class="form-control" placeholder="Section Heading (Default: Frequently Asked Questions)">
                        </div>

                        <div id="faq-container">
                            <div class="border rounded-3 p-3 mb-2 alignment-item-node position-relative bg-light bg-opacity-50">
                                <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-2" onclick="this.closest('.alignment-item-node').remove()">×</button>
                                <div class="mb-2">
                                    <label class="form-label small fw-semibold text-slate-700">Question</label>
                                    <input type="text" name="questions[]" class="form-control fw-semibold" placeholder="Enter Question Here">
                                </div>
                                <div>
                                    <label class="form-label small fw-semibold text-slate-700">Answer</label>
                                    <textarea name="answers[]" class="form-control small" rows="2" placeholder="Enter Answer Here..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SIDEBAR BAR OPTIONS -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                        <h5 class="fw-bold text-slate-800 mb-3 border-bottom pb-2">Visibility Status</h5>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-slate-700">Publication Status</label>
                            <select name="is_active" class="form-select">
                                <option value="1">Active / Live on Web</option>
                                <option value="0">Disabled / Draft</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-slate-700">Phone Number Override</label>
                            <input type="text" name="phone_number" class="form-control mb-2" placeholder="e.g., +123456789">

                            <label class="form-label fw-semibold text-slate-700">WhatsApp Number Override</label>
                            <input type="text" name="whatsapp_number" class="form-control" placeholder="e.g., +123456789">
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                        <h5 class="fw-bold text-slate-800 mb-3 border-bottom pb-2">Main Cover Image</h5>
                        <div class="mb-2">
                            <label class="form-label fw-semibold text-slate-700">Choose Cover Image</label>
                            <input type="file" name="cover_image" class="form-control mb-1">
                        </div>
                        <span class="text-muted small">Supports: jpeg, png, webp up to 2MB.</span>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                        <h5 class="fw-bold text-slate-800 mb-3 border-bottom pb-2">Work Portfolio Gallery</h5>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-slate-700">Upload Gallery Images</label>
                            <input type="file" name="portfolio_images[]" class="form-control mb-2" multiple>
                        </div>
                        <div>
                            <label class="form-label fw-semibold text-slate-700">Gallery Section Heading</label>
                            <input type="text" name="gallery_section_title" class="form-control" placeholder="e.g., Our Latest Projects">
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                        <h5 class="fw-bold text-slate-800 mb-3 border-bottom pb-2">Bottom CTA Box</h5>
                        <div class="mb-2">
                            <label class="form-label fw-semibold text-slate-700">CTA Title</label>
                            <input type="text" name="action_title" class="form-control mb-2" placeholder="e.g., Ready to get started?">
                        </div>
                        <div>
                            <label class="form-label fw-semibold text-slate-700">CTA Subtitle</label>
                            <textarea name="action_subtitle" class="form-control" rows="2" placeholder="e.g., Contact us today for a free consultation."></textarea>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <h5 class="fw-bold text-slate-800 mb-3 border-bottom pb-2">SEO Configurations</h5>
                        <div class="mb-2">
                            <label class="form-label fw-semibold text-slate-700">Meta Title</label>
                            <input type="text" name="seo_title" class="form-control mb-2" placeholder="Enter SEO Meta Title">
                        </div>
                        <div>
                            <label class="form-label fw-semibold text-slate-700">Meta Description</label>
                            <textarea name="seo_description" class="form-control" rows="3" placeholder="Enter SEO Meta Description String..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        function addInclusionRow() {
            let node = `<div class="row g-2 mb-2 alignment-item-node">
            <div class="col-md-4"><input type="text" name="item_titles[]" class="form-control" placeholder="Feature Title"></div>
            <div class="col-md-7"><input type="text" name="item_details[]" class="form-control" placeholder="Feature short description"></div>
            <div class="col-md-1"><button type="button" class="btn btn-light border text-danger w-100" onclick="this.closest('.alignment-item-node').remove()">×</button></div>
        </div>`;
            document.getElementById('inclusion-container').insertAdjacentHTML('beforeend', node);
        }
        function addPriceRow() {
            let node = `<div class="row g-2 mb-2 alignment-item-node">
            <div class="col-md-7"><input type="text" name="rates_titles[]" class="form-control" placeholder="Service Scope Bounds (e.g., Per Hour)"></div>
            <div class="col-md-4"><input type="text" name="rates_prices[]" class="form-control" placeholder="Price Range (e.g., $40 - $60 / Quote Only)"></div>
            <div class="col-md-1"><button type="button" class="btn btn-light border text-danger w-100" onclick="this.closest('.alignment-item-node').remove()">×</button></div>
        </div>`;
            document.getElementById('pricing-container').insertAdjacentHTML('beforeend', node);
        }
        function addFaqRow() {
            let node = `<div class="border rounded-3 p-3 mb-2 alignment-item-node position-relative bg-light bg-opacity-50">
            <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-2" onclick="this.closest('.alignment-item-node').remove()">×</button>
            <div class="mb-2">
                <label class="form-label small fw-semibold text-slate-700">Question</label>
                <input type="text" name="questions[]" class="form-control mb-2 fw-semibold" placeholder="Enter Question Here">
            </div>
            <div>
                <label class="form-label small fw-semibold text-slate-700">Answer</label>
                <textarea name="answers[]" class="form-control small" rows="2" placeholder="Enter Answer Here..."></textarea>
            </div>
        </div>`;
            document.getElementById('faq-container').insertAdjacentHTML('beforeend', node);
        }
    </script>
@endsection
