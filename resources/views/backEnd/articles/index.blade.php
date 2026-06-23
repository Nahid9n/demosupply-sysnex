@extends('backEnd.layout.master')
@section('body')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 fw-bold">All Articles</h2>
            <a href="{{ route('admin.article.create') }}" class="btn btn-primary px-4">+ Add New Article</a>
        </div>
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                        <tr>
                            <th class="ps-4">SL</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Read Time</th>
                            <th>SEO Meta</th>
                            <th class="text-end pe-4">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($articles as $key => $article)
                            <tr>
                                <td class="ps-4">{{ $key + 1 }}</td>
                                <td>
                                    <img src="{{ $article->image ? asset($article->image) : '' }}"
                                         class="rounded-2" style="width: 150px; object-fit: cover;" alt="Thumbnail">
                                </td>
                                <td>
                                    <div class="fw-bold text-secondary text-truncate" style="max-width: 250px;">{{ $article->title }}</div>
                                    <small class="text-muted">Published: {{ $article->created_at->format('d M, Y') }}</small>
                                </td>
                                <td><span class="badge bg-light text-dark border">{{ $article->category->name }}</span></td>
                                <td>{{ $article->read_time }} Mins</td>
                                <td>
                                    @if($article->seo)
                                        <span class="badge bg-success-subtle text-success px-2 py-1" style="font-size: 11px;">Configured</span>
                                    @else
                                        <span class="badge bg-warning-subtle text-warning px-2 py-1" style="font-size: 11px;">Missing</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    <a href="{{ route('admin.article.edit', $article->id) }}" class="btn btn-sm btn-outline-secondary me-2">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.article.delete', $article->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this article?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No articles found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
