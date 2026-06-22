@extends('backEnd.layout.master')
@section('title', 'Gallery Management')
@section('body')
    <div class="py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold text-slate-900 mb-0">Photo Gallery</h4>
                <p class="text-muted small mb-0">Upload and manage website gallery images with personalized alt texts and serial order.</p>
            </div>
            <div class="d-flex gap-2">
                <button type="button" id="bulkDeleteBtn" class="btn btn-danger rounded-3 px-4 py-2 fw-semibold d-none" onclick="bulkDeleteGalleryItems()">
                    <i class="ri-delete-bin-line"></i> Bulk Delete (<span id="selectedCount">0</span>)
                </button>

                <button type="button" class="btn btn-primary rounded-3 px-4 py-2 fw-semibold" onclick="openUploadModal()">
                    <i class="ri-upload-cloud-2-line"></i> Upload Images
                </button>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @forelse($galleries as $gallery)
                <div class="col" id="gallery-item-{{ $gallery->id }}">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden position-relative gallery-card">

                        <div class="position-absolute top-0 start-0 m-3 z-3">
                            <input type="checkbox" class="form-check-input gallery-checkbox shadow-sm" value="{{ $gallery->id }}" onchange="toggleBulkDeleteButton()" style="width: 22px; height: 22px; cursor: pointer;">
                        </div>

                        <div class="position-relative overflow-hidden bg-light cursor-pointer" style="padding-top: 75%;" onclick="openLightbox(this, {{ $loop->index }})">
                            <img src="{{ asset($gallery->image) }}"
                                 class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover transition-all gallery-thumb"
                                 alt="{{ $gallery->alt_text ?? 'No alt text' }}">
                        </div>

                        <div class="card-body p-3 bg-white">
                            @if(isset($gallery->serial))
                                <span class="badge bg-secondary mb-2 current-serial">Order: {{ $gallery->serial }}</span>
                            @else
                                <span class="badge bg-secondary mb-2 d-none current-serial"></span>
                            @endif
                            <p class="text-slate-800 small fw-medium mb-1 text-truncate" title="{{ $gallery->alt_text }}">
                                <strong>Alt:</strong> <span class="current-alt">{{ $gallery->alt_text ?? 'No alt text' }}</span>
                            </p>
                        </div>

                        <div class="position-absolute top-0 end-0 m-2 opacity-0 gallery-actions transition-all d-flex gap-1">
                            <button type="button" class="btn btn-sm btn-light rounded-circle shadow p-2 line-height-1"
                                    onclick="openEditModal(this, '{{ $gallery->id }}')" title="Edit Meta Data">
                                Edit
                            </button>

                            <button type="button" class="btn btn-sm btn-danger rounded-circle shadow p-2 line-height-1"
                                    onclick="deleteGalleryItem('{{ $gallery->id }}')" title="Delete Image">
                                Delete
                            </button>

                            <form id="delete-form-{{ $gallery->id }}" action="{{ route('admin.gallery.delete', $gallery->id) }}" method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 w-100 text-center py-5 text-muted">
                    <p class="mb-0 fw-semibold">No images uploaded inside the gallery yet.</p>
                </div>
            @endforelse
        </div>
    </div>

    <form id="bulkDeleteForm" action="{{ route('admin.gallery.bulkDelete') }}" method="POST" class="d-none">
        @csrf
        @method('DELETE')
        <div id="bulkDeleteInputs"></div>
    </form>

    <div class="modal fade" id="galleryUploadModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow-lg">
                <div class="modal-header border-bottom p-4">
                    <h5 class="modal-title fw-bold text-slate-800" id="modalTitle">Upload Gallery Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="galleryForm" action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="images[]" id="finalFilesInput" class="d-none" multiple>

                    <div class="modal-body p-4">
                        <div class="mb-4 p-4 border border-dashed rounded-4 text-center bg-light bg-opacity-50">
                            <i class="ri-image-add-line text-primary display-4 mb-2 d-block"></i>
                            <label class="form-label fw-bold text-slate-700 fs-5">Choose Photo(s)</label>
                            <p class="text-muted small mb-3">Select images one by one or all together. Setting Alt and Serial is completely optional.</p>

                            <input type="file" id="temporaryFileInput" class="form-control" accept="image/*" multiple>
                        </div>

                        <div id="altInputsContainer" class="d-none">
                            <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                                <h6 class="fw-bold text-slate-800 mb-0"><i class="ri-settings-3-line text-primary"></i> Image Configuration (Optional):</h6>
                                <span class="badge bg-primary rounded-pill" id="totalFilesBadge">0 Files</span>
                            </div>
                            <div id="dynamicRowsWrapper" class="d-flex flex-column gap-3" style="max-height: 380px; overflow-y: auto; padding-right: 5px;">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer border-top p-3 bg-light bg-opacity-50 d-flex gap-2">
                        <button type="button" class="btn btn-light border fw-semibold px-4" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary fw-semibold px-4">Upload Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="galleryEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow-lg">
                <div class="modal-header border-bottom p-4">
                    <h5 class="modal-title fw-bold text-slate-800">Edit Image Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editGalleryForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body p-4">
                        <div class="text-center mb-3">
                            <input type="file" name="image" >
                            <img src="" id="edit_preview_img" class="img-thumbnail rounded-3" style="max-height: 150px; object-fit: cover;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-slate-700">Alt Text (Optional)</label>
                            <input type="text" name="alt_text" id="edit_alt_text" class="form-control" placeholder="SEO Keyword description">
                        </div>
                        <div>
                            <label class="form-label small fw-semibold text-slate-700">Serial/Order (Optional)</label>
                            <input type="number" name="serial" id="edit_serial" class="form-control" placeholder="e.g. 1, 2, 3" min="0">
                        </div>
                    </div>
                    <div class="modal-footer border-top p-3">
                        <button type="button" class="btn btn-light border fw-semibold px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary fw-semibold px-4">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="lightboxModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-transparent border-0 position-relative">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 z-3 shadow-lg" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="modal-body p-0 text-center position-relative">
                    <img src="" id="lightboxImage" class="img-fluid rounded-4 shadow-lg w-100" style="max-height: 80vh; object-fit: contain; background-color: rgba(0,0,0,0.1);">

                    <div class="position-absolute bottom-0 start-0 w-100 p-3 text-start text-white rounded-bottom-4" style="background: linear-gradient(transparent, rgba(0,0,0,0.85));">
                        <p class="mb-0 fw-semibold fs-5" id="lightboxAltText"></p>
                    </div>

                    <button type="button" class="position-absolute top-50 start-0 translate-middle-y btn btn-dark rounded-circle ms-3 p-2 border-0 shadow" onclick="changeLightboxImage(-1)" style="opacity: 0.8; width:45px; height:45px;">
                        ❮
                    </button>
                    <button type="button" class="position-absolute top-50 end-0 translate-middle-y btn btn-dark rounded-circle me-3 p-2 border-0 shadow" onclick="changeLightboxImage(1)" style="opacity: 0.8; width:45px; height:45px;">
                        ❯
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .gallery-card:hover .gallery-actions { opacity: 1 !important; }
        .gallery-card img:hover { transform: scale(1.04); }
        .transition-all { transition: all 0.3s ease-in-out; }
        .border-dashed { border-style: dashed !important; border-width: 2px !important; border-color: #dee2e6 !important; }
        .cursor-pointer { cursor: pointer; }
        /* Checkbox-কে হোভার ছাড়াও সবসময় দেখানোর জন্য */
        .gallery-checkbox {
            opacity: 0.7;
            transition: opacity 0.2s ease;
        }
        .gallery-checkbox:checked, .gallery-card:hover .gallery-checkbox {
            opacity: 1;
        }
    </style>
@endsection

@push('js')
    <script>
        const uploadModal = new bootstrap.Modal(document.getElementById('galleryUploadModal'));
        const editModal = new bootstrap.Modal(document.getElementById('galleryEditModal'));
        const lightboxModal = new bootstrap.Modal(document.getElementById('lightboxModal'));

        const tempFileInput = document.getElementById('temporaryFileInput');
        const finalFilesInput = document.getElementById('finalFilesInput');
        const altContainer = document.getElementById('altInputsContainer');
        const rowsWrapper = document.getElementById('dynamicRowsWrapper');
        const totalFilesBadge = document.getElementById('totalFilesBadge');

        // Virtual Basket
        let fileBasket = new DataTransfer();

        // LIGHTBOX STATE VARIABLES
        let currentImageIndex = 0;
        let allGalleryImages = [];

        // 1. Reset & Show Upload Modal
        function openUploadModal() {
            document.getElementById('galleryForm').reset();
            fileBasket = new DataTransfer();
            finalFilesInput.files = fileBasket.files;
            altContainer.classList.add('d-none');
            rowsWrapper.innerHTML = '';
            totalFilesBadge.innerText = "0 Files";
            uploadModal.show();
        }

        // 2. Append System Setup
        tempFileInput.addEventListener('change', function (e) {
            const newlySelectedFiles = e.target.files;

            if (newlySelectedFiles.length > 0) {
                altContainer.classList.remove('d-none');

                Array.from(newlySelectedFiles).forEach((file) => {
                    fileBasket.items.add(file);
                    const objectUrl = URL.createObjectURL(file);
                    const uniqueId = 'file_' + Math.random().toString(36).substr(2, 9);

                    const fieldTemplate = `
                        <div class="card border p-3 rounded-3" id="${uniqueId}">
                            <div class="row align-items-center g-3">
                                <div class="col-auto">
                                    <img src="${objectUrl}" class="rounded border" style="width: 70px; height: 70px; object-fit: cover;" alt="Preview">
                                </div>
                                <div class="col">
                                    <div class="row g-2">
                                        <div class="col-md-8">
                                            <label class="form-label small fw-semibold text-muted mb-1">Alt Text (Optional)</label>
                                            <input type="text" name="alt_texts[]" class="form-control form-control-sm" placeholder="SEO Description">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label small fw-semibold text-muted mb-1">Serial (Optional)</label>
                                            <input type="number" name="serials[]" class="form-control form-control-sm" placeholder="Order" min="0">
                                        </div>
                                    </div>
                                    <div class="text-truncate text-muted mt-1" style="font-size: 11px; max-width: 400px;">File: ${file.name}</div>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-sm btn-outline-danger border-0 rounded-circle"
                                            onclick="removeSingleSelectedFile('${uniqueId}', '${file.name}')" style="width: 32px; height: 32px; padding: 0;">✕</button>
                                </div>
                            </div>
                        </div>
                    `;
                    rowsWrapper.insertAdjacentHTML('beforeend', fieldTemplate);
                });

                finalFilesInput.files = fileBasket.files;
                totalFilesBadge.innerText = `${fileBasket.files.length} Files`;
                tempFileInput.value = '';
            }
        });

        function removeSingleSelectedFile(rowId, fileName) {
            const rowElement = document.getElementById(rowId);
            if (rowElement) rowElement.remove();

            let newBasket = new DataTransfer();
            Array.from(fileBasket.files).forEach(file => {
                if (file.name !== fileName) newBasket.items.add(file);
            });

            fileBasket = newBasket;
            finalFilesInput.files = fileBasket.files;
            totalFilesBadge.innerText = `${fileBasket.files.length} Files`;

            if (fileBasket.files.length === 0) altContainer.classList.add('d-none');
        }

        // 3. OPEN EDIT META MODAL
        function openEditModal(button, id) {
            let card = button.closest('.gallery-card');
            let imgUrl = card.querySelector('.gallery-thumb').src;
            let altText = card.querySelector('.current-alt').innerText;
            let serialText = card.querySelector('.current-serial').innerText.replace('Order: ', '').trim();

            // Set Form Data
            let editForm = document.getElementById('editGalleryForm');
            let baseUpdateUrl = "{{ route('admin.gallery.update', ':id') }}";
            editForm.action = baseUpdateUrl.replace(':id', id);

            document.getElementById('edit_preview_img').src = imgUrl;
            document.getElementById('edit_alt_text').value = (altText === 'No alt text') ? '' : altText;
            document.getElementById('edit_serial').value = serialText;

            editModal.show();
        }

        // 4. LIGHTBOX NEXT & PREV ENGINE
        function cacheGalleryImages() {
            allGalleryImages = [];
            document.querySelectorAll('.gallery-thumb').forEach((img) => {
                allGalleryImages.push({
                    src: img.src,
                    alt: img.alt
                });
            });
        }

        function openLightbox(element, index) {
            // যদি ক্লিক করা আইটেমটি চেকবক্স না হয়, তবেই লাইটবক্স খুলবে
            if (event.target.classList.contains('form-check-input')) {
                return;
            }
            cacheGalleryImages();
            currentImageIndex = index;
            updateLightboxContent();
            lightboxModal.show();
        }

        function changeLightboxImage(direction) {
            currentImageIndex += direction;

            if (currentImageIndex >= allGalleryImages.length) currentImageIndex = 0;
            if (currentImageIndex < 0) currentImageIndex = allGalleryImages.length - 1;

            updateLightboxContent();
        }

        function updateLightboxContent() {
            const activeImageData = allGalleryImages[currentImageIndex];
            if (activeImageData) {
                document.getElementById('lightboxImage').src = activeImageData.src;
                document.getElementById('lightboxAltText').innerText = activeImageData.alt;
            }
        }

        document.addEventListener('keydown', function(e) {
            const lightboxEl = document.getElementById('lightboxModal');
            if (lightboxEl.classList.contains('show')) {
                if (e.key === "ArrowRight") changeLightboxImage(1);
                if (e.key === "ArrowLeft") changeLightboxImage(-1);
            }
        });

        // 5. DELETE CONTEXT
        function deleteGalleryItem(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Delete this image?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }

        // ==========================================
        // BULK DELETE LOGIC ENGINE
        // ==========================================

        function toggleBulkDeleteButton() {
            const checkedBoxes = document.querySelectorAll('.gallery-checkbox:checked');
            const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');
            const selectedCountSpan = document.getElementById('selectedCount');

            if (checkedBoxes.length > 0) {
                bulkDeleteBtn.classList.remove('d-none');
                selectedCountSpan.innerText = checkedBoxes.length;
            } else {
                bulkDeleteBtn.classList.add('d-none');
                selectedCountSpan.innerText = '0';
            }
        }

        function bulkDeleteGalleryItems() {
            const checkedBoxes = document.querySelectorAll('.gallery-checkbox:checked');
            if (checkedBoxes.length === 0) return;

            Swal.fire({
                title: 'Are you sure?',
                text: `You are about to delete ${checkedBoxes.length} selected images!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes, delete all!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const inputsContainer = document.getElementById('bulkDeleteInputs');
                    inputsContainer.innerHTML = ''; // Clear previous inputs

                    // Append selected IDs to the hidden form
                    checkedBoxes.forEach(checkbox => {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'ids[]';
                        input.value = checkbox.value;
                        inputsContainer.appendChild(input);
                    });

                    // Submit the bulk delete form
                    document.getElementById('bulkDeleteForm').submit();
                }
            });
        }
    </script>
@endpush
