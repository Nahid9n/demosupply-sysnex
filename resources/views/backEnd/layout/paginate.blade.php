<div class="row align-items-center pagination-wrapper mt-4 pt-3">
    <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
        <div class="pagination-info">
            Showing <span class="text-primary">{{ $paginator->firstItem() ?? $paginator->count() }}</span>
            @if($paginator->firstItem()) - <span class="text-primary">{{ $paginator->lastItem() }}</span> @endif
            of <span class="text-primary">{{ $paginator->total() }}</span> results
        </div>
    </div>
    <div class="col-md-6 d-flex justify-content-center justify-content-md-end">
        <ul class="custom-pagination">
            {{-- Previous Button --}}
            <li class="{{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                <a href="{{ $paginator->onFirstPage() ? '#' : $paginator->previousPageUrl() }}"><i class="ri-arrow-left-fill"></i></a>
            </li>

            {{-- Pages Loop --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="dots">{{ $element }}</li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li class="{{ $page == $paginator->currentPage() ? 'active' : '' }}">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                @endif
            @endforeach

            {{-- Next Button --}}
            <li class="{{ !$paginator->hasMorePages() ? 'disabled' : '' }}">
                <a href="{{ $paginator->hasMorePages() ? $paginator->nextPageUrl() : '#' }}"><i class="ri-arrow-right-fill"></i></a>
            </li>
        </ul>
    </div>
</div>
<style>
    .pagination-wrapper { border-top: 1px solid rgba(255,255,255,.06); }
    .pagination-info { color: #94a3b8; font-size: 14px; }
    .pagination-info span { color: #fff; font-weight: 600; }

    .custom-pagination { display: flex; align-items: center; gap: 8px; list-style: none; padding: 0; margin: 0; flex-wrap: wrap; }
    .custom-pagination li a {
        width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;
        border-radius: 10px; text-decoration: none; color: #cbd5e1; background: #162033;
        border: 1px solid rgba(255,255,255,.08); backdrop-filter: blur(12px); transition: .2s;
    }
    .custom-pagination li a:hover { background: #6d5dfc; color: #fff; transform: translateY(-2px); }

    .custom-pagination li.active a {
        background: linear-gradient(135deg, #7c3aed, #6366f1); color: #fff; border: none;
        box-shadow: 0 0 15px rgba(99,102,241,.4), 0 0 30px rgba(124,58,237,.2);
    }
    .custom-pagination li.disabled a { opacity: .4; pointer-events: none; }
    .custom-pagination .dots { color: #64748b; padding: 0 4px; }
</style>
