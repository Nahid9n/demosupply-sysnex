@extends('backEnd.layout.master')
@section('title', request()->has('parent_id') && $services->isNotEmpty() && $services->first()->parent ? 'Sub Services of ' . $services->first()->parent->name : 'Services')
@section('body')
    <div class="">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold text-slate-900 mb-0">
                    @if(request()->has('parent_id') && $services->isNotEmpty() && $services->first()->parent)
                        Sub Services of <span class="text-primary">"{{ $services->first()->parent->name }}"</span>
                    @elseif(request()->has('parent_id'))
                        Sub Service Lists
                    @else
                        Service Lists
                    @endif
                </h4>
                <p class="text-muted small mb-0">Manage your main services and their geo-targeted sub-services.</p>
            </div>

            <div class="d-flex gap-2">
                @if(request()->has('parent_id'))
                    <a href="{{ route('admin.services.index') }}" class="btn btn-light border rounded-3 px-4 py-2 fw-semibold">
                        <i class="ri-arrow-left-line me-1"></i> Back to Main Services
                    </a>
                @endif

                <a href="{{ route('admin.services.create') }}" class="btn btn-secondary rounded-3 px-4 py-2 fw-semibold">
                    <i class="ri-add-line me-1"></i> Add New Service
                </a>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="bg-primary text-uppercase text-wrap fs-6 fw-bold text-slate-700">
                    <tr>
                        <th class="ps-4 py-3 text-white">Service</th>
                        <th class="text-white">Slug</th>
                        <th class="text-white">Service Included / Prices</th>
                        <th class="text-white">Gallery</th>
                        <th class="text-white">Status</th>
                        <th class="text-end pe-4 text-white">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="fs-5">
                    @forelse($services as $srv)
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-3 bg-light d-flex align-items-center justify-content-center text-primary overflow-hidden" style="width: 80px; height: 60px;">
                                        @if($srv->hero_image)
                                            <img class="w-100 h-100" style="object-fit: cover;" src="{{ asset($srv->hero_image) }}" alt="">
                                        @else
                                            <i class="{{ $srv->icon_class ?? 'ri-customer-service-2-line' }} fs-3"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <h5 class="fw-bold text-slate-900 mb-0"><a href="{{route('service.details',$srv->slug)}}">{{ $srv->name }}</a></h5>
                                        <span class="text-muted fs-6">{{ $srv->page_title ?? 'No target title set' }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-muted fs-6">{{ $srv->slug }}</td>
                            <td>
                                <span class="badge bg-info-soft text-info px-2 py-1 rounded-2 fs-6">{{ $srv->items_count }} Items</span>
                                <span class="badge bg-emerald-soft text-emerald px-2 py-1 rounded-2 ms-1 fs-6">{{ $srv->pricings_count }} Rates</span>
                            </td>
                            <td><span class="badge bg-secondary-soft text-secondary px-2 py-1 rounded-2 fs-6">{{ $srv->gallery_count }} Images</span></td>
                            <td>
                                <span class="badge {{ $srv->status == 1 ? 'bg-success text-white' : 'bg-danger text-white' }} px-2 py-1 rounded-2 fs-6">
                                    {{ $srv->status == 1 ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-flex justify-content-end gap-2 align-items-center">
                                    @if(empty($srv->parent_id))
                                        <a href="{{ route('admin.services.index', ['parent_id' => $srv->id]) }}"
                                           class="btn btn-sm btn-outline-primary rounded-2 position-relative px-3 py-1.5 fw-semibold fs-6"
                                           title="View Sub Services">
                                            <i class="ri-node-tree me-1"></i> Sub Services
                                            <span class="badge bg-primary text-white rounded-pill ms-1 fs-7">
                                            {{ $srv->sub_services_count ?? $srv->subServices()->count() }}
                                        </span>
                                        </a>
                                    @endif
                                    <a href="{{ route('admin.services.edit', $srv->id) }}" class="btn btn-sm btn-success border rounded-2 text-white p-2" title="Edit Catalog">
                                        <i class="ri-edit-line fs-6"></i>
                                    </a>

                                    <form action="{{ route('admin.services.delete', $srv->id) }}" method="POST" onsubmit="return confirm('Purge this entire vertical data stack?');" class="m-0">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger border rounded-2 text-white p-2"><i class="ri-delete-bin-line fs-6"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                @if(request()->has('parent_id'))
                                    No Sub Services Found for this Service.
                                @else
                                    No Services Found.
                                @endif
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .bg-info-soft { background-color: rgba(14, 165, 233, 0.1); color: #0ea5e9; }
        .bg-emerald-soft { background-color: rgba(16, 185, 129, 0.1); color: #10b981; }
        .bg-success-soft { background-color: rgba(34, 197, 94, 0.1); color: #22c55e; }
        .bg-danger-soft { background-color: rgba(239, 68, 68, 0.1); color: #ef4444; }
        .bg-secondary-soft { background-color: rgba(100, 116, 139, 0.1); color: #64748b; }
        .fs-7 { font-size: 0.8rem !important; }
    </style>
@endsection
