<footer>
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <a class="navbar-brand d-flex align-items-center text-white mb-3" href="{{route('home')}}" style="font-family:Poppins;font-weight:800;font-size:1.4rem;text-decoration:none">
                    <span class="logo-mark">
                        <i class="fa-solid fa-droplet"></i></span>
                    {{ $web_setting->company_name }}
                </a>
                <p class="text-muted-2" style="color:#94a3b8">
                    We are a premium, multi-service company engineered to handle your most critical everyday needs. By combining expert appliance & device repair, luxury executive transportation, lightning-fast express delivery, and professional commercial cleaning under one trusted brand, we bring unmatched convenience, peak efficiency, and transparent everyday pricing straight to your doorstep.
                </p>
                <div class="d-flex gap-3 mt-3">
                    @if(!empty($web_setting->facebook))
                    <a href="{{ $web_setting->facebook}}" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    @endif
                    @if(!empty($web_setting->twitter))
                    <a href="{{$web_setting->twitter}}" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
                     @endif
{{--                    <a href="{{$web_setting->facebook}}" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>--}}
                    @if(!empty($web_setting->linkedin))
                    <a href="{{$web_setting->linkedin}}" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                    @endif
                    @if(!empty($web_setting->youtube))
                    <a href="{{$web_setting->youtube}}" aria-label="Youtube"><i class="fa-brands fa-youtube"></i></a>
                    @endif
                </div>
            </div>
            <div class="col-6 col-lg-2">
                <h5>Company</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{route('home')}}">Home</a></li>
                    <li class="mb-2"><a href="{{route('contact')}}">Contact</a></li>
                    <li class="mb-2"><a href="{{route('about')}}">About</a></li>
                </ul>
            </div>
            @php
                $services = \App\Models\Service::where('status',1)->whereNull('parent_id')->latest()->get()->take(5)
            @endphp
            <div class="col-6 col-lg-3">
                <h5>Services</h5>
                <ul class="list-unstyled">
                    @foreach($services as $service)
                    <li class="mb-2"><a href="{{route('service.details',$service->slug)}}">{{$service->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-3">
                <h5>Get in touch</h5>
                <p class="mb-1"><i class="fa-solid fa-location-dot me-2 text-brand"></i> {{$web_setting->address}}</p>
                <p class="mb-1"><i class="fa-solid fa-envelope me-2 text-brand"></i>  {{$web_setting->email}}</p>
                <p class="mb-1"><i class="fa-solid fa-phone me-2 text-brand"></i>  {{$web_setting->phone}}</p>
            </div>
        </div>
        <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between">
            <span>&copy; 2026 {{env('APP_NAME')}}. All rights reserved.</span>
            <span>Designed & Developed By <a target="_blank" href="https://sysnexsoft.com/">sysnexsoft.com</a></span>
        </div>
    </div>
</footer>
