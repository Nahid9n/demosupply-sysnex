@extends('backEnd.layout.master')
@section('title','General Setting')
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="mb-0 fw-semibold">Company Settings</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card floating-card bg-transparent mb-1">
                    <div class="card-body d-flex justify-content-end">
                        <div class="d-flex">
                            <a href="{{url()->previous()}}"
                               class="btn btn-sm btn-dark me-2 d-flex align-items-center custom_btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M15 6l-6 6l6 6"/>
                                </svg>
                                BACK
                            </a>
                            <button type="submit" class="btn btn-primary btn-sm custom_btn d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"/>
                                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"/>
                                    <path d="M14 4l0 4l-6 0l0 -4"/>
                                </svg>
                                SAVE
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Basic Settings Card -->
                <div class="card mb-4 shadow-lg">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Basic Info</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="simpleinput" class="form-label">Company Name</label>
                                <input type="text" id="simpleinput" class="form-control" name="company_name" value="{{$web_setting->company_name}}" placeholder="Company Name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="company_title" class="form-label">Company Title</label>
                                <input type="text" id="company_title" name="company_title" value="{{$web_setting->company_title}}" placeholder="Company Title" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="example-email" class="form-label">Email</label>
                                <input type="email" id="example-email" value="{{$web_setting->email}}" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="example-email_2" class="form-label">Email 2</label>
                                <input type="email" id="example-email_2" value="{{$web_setting->email_2}}" name="email_2" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="example-phone" class="form-label">Phone</label>
                                <input type="tel" id="example-phone" value="{{$web_setting->phone}}" name="phone" class="form-control" placeholder="Phone">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="example-phone_2" class="form-label">Phone 2</label>
                                <input type="tel" id="example-phone_2" value="{{$web_setting->phone_2}}" name="phone_2" class="form-control" placeholder="phone 2">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="example-header_logo" class="form-label">Header Logo</label>
                                <input type="file" id="example-header_logo" name="header_logo" class="form-control">
                                <img src="{{asset($web_setting->header_logo)}}" alt="" class="img-fluid w-25 mt-1">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="example-footer_logo" class="form-label">Footer Logo</label>
                                <input type="file" id="example-footer_logo" name="footer_logo" class="form-control">
                                <img src="{{asset($web_setting->footer_logo)}}" alt="" class="img-fluid w-25 mt-1">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="example-favicon_logo" class="form-label">Favicon Logo</label>
                                <input type="file" id="example-favicon_logo" name="favicon_logo" class="form-control">
                                <img src="{{asset($web_setting->favicon_logo)}}" alt="" class="mt-1" style="width: 100px">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="example-address" class="form-label">Address</label>
                                <textarea class="form-control" id="example-address" name="address" rows="5">{{$web_setting->address}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Links & Google Map Settings -->
                <div class="card mb-4 shadow-lg">
                    <div class="card-header  bg-dark text-white">
                        <h5 class="mb-0">Social Links & Integrations</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Facebook URL</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white"><i class="ri-facebook-fill"></i></span>
                                    <input type="url" name="facebook" value="{{$web_setting->facebook}}" class="form-control" placeholder="https://facebook.com/page">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">WhatsApp Number / Link</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-success text-white">
                                        <i class="ri-whatsapp-line"></i>
                                    </span>
                                    <input type="text" name="whatsapp" value="{{$web_setting->whatsapp}}" class="form-control" placeholder="e.g., https://wa.me/88017XXXXXXXX">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Messenger URL</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-info text-white"><i class="ri-messenger-line"></i></span>
                                    <input type="url" name="messenger" value="{{$web_setting->messenger}}" class="form-control" placeholder="https://m.me/username">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Twitter / X URL</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-white"><i class="ri-twitter-line"></i></span>
                                    <input type="url" name="twitter" value="{{$web_setting->twitter}}" class="form-control" placeholder="https://twitter.com/username">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">LinkedIn URL</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-secondary text-white"><i class="ri-linkedin-line"></i></span>
                                    <input type="url" name="linkedin" value="{{$web_setting->linkedin}}" class="form-control" placeholder="https://linkedin.com/company/name">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">YouTube Channel URL</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-danger text-white"><i class="ri-youtube-line"></i></span>
                                    <input type="url" name="youtube" value="{{$web_setting->youtube}}" class="form-control" placeholder="https://youtube.com/c/channelname">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="google_map" class="form-label">Google Map Embed Code (Iframe)</label>
                                <textarea class="form-control" id="google_map" name="google_map" rows="4" placeholder="<iframe src='https://www.google.com/maps/embed...'></iframe>">{{$web_setting->google_map}}</textarea>
                                <small class="text-muted">Google maps থেকে Share > Embed a map অপশনের সম্পূর্ণ iframe কোডটি এখানে পেস্ট করুন।</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trust Metrics Section (Quick Trims Matrix) -->
                <div class="card mb-4 shadow-lg">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Trust Metrics (Quick Trims Matrix)</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Metric 1 -->
                            <div class="col-md-3 mb-3">
                                <h6 class="fw-bold text-info mb-2">Metric 1</h6>
                                <div class="mb-2">
                                    <label class="form-label fs-7">Title</label>
                                    <input type="text" name="metric_1_title" value="{{$web_setting->metric_1_title}}" class="form-control" placeholder="">
                                </div>
                                <div>
                                    <label class="form-label fs-7">Short Description</label>
                                    <input type="text" name="metric_1_desc" value="{{$web_setting->metric_1_desc}}" class="form-control" placeholder="=">
                                </div>
                            </div>

                            <!-- Metric 2 -->
                            <div class="col-md-3 mb-3">
                                <h6 class="fw-bold text-warning mb-2">Metric 2</h6>
                                <div class="mb-2">
                                    <label class="form-label fs-7">Title</label>
                                    <input type="text" name="metric_2_title" value="{{$web_setting->metric_2_title}}" class="form-control" placeholder="">
                                </div>
                                <div>
                                    <label class="form-label fs-7">Short Description</label>
                                    <input type="text" name="metric_2_desc" value="{{$web_setting->metric_2_desc}}" class="form-control" placeholder="">
                                </div>
                            </div>

                            <!-- Metric 3 -->
                            <div class="col-md-3 mb-3">
                                <h6 class="fw-bold text-success mb-2">Metric 3</h6>
                                <div class="mb-2">
                                    <label class="form-label fs-7">Title</label>
                                    <input type="text" name="metric_3_title" value="{{$web_setting->metric_3_title}}" class="form-control" placeholder="">
                                </div>
                                <div>
                                    <label class="form-label fs-7">Short Description</label>
                                    <input type="text" name="metric_3_desc" value="{{$web_setting->metric_3_desc}}" class="form-control" placeholder="">
                                </div>
                            </div>

                            <!-- Metric 4 -->
                            <div class="col-md-3 mb-3">
                                <h6 class="fw-bold text-indigo mb-2">Metric 4</h6>
                                <div class="mb-2">
                                    <label class="form-label fs-7">Title</label>
                                    <input type="text" name="metric_4_title" value="{{$web_setting->metric_4_title}}" class="form-control" placeholder="">
                                </div>
                                <div>
                                    <label class="form-label fs-7">Short Description</label>
                                    <input type="text" name="metric_4_desc" value="{{$web_setting->metric_4_desc}}" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Premium Advantage Section Settings -->
                <div class="card mb-4 shadow-lg">
                    <div class="card-header  bg-dark text-white">
                        <h5 class="mb-0">Premium Advantage Section Settings</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="advantage_title" class="form-label">Advantage Section Title</label>
                                <input type="text" id="advantage_title" name="advantage_title" value="{{$web_setting->advantage_title}}" placeholder="" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="advantage_description" class="form-label">Advantage Section Description</label>
                                <textarea class="form-control" id="advantage_description" name="advantage_description" rows="3" placeholder="Description content...">{{$web_setting->advantage_description}}</textarea>
                            </div>

                            <!-- Feature 1 -->
                            <div class="col-md-6 mb-3 border-end">
                                <h6 class="fw-bold text-primary mb-2">Feature 1 (Left)</h6>
                                <div class="mb-2">
                                    <label class="form-label">Feature 1 Title</label>
                                    <input type="text" name="feature_1_title" value="{{$web_setting->feature_1_title}}" class="form-control" placeholder="">
                                </div>
                                <div>
                                    <label class="form-label">Feature 1 Description</label>
                                    <textarea name="feature_1_desc" class="form-control" rows="2" placeholder="Feature 1 details...">{{$web_setting->feature_1_desc}}</textarea>
                                </div>
                            </div>

                            <!-- Feature 2 -->
                            <div class="col-md-6 mb-3">
                                <h6 class="fw-bold text-primary mb-2">Feature 2 (Right)</h6>
                                <div class="mb-2">
                                    <label class="form-label">Feature 2 Title</label>
                                    <input type="text" name="feature_2_title" value="{{$web_setting->feature_2_title}}" class="form-control" placeholder="">
                                </div>
                                <div>
                                    <label class="form-label">Feature 2 Description</label>
                                    <textarea name="feature_2_desc" class="form-control" rows="2" placeholder="Feature 2 details...">{{$web_setting->feature_2_desc}}</textarea>
                                </div>
                            </div>

                            <!-- Section Image -->
                            <div class="col-md-6 mb-3 mt-2">
                                <label for="advantage_image" class="form-label">Advantage Section Image</label>
                                <input type="file" id="advantage_image" name="advantage_image" class="form-control">
                                @if($web_setting->advantage_image)
                                    <img src="{{asset($web_setting->advantage_image)}}" alt="Advantage Image" class="img-fluid w-25 mt-2 rounded">
                                @endif
                            </div>

                            <div class="col-md-6 mb-3">
                                <h6 class="fw-bold text-primary mb-2">Top Header Slide Text</h6>
                                <div>
                                    <textarea name="header_top_text" class="form-control" rows="2" placeholder="Top Header Slide Text...">{{$web_setting->header_top_text}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
