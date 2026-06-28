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

                        <div class="text-center mb-4">
                            <h3 class="mb-4">Request A Quote</h3>
                            <small class="text-muted">* Indicates a required field</small>
                        </div>
                        <form id="contactFormSubmit" action="{{ route('contact.submit') }}" method="post">
                            @csrf
                            <div class="row g-3">
                                <!-- First Name & Last Name -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-secondary small">First Name*</label>
                                    <input name="first_name" type="text" class="form-control bg-light border-0 py-2" placeholder="ex. Jane" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-secondary small">Last Name*</label>
                                    <input name="last_name" type="text" class="form-control bg-light border-0 py-2" placeholder="ex. Smith" required>
                                </div>

                                <!-- Email & Phone -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-secondary small">Email*</label>
                                    <input name="email" type="email" class="form-control bg-light border-0 py-2" placeholder="ex. jane.smith@example.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-secondary small">Phone Number*</label>
                                    <input name="phone" type="tel" class="form-control bg-light border-0 py-2" placeholder="(555) 555-5555" required>
                                </div>

                            {{--<!-- SMS Checkbox Opt-in -->
                            <div class="col-12 my-3">
                                <div class="form-check d-flex align-items-start gap-2">
                                    <input class="form-check-input mt-1" type="checkbox" name="sms_opt_in" id="smsOptIn" value="1">
                                    <label class="form-check-label text-muted" style="font-size: 11px; line-height: 1.4;" for="smsOptIn">
                                        <strong>Yes! You can text me service reminders and other messages.</strong><br>
                                        By checking this box, I agree to opt in to receive automated SMS messages. Message data rates may apply. View <a href="#" class="text-decoration-underline text-dark">Terms</a> and <a href="#" class="text-decoration-underline text-dark">Privacy Policy</a>.
                                    </label>
                                </div>
                            </div>--}}

                            <!-- Zip Code -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-secondary small">Zip Code*</label>
                                    <input name="zip_code" type="text" class="form-control bg-light border-0 py-2" placeholder="ex. 95765" required>
                                </div>
                                <div class="col-md-6"></div>

                                <!-- Street & Suite Address -->
                                <div class="col-md-7">
                                    <label class="form-label fw-semibold text-secondary small">Street Address*</label>
                                    <input name="street_address" type="text" class="form-control bg-light border-0 py-2" placeholder="ex. 1234 Example St, New York" required>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label fw-semibold text-secondary small">Apartment/Suite (optional)</label>
                                    <input name="apartment" type="text" class="form-control bg-light border-0 py-2" placeholder="Apt 123, Suite A">
                                </div>

                                <!-- Service / Type of Cleaning (Dynamic Loop formatted as Radio/Select style) -->
                                <div class="col-12">
                                    <label class="form-label fw-semibold text-secondary small d-block">Type of Interest / Service*</label>
                                    <div class="d-flex flex-wrap gap-3">
                                        @foreach($services as $key => $service)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="interest" id="service_{{$service->id}}" value="{{$service->id}}" {{ $key == 0 ? 'checked' : '' }}>
                                                <label class="form-check-label text-secondary" for="service_{{$service->id}}">
                                                    {{$service->name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Frequency (Additional static field from image) -->
                                <div class="col-12">
                                    <label class="form-label fw-semibold text-secondary small d-block">Frequency*</label>
                                    <div class="d-flex gap-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frequency" id="freqRecurring" value="Recurring" checked>
                                            <label class="form-check-label text-secondary" for="freqRecurring">Recurring</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="frequency" id="freqOneTime" value="One-Time">
                                            <label class="form-check-label text-secondary" for="freqOneTime">One-Time Clean</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Message (Retained for contact detail flexability) -->
                                <div class="col-12">
                                    <label class="form-label fw-semibold text-secondary small">Additional Message/Notes</label>
                                    <textarea name="message" class="form-control bg-light border-0" rows="3" placeholder="Tell us more about your requirements..."></textarea>
                                </div>

                                <!-- Form Buttons -->
                                <div class="col-12 d-flex align-items-center gap-3 mt-4">
                                    <button id="submitBtn" class="btn fw-bold px-4 py-2 text-white d-flex align-items-center" type="submit" style="background-color: #1a2b4c; border-radius: 6px;">
                                        <span id="btnText">Submit and Continue <i class="fa-solid fa-chevron-right ms-2 fs-6"></i></span>
                                        <span id="btnSpinner" class="d-none">
                                                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Sending...
                                                </span>
                                    </button>
                                    <a href="javascript:history.back()" class="text-decoration-none fw-semibold ps-2" style="color: #e62a5a;">Back</a>
                                    <span id="formMsg" class="text-success d-none ms-auto"><i class="fa-solid fa-circle-check me-1"></i> Sent!</span>
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
