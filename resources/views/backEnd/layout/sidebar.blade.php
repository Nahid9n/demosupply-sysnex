<div class="main-nav">
    <!-- Sidebar Logo -->
    <div class="text-center my-2">
        {{--<a href="{{route('admin.dashboard')}}" class="logo-dark">
            <img style="width: 200px; aspect-ratio:2/3 " src="{{asset($web_setting->header_logo)}}" class="logo-sm" alt="logo sm">
            <img style="width: 200px; aspect-ratio:2/3 " src="{{asset($web_setting->header_logo)}}" class="logo-lg" alt="logo dark">
        </a>

        <a href="{{route('admin.dashboard')}}" class="logo-light">
            <img style="width: 200px; aspect-ratio:2/3 " src="{{asset($web_setting->header_logo)}}" class="logo-sm" alt="logo sm">
            <img style="width: 200px; aspect-ratio:2/3 " src="{{asset($web_setting->header_logo)}}" class="logo-lg" alt="logo light">
        </a>--}}
        <a class="fw-bold text-success" href="{{route('admin.dashboard')}}" style="font-size: 25px">
            {{$web_setting->company_name}}
        </a>
    </div>
    <hr>

    <!-- Menu Toggle Button (sm-hover) -->
    <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
        <i class="ri-menu-2-line fs-24 button-sm-hover-icon"></i>
    </button>

    <div class="scrollbar" data-simplebar>
        <!-- Menu Search -->
        <div class="px-3 mb-3">
            <div class="input-group">
                <input type="text" id="menuSearch" class="form-control" placeholder="Search menu...">
            </div>
        </div>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title">Menu</li>
            @can('dashboard')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.dashboard')}}">
                        <span class="nav-icon"><i class="ri-dashboard-2-line"></i></span>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
            @endcan
            @can('service.list')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.services.index')}}">
                        <span class="nav-icon"><i class="ri-service-fill"></i></span>
                        <span class="nav-text">Services</span>
                    </a>
                </li>
            @endcan
            @can('gallery.list')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.gallery.index')}}">
                        <span class="nav-icon"><i class="ri-gallery-fill"></i></span>
                        <span class="nav-text">Gallery</span>
                    </a>
                </li>
            @endcan
            @can('testimonial.list')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.testimonial.index')}}">
                        <span class="nav-icon"><i class="ri-team-fill"></i></span>
                        <span class="nav-text">Testimonial</span>
                    </a>
                </li>
            @endcan
            @can('faq.list')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.faq.index')}}">
                        <span class="nav-icon"><i class="ri-question-fill"></i></span>
                        <span class="nav-text">Faqs</span>
                    </a>
                </li>
            @endcan
            @can('slider.list')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.slider.index') }}">
                        <span class="nav-icon"><i class="ri-slideshow-2-fill"></i></span>
                        <span class="nav-text">Sliders</span>
                    </a>
                </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.message')}}">
                    <span class="nav-icon">
                        <i class="ri-message-3-fill"></i>
                    </span>
                    <span class="nav-text">Messages</span>
                </a>
            </li>

            @canany(['article.list','article.category.list'])
                <li class="nav-item">
                    <a class="nav-link menu-arrow" href="#sidebarArticle" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <span class="nav-icon"><i class="ri-blogger-fill"></i></span>
                        <span class="nav-text"> Articles </span>
                    </a>
                    <div class="collapse" id="sidebarArticle">
                        <ul class="nav sub-navbar-nav">
                            @can('article.list')
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{route('admin.article.index')}}">Articles</a>
                                </li>
                            @endcan
                                @can('article.category.list')
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="{{route('admin.article.category.index')}}">Category</a>
                            </li>
                                @endcan
                        </ul>
                    </div>
                </li>
            @endcan

            @can('setting')
                <li class="nav-item">
                    <a class="nav-link menu-arrow" href="#sidebarSettings" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <span class="nav-icon"><i class="ri-settings-2-fill"></i></span>
                        <span class="nav-text"> Settings </span>
                    </a>
                    <div class="collapse" id="sidebarSettings">
                        <ul class="nav sub-navbar-nav">
                            @can('dashboard')
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{route('admin.general.settings')}}">General Settings</a>
                                </li>
                            @endcan
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="{{route('admin.about.us')}}">About Us</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan
            @if (auth()->user()->can('user.list'))
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.user.index')}}">
                    <span class="nav-icon">
                        <i class="ri-user-2-fill"></i>
                    </span>
                    <span class="nav-text">Users</span>
                </a>
            </li>
            @endif
            @if (auth()->user()->can('seo.list'))
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.seo.index')}}">
                    <span class="nav-icon">
                        <i class="ri-search-2-line"></i>
                    </span>
                    <span class="nav-text">Seo Management</span>
                </a>
            </li>
            @endif
            @if (auth()->user()->can('role.permission') || auth()->user()->can('reset.password'))
                <li class="nav-item">
                    <a class="nav-link menu-arrow" href="#sidebarAuthentication" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuthentication">
                        <span class="nav-icon"><i class="ri-lock-password-line"></i></span>
                        <span class="nav-text"> Authentication </span>
                    </a>
                    <div class="collapse" id="sidebarAuthentication">
                        <ul class="nav sub-navbar-nav">
                            @if (auth()->user()->can('role.permission'))
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{route('admin.role.permission')}}">Role & Permission</a>
                                </li>
                            @endif
                            @if (auth()->user()->can('reset.password'))
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{route('admin.reset.password')}}">Reset Password</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</div>


@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const searchInput = document.getElementById('menuSearch');

            searchInput.addEventListener('input', function () {

                let keyword = this.value.toLowerCase();

                document.querySelectorAll('#navbar-nav .nav-item').forEach(function(item){

                    let text = item.textContent.toLowerCase();

                    if(keyword === ''){
                        item.style.display = '';

                        let collapse = item.querySelector('.collapse');
                        if(collapse){
                            collapse.classList.remove('show');
                        }

                    }else{

                        if(text.includes(keyword)){
                            item.style.display = '';

                            let collapse = item.querySelector('.collapse');
                            if(collapse){
                                collapse.classList.add('show');
                            }

                        }else{
                            item.style.display = 'none';
                        }
                    }
                });

            });

        });
    </script>

@endpush
@push('css')
    <style>
        #menuSearch{
            border-radius: 0 8px 8px 0;
        }

        .input-group-text{
            background: #fff;
            border-right: 0;
        }
    </style>
@endpush
