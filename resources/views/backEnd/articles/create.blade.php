@extends('backEnd.layout.master')
@section('content','Create')
@section('body')
    <div class="">
        <div class="d-flex justify-content-between align-items-center mb-4" style="margin: 0 auto;">
            <h2 class="h4 fw-bold text-secondary">Create Premium Article</h2>
            <a href="{{ route('admin.article.index') }}" class="btn btn-danger border"><i class="fa-solid fa-arrow-left me-2"></i>Back to List</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger mx-auto" style="max-width: 1000px;">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card border-0 shadow-sm mx-auto">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('admin.article.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-4">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold text-secondary">Article Title</label>
                            <input type="text" name="title" id="article_title" class="form-control py-2" value="{{ old('title') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-secondary">Category</label>
                            <select name="category_id" id="article_category" class="form-select py-2" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" data-name="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label fw-semibold text-secondary">Featured Image</label>
                            <input type="file" name="image" class="form-control py-2">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-secondary">Read Time (Minutes)</label>
                            <input type="number" name="read_time" class="form-control py-2" value="5" min="1">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold text-secondary">Short Summary (For Grid/Listing Cards)</label>
                            <textarea name="summary" id="article_summary" class="form-control" rows="2" placeholder="Write a catchy 2-line intro..." required>{{ old('summary') }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold text-secondary">Full Article Content</label>
                            <textarea name="content" class="summernote" required>{{ old('content') }}</textarea>
                        </div>
                    </div>

                    <div class="mt-5 pt-4 border-top">
                        <h4 class="h5 fw-bold text-primary mb-3"><i class="fa-solid fa-globe me-2"></i>Advanced SEO Configuration</h4>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-secondary">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" maxlength="60" class="form-control" placeholder="Defaults to Article Title">
                                <small class="text-muted"><span id="title_count">0</span>/60 characters</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-secondary">Robots Content</label>
                                <select name="meta_robots" class="form-select">
                                    <option value="index, follow">index, follow</option>
                                    <option value="noindex, nofollow">noindex, nofollow</option>
                                    <option value="index, nofollow">index, nofollow</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold text-secondary">Meta Description</label>
                                <textarea name="meta_description" id="meta_desc" maxlength="160" class="form-control" rows="2" placeholder="Defaults to Short Summary"></textarea>
                                <small class="text-muted"><span id="desc_count">0</span>/160 characters</small>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold text-secondary">Meta Keywords (Comma separated)</label>
                                <input type="text" name="meta_keywords" class="form-control" placeholder="e.g., electrolytes, healthy hydration, aquanova tech">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold text-secondary">Canonical URL</label>
                                <input type="url" name="canonical_url" class="form-control" placeholder="https://yourdomain.com/custom-canonical-link">
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-3 d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-primary px-5 py-2 fw-semibold">Publish Now</button>
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
        // jQuery এর $ চিহ্নের ওপর ডিপেন্ডেন্সি এড়াতে নো-কনফ্লিক্ট সেফ মোড
        if (typeof jQuery !== 'undefined') {
            jQuery(document).ready(function($) {
                ($('.summernote').length) && $('.summernote').summernote({
                    height: 350,
                    placeholder: 'Write blood dripping epic content here...'
                });
            });
        }
    </script>
@endsection
