@extends('backEnd.layout.master')
@section('title','Dashboard')
@section('body')
    <!-- ========== Page Title Start ========== -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="mb-0 fw-semibold">Analytics & Insights</h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Analytics</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- ========== Page Title End ========== -->
    <!-- Dashboard Metric Cards -->
    <div class="row">
        <!-- Card 1: Active Services -->
        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="avatar-md bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="ri-service-fill fs-24 text-primary"></i>
                            </div>
                            <p class="text-muted mb-1 mt-3 small text-uppercase fw-semibold">Total Services</p>
                            <h3 class="text-dark fw-bold mb-0">{{ $totalServices }}</h3>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-success-subtle text-success rounded-pill px-2 py-1 fs-12">Active</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Total Articles -->
        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="avatar-md bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="ri-blogger-fill fs-24 text-warning"></i>
                            </div>
                            <p class="text-muted mb-1 mt-3 small text-uppercase fw-semibold">Total Articles</p>
                            <h3 class="text-dark fw-bold mb-0">{{ $totalArticles }}</h3>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-info-subtle text-info rounded-pill px-2 py-1 fs-12">Blogs</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Client Testimonials -->
        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="avatar-md bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="ri-team-fill fs-24 text-success"></i>
                            </div>
                            <p class="text-muted mb-1 mt-3 small text-uppercase fw-semibold">Testimonials</p>
                            <h3 class="text-dark fw-bold mb-0">{{ $totalTestimonials }}</h3>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-success-subtle text-success rounded-pill px-2 py-1 fs-12">Reviews</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4: Unread Messages -->
        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="avatar-md bg-danger bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="ri-message-3-fill fs-24 text-danger"></i>
                            </div>
                            <p class="text-muted mb-1 mt-3 small text-uppercase fw-semibold">Total Messages</p>
                            <h3 class="text-dark fw-bold mb-0">{{ $totalMessages }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 📅 টপ হেডার এবং ফিল্টার সেকশন -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">📊 Performance & Traffic Reports</h4>
        <form action="{{ route('admin.dashboard') }}" method="GET" id="filterForm">
            <select name="filter" class="form-select" onchange="document.getElementById('filterForm').submit()">
                <option value="today" {{ $filter == 'today' ? 'selected' : '' }}>Today</option>
                <option value="yesterday" {{ $filter == 'yesterday' ? 'selected' : '' }}>Yesterday</option>
                <option value="last_7_days" {{ $filter == 'last_7_days' ? 'selected' : '' }}>Last 7 Days</option>
                <option value="last_30_days" {{ $filter == 'last_30_days' ? 'selected' : '' }}>Last 30 Days</option>
            </select>
        </form>
    </div>

    <!-- 📈 কাউন্টার উইজেটস -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card border-0 bg-primary text-white shadow-sm rounded-3">
                <div class="card-body p-4">
                    <span class="text-white fw-bold small text-uppercase">Total Page Views</span>
                    <h2 class="mt-2 mb-0 fw-bold">{{ number_format($totalClicks) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 bg-success text-white shadow-sm rounded-3">
                <div class="card-body p-4">
                    <span class="text-white fw-bold small text-uppercase">Unique Visitors</span>
                    <h2 class="mt-2 mb-0 fw-bold">{{ number_format($uniqueVisitors) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 bg-danger text-white shadow-sm rounded-3">
                <div class="card-body p-4">
                    <span class="text-white fw-bold small text-uppercase">Single-Click Visitors</span>
                    <h2 class="mt-2 mb-0 fw-bold">{{ $bounceRateEstimate }}% <small class="fs-6">(Bounce Appx)</small></h2>
                </div>
            </div>
        </div>
    </div>

    <!-- 📉 নতুন ফিচার: Hourly Traffic Trend (Line Chart) -->
    <div class="card shadow-sm mb-4 border-0">
        <div class="card-header text-dark bg-white py-3 fw-bold border-bottom">⏰ Hourly Traffic Trend (24-Hour Distribution)</div>
        <div class="card-body">
            <div style="height: 300px; width: 100%;">
                <canvas id="trendChart"></canvas>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- 🔥 Top 5 Pages -->
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header text-dark bg-white py-3 fw-bold d-flex align-items-center">
                    <span>📊 Top 5 Visited Services</span>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0 align-middle">
                        <tbody>
                        @forelse($topServices as $service)
                            <tr>
                                <td class="ps-3">
                                    <span class="fw-semibold text-slate-800">{{ $service->name }}</span>
{{--                                    <br>--}}
{{--                                    <small class="text-muted">/service/{{ $service->slug }}</small>--}}
                                </td>
                                <td class="text-end pe-3">
                                    <span class="badge bg-primary text-white">{{ $service->total_views ?? $service->views_count ?? 0 }} views</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center py-4 text-muted">No service views recorded in this period.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header text-dark bg-white py-3 fw-bold">🔥 Top 5 Visited Pages</div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0 align-middle">
                        <tbody>
                        @foreach($topPages as $page)
                            <tr>
                                <td class="ps-3"><code class="text-primary">{{ Str::limit($page->url, 45) }}</code></td>
                                <td class="text-end pe-3"><span class="badge bg-light text-dark">{{ $page->total }} hits</span></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- 🌐 Top Traffic Sources (Referrers) -->
        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header text-dark bg-white py-3 fw-bold">📣 Top Referral Channels</div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0 align-middle">
                        <tbody>
                        @foreach($topReferrers as $ref)
                            <tr>
                                <td class="ps-3">🌐 <span class="fw-semibold">{{ $ref->referrer }}</span></td>
                                <td class="text-end pe-3"><span class="badge bg-soft-success bg-secondary text-dark">{{ $ref->total }} sessions</span></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- 📱 Device Breakdown -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header text-dark bg-white py-3 fw-bold">📱 Platform Distribution</div>
                <div class="card-body d-flex align-items-center justify-content-center">
                    <div style="width: 220px; height: 220px;">
                        <canvas id="deviceChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- 🌍 Browser Breakdown -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header text-dark bg-white py-3 fw-bold">🌐 Preferred Browsers</div>
                <div class="card-body d-flex align-items-center justify-content-center">
                    <div style="width: 220px; height: 220px;">
                        <canvas id="browserChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header bg-white py-3 fw-bold">🌍 Top 5 Visitor Countries</div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0 align-middle">
                        <tbody>
                        @foreach($countryData as $cData)
                            <tr>
                                <td class="ps-3">📍 <span class="fw-semibold">{{ $cData->country }}</span></td>
                                <td class="text-end pe-3"><span class="badge bg-info text-white">{{ $cData->total }} clicks</span></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Recent Messages Table Row -->
    <div class="row mt-4">
        <div class="col-xl-12">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center pt-3 px-3">
                    <div>
                        <h5 class="fw-bold text-slate-900 mb-0">Recent Contact Messages</h5>
                        <p class="text-muted small mb-0">Latest inquiries from clients</p>
                    </div>
                    <a href="{{ route('admin.message') }}" class="btn btn-soft-primary btn-sm rounded-2">
                        View All Messages <i class="ri-arrow-right-line ms-1 align-middle"></i>
                    </a>
                </div>
                <div class="card-body p-0 mt-2">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light text-uppercase fs-13 text-muted">
                            <tr>
                                <th class="ps-3">Sender</th>
                                <th>Email</th>
                                <th>Interest Service</th>
                                <th>Date Received</th>
                                <th class="text-center">Status</th>
                                <th class="text-end pe-3">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($recentMessages as $msg)
                                <tr class="{{ $msg->status == 0 ? 'fw-medium bg-light-subtle' : '' }}">
                                    <td class="ps-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-xs rounded-circle bg-soft-primary text-primary d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; font-size: 12px;">
                                                {{ strtoupper(substr($msg->name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <span class="text-dark d-block mb-0">{{ $msg->name }}</span>
                                                <small class="text-muted fs-11">{{ $msg->phone ?? 'No Phone' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $msg->email }}</td>
                                    <td>
                                            <span class="badge bg-light text-secondary border px-2 py-1">
                                                {{ $msg->get_service->name ?? 'General Enquiry' }}
                                            </span>
                                    </td>
                                    <td>{{ $msg->created_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        @if($msg->status == 0)
                                            <span class="badge bg-danger-subtle text-danger rounded-pill px-2">Unread</span>
                                        @else
                                            <span class="badge bg-success-subtle text-success rounded-pill px-2">Read</span>
                                        @endif
                                    </td>
                                    <td class="text-end pe-3">
                                        {{-- সরাসরি মেসেজ মেইন পেইজে গিয়ে দেখার জন্য লিংক --}}
                                        <a href="{{ route('admin.message') }}" class="btn btn-sm btn-light border-0 rounded-2 p-1 px-2" title="View Details">
                                            <i class="ri-eye-line align-middle text-primary fs-16"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        <i class="ri-mail-open-line fs-24 text-secondary mb-1 d-block"></i>
                                        <p class="mb-0 small fw-medium">No recent messages found.</p>
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
@endsection

@push('css')
    <style>
        /* নতুন মেসেজ থাকলে অ্যাকশন রিকোয়ার্ড ব্যাজটি যাতে মৃদু ব্লিঙ্ক বা পালস করে */
        .pulse {
            animation: pulse-animation 2s infinite;
        }
        @keyframes pulse-animation {
            0% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.4); }
            70% { box-shadow: 0 0 0 6px rgba(239, 68, 68, 0); }
            100% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
        }
        .bg-soft-primary {
            background-color: rgba(var(--bs-primary-rgb), 0.1);
        }
    </style>
@endpush
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {

            // ১. ⏰ Hourly Trend (Line Chart Script)
            let hourlyData = {!! json_encode($hourlyTicks) !!};
            const ctxTrend = document.getElementById('trendChart').getContext('2d');
            new Chart(ctxTrend, {
                type: 'line',
                data: {
                    labels: Array.from({length: 24}, (_, i) => `${i}:00`),
                    datasets: [{
                        label: 'Hourly Page Views',
                        data: hourlyData,
                        borderColor: '#0d6efd',
                        backgroundColor: 'rgba(13, 110, 253, 0.08)',
                        fill: true,
                        tension: 0.3,
                        pointRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true } }
                }
            });

            // ২. 📱 Device Chart
            let deviceLabels = {!! json_encode($deviceData->pluck('device')) !!};
            let deviceCounts = {!! json_encode($deviceData->pluck('total')) !!};
            const ctxDevice = document.getElementById('deviceChart').getContext('2d');
            new Chart(ctxDevice, {
                type: 'doughnut',
                data: {
                    labels: deviceLabels.map(l => l ? l.toUpperCase() : 'UNKNOWN'),
                    datasets: [{
                        data: deviceCounts,
                        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e']
                    }]
                },
                options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'bottom' } } }
            });

            // ৩. 🌐 Browser Chart
            let browserLabels = {!! json_encode($browserData->pluck('browser')) !!};
            let browserCounts = {!! json_encode($browserData->pluck('total')) !!};
            const ctxBrowser = document.getElementById('browserChart').getContext('2d');
            new Chart(ctxBrowser, {
                type: 'pie',
                data: {
                    labels: browserLabels,
                    datasets: [{
                        data: browserCounts,
                        backgroundColor: ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56', '#4bc0c0']
                    }]
                },
                options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'bottom' } } }
            });

        });
    </script>
@endpush
