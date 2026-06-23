<div class="card h-100 border-0 shadow-sm p-4 rounded-4 text-start bg-white service-premium-card d-flex flex-column transition-all">
    <a href="{{route('service.details',$service->slug)}}">
        <div class="feature-image-wrapper bg-brand-soft mb-4">
            @if($service->hero_image)
                <img src="{{ asset($service->hero_image) }}" alt="{{ $service->name }}">
            @else
                <img src="{{ asset('assets/images/default.jpg') }}" alt="Default">
            @endif
        </div>
    </a>
    <a href="{{route('service.details',$service->slug)}}" class="text-decoration-none">
        <h4 class="fw-bold text-dark mb-2 h5 text-truncate-2" title="{{$service->name}}">{{$service->name}}</h4>
    </a>
    <p class="text-muted small mb-3 flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.6;">
        {{ $service->short_description }}
    </p>

    <hr class="my-3 opacity-25">

    <ul class="list-unstyled mb-4 small text-secondary fw-medium">
        @foreach($service->items->take(3) as $item)
            <li class="mb-2 d-flex align-items-start">
                <i class="fa-solid fa-circle-check text-success me-2 mt-1 small"></i>
                <span class="text-truncate-1">{{$item->description}}</span>
            </li>
        @endforeach
    </ul>

    <div class="mt-auto">
        <div class="btn btn-outline-brand btn-sm w-100 py-2.5 fw-semibold d-flex align-items-center justify-content-center gap-1 transition-all hover-btn">
            <span>Explore Service</span>
            <i class="fa-solid fa-arrow-right small"></i>
        </div>
    </div>

</div>
