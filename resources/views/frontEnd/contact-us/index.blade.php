@extends('frontEnd.layout.app')
@section('title','Contact Us')
@section('body')
    <section class="product-hero">
        <div class="container">
            <div class="text-center mb-5 reveal">
                <span class="eyebrow">Contact Us</span>
                <h1 class="section-title">Let's start a conversation</h1>
                <p class="text-muted-2 mx-auto" style="max-width:640px">Questions about our products, partnerships or support? Our team responds within one business day.</p>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-md-4 reveal">
                    <div class="contact-card text-center">
                        <div class="icon mx-auto">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <h5>Email</h5>
                        <p class="text-muted-2 mb-0">{{$web_setting->email}}</p>
                        <p class="text-muted-2 mb-0">{{$web_setting->email_2}}</p>
                    </div>
                </div>
                <div class="col-md-4 reveal">
                    <div class="contact-card text-center">
                        <div class="icon mx-auto">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <h5>Phone</h5>
                        <p class="text-muted-2 mb-0">{{$web_setting->phone}}</p>
                        <p class="text-muted-2 mb-0">{{$web_setting->phone_2}}</p>
                    </div>
                </div>
                <div class="col-md-4 reveal">
                    <div class="contact-card text-center">
                        <div class="icon mx-auto">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <h5>Office</h5>
                        <p class="text-muted-2 mb-0">{{ $web_setting->address }}</p>
                    </div>
                </div>
            </div>

            <div class="row g-5">
                <div class="col-lg-7 reveal">
                    <div class="contact-card">
                        <h3 class="mb-4">Send us a message</h3>
                        <form id="contactFormSubmit" action="{{ route('contact.submit') }}" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Full Name</label>
                                    <input name="name" type="text" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input name="phone" type="tel" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Interest</label>
                                    <select name="interest" class="form-select">
                                        @foreach($services as $service)
                                        <option value="{{$service->id}}">{{$service->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Message</label>
                                    <textarea name="message" class="form-control" rows="5" required></textarea>
                                </div>
                                <div class="col-12 d-flex align-items-center gap-3">
                                    <button id="submitBtn" class="btn btn-brand" type="submit">
                                        <span id="btnText"><i class="fa-solid fa-paper-plane me-2"></i>Send Message</span>
                                        <span id="btnSpinner" class="d-none">
                                            <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Sending...
                                        </span>
                                    </button>
                                    <span id="formMsg" class="text-success d-none"><i class="fa-solid fa-circle-check me-1"></i> Thanks — we'll be in touch soon.</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 reveal">
                    <div class="rounded-4 overflow-hidden shadow-sm" style="height:100%;min-height:420px">
                        {!! $web_setting->google_map !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Global Loader Overlay -->
    <div id="globalLoader" class="d-none justify-content-center align-items-center" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255,255,255,0.7); z-index: 999999;">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
@endsection
@push('js')
    <!-- jQuery CDN (যদি লেআউটে মিসিং থাকে তার জন্য ব্যাকআপ) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            // অন-সাবমিট ইভেন্ট হ্যান্ডলার সরাসরি ডকুমেন্টে বাইন্ড করা হয়েছে
            $(document).on('submit', '#contactFormSubmit', function (e) {
                e.preventDefault();

                let form = $(this);
                let url = form.attr('action');
                let formData = form.serialize();

                $('#globalLoader').removeClass('d-none').addClass('d-flex');
                $('#submitBtn').prop('disabled', true);
                $('#btnText').addClass('d-none');
                $('#btnSpinner').removeClass('d-none');
                $('#formMsg').addClass('d-none');

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        $('#globalLoader').removeClass('d-flex').addClass('d-none');
                        $('#submitBtn').prop('disabled', false);
                        $('#btnText').removeClass('d-none');
                        $('#btnSpinner').addClass('d-none');

                        form[0].reset();
                        $('#formMsg').removeClass('d-none');

                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Thank you! Your message has been sent successfully.',
                            showConfirmButton: true,
                            confirmButtonColor: '#3085d6',
                            timer: 3000
                        });
                    },
                    error: function (xhr) {
                        $('#globalLoader').removeClass('d-flex').addClass('d-none');
                        $('#submitBtn').prop('disabled', false);
                        $('#btnText').removeClass('d-none');
                        $('#btnSpinner').addClass('d-none');

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong! Please try again.',
                            confirmButtonColor: '#d33'
                        });
                    }
                });
            });
        });
    </script>
@endpush
