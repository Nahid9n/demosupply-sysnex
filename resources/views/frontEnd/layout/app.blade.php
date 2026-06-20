<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Smart Solutions for Modern Living | AquaNova</title>
    <meta name="description" content="AquaNova engineers premium Electrolite, Devices and Water Filters for healthier, smarter modern living." />
    <meta property="og:title" content="Smart Solutions for Modern Living | AquaNova" />
    <meta property="og:description" content="AquaNova engineers premium Electrolite, Devices and Water Filters for healthier, smarter modern living." />
    <meta property="og:image" content="{{asset('/')}}Frontend/images/hero.jpg" />
    <meta name="twitter:card" content="summary_large_image" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/')}}Frontend/css/styles.css">
    @yield('css')
    @stack('css')

</head>
<body>

@include('frontEnd.layout.header')

@yield('body')

@include('frontEnd.layout.footer')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}Frontend/js/main.js"></script>
<script src="{{asset('/')}}Backend/assets/js/sweetalert.js"></script>
@yield('js')
@stack('js')
</body>
</html>
w
