<header class="">
    <div class="topbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="d-flex align-items-center gap-2">
                    <!-- Menu Toggle Button -->
                    <div class="topbar-item">
                        <button type="button" class="button-toggle-menu topbar-button">
                            <i class="ri-menu-2-line fs-24"></i>
                        </button>
                    </div>

                    <!-- App Search-->
                    <form class="app-search d-none d-md-block me-auto">
                        <div class="position-relative">
                            <input type="search" class="form-control border-0" placeholder="Search..." autocomplete="off" value="">
                            <i class="ri-search-line search-widget-icon"></i>
                        </div>
                    </form>
                </div>

                <div class="d-flex align-items-center gap-1">
                    <!-- Theme Color (Light/Dark) -->
                    <div class="topbar-item">
                        <button type="button" class="topbar-button" id="light-dark-mode">
                            <i class="ri-moon-line fs-24 light-mode"></i>
                            <i class="ri-sun-line fs-24 dark-mode"></i>
                        </button>
                    </div>

                    <!-- Category -->
                    <div class="dropdown topbar-item d-none d-lg-flex">
                        <button type="button" class="topbar-button" data-toggle="fullscreen">
                            <i class="ri-fullscreen-line fs-24 fullscreen"></i>
                            <i class="ri-fullscreen-exit-line fs-24 quit-fullscreen"></i>
                        </button>
                    </div>

                    <!-- Notification -->
                    <div class="dropdown topbar-item">
                        @php
                            // আনরিড মেসেজের সংখ্যা কাউন্ট করা (status = 0)
                            $unreadCount = \App\Models\Message::where('status', 0)->count();
                            // ড্রপডাউনে দেখানোর জন্য সর্বশেষ ৫টি আনরিড মেসেজ গেট করা
                            $notificationMessages = \App\Models\Message::where('status', 0)->latest()->take(5)->get();
                        @endphp

                        <button type="button" class="topbar-button position-relative" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-notification-3-line fs-24"></i>
                            {{-- যদি আনরিড মেসেজ থাকে শুধু তখনই কাউন্টার ব্যাজটি দেখাবে --}}
                            @if($unreadCount > 0)
                                <span class="position-absolute topbar-badge fs-10 translate-middle badge bg-danger rounded-pill">
                {{ $unreadCount }}
                <span class="visually-hidden">unread messages</span>
            </span>
                            @endif
                        </button>

                        <div class="dropdown-menu py-0 dropdown-lg dropdown-menu-end" aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 fs-16 fw-semibold"> Notifications</h6>
                                        @if($unreadCount > 0)
                                            <small class="text-muted">You have {{ $unreadCount }} new {{ Str::plural('message', $unreadCount) }}</small>
                                        @else
                                            <small class="text-muted">No new messages</small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div data-simplebar style="max-height: 280px;">
                                @forelse($notificationMessages as $notifMessage)
                                    {{-- এখানে ক্লিক করলে যাতে সরাসরি মেসেজ লিস্ট পেজে চলে যায় সেই রাউটটি বসিয়ে দিবেন --}}
                                    <a href="{{route('admin.message')}}" class="dropdown-item py-3 border-bottom text-wrap bg-light-subtle">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                {{-- ইউজারের নামের প্রথম অক্ষর দিয়ে একটি ডাইনামিক ইনিশিয়াল গোল বক্স (অ্যাভাটারের বিকল্প হিসেবে সুন্দর দেখাবে) --}}
                                                <div class="avatar-sm rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2 fw-bold" style="width: 35px; height: 35px; font-size: 13px;">
                                                    {{ strtoupper(substr($notifMessage->name, 0, 1)) }}
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0">
                                                    <span class="fw-semibold text-dark">{{ $notifMessage->name }}</span>
                                                    sent a message regarding
                                                    <span class="fw-medium text-primary">"{{ $notifMessage->get_service->name ?? 'General Enquiry' }}"</span>
                                                </p>
                                                <small class="text-muted fs-11 d-block mt-1">
                                                    <i class="ri-time-line align-middle me-1"></i>{{ $notifMessage->created_at->diffForHumans() }}
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    {{-- কোনো মেসেজ না থাকলে ড্রপডাউনের ভেতরের ভিউ --}}
                                    <div class="text-center py-4 text-muted">
                                        <i class="ri-mail-open-line fs-24 text-secondary mb-2 d-block"></i>
                                        <p class="mb-0 fs-13 fw-medium">All caught up! No new messages.</p>
                                    </div>
                                @endforelse
                            </div>

                            <div class="text-center py-3">
                                {{-- ভিউ অল বাটনে আপনার কন্টাক্ট মেসেজের মেইন ব্লেড বা ইনডেক্স পেজের রাউট লিংক বসিয়ে দিন --}}
                                <a href="{{route('admin.message')}}" class="btn btn-primary btn-sm">
                                    View All Messages <i class="ri-arrow-right-line ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Theme Setting -->
                    <div class="topbar-item d-none d-md-flex">
                        <button type="button" class="topbar-button" id="theme-settings-btn" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                            <i class="ri-settings-4-line fs-24"></i>
                        </button>
                    </div>

                    <!-- User -->
                    <div class="dropdown topbar-item">
                        <a type="button" class="topbar-button" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="d-flex align-items-center">
                                             <img class="rounded-circle" width="32" src="{{asset(auth()->user()->avatar)}}" alt="avatar-3">
                                        </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <h6 class="dropdown-header">{{ auth()->user()->name }}</h6>
                            @if (auth()->user()->can('profile'))
                            <a class="dropdown-item" href="{{route('admin.profile')}}">
                                <i class="ri-profile-line align-middle me-2 fs-18"></i>
                                <span class="align-middle">Profile</span>
                            </a>
                            @endif
                            <div class="dropdown-divider my-1"></div>

                            <a href="javascript:void(0);" id="logout-btn" class="dropdown-item text-danger">
                                <iconify-icon icon="solar:logout-3-broken" class="align-middle me-2 fs-18"></iconify-icon>
                                <span class="align-middle">Logout</span>
                            </a>

                            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div></div>
</header>
