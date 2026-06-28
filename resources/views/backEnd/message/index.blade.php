@extends('backEnd.layout.master')
@section('title', 'Contact Messages')
@section('body')
    <div class="row">
        <div class="col-xl-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold text-slate-900 mb-0">Contact Messages & Quote Requests</h4>
                    <p class="text-muted small mb-0">Manage client quote requests and messages</p>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden" id="messageTableWrapper">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" id="messageTable">
                            <thead class="bg-primary text-uppercase text-wrap fs-5 fw-bold text-slate-700">
                            <tr>
                                <th class="text-white">SL</th>
                                <th class="text-white">Name</th>
                                <th class="text-white">Email</th>
                                <th class="text-white">Phone</th>
                                <th class="text-white">Zip Code</th>
                                <th class="text-white">Frequency</th>
                                <th class="text-white">Interest Service</th>
                                <th class="text-white">Date</th>
                                <th class="text-white">Action</th>
                            </tr>
                            </thead>
                            <tbody class="border-top-0">
                            @forelse ($messages as $item)
                                {{-- স্ট্যাটাস ০ হলে রো-তে একটু হালকা ব্যাকগ্রাউন্ড থাকবে এবং ফন্ট বোল্ড থাকবে --}}
                                <tr id="row-{{ $item->id }}" class="{{ $item->status == 0 ? 'fw-bold bg-light-subtle' : '' }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $item->name }}
                                        @if($item->status == 0)
                                            <span class="badge bg-danger rounded-pill ms-1 unread-badge" style="font-size: 10px;">New</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone ?? 'N/A' }}</td>
                                    <td>{{ $item->zip_code ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge {{ $item->frequency == 'Recurring' ? 'bg-info-subtle text-info' : 'bg-warning-subtle text-warning' }} px-2 py-1">
                                            {{ $item->frequency ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ $item->get_service->name ?? 'N/A' }}
                                    </td>
                                    <td>{{ $item->created_at->format('d M, Y h:i A') }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a data-bs-target="#viewMessage" data-bs-toggle="modal" class="btn btn-soft-primary btn-sm view-message-btn"
                                               data-id="{{ $item->id }}"
                                               data-name="{{ $item->name }}"
                                               data-email="{{ $item->email }}"
                                               data-phone="{{ $item->phone ?? 'N/A' }}"
                                               data-zip="{{ $item->zip_code ?? 'N/A' }}"
                                               data-address="{{ $item->street_address ?? 'N/A' }}"
                                               data-apartment="{{ $item->apartment ?? '' }}"
                                               data-frequency="{{ $item->frequency ?? 'N/A' }}"
                                               data-sms="{{ $item->sms_opt_in }}"
                                               data-interest="{{ $item->get_service->name ?? 'General Enquiry' }}"
                                               data-message="{{ $item->message }}"
                                               title="View Details">
                                                <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                                            </a>
                                            <a href="javascript:void(0);" onclick="deleteMessage({{ $item->id }})"
                                               title="Delete" class="btn btn-soft-danger btn-sm">
                                                <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center py-5 text-muted">
                                        <p class="mb-0 fw-semibold">No requests or messages yet.</p>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- View Message Modal -->
    <div class="modal modal-lg fade" id="viewMessage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Quote Request & Message Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="fw-bold text-muted small">Sender Name:</label>
                            <p id="view_name" class="form-control-plaintext bg-light px-2 py-1 rounded"></p>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold text-muted small">Email:</label>
                            <p id="view_email" class="form-control-plaintext bg-light px-2 py-1 rounded"></p>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold text-muted small">Phone:</label>
                            <p id="view_phone" class="form-control-plaintext bg-light px-2 py-1 rounded"></p>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold text-muted small">Zip Code:</label>
                            <p id="view_zip" class="form-control-plaintext bg-light px-2 py-1 rounded"></p>
                        </div>
                        <div class="col-md-8">
                            <label class="fw-bold text-muted small">Street Address:</label>
                            <p id="view_address" class="form-control-plaintext bg-light px-2 py-1 rounded"></p>
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold text-muted small">Apartment/Suite:</label>
                            <p id="view_apartment" class="form-control-plaintext bg-light px-2 py-1 rounded"></p>
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold text-muted small">Frequency:</label>
                            <p id="view_frequency" class="form-control-plaintext bg-light px-2 py-1 rounded"></p>
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold text-muted small">Interest Service:</label>
                            <p id="view_interest" class="form-control-plaintext bg-light px-2 py-1 rounded"></p>
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold text-muted small">SMS Opt-In:</label>
                            <div class="pt-1">
                                <span id="view_sms_badge" class="badge px-3 py-2 fs-12"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="fw-bold text-muted small">Additional Message/Notes:</label>
                            <div id="view_message" class="bg-light p-3 rounded" style="white-space: pre-wrap; min-height: 80px;"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // View Modal Data Pass and Status Update
        $(document).on("click", ".view-message-btn", function () {
            let id = $(this).data("id");
            let name = $(this).data("name");
            let email = $(this).data("email");
            let phone = $(this).data("phone");
            let zip = $(this).data("zip");
            let address = $(this).data("address");
            let apartment = $(this).data("apartment");
            let frequency = $(this).data("frequency");
            let sms = $(this).data("sms");
            let interest = $(this).data("interest");
            let message = $(this).data("message");

            // মোডালে ডাটা সেট করা
            $("#view_name").text(name);
            $("#view_email").text(email);
            $("#view_phone").text(phone);
            $("#view_zip").text(zip);
            $("#view_address").text(address);
            $("#view_apartment").text(apartment ? apartment : 'N/A');
            $("#view_frequency").text(frequency);
            $("#view_interest").text(interest);
            $("#view_message").text(message ? message : 'No additional notes provided.');

            // SMS Opt-In ব্যাজ হ্যান্ডেল করা
            if(sms == 1 || sms == true) {
                $("#view_sms_badge").text('Yes (Agreed)').removeClass('bg-danger-subtle text-danger').addClass('bg-success-subtle text-success');
            } else {
                $("#view_sms_badge").text('No').removeClass('bg-success-subtle text-success').addClass('bg-danger-subtle text-danger');
            }

            // স্ট্যাটাস ১ (রিড) করার জন্য AJAX রিকোয়েস্ট
            let currentRow = $(`#row-${id}`);

            // শুধুমাত্র যদি মেসেজটি আগে আনরিড (status 0) থাকে তবেই AJAX কল হবে
            if(currentRow.hasClass('fw-bold')) {
                $.ajax({
                    url: "{{ route('admin.message.read') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },
                    success: function(response) {
                        if(response.success) {
                            // ইনস্ট্যান্ট ফ্রন্টএন্ড চেঞ্জ (পেজ রিফ্রেশ ছাড়া)
                            currentRow.removeClass('fw-bold bg-light-subtle');
                            currentRow.find('.unread-badge').remove();
                        }
                    },
                    error: function(err) {
                        console.log("Error updating status:", err);
                    }
                });
            }
        });

        // Delete Message via AJAX
        function deleteMessage(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this record!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.message.delete') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id
                        },
                        success: function(data) {
                            // টেবিল কন্টেইনার রিলোড করা
                            $("#messageTableWrapper").load(location.href + ' #messageTable', "");
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted Successfully',
                                showConfirmButton: false,
                                timer: 1000
                            })
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                }
            })
        }
    </script>
@endpush
