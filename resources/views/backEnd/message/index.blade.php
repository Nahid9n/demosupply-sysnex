@extends('backEnd.layout.master')
@section('title', 'Contact Messages')
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="mb-0 fw-semibold">Contact Messages</h4>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table id="messageTable" class="table align-middle text-nowrap table-hover table-centered mb-0">
                            <thead class="bg-light-subtle">
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Interest</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($messages as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone ?? 'N/A' }}</td>
                                    <td>
                                        @if($item->interest == 1) <span class="badge bg-info">Electrolite</span>
                                        @elseif($item->interest == 2) <span class="badge bg-primary">Device</span>
                                        @elseif($item->interest == 3) <span class="badge bg-warning">Water Filter</span>
                                        @else <span class="badge bg-secondary">General Enquiry</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at->format('d M, Y h:i A') }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <!-- View Button -->
                                            <a data-bs-target="#viewMessage" data-bs-toggle="modal" class="btn btn-soft-primary btn-sm"
                                               data-name="{{ $item->name }}"
                                               data-email="{{ $item->email }}"
                                               data-phone="{{ $item->phone ?? 'N/A' }}"
                                               data-interest="@if($item->interest == 1) Electrolite @elseif($item->interest == 2) Device @elseif($item->interest == 3) Water Filter @else General Enquiry @endif"
                                               data-message="{{ $item->message }}"
                                               title="View Message">
                                                <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                                            </a>
                                            <!-- Delete Button -->
                                            <a href="javascript:void(0);" onclick="deleteMessage({{ $item->id }})"
                                               title="Delete" class="btn btn-soft-danger btn-sm">
                                                <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
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
                    <h5 class="modal-title">Message Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="fw-bold">Sender Name:</label>
                            <p id="view_name" class="form-control-plaintext bg-light px-2 py-1 rounded"></p>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold">Email:</label>
                            <p id="view_email" class="form-control-plaintext bg-light px-2 py-1 rounded"></p>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold">Phone:</label>
                            <p id="view_phone" class="form-control-plaintext bg-light px-2 py-1 rounded"></p>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold">Interest Topic:</label>
                            <p id="view_interest" class="form-control-plaintext bg-light px-2 py-1 rounded"></p>
                        </div>
                        <div class="col-12">
                            <label class="fw-bold">Message:</label>
                            <div id="view_message" class="bg-light p-3 rounded" style="white-space: pre-wrap; min-height: 100px;"></div>
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
        // View Modal Data Pass
        $(document).on("click", "a[data-bs-target='#viewMessage']", function () {
            let name = $(this).data("name");
            let email = $(this).data("email");
            let phone = $(this).data("phone");
            let interest = $(this).data("interest");
            let message = $(this).data("message");

            $("#view_name").text(name);
            $("#view_email").text(email);
            $("#view_phone").text(phone);
            $("#view_interest").text(interest);
            $("#view_message").text(message);
        });

        // Delete Message via AJAX
        function deleteMessage(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this message!",
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
                            $("#messageTable").load(location.href + ' #messageTable>*', "");
                            Swal.fire({
                                icon: 'success',
                                title: 'Message Deleted Successfully',
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
