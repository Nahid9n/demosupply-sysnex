@extends('backEnd.layout.master')
@section('title','Services')
@section('body')
    <div class="py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div><h4 class="fw-bold text-slate-900 mb-0">Service Lists</h4></div>
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary rounded-3 px-4 py-2 fw-semibold">
                <i class="ri-add-line me-1"></i> Add New Service
            </a>
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
                                    <div class="rounded-3 bg-light d-flex align-items-center justify-content-center text-primary" style="width: 100px;">
                                        <img class="img-fluid" src="{{asset($srv->hero_image)}}" alt=""><i class="{{ $srv->icon_class }} fs-5"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold text-slate-900 mb-0">{{ $srv->name }}</h5>
                                        <span class="text-muted fs-5">{{ $srv->page_title ?? 'No target title set' }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-muted">{{ $srv->slug }}</td>
                            <td>
                                <span class="badge bg-info-soft text-info px-2 py-1 rounded-2">{{ $srv->items_count }} Items Included</span>
                                <span class="badge bg-emerald-soft text-emerald px-2 py-1 rounded-2 ms-1">{{ $srv->pricings_count }} Price</span>
                            </td>
                            <td><span class="badge bg-secondary-soft text-secondary px-2 py-1 rounded-2">{{ $srv->gallery_count }} Images</span></td>
                            <td>
                            <span class="badge {{ $srv->status == 1 ? 'bg-success text-white' : 'bg-danger text-white' }} px-2 py-1 rounded-2">
                                {{ $srv->status == 1 ? 'Active' : 'Inactive' }}
                            </span>
                            </td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-1">
                                    <a href="{{ route('admin.services.edit', $srv->id) }}" class="btn btn-sm btn-success border rounded-2 text-white" title="Edit Catalog"><i class="ri-edit-line"></i></a>
                                    <form action="{{ route('admin.services.delete', $srv->id) }}" method="POST" onsubmit="return confirm('Purge this entire vertical data stack?');">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger border rounded-2 text-white"><i class="ri-delete-bin-line"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center py-5 text-muted">service Not Found.</td></tr>
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
        .fs-8 { font-size: 0.75rem; } .fs-7 { font-size: 0.85rem; }
    </style>
@endsection
