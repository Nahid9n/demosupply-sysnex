<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> @yield('title') | {{env('APP_NAME')}}</title>
    <meta name="title" content="{{ $seo->meta_title ?? '' }}">
    <meta name="description" content="{{ $seo->meta_description ?? '' }}">
    <meta name="keywords" content="{{ $seo->meta_keywords ?? '' }}">
    <meta name="robots" content="{{ $seo->meta_robots ?? 'index, follow' }}">
    <meta name="author" content="{{env('APP_NAME')}}">
    <meta name="publisher" content="{{env('APP_NAME')}}">
    <link rel="canonical" href="{{ $seo->canonical_url ?? url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $seo->meta_title ?? '' }}">
    <meta property="og:description" content="{{ $seo->meta_description ?? '' }}">
    <meta property="og:image" content="{{ isset($seo->meta_image) ? asset($seo->meta_image) : asset('default-og-image.jpg') }}">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $seo->meta_title ?? '' }}">
    <meta property="twitter:description" content="{{ $seo->meta_description ?? '' }}">
    <meta property="twitter:image" content="{{ isset($seo->meta_image) ? asset($seo->meta_image) : asset('default-og-image.jpg') }}">

    @if(!empty($seo->datalayer_json))
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({!! $seo->datalayer_json !!});
        </script>
    @endif

    @if(!empty($seo->schema_script))
        {!! $seo->schema_script !!}
    @endif

    <link rel="icon" type="image/png" href="{{ asset($web_setting->favicon_logo) }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/')}}Frontend/css/styles.css">
    <link rel="stylesheet" href="{{asset('/')}}Frontend/css/custom.css">

    @yield('css')
    @stack('css')
<!-- Custom Style for Premium Look (নিচের ডিজাইনগুলো সুন্দর দেখানোর জন্য) -->
    <style>
        .premium-blog-card {
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.04) !important;
        }
        .premium-blog-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(15, 76, 129, 0.08) !important;
        }
        .img-zoom-container {
            overflow: hidden;
            position: relative;
        }
        .img-zoom-container img {
            transition: transform 0.6s ease;
        }
        .premium-blog-card:hover .img-zoom-container img {
            transform: scale(1.06);
        }
        .hover-brand {
            transition: color 0.3s ease;
        }
        .premium-blog-card:hover .hover-brand {
            color: #0f4c81 !important; /* বা আপনার থিম কালার */
        }
        .btn-arrow-icon i {
            transition: transform 0.3s ease;
        }
        .premium-blog-card:hover .btn-arrow-icon i {
            transform: translateX(5px);
        }
    </style>

</head>
<body>

@include('frontEnd.layout.header')

<div style="margin-top: 50px">
    @yield('body')
</div>

@include('frontEnd.layout.footer')

<div class="floating-container">
    <div class="floating-menu">
        <a href="tel:{{$web_setting->phone}}" class="floating-btn sub-btn bg-success text-white" title="Call Us">
            <i class="fa-solid fa-phone"></i>
        </a>
        <a href="{{$web_setting->messenger}}" target="_blank" class="floating-btn sub-btn text-white" style="background-color: #006aff;" title="Messenger">
            <i class="fa-brands fa-facebook-messenger"></i>
        </a>
        <a href="{{$web_setting->whatsapp}}" target="_blank" class="floating-btn sub-btn text-white" style="background-color: #25d366;" title="WhatsApp">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
    </div>

    <div class="floating-btn main-btn" id="fab-trigger" style="background: linear-gradient(135deg, #0f4c81, #00aeef);">
        <i class="fa-solid fa-comments main-icon"></i>
        <i class="fa-solid fa-xmark close-icon d-none"></i>
    </div>
    <a href="#" id="back-to-top" class="floating-btn sub-btn bg-secondary text-white" title="Back to Top">
        <i class="fa-solid fa-arrow-up"></i>
    </a>
</div>
<style>
    /* Container Wrapper */
    .floating-container {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 9999;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* Base Floating Button Style */
    .floating-btn {
        width: 55px;
        height: 55px;
        border-radius: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        text-decoration: none !important;
    }

    /* Main Button Specifics */
    .main-btn {
        color: white;
        font-size: 24px;
    }
    .main-btn:hover {
        transform: scale(1.1) rotate(15deg);
    }

    /* Sub-buttons Menu */
    .floating-menu {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 15px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(20px);
        transition: all 0.3s ease-in-out;
    }

    /* When Menu is Active/Open */
    .floating-container.active .floating-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    /* Sub-buttons Individual Style */
    .sub-btn {
        width: 45px;
        height: 45px;
        font-size: 18px;
        margin-top: 10px; /* একটার ওপর আরেকটার গ্যাপ */
    }
    .sub-btn:hover {
        transform: scale(1.1);
    }

    /* Back to Top specific hidden behavior */
    #back-to-top {
        opacity: 0;
        visibility: hidden;
        transition: all 0.2s ease;
    }
    #back-to-top.show {
        opacity: 1;
        visibility: visible;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}Frontend/js/main.js"></script>
<script src="{{asset('/')}}Backend/assets/js/sweetalert.js"></script>
@yield('js')
@stack('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const container = document.querySelector('.floating-container');
        const trigger = document.getElementById('fab-trigger');
        const mainIcon = trigger.querySelector('.main-icon');
        const closeIcon = trigger.querySelector('.close-icon');
        const backToTop = document.getElementById('back-to-top');

        // Toggle menu items visibility on main button click
        trigger.addEventListener('click', function () {
            container.classList.toggle('active');

            // Icon change effect (Toggle between chat icon and Close X icon)
            if(container.classList.contains('active')) {
                mainIcon.classList.add('d-none');
                closeIcon.classList.remove('d-none');
            } else {
                mainIcon.classList.remove('d-none');
                closeIcon.classList.add('d-none');
            }
        });

        // Control "Back to Top" sub-button appearance on scroll
        window.addEventListener('scroll', function () {
            if (window.scrollY > 300) { // ৩০০ পিক্সেল নিচে স্ক্রল করলে বাটন আসবে
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });

        // Smooth scroll behavior for back-to-top execution
        backToTop.addEventListener('click', function (e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            // Scroll করার পর মেনুটা অটো বন্ধ করে দিতে চাইলে নিচের লাইনটি রাখতে পারো:
            container.classList.remove('active');
            mainIcon.classList.remove('d-none');
            closeIcon.classList.add('d-none');
        });
    });
</script>
</body>
</html>
