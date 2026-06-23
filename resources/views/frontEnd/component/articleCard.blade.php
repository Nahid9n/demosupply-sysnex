<article class="card h-100 premium-blog-card rounded-4 overflow-hidden">
    <!-- Image Container with Zoom effect -->
    <a href="{{ route('article.details',$article->slug) }}">
        <div class="img-zoom-container position-relative">
            <img src="{{asset($article->image)}}" class="card-img-top" alt="Importance of Electrolyte Balance in Summer" style="height: 240px; object-fit: cover;"/>
            <span class="badge position-absolute top-0 start-0 m-3 rounded-pill bg-white fw-bold shadow-sm px-3 py-2 text-uppercase" style="color: #0f4c81; font-size: 11px; letter-spacing: 0.5px;">{{ $article->category->name }}</span>
        </div>
    </a>
    <div class="card-body p-4 d-flex flex-column">
        <!-- Premium Meta Info style -->
        <div class="blog-meta text-muted small d-flex align-items-center gap-3 mb-3" style="font-size: 13px;">
            <span><i class="fa-regular fa-calendar-check me-1 text-brand"></i> {{ \Carbon\Carbon::parse($article->created_at)->format('M d, Y')  }}</span>
            <span class="text-silver">•</span>
            <span><i class="fa-regular fa-clock me-1"></i> {{ $article->read_time }} Min Read</span>
        </div>

        <!-- Title with clean typography -->
        <h3 class="h5 fw-bold mb-3 lh-base">
            <a href="{{ route('article.details',$article->slug) }}" class="text-decoration-none text-dark hover-brand"> {{ $article->title }} </a>
        </h3>

        <p class="text-muted-2 flex-grow-1 small lh-relaxed">
            {{ $article->summary }}
        </p>

        <!-- Modern Action Button -->
        <div class="pt-3 mt-auto border-top border-light">
            <a href="{{ route('article.details',$article->slug) }}" class="btn-arrow-icon text-brand fw-bold text-decoration-none d-inline-flex align-items-center small text-uppercase tracking-wider">
                Read Article <i class="fa-solid fa-arrow-right ms-2 fs-6"></i>
            </a>
        </div>
    </div>
</article>

