@extends('backEnd.layout.master')

@section('body')
    <div class="">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 fw-bold">Categories</h2>
            <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#categoryModal" onclick="openCreateModal()">
                + Add New Category
            </button>
        </div>
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-primary text-uppercase text-wrap fs-6 fw-bold text-slate-700">
                        <tr>
                            <th class="ps-4 text-white">SL</th>
                            <th class=" text-white">Category Name</th>
                            <th class=" text-white">Slug</th>
                            <th class=" text-white">Total Articles</th>
                            <th class="text-end pe-4 text-white">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $key => $category)
                            <tr>
                                <td class="ps-4">{{ $key + 1 }}</td>
                                <td class="fw-bold text-secondary">{{ $category->name }}</td>
                                <td><span class="badge bg-light text-dark">{{ $category->slug }}</span></td>
                                <td>
                                    <span class="badge bg-soft-primary px-2 py-1" style="background-color: rgba(13,110,253,0.1); color: #0d6efd;">
                                        {{ $category->articles_count ?? 0 }} Articles
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    <button type="button"
                                            class="btn btn-sm btn-outline-secondary me-2"
                                            data-bs-toggle="modal"
                                            data-bs-target="#categoryModal"
                                            onclick="openEditModal({{ $category->id }}, '{{ $category->name }}')">
                                        Edit
                                    </button>

                                    <form action="{{ route('admin.article.category.delete', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this category?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">No categories found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold text-secondary" id="categoryModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="categoryForm" action="{{ route('admin.article.category.store') }}" method="POST">
                    @csrf
                    <div id="methodField"></div>

                    <div class="modal-body py-4">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label fw-semibold text-secondary">Category Name</label>
                            <input type="text" name="name" id="categoryName" class="form-control" placeholder="e.g., Health & Hydration" required>
                        </div>
                    </div>
                    <div class="modal-footer bg-light border-top-0">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" id="submitBtn" class="btn btn-primary px-4">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Laravel Route Names ডাইনামিকালি জাভাস্ক্রিপ্ট ভ্যারিয়েবলে নেওয়া হলো
        const storeRoute  = "{{ route('admin.article.category.store') }}";
        const updateRouteTemplate = "{{ route('admin.article.category.update', ':id') }}";

        // যখন Create বাটনে ক্লিক করা হবে
        function openCreateModal() {
            document.getElementById('categoryModalLabel').innerText = "Add New Category";
            document.getElementById('categoryForm').action = storeRoute;
            document.getElementById('categoryName').value = "";
            document.getElementById('methodField').innerHTML = ""; // POST রিকোয়েস্ট তাই মেথড ফাঁকা
            document.getElementById('submitBtn').innerText = "Save Category";
            document.getElementById('submitBtn').className = "btn btn-primary px-4";
        }

        // যখন Edit বাটনে ক্লিক করা হবে
        function openEditModal(id, name) {
            document.getElementById('categoryModalLabel').innerText = "Edit Category";

            // Route Name টেমপ্লেট থেকে :id প্লেসহোল্ডারটি ডাইনামিক আইডি দিয়ে রিপ্লেস করা হলো
            let finalUpdateRoute = updateRouteTemplate.replace(':id', id);

            document.getElementById('categoryForm').action = finalUpdateRoute;
            document.getElementById('categoryName').value = name;

            // PUT মেথড ইনজেক্ট করা হচ্ছে
            document.getElementById('methodField').innerHTML = `@method('PUT')`;
            document.getElementById('submitBtn').innerText = "Update Category";
            document.getElementById('submitBtn').className = "btn btn-success text-white px-4";
        }
    </script>
@endsection
