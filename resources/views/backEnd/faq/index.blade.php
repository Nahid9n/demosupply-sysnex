@extends('backEnd.layout.master')
@section('title', 'FAQ Management')
@section('body')
    <div class="">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold text-slate-900 mb-0">FAQ Management</h4>
                <p class="text-muted small mb-0">Manage website frequently asked questions.</p>
            </div>
            <div>
                <button type="button" class="btn btn-secondary rounded-3 px-4 py-2 fw-semibold" onclick="openCreateModal()">
                    <i class="ri-add-line"></i> Add New FAQ
                </button>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-primary text-uppercase fs-7 fw-bold text-dark">
                        <tr>
                            <th class="ps-4 text-white" style="width: 80px;">SL</th>
                            <th class="text-white">Question</th>
                            <th class="text-white">Answer</th>
                            <th class="text-center text-white">Show on Home</th>
                            <th class="text-center text-white ">Status</th>
                            <th class="text-end pe-4 text-white" style="width: 150px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="border-top-0">
                        @forelse($faqs as $faq)
                            <tr class="faq-row">
                                <td class="ps-4 fw-medium text-muted">{{ $loop->iteration }}</td>
                                <td class="fw-semibold text-slate-800 item-question" style="max-width: 250px;">{{ $faq->question }}</td>
                                <td class="text-muted item-answer" style="max-width: 350px;">{{ $faq->answer }}</td>
                                <td class="text-center">
                                        <span class="badge text-white {{ $faq->is_show_home ? 'bg-success ' : 'bg-danger' }} px-2.5 py-1 rounded-pill item-home-badge" data-value="{{ $faq->is_show_home }}">
                                            {{ $faq->is_show_home ? 'Yes' : 'No' }}
                                        </span>
                                </td>
                                <td class="text-center">
                                        <span class="badge {{ $faq->status ? 'bg-success' : 'bg-danger' }} px-2.5 py-1 rounded-pill item-status-badge" data-value="{{ $faq->status }}">
                                            {{ $faq->status ? 'Active' : 'Inactive' }}
                                        </span>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-1">
                                        <button type="button" class="btn btn-sm btn-success border rounded-2 text-white" onclick="openEditModal(this, '{{ $faq->id }}')" title="Edit FAQ">
                                            <i class="ri-edit-line"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger border rounded-2 text-white" onclick="deleteFaqItem('{{ $faq->id }}')" title="Delete FAQ">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                    <form id="delete-form-{{ $faq->id }}" action="{{ route('admin.faq.delete', $faq->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <p class="mb-0 fw-semibold">No FAQs available yet.</p>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- CREATE FAQ MODAL -->
    <div class="modal fade" id="faqCreateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow-lg">
                <div class="modal-header border-bottom p-4">
                    <h5 class="modal-title fw-bold text-slate-800">Add New FAQ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.faq.store') }}" method="POST">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="row g-4">
                            <div class="col-12">
                                <label class="form-label fw-semibold text-slate-700">Question <span class="text-danger">*</span></label>
                                <input type="text" name="question" class="form-control rounded-3" placeholder="e.g., What is your return policy?" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold text-slate-700">Answer <span class="text-danger">*</span></label>
                                <textarea name="answer" rows="5" class="form-control rounded-3" placeholder="Write the detailed answer here..." required></textarea>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check form-switch p-3 border rounded-3 bg-light bg-opacity-50">
                                    <input class="form-check-input ms-0 me-2" type="checkbox" name="is_show_home" id="create_is_show_home" value="1" checked>
                                    <label class="form-check-label fw-medium text-slate-800" for="create_is_show_home">Show on Homepage</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check form-switch p-3 border rounded-3 bg-light bg-opacity-50">
                                    <input class="form-check-input ms-0 me-2" type="checkbox" name="status" id="create_status" value="1" checked>
                                    <label class="form-check-label fw-medium text-slate-800" for="create_status">Active Status</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top p-3 bg-light bg-opacity-50">
                        <button type="button" class="btn btn-light border fw-semibold px-4 rounded-3" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary fw-semibold px-4 rounded-3">Save FAQ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- EDIT FAQ MODAL -->
    <div class="modal fade" id="faqEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow-lg">
                <div class="modal-header border-bottom p-4">
                    <h5 class="modal-title fw-bold text-slate-800">Edit FAQ Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editFaqForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body p-4">
                        <div class="row g-4">
                            <div class="col-12">
                                <label class="form-label fw-semibold text-slate-700">Question <span class="text-danger">*</span></label>
                                <input type="text" name="question" id="edit_question" class="form-control rounded-3" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold text-slate-700">Answer <span class="text-danger">*</span></label>
                                <textarea name="answer" id="edit_answer" rows="5" class="form-control rounded-3" required></textarea>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check form-switch p-3 border rounded-3 bg-light bg-opacity-50">
                                    <input class="form-check-input ms-0 me-2" type="checkbox" name="is_show_home" id="edit_is_show_home" value="1">
                                    <label class="form-check-label fw-medium text-slate-800" for="edit_is_show_home">Show on Homepage</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check form-switch p-3 border rounded-3 bg-light bg-opacity-50">
                                    <input class="form-check-input ms-0 me-2" type="checkbox" name="status" id="edit_status" value="1">
                                    <label class="form-check-label fw-medium text-slate-800" for="edit_status">Active Status</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top p-3 bg-light bg-opacity-50">
                        <button type="button" class="btn btn-light border fw-semibold px-4 rounded-3" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary fw-semibold px-4 rounded-3">Update FAQ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        const createModal = new bootstrap.Modal(document.getElementById('faqCreateModal'));
        const editModal = new bootstrap.Modal(document.getElementById('faqEditModal'));

        // ১. ক্রিয়েট মোডাল ওপেন
        function openCreateModal() {
            createModal.show();
        }

        // ২. ডাটা রিড করে এডিট মোডাল ওপেন ইঞ্জিন
        function openEditModal(button, id) {
            let row = button.closest('.faq-row');

            // ডোমের ভেতর থেকে ভ্যালুগুলো ধরা হচ্ছে
            let question = row.querySelector('.item-question').innerText;
            let answer = row.querySelector('.item-answer').innerText;
            let isShowHome = row.querySelector('.item-home-badge').getAttribute('data-value') == "1";
            let status = row.querySelector('.item-status-badge').getAttribute('data-value') == "1";

            // ফর্মের একশন ইউআরএল ডায়নামিক করা
            let editForm = document.getElementById('editFaqForm');
            let baseUpdateUrl = "{{ route('admin.faq.update', ':id') }}";
            editForm.action = baseUpdateUrl.replace(':id', id);

            // মোডালের ফিল্ডগুলোতে ভ্যালু পুশ করা
            document.getElementById('edit_question').value = question;
            document.getElementById('edit_answer').value = answer;
            document.getElementById('edit_is_show_home').checked = isShowHome;
            document.getElementById('edit_status').checked = status;

            // মোডাল শো করা
            editModal.show();
        }

        // ৩. ডিলিট অ্যালার্ট কনটেক্সট
        function deleteFaqItem(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this FAQ permanently?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endpush
