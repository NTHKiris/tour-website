<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bình Định Tour - Khám phá vẻ đẹp Bình Định')</title>
    <meta name="description" content="@yield('description', 'Khám phá những điểm đến tuyệt vời tại Bình Định với các tour du lịch chất lượng cao')">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-inter text-gray-800 leading-relaxed">
   
    <x-navbar />

    
    <main class="pt-20">
        @yield('content')
    </main>

    

    @stack('scripts')
</body>
</html>