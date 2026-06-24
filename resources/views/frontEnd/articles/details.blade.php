@extends('frontEnd.layout.app')

{{-- ১. ডাইনামিক এসইও টাইটেল (যদি seo_title না থাকে তবে নরমাল টাইটেল শো করবে) --}}
@section('title', $article->seo_title ?? $article->title)

@section('body')

    <style>
        .article-content p {
            font-size: 1.15rem;
            line-height: 1.85;
            color: #333333;
            margin-bottom: 1.5rem;
        }
        .article-content h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #0f4c81;
            margin-top: 2.5rem;
            margin-bottom: 1rem;
        }
        .article-content h3 {
            font-size: 1.4rem;
            font-weight: 600;
            color: #1a1a1a;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }
        .sticky-sidebar {
            position: sticky;
            top: 100px;
        }
        .share-btn {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #f4f8fb;
            color: #555;
            transition: all 0.3s ease;
        }
        .share-btn:hover {
            background: #0f4c81;
            color: #fff;
            transform: translateY(-3px);
        }
        .related-post-card {
            transition: transform 0.3s ease;
        }
        .related-post-card:hover {
            transform: translateY(-5px);
        }
    </style>

    <section class="py-4 bg-soft" style="background: #f4f8fb;">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-2 small">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-muted">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted">Articles</a></li>
                    {{-- ২. ডাইনামিক ক্যাটাগরি নাম (ব্রেডক্রাম্ব) --}}
                    <li class="breadcrumb-item active text-brand fw-semibold" aria-current="page">
                        {{ $article->category->name ?? 'Wellness' }}
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-5">

                <div class="col-lg-8 reveal">
                    <article>
                        {{-- ৩. ডাইনামিক ক্যাটাগরি ব্যাজ --}}
                        @if($article->category)
                            <span class="badge bg-soft-brand px-3 py-2 rounded-pill fw-bold text-uppercase mb-3" style="background: rgba(15, 76, 129, 0.1); color: #0f4c81; font-size: 11px;">
                                {{ $article->category->name }}
                            </span>
                        @endif

                        {{-- ৪. ডাইনামিক মেইন টাইটেল --}}
                        <h1 class="display-5 fw-bold mb-4" style="color: #0f4c81; line-height: 1.3;">{{ $article->title }}</h1>

                        <div class="d-flex align-items-center gap-3 mb-4 pb-4 border-bottom">
                            <img src="https://ui-avatars.com/api/?name=Admin&background=0f4c81&color=fff" class="rounded-circle" alt="Admin" style="width: 45px; height: 45px;">
                            <div>
                                <h6 class="mb-0 fw-bold">By {{env('APP_NAME')}}</h6>
                                {{-- ৫. ডাইনামিক ডেট এবং রিড টাইম --}}
                                <span class="text-muted small"><i class="fa-regular fa-calendar me-1"></i> {{ $article->created_at->format('F d, Y') }}</span>
                                <span class="text-muted small ms-3"><i class="fa-regular fa-clock me-1"></i> {{ $article->read_time }} Min Read</span>
                            </div>
                        </div>

                        {{-- ৬. ডাইনামিক ইমেজ (ইমেজ না থাকলে ডিফল্ট প্লেসহোল্ডার শো করবে) --}}
                        <div class="mb-5 shadow-sm rounded-4 overflow-hidden">
                            @if($article->image && file_exists(public_path($article->image)))
                                <img src="{{ asset($article->image) }}" class="img-fluid w-100" alt="{{ $article->title }}" style="max-height: 450px; object-fit: cover;">
                            @else
                                <img src="{{ asset('assets/images/default.jpg') }}" class="img-fluid w-100" alt="Default Image" style="max-height: 450px; object-fit: cover;">
                            @endif
                        </div>

                        <div class="article-content">
                            {{-- 7. ডাইনামিক সামারি (যা লিড টেক্সট হিসেবে কাজ করবে) --}}
                            @if($article->summary)
                                <p class="lead text-muted-2 fw-normal fs-5 mb-4">
                                    {{ $article->summary }}
                                </p>
                            @endif

                            {{-- ৮. ডাইনামিক লং কনটেন্ট (যেহেতু সামারনোট বা টেক্সট এডিটর থেকে HTML আসবে, তাই {!! !!} ব্যবহার করা হয়েছে) --}}
                            {!! $article->content !!}
                        </div>

                        <div class="d-flex align-items-center gap-3 mt-5 pt-4 border-top">
                            <span class="fw-bold text-muted small text-uppercase">Share this article:</span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank" class="share-btn text-decoration-none"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="https://twitter.com/intent/tweet?url=&text={{ urlencode($article->title) }}" target="_blank" class="share-btn text-decoration-none"><i class="fa-brands fa-x-twitter"></i></a>
                            <a href="https://www.linkedin.com/shareArticle?url=&title={{ urlencode($article->title) }}" target="_blank" class="share-btn text-decoration-none"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4 reveal">
                    <div class="sticky-sidebar">

                        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white position-relative">
                            <h5 class="fw-bold mb-3" style="color: #0f4c81;">Search Articles</h5>
                            <form action="#" method="GET" autocomplete="off">
                                <div class="input-group">
                                    <input type="text" id="article-search" name="search" class="form-control border-light bg-light rounded-start-pill px-3" placeholder="Type keywords...">
                                    <button class="btn btn-brand rounded-end-pill px-3" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </form>

                            <!-- Suggestion Box Container -->
                            <div id="search-suggestions" class="list-group position-absolute w-100 shadow-sm start-0 px-4" style="z-index: 1000; display: none; top: 100%;">
                                <div class="list-group-item rounded-4 border-0 p-2 bg-white">

                                </div>
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
                            <h5 class="fw-bold mb-3" style="color: #0f4c81;">Trending Articles</h5>
                            <div class="d-flex flex-column gap-3">

                                {{-- ৯. রিলেটেড বা ট্রেন্ডিং পোস্ট লুপ (কন্ট্রোলার থেকে $trending_articles পাস করতে হবে) --}}
                                @isset($trending_articles)
                                    @foreach($trending_articles as $trending)
                                        <a href="{{ route('article.details', $trending->slug) }}" class="d-flex gap-3 text-decoration-none text-dark related-post-card">
                                            <img src="{{ $trending->image && file_exists(public_path($trending->image)) ? asset($trending->image) : asset('assets/images/default.jpg') }}" class="rounded-3" alt="{{ $trending->title }}" style="width: 80px; height: 60px; object-fit: cover;">
                                            <div>
                                                <h6 class="fw-bold mb-1 small lh-base text-truncate-2">{{ $trending->title }}</h6>
                                                <span class="text-muted" style="font-size: 11px;"><i class="fa-regular fa-calendar"></i> {{ $trending->created_at->format('M d, Y') }}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                @else
                                    <span class="text-muted small">No trending insights available.</span>
                                @endisset

                            </div>
                        </div>

                        <div class="card border-0 text-white rounded-4 p-4 text-center" style="background: linear-gradient(135deg, #0f4c81, #00aeef);">
                            <i class="fa-regular fa-envelope-open display-6 mb-3"></i>
                            <h5 class="fw-bold mb-2">Subscribe to Newsletters</h5>
                            <p class="small mb-3" style="opacity: 0.9;">Get the latest wellness advice and filtration guides delivered straight to your inbox.</p>

                            <form id="newsletter-form" autocomplete="off">
                                @csrf
                                <input type="email" id="newsletter-email" name="email" class="form-control form-control-sm border-0 mb-2 rounded-pill px-3 text-center" placeholder="Enter your email" required>
                                <button type="submit" id="newsletter-btn" class="btn btn-light btn-sm w-100 rounded-pill fw-bold text-brand">Join Hub</button>
                            </form>

                            <div id="newsletter-message" class="small mt-2 fw-semibold" style="display: none;"></div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('article-search');
            const suggestionBox = document.getElementById('search-suggestions');
            const suggestionContent = suggestionBox.querySelector('.list-group-item');

            // Laravel Route Template
            const baseUrlTemplate = "{{ route('article.details', ':slug') }}";

            searchInput.addEventListener('input', function () {
                let query = this.value.trim();

                if (query.length > 2) {
                    fetch("{{ route('articles.suggestions') }}?search=" + encodeURIComponent(query))
                        .then(response => response.json())
                        .then(data => {
                            suggestionContent.innerHTML = ''; // Purano elements soriye fela

                            if (data.length > 0) {
                                data.forEach(article => {
                                    // Dynamic URL toiri kora
                                    let targetUrl = baseUrlTemplate.replace(':slug', article.slug);

                                    // Ekta temporary block dynamic wrapper ready kora
                                    let itemWrapper = document.createElement('div');

                                    // Layout mapping template with rich layout
                                    itemWrapper.innerHTML = `
                                <a href="${targetUrl}" class="d-flex align-items-center list-group-item-action border-0 p-2 my-1 rounded-3 text-decoration-none text-dark transition-all">
                                    <img src="${article.image}" alt="${article.title}" class="rounded-2 me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                    <div class="flex-grow-1">
                                    <h6 class="mb-1 text-truncate" style="font-size: 14px; max-width: 280px; font-weight: 600;">${article.title}</h6>
                                    <small class="text-muted" style="font-size: 11px;">
                                    <i class="fa-regular fa-calendar-days me-1"></i> ${article.date}
                                    </small>
                                    </div>
                                    </a>
                                    `;

                            // Pure wrapper child ti main suggestion block code e append kora
                            suggestionContent.appendChild(itemWrapper.firstElementChild);
                        });
                        suggestionBox.style.display = 'block';
                    } else {
                        suggestionContent.innerHTML = '<span class="text-muted p-2 d-block text-center" style="font-size: 13px;">No articles found</span>';
                        suggestionBox.style.display = 'block';
                    }
                })
                .catch(error => console.error('Error fetching suggestions:', error));
        } else {
            suggestionBox.style.display = 'none';
        }
    });

    // Outer boundary click wrapper close handler
    document.addEventListener('click', function (e) {
        if (!searchInput.contains(e.target) && !suggestionBox.contains(e.target)) {
            suggestionBox.style.display = 'none';
        }
    });
});
</script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const newsletterForm = document.getElementById('newsletter-form');
            const emailInput = document.getElementById('newsletter-email');
            const submitBtn = document.getElementById('newsletter-btn');
            const messageBox = document.getElementById('newsletter-message');

            newsletterForm.addEventListener('submit', function (e) {
                e.preventDefault();

                // Double submit loading handler controller status modifier
                submitBtn.disabled = true;
                submitBtn.innerText = 'Subscribing...';

                messageBox.style.display = 'none';

                // Dynamic Form data preparation
                let formData = new FormData();
                formData.append('email', emailInput.value);
                formData.append('_token', '{{ csrf_token() }}');
                fetch("{{ route('newsletter.subscribe') }}", {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                    .then(response => {
                        return response.json().then(data => {
                            if (!response.ok) {
                                throw new Error(data.message || 'Something went wrong. Please try again.');
                            }
                            return data;
                        });
                    })
                    .then(data => {
                        messageBox.className = 'small mt-2 fw-semibold text-warning';
                        messageBox.textContent = data.message;
                        messageBox.style.display = 'block';

                        newsletterForm.reset();
                    })
                    .catch(error => {
                        messageBox.className = 'small mt-2 fw-semibold text-white bg-danger p-1 rounded-3';
                        messageBox.textContent = error.message;
                        messageBox.style.display = 'block';
                    })
                    .finally(() => {
                        // Re-activate tracking submit button status logic wrapper triggers state element
                        submitBtn.disabled = false;
                        submitBtn.innerText = 'Join Hub';
                    });
            });
        });
    </script>
@endpush
