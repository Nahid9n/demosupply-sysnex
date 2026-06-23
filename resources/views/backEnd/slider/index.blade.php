@extends('backEnd.layout.master')
@section('title', 'Slider Management')
@section('body')
    <div class="">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold text-slate-900 mb-0">Slider Management</h4>
                <p class="text-muted small mb-0">Manage website homepage hero sliders, buttons, and text layouts.</p>
            </div>
            <div>
                <button type="button" class="btn btn-secondary rounded-3 px-4 py-2 fw-semibold" onclick="openCreateModal()">
                    <i class="ri-add-line"></i> Add New Slider
                </button>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-primary text-uppercase text-wrap fs-6 fw-bold text-slate-700">
                        <tr>
                            <th class="ps-4 text-white" style="width: 80px;">Order</th>
                            <th class=" text-white">Image</th>
                            <th class=" text-white">Headings</th>
                            <th class=" text-white">Buttons</th>
                            <th class="text-center text-white">Status</th>
                            <th class="text-end pe-4 text-white" style="width: 150px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="border-top-0">
                        @forelse($sliders as $slider)
                            <tr class="slider-row" data-id="{{ $slider->id }}">
                                <td class="ps-4 fw-bold text-muted item-serial">{{ $slider->serial ?? 'N/A' }}</td>
                                <td>
                                    <img src="{{ asset($slider->image) }}" class="rounded-3 border object-fit-cover item-img" style="width: 100px; height: 50px;">
                                </td>
                                <td>
                                    <div class=" text-muted mb-0 item-heading-top">{{ $slider->heading_top }}</div>
                                    <div class="fw-semibold text-slate-800 item-heading-one">{{ $slider->heading_one }}</div>
                                    <span class="d-none item-desc">{{ $slider->description }}</span>
                                </td>
                                <td class="text-wrap fs-4" width="30%">
                                    @if($slider->button_one)
                                        <span class="badge bg-secondary-subtle text-dark border">
                                                <span class="item-btn1">{{ $slider->button_one }} </span>  -
                                                <span class="text-muted item-btn1-url"> {{ $slider->button_one_url }}</span>
                                        </span> <br>
                                    @endif
                                    @if($slider->button_two)
                                        <span class="badge bg-secondary-subtle text-dark border">
                                                <span class="item-btn2">{{ $slider->button_two }} </span>  -
                                                <span class="item-btn2-url">
                                                    <a class="text-danger" target="_blank" href="{{$slider->button_two_url}}"> {{ $slider->button_two_url }}</a>
                                                </span>
                                            </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                        <span class="badge {{ $slider->status ? 'bg-success' : 'bg-danger' }} px-2.5 py-1 rounded-pill item-status-badge" data-value="{{ $slider->status }}">
                                            {{ $slider->status ? 'Active' : 'Inactive' }}
                                        </span>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <button type="button" class="btn btn-sm btn-success border rounded-2 text-white" onclick="openEditModal(this, '{{ $slider->id }}')">
                                            <i class="ri-edit-line"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger border rounded-2 text-white" onclick="deleteSliderItem('{{ $slider->id }}')">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                    <form id="delete-form-{{ $slider->id }}" action="{{ route('admin.slider.delete', $slider->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <p class="mb-0 fw-semibold">No sliders uploaded yet.</p>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="sliderCreateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow-lg">
                <div class="modal-header border-bottom p-4">
                    <h5 class="modal-title fw-bold text-slate-800">Add New Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-semibold text-slate-700">Slider Image (Recommended: 1920x800) <span class="text-danger">*</span></label>
                                <input type="file" name="image" class="form-control" accept="image/*" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Heading Top (Small Text)</label>
                                <input type="text" name="heading_top" class="form-control" placeholder="e.g., Welcome to our shop">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Heading One (Main bold title)</label>
                                <input type="text" name="heading_one" class="form-control" placeholder="e.g., Best Service Package">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold text-slate-700">Description</label>
                                <textarea name="description" rows="3" class="form-control" placeholder="Short intro contextual summary text..."></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Button One Text</label>
                                <input type="text" name="button_one" class="form-control" placeholder="e.g., Book Now">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Button One URL</label>
                                <input type="text" name="button_one_url" class="form-control" placeholder="e.g., /services or https://...">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Button Two Text</label>
                                <input type="text" name="button_two" class="form-control" placeholder="e.g., Contact Us">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Button Two URL</label>
                                <input type="text" name="button_two_url" class="form-control" placeholder="e.g., /contact">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Serial Order</label>
                                <input type="number" name="serial" class="form-control" placeholder="e.g., 1, 2, 3" min="1">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700 d-block">Status</label>
                                <div class="form-check form-switch pt-2">
                                    <input class="form-check-input" type="checkbox" name="status" id="create_status" value="1" checked>
                                    <label class="form-check-label" for="create_status">Active Visibility</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top p-3 bg-light bg-opacity-50">
                        <button type="button" class="btn btn-light border fw-semibold px-4 rounded-3" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary fw-semibold px-4 rounded-3">Save Slider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="sliderEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow-lg">
                <div class="modal-header border-bottom p-4">
                    <h5 class="modal-title fw-bold text-slate-800">Edit Slider Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editSliderForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col-12 text-center mb-2">
                                <img src="" id="edit_preview_img" class="img-thumbnail rounded-3 mb-2" style="max-height: 120px; object-fit: cover;">
                                <input type="file" name="image" class="form-control" accept="image/*">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Heading Top</label>
                                <input type="text" name="heading_top" id="edit_heading_top" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Heading One</label>
                                <input type="text" name="heading_one" id="edit_heading_one" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold text-slate-700">Description</label>
                                <textarea name="description" id="edit_description" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Button One Text</label>
                                <input type="text" name="button_one" id="edit_button_one" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Button One URL</label>
                                <input type="text" name="button_one_url" id="edit_button_one_url" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Button Two Text</label>
                                <input type="text" name="button_two" id="edit_button_two" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Button Two URL</label>
                                <input type="text" name="button_two_url" id="edit_button_two_url" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700">Serial Order</label>
                                <input type="number" name="serial" id="edit_serial" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-slate-700 d-block">Status</label>
                                <div class="form-check form-switch pt-2">
                                    <input class="form-check-input" type="checkbox" name="status" id="edit_status" value="1">
                                    <label class="form-check-label" for="edit_status">Active Visibility</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top p-3 bg-light bg-opacity-50">
                        <button type="button" class="btn btn-light border fw-semibold px-4 rounded-3" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary fw-semibold px-4 rounded-3">Update Slider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        const createModal = new bootstrap.Modal(document.getElementById('sliderCreateModal'));
        const editModal = new bootstrap.Modal(document.getElementById('sliderEditModal'));

        function openCreateModal() {
            createModal.show();
        }

        function openEditModal(button, id) {
            let row = button.closest('.slider-row');

            // DOM Extraction
            let headingTop = row.querySelector('.item-heading-top')?.innerText || '';
            let headingOne = row.querySelector('.item-heading-one')?.innerText || '';
            let description = row.querySelector('.item-desc')?.innerText || '';
            let btnOne = row.querySelector('.item-btn1')?.innerText || '';
            let btnOneUrl = row.querySelector('.item-btn1-url')?.innerText || '';
            let btnTwo = row.querySelector('.item-btn2')?.innerText || '';
            let btnTwoUrl = row.querySelector('.item-btn2-url')?.innerText || '';
            let serial = row.querySelector('.item-serial').innerText.replace('N/A', '');
            let imgUrl = row.querySelector('.item-img').src;
            let status = row.querySelector('.item-status-badge').getAttribute('data-value') == "1";

            // Form Endpoint Configuration
            let editForm = document.getElementById('editSliderForm');
            let baseUpdateUrl = "{{ route('admin.slider.update', ':id') }}";
            editForm.action = baseUpdateUrl.replace(':id', id);

            // Populate Fields
            document.getElementById('edit_preview_img').src = imgUrl;
            document.getElementById('edit_heading_top').value = headingTop;
            document.getElementById('edit_heading_one').value = headingOne;
            document.getElementById('edit_description').value = description;
            document.getElementById('edit_button_one').value = btnOne;
            document.getElementById('edit_button_one_url').value = btnOneUrl;
            document.getElementById('edit_button_two').value = btnTwo;
            document.getElementById('edit_button_two_url').value = btnTwoUrl;
            document.getElementById('edit_serial').value = serial;
            document.getElementById('edit_status').checked = status;

            editModal.show();
        }

        function deleteSliderItem(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Delete this slider layer completely?",
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
