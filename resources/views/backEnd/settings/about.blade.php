@extends('backEnd.layout.master')
@section('title', 'Edit About Us Settings')
@section('body')
    <div class="py-4">
        <div class="mb-4">
            <h4 class="fw-bold text-slate-900 mb-1"> About Us</h4>
            <p class="text-muted small">Update all dynamic About Us web Bbuilder.</p>
        </div>
        <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">

                    <!-- 1. HERO CONFIGURATION -->
                    <h5 class="fw-bold text-primary mb-3"><i class="ri-window-line"></i> 1. Premium Hero Frame</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Hero Eyebrow</label>
                            <input type="text" name="hero_eyebrow" class="form-control" value="{{ $about->hero_eyebrow }}">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Hero Title</label>
                            <input type="text" name="hero_title" class="form-control" value="{{ $about->hero_title }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Hero Description</label>
                            <textarea name="hero_description" class="form-control" rows="2">{{ $about->hero_description }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Hero Image Thumbnail</label>
                            <input type="file" name="hero_image" class="form-control" accept="image/*">
                            @if($about->hero_image)
                                <img src="{{ asset($about->hero_image) }}" class="img-thumbnail mt-2" style="height: 80px;">
                            @endif
                        </div>
                    </div>
                    <hr>

                    <!-- 2. STORY CONFIGURATION -->
                    <h5 class="fw-bold text-primary mb-3 mt-3"><i class="ri-book-open-line"></i> 2. Who We Are / Corporate Story</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Story Eyebrow</label>
                            <input type="text" name="story_eyebrow" class="form-control" value="{{ $about->story_eyebrow }}">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Story Main Title</label>
                            <input type="text" name="story_title" class="form-control" value="{{ $about->story_title }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Description Paragraph 1</label>
                            <textarea name="story_description_1" class="form-control" rows="3">{{ $about->story_description_1 }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Description Paragraph 2</label>
                            <textarea name="story_description_2" class="form-control" rows="3">{{ $about->story_description_2 }}</textarea>
                        </div>
                        <div class="col-md-3"><label class="form-label small font-monospace">Feature 1</label><input type="text" name="story_feature_1" class="form-control" value="{{ $about->story_feature_1 }}"></div>
                        <div class="col-md-3"><label class="form-label small font-monospace">Feature 2</label><input type="text" name="story_feature_2" class="form-control" value="{{ $about->story_feature_2 }}"></div>
                        <div class="col-md-3"><label class="form-label small font-monospace">Feature 3</label><input type="text" name="story_feature_3" class="form-control" value="{{ $about->story_feature_3 }}"></div>
                        <div class="col-md-3"><label class="form-label small font-monospace">Feature 4</label><input type="text" name="story_feature_4" class="form-control" value="{{ $about->story_feature_4 }}"></div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Story Left Side Image</label>
                            <input type="file" name="story_image" class="form-control" accept="image/*">
                            @if($about->story_image)
                                <img src="{{ asset($about->story_image) }}" class="img-thumbnail mt-2" style="height: 80px;">
                            @endif
                        </div>
                    </div>
                    <hr>

                    <!-- 3. STRATEGIC PILLARS -->
                    <h5 class="fw-bold text-primary mb-3 mt-3"><i class="ri-focus-3-line"></i> 3. Strategic Pillars</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-success">Vision Statement</label>
                            <textarea name="vision_text" class="form-control" rows="3">{{ $about->vision_text }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-warning">Mission Statement</label>
                            <textarea name="mission_text" class="form-control" rows="3">{{ $about->mission_text }}</textarea>
                        </div>
                    </div>
                    <hr>

                    <!-- 4. METRICS / COUNTERS -->
                    <h5 class="fw-bold text-primary mb-3 mt-3"><i class="ri-speed-up-line"></i> 4. Performance Metrics</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-3">
                            <label class="form-label small">Metric 1 (e.g. 10+)</label>
                            <input type="text" name="metric_count_1" class="form-control" value="{{ $about->metric_count_1 }}">
                            <input type="text" name="metric_title_1" class="form-control mt-1" placeholder="Title" value="{{ $about->metric_title_1 }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small">Metric 2 (e.g. 500+)</label>
                            <input type="text" name="metric_count_2" class="form-control" value="{{ $about->metric_count_2 }}">
                            <input type="text" name="metric_title_2" class="form-control mt-1" placeholder="Title" value="{{ $about->metric_title_2 }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small">Metric 3 (e.g. 1000+)</label>
                            <input type="text" name="metric_count_3" class="form-control" value="{{ $about->metric_count_3 }}">
                            <input type="text" name="metric_title_3" class="form-control mt-1" placeholder="Title" value="{{ $about->metric_title_3 }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small">Metric 4 (e.g. 50+)</label>
                            <input type="text" name="metric_count_4" class="form-control" value="{{ $about->metric_count_4 }}">
                            <input type="text" name="metric_title_4" class="form-control mt-1" placeholder="Title" value="{{ $about->metric_title_4 }}">
                        </div>
                    </div>
                    <hr>

                    <!-- 5. STRUCTURAL VALUES -->
                    <h5 class="fw-bold text-primary mb-3 mt-3"><i class="ri-shield-star-line"></i> 5. Structural Core Values</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <input type="text" name="value_title_1" class="form-control fw-bold" placeholder="Value Title 1" value="{{ $about->value_title_1 }}">
                            <textarea name="value_desc_1" class="form-control mt-1" rows="2" placeholder="Description">{{ $about->value_desc_1 }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="value_title_1" class="form-control fw-bold" placeholder="Value Title 2" value="{{ $about->value_title_2 }}">
                            <textarea name="value_desc_2" class="form-control mt-1" rows="2" placeholder="Description">{{ $about->value_desc_2 }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="value_title_3" class="form-control fw-bold" placeholder="Value Title 3" value="{{ $about->value_title_3 }}">
                            <textarea name="value_desc_3" class="form-control mt-1" rows="2" placeholder="Description">{{ $about->value_desc_3 }}</textarea>
                        </div>
                    </div>
                    <hr>

                    <!-- 6. CTA FRAME -->
                    <h5 class="fw-bold text-primary mb-3 mt-3"><i class="ri-discuss-line"></i> 6. Bottom Call-To-Action Layout</h5>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">CTA Title</label>
                            <input type="text" name="cta_title" class="form-control" value="{{ $about->cta_title }}">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">CTA Subtitle/Description</label>
                            <input type="text" name="cta_description" class="form-control" value="{{ $about->cta_description }}">
                        </div>
                    </div>

                </div>
                <div class="card-footer bg-light p-3 text-end border-top">
                    <button type="submit" class="btn btn-primary px-5 rounded-3 fw-semibold">Update About Us Screen</button>
                </div>
            </div>
        </form>
    </div>
@endsection
