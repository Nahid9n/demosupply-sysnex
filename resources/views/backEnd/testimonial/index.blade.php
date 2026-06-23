@extends('backEnd.layout.master')
@section('title', 'Testimonials Management')
@section('body')
    <div class="">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold text-slate-900 mb-0">Testimonials List</h4>
                <p class="text-muted small mb-0">Manage and view all client reviews and ratings through popup modals.</p>
            </div>
            <div>
                <button type="button" class="btn btn-secondary rounded-3 px-4 py-2 fw-semibold" onclick="openCreateModal()">
                    <i class="ri-add-line"></i> Add New Testimonial
                </button>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden" style="font-size: 14px">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-primary text-uppercase text-wrap fs-6 fw-bold text-slate-700">
                    <tr>
                        <th scope="col" class="ps-4 py-3 text-white" style="width: 60px;">ID</th>
                        <th scope="col" class="py-3 text-white" style="width: 80px;">Photo</th>
                        <th scope="col" class="py-3 text-white">Client Details</th>
                        <th scope="col" class="py-3 text-white">Review</th>
                        <th scope="col" class="py-3 text-white" style="width: 120px;">Rating</th>
                        <th scope="col" class="py-3 text-white" style="width: 110px;">Status</th>
                        <th scope="col" class="text-end pe-4 py-3 text-white" style="width: 130px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="border-top-0">
                    @forelse($testimonials as $testimonial)
                        <tr class="align-top">
                            <td class="ps-4 fw-semibold text-muted">#{{ $testimonial->id }}</td>
                            <td>
                                @if($testimonial->image)
                                    <img src="{{ asset($testimonial->image) }}" class="rounded-circle border current-row-img"
                                         style="width: 45px; height: 45px; object-fit: cover;" alt="{{ $testimonial->name }}">
                                @else
                                    <div class="rounded-circle bg-secondary bg-opacity-10 text-secondary d-flex align-items-center justify-content-center fw-bold border"
                                         style="width: 45px; height: 45px; font-size: 14px;">
                                        {{ strtoupper(substr($testimonial->name, 0, 2)) }}
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-bold text-slate-800 mb-0 client-name">{{ $testimonial->name }}</div>
                                <span class="text-muted client-designation">{{ $testimonial->designation }}</span>
                                <span class="text-muted d-none client-company">{{ $testimonial->company_name }}</span>
                            </td>
                            <td class="text-wrap">
                                <p class="mb-0 client-review" style="max-width: 280px;" title="{{ $testimonial->review }}">
                                    {{ $testimonial->review ?? 'No review text provided.' }}
                                </p>
                            </td>
                            <td>
                                <span class="fw-semibold text-slate-800 client-rating-val">{{ $testimonial->rating ?? 0 }}</span>/5 Stars
                            </td>
                            <td>
                                @if($testimonial->status == 1)
                                    <span class="badge bg-success text-white rounded-pill px-3 py-1.5 small fw-semibold row-status" data-status="1">Active</span>
                                @else
                                    <span class="badge bg-danger text-white rounded-pill px-3 py-1.5 small fw-semibold row-status" data-status="0">Disabled</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="d-flex gap-1 justify-content-end">
                                    <button type="button" class="btn btn-sm btn-success border text-white rounded-3 px-2.5 py-1.5"
                                            onclick="openEditModal(this, '{{ $testimonial->id }}')"
                                            title="Edit Testimonial">
                                        <i class="ri-edit-line"></i>
                                    </button>

                                    <button type="button"
                                            class="btn btn-sm btn-danger border text-white rounded-3 px-2.5 py-1.5 delete-testimonial-btn"
                                            data-id="{{ $testimonial->id }}"
                                            title="Delete Testimonial">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>

                                    <form id="delete-form-{{ $testimonial->id }}"
                                          action="{{ route('admin.testimonial.delete', $testimonial->id) }}"
                                          method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <p class="mb-0 fw-semibold">No testimonials found.</p>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="testimonialModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow-lg">
                <div class="modal-header border-bottom p-4">
                    <h5 class="modal-title fw-bold text-slate-800" id="modalTitle">Add New Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="testimonialForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="methodPlaceholder"></div>

                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Client Name *</label>
                                <input type="text" name="name" id="input_name" class="form-control" placeholder="e.g., John Doe" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Designation / Profession</label>
                                <input type="text" name="designation" id="input_designation" class="form-control" placeholder="e.g., Chief Executive Officer">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Company Name</label>
                                <input type="text" name="company_name" id="input_company_name" class="form-control" placeholder="e.g., Microsoft Corporation">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Rating Stars</label>
                                <select name="rating" id="input_rating" class="form-select">
                                    <option value="" selected disabled>Select Rating Scale</option>
                                    <option value="5">5 Stars</option>
                                    <option value="4">4 Stars</option>
                                    <option value="3">3 Stars</option>
                                    <option value="2">2 Stars</option>
                                    <option value="1">1 Star</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold text-slate-700">Review / Testimonial Text</label>
                                <textarea name="review" id="input_review" class="form-control" rows="4" placeholder="Enter full feedback provided by the client here..."></textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Publication Status</label>
                                <select name="status" id="input_status" class="form-select">
                                    <option value="1">Active / Display on Web</option>
                                    <option value="0">Disabled / Hide</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Client Avatar / Photo</label>
                                <input type="file" name="image" class="form-control mb-1">
                                <span class="text-muted small d-block">Recommended size: Square (1:1 Aspect Ratio).</span>

                                <div id="imagePreviewWrapper" class="mt-2 d-none">
                                    <img src="" id="modalImgPreview" class="img-thumbnail rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                    <span class="text-muted small ms-2">Current Photo</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer border-top p-3 bg-light bg-opacity-50 d-flex gap-2">
                        <button type="button" class="btn btn-light border fw-semibold px-4" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary fw-semibold px-4" id="submitBtn">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // Bootstrap Modal Initialize
        const tModal = new bootstrap.Modal(document.getElementById('testimonialModal'));
        const form = document.getElementById('testimonialForm');
        const modalTitle = document.getElementById('modalTitle');
        const submitBtn = document.getElementById('submitBtn');
        const methodPlaceholder = document.getElementById('methodPlaceholder');
        const imgPreviewWrapper = document.getElementById('imagePreviewWrapper');
        const modalImgPreview = document.getElementById('modalImgPreview');

        // 1. OPEN CREATE MODAL
        function openCreateModal() {
            form.reset(); // ক্লিয়ার ওল্ড ফর্ম ডাটা
            methodPlaceholder.innerHTML = ''; // ক্রিয়েটের সময় কোনো PUT মেথড থাকবে না

            // রুট সেটআপ (Store Route)
            form.action = "{{ route('admin.testimonial.store') }}";

            modalTitle.innerText = "Add New Testimonial";
            submitBtn.innerText = "Save Testimonial";
            imgPreviewWrapper.classList.add('d-none'); // ইমেজ প্রিভিউ হাইড

            tModal.show();
        }

        // 2. OPEN EDIT MODAL & LOAD DATA DYNAMICALLY
        function openEditModal(button, id) {
            form.reset();

            // PUT Method ইনজেক্ট করা এডিটের জন্য
            methodPlaceholder.innerHTML = `@method('PUT')`;

            // ডাইনামিক আপডেট রুট জেনারেট
            let baseUpdateUrl = "{{ route('admin.testimonial.update', ':id') }}";
            form.action = baseUpdateUrl.replace(':id', id);

            // কারেন্ট রো (Row) থেকে ডাটা স্ক্র্যাপ করা
            let row = button.closest('tr');
            let name = row.querySelector('.client-name').innerText;
            let designation = row.querySelector('.client-designation').innerText;
            let company = row.querySelector('.client-company') ? row.querySelector('.client-company').innerText : '';
            let review = row.querySelector('.client-review').getAttribute('title');
            let rating = row.querySelector('.client-rating-val').innerText;
            let status = row.querySelector('.row-status').getAttribute('data-status');
            let imgNode = row.querySelector('.current-row-img');

            // মডাল ইনপুটে ডাটা পুশ করা
            document.getElementById('input_name').value = name;
            document.getElementById('input_designation').value = designation;
            document.getElementById('input_company_name').value = company;
            document.getElementById('input_review').value = review;
            document.getElementById('input_rating').value = rating;
            document.getElementById('input_status').value = status;

            // ইমেজ প্রিভিউ প্রসেস
            if (imgNode) {
                modalImgPreview.src = imgNode.src;
                imgPreviewWrapper.classList.remove('d-none');
            } else {
                imgPreviewWrapper.classList.add('d-none');
            }

            modalTitle.innerText = "Update Testimonial Details";
            submitBtn.innerText = "Update Testimonial";

            tModal.show();
        }

        // 3. SWEETALERT DELETE HANDLER
        document.querySelectorAll('.delete-testimonial-btn').forEach(button => {
            button.addEventListener('click', function() {
                let testimonialId = this.getAttribute('data-id');
                let formNode = document.getElementById('delete-form-' + testimonialId);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this testimonial permanently.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        formNode.submit();
                    }
                });
            });
        });
    </script>
@endpush
