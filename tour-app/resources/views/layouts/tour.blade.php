<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bình Định Tour - Khám phá vẻ đẹp Bình Định')</title>
    <meta name="description"
        content="@yield('description', 'Khám phá những điểm đến tuyệt vời tại Bình Định với các tour du lịch chất lượng cao')">
    <link rel="icon" type="image/png" href="/Logo.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Preload critical resources -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </noscript>

    @vite(['resources/js/app.js'])
    @stack('styles')

    <!-- Critical CSS to prevent FOUC -->
    <style>
        html {
            visibility: hidden;
            opacity: 0;
        }

        html.wf-active {
            visibility: visible;
            opacity: 1;
            transition: opacity 0.3s;
        }
    </style>
</head>

<body class="font-be-vietnam text-gray-800 leading-relaxed">




    <x-navbar />

    <main class="pt-20">
        @yield('content')
    </main>

    <x-footer />

    @stack('scripts')



</body>

</html>