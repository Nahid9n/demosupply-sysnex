@extends('backEnd.layout.master')
@section('content','Edit')
@section('body')
    <div class="">
        <div class="d-flex justify-content-between align-items-center mb-4" style="margin: 0 auto;">
            <h2 class="h4 fw-bold text-secondary">Modify Article: {{ Str::limit($article->title, 30) }}</h2>
            <a href="{{ route('admin.article.index') }}" class="btn btn-danger border"><i class="fa-solid fa-arrow-left me-2"></i>Back to List</a>
        </div>
        <div class="card border-0 shadow-sm mx-auto">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('admin.article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-secondary">Article Title</label>
                            <input type="text" name="title" id="article_title" class="form-control py-2" value="{{ old('title', $article->title) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-secondary">Slug</label>
                            <input type="text" name="slug" id="article_slug" class="form-control py-2" value="{{ old('slug', $article->slug) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-secondary">Category</label>
                            <select name="category_id" class="form-select py-2" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-secondary">Featured Image</label>
                            <input type="file" name="image" class="form-control py-2">
                            @if($article->image)
                                <div class="mt-2">
                                    <img src="{{ asset($article->image) }}" class="rounded-2 border" style="height: 55px; width: 90px; object-fit: cover;" alt="Current Thumbnail">
                                    <small class="text-muted d-block mt-1">Current cover photo</small>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-secondary">Read Time (Minutes)</label>
                            <input type="number" name="read_time" class="form-control py-2" value="{{ old('read_time', $article->read_time) }}" min="1">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold text-secondary">Short Summary (For Grid/Listing Cards)</label>
                            <textarea name="summary" class="form-control" rows="2" required>{{ old('summary', $article->summary) }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold text-secondary">Full Article Content</label>
                            <textarea name="content" class="summernote" required>{{ old('content', $article->content) }}</textarea>
                        </div>
                    </div>

                    <div class="mt-5 pt-4 border-top">
                        <h4 class="h5 fw-bold text-success mb-3"><i class="fa-solid fa-square-rss me-2"></i>Update SEO Meta</h4>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-secondary">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" maxlength="60" class="form-control" value="{{ old('meta_title', $article->seo->meta_title ?? '') }}" placeholder="Defaults to Article Title">
                                <small class="text-muted"><span id="title_count">0</span>/60 characters</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-secondary">Robots Content</label>
                                <select name="meta_robots" class="form-select">
                                    <option value="index, follow" {{ old('meta_robots', $article->seo->meta_robots ?? '') == 'index, follow' ? 'selected' : '' }}>index, follow</option>
                                    <option value="noindex, nofollow" {{ old('meta_robots', $article->seo->meta_robots ?? '') == 'noindex, nofollow' ? 'selected' : '' }}>noindex, nofollow</option>
                                    <option value="index, nofollow" {{ old('meta_robots', $article->seo->meta_robots ?? '') == 'index, nofollow' ? 'selected' : '' }}>index, nofollow</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold text-secondary">Meta Description</label>
                                <textarea name="meta_description" id="meta_desc" maxlength="160" class="form-control" rows="2" placeholder="Defaults to Short Summary">{{ old('meta_description', $article->seo->meta_description ?? '') }}</textarea>
                                <small class="text-muted"><span id="desc_count">0</span>/160 characters</small>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold text-secondary">Meta Keywords (Comma separated)</label>
                                <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords', $article->seo->meta_keywords ?? '') }}" placeholder="e.g., electrolytes, healthy hydration">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold text-secondary">Canonical URL</label>
                                <input type="url" name="canonical_url" class="form-control" value="{{ old('canonical_url', $article->seo->canonical_url ?? '') }}" placeholder="https://yourdomain.com/custom-canonical-link">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-secondary">Schema Script (JSON-LD)</label>
                                <textarea name="schema_script" readonly class="form-control fs-5 font-monospace" rows="25" style="font-size: 13px;" placeholder='<script type="application/ld+json">...</script>'>{{ old('schema_script', $article->seo->schema_script ?? '') }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-secondary">DataLayer JSON</label>
                                <textarea name="datalayer_json" readonly class="form-control fs-5 font-monospace" rows="25" style="font-size: 13px;" placeholder='{ "event": "articleView" }'>{{ old('datalayer_json', $article->seo->datalayer_json ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-3 d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-success text-white px-5 py-2 fw-semibold">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.js"></script>
    <script>
        $('.summernote').summernote({ height: 350 });

        /// 🚀 সুপার ফাস্ট অটো-স্লাগ জেনারেটর (Pure JS)
        document.getElementById('article_title').addEventListener('keyup', function() {
            let text = this.value;

            let slug = text.toLowerCase()
                .replace(/[^a-z0-9\u0980-\u09FF\s-]/g, '') // শুধুমাত্র ইংরেজি, বাংলা এবং স্পেস রাখবে, বাকি সব বাদ
                .replace(/\s+/g, '-')                    // সব স্পেসকে ড্যাশ (-) বানাবে
                .replace(/-+/g, '-');                    // একাধিক ড্যাশ পাশাপাশি থাকলে একটা বানাবে

            // স্লাগ ইনপুটে ভ্যালু সেট করা এবং শুরুর/শেষের ড্যাশ ট্রিম করা
            document.getElementById('article_slug').value = slug.replace(/^-+|-+$/g, '');
        });

        // Realtime Character Counters
        let titleInput = document.getElementById('meta_title');
        let descInput = document.getElementById('meta_desc');

        document.getElementById('title_count').innerText = titleInput.value.length;
        document.getElementById('desc_count').innerText = descInput.value.length;

        titleInput.addEventListener('input', function() {
            document.getElementById('title_count').innerText = this.value.length;
        });
        descInput.addEventListener('input', function() {
            document.getElementById('desc_count').innerText = this.value.length;
        });
    </script>
@endsection
