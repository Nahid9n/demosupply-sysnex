@extends('frontEnd.layout.app')
@section('title','Request A Quote')
@section('body')
    <section class="product-hero py-5" style="background-color: #f4f6f9;">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center mb-5 mt-3 reveal">
                <h1 class="fw-bold" style="color: #1a2b4c;">Request A Quote</h1>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12">
                    <!-- Main Card Wrapper -->
                    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">

                        <!-- Progress Steps Bar (from image) -->
                        <div class="d-flex align-items-center justify-content-center mb-5">
                            <div class="position-relative w-50 d-flex align-items-center justify-content-between">
                                <div class="position-absolute top-50 start-0 translate-y-50 w-100 bg-light-subtle" style="height: 2px; border-bottom: 2px solid #e0e0e0; z-index: 1;"></div>
                                <div class="rounded-circle d-flex align-items-center justify-content-center text-white shadow-sm" style="width: 24px; height: 24px; background-color: #1a2b4c; z-index: 2; font-size: 12px;"><i class="fa-solid fa-check"></i></div>
                                <div class="rounded-circle bg-white border border-2 d-flex align-items-center justify-content-center shadow-sm" style="width: 24px; height: 24px; z-index: 2; border-color: #e0e0e0 !important;"></div>
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <h3 class="fw-bold" style="color: #1a2b4c;">Let's get started!</h3>
                            <small class="text-muted">* Indicates a required field</small>
                        </div>

                        <div class="row g-5">
                            <!-- Left Side: Form Fields -->
                            <div class="col-lg-7">
                                <form id="contactFormSubmit" action="{{ route('contact.submit') }}" method="post">
                                    @csrf
                                    <div class="row g-3">
                                        <!-- First Name & Last Name -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold text-dark small">First Name*</label>
                                            <input name="first_name" type="text" class="form-control bg-light border-0 py-2" placeholder="ex. Jane" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold text-dark small">Last Name*</label>
                                            <input name="last_name" type="text" class="form-control bg-light border-0 py-2" placeholder="ex. Smith" required>
                                        </div>

                                        <!-- Email & Phone -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold text-dark small">Email*</label>
                                            <input name="email" type="email" class="form-control bg-light border-0 py-2" placeholder="ex. jane.smith@example.com" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold text-dark small">Phone Number*</label>
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
                                            <label class="form-label fw-semibold text-dark small">Zip Code*</label>
                                            <input name="zip_code" type="text" class="form-control bg-light border-0 py-2" placeholder="ex. 95765" required>
                                        </div>
                                        <div class="col-md-6"></div>

                                        <!-- Street & Suite Address -->
                                        <div class="col-md-7">
                                            <label class="form-label fw-semibold text-dark small">Street Address*</label>
                                            <input name="street_address" type="text" class="form-control bg-light border-0 py-2" placeholder="ex. 1234 Example St, New York" required>
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label fw-semibold text-dark small">Apartment/Suite (optional)</label>
                                            <input name="apartment" type="text" class="form-control bg-light border-0 py-2" placeholder="Apt 123, Suite A">
                                        </div>

                                        <!-- Service / Type of Cleaning (Dynamic Loop formatted as Radio/Select style) -->
                                        <div class="col-12">
                                            <label class="form-label fw-semibold text-dark small d-block">Type of Interest / Service*</label>
                                            <div class="d-flex flex-wrap gap-3">
                                                @foreach($services as $key => $service)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="interest" id="service_{{$service->id}}" value="{{$service->id}}" {{ $key == 0 ? 'checked' : '' }}>
                                                        <label class="form-check-label text-dark" for="service_{{$service->id}}">
                                                            {{$service->name}}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <!-- Frequency (Additional static field from image) -->
                                        <div class="col-12">
                                            <label class="form-label fw-semibold text-dark small d-block">Frequency*</label>
                                            <div class="d-flex gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frequency" id="freqRecurring" value="Recurring" checked>
                                                    <label class="form-check-label text-dark" for="freqRecurring">Recurring</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="frequency" id="freqOneTime" value="One-Time">
                                                    <label class="form-check-label text-dark" for="freqOneTime">One-Time Clean</label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Message (Retained for contact detail flexability) -->
                                        <div class="col-12">
                                            <label class="form-label fw-semibold text-dark small">Additional Message/Notes</label>
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

                            <!-- Right Side: Features / Highlights Points Box (from image) -->
                            <div class="col-lg-5 d-flex flex-column gap-3 justify-content-start pt-2">
                                <!-- ১. Locally Owned and Operated -->
                                <div class="d-flex align-items-center gap-3 p-3 rounded-3" style="background-color: #fff2f5; border-left: 5px solid #e62a5a;">
                                    <!-- এখানে flex-shrink-0 ক্লাস যুক্ত করা হয়েছে -->
                                    <span class="d-flex align-items-center justify-content-center text-white rounded-circle shadow-sm flex-shrink-0" style="width:28px; height:28px; background-color: #e62a5a;">
            <i class="fa-solid fa-check fs-6"></i>
        </span>
                                    <span class="fw-bold text-dark-emphasis" style="font-size: 14px;">Locally Owned and Operated</span>
                                </div>

                                <!-- ২. Trained, Insured, and Background Checked Professionals -->
                                <div class="d-flex align-items-center gap-3 p-3 rounded-3" style="background-color: #fff2f5; border-left: 5px solid #e62a5a;">
        <span class="d-flex align-items-center justify-content-center text-white rounded-circle shadow-sm flex-shrink-0" style="width:28px; height:28px; background-color: #e62a5a;">
            <i class="fa-solid fa-check fs-6"></i>
        </span>
                                    <span class="fw-bold text-dark-emphasis" style="font-size: 14px;">Trained, Insured, and Background Checked Professionals</span>
                                </div>

                                <!-- ৩. Consistent, High-Quality Service -->
                                <div class="d-flex align-items-center gap-3 p-3 rounded-3" style="background-color: #fff2f5; border-left: 5px solid #e62a5a;">
        <span class="d-flex align-items-center justify-content-center text-white rounded-circle shadow-sm flex-shrink-0" style="width:28px; height:28px; background-color: #e62a5a;">
            <i class="fa-solid fa-check fs-6"></i>
        </span>
                                    <span class="fw-bold text-dark-emphasis" style="font-size: 14px;">Consistent, High-Quality Service</span>
                                </div>

                                <!-- ৪. Flexible and Hassle-Free -->
                                <div class="d-flex align-items-center gap-3 p-3 rounded-3" style="background-color: #fff2f5; border-left: 5px solid #e62a5a;">
        <span class="d-flex align-items-center justify-content-center text-white rounded-circle shadow-sm flex-shrink-0" style="width:28px; height:28px; background-color: #e62a5a;">
            <i class="fa-solid fa-check fs-6"></i>
        </span>
                                    <span class="fw-bold text-dark-emphasis" style="font-size: 14px;">Flexible and Hassle-Free</span>
                                </div>
                            </div>
                        </div>

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
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
                            text: 'Thank you! Your quote request has been submitted successfully.',
                            showConfirmButton: true,
                            confirmButtonColor: '#1a2b4c',
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
                            confirmButtonColor: '#e62a5a'
                        });
                    }
                });
            });
        });
    </script>
@endpush
