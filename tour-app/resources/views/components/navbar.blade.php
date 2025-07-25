<header class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-sm shadow-lg">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <a href="/" class="flex items-center text-2xl font-bold text-blue-600 hover:text-blue-700 transition-colors">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-full flex items-center justify-center text-white font-bold mr-3">
                    QN
                </div>
                Quy Nhon Tour
            </a>
            
            <!-- Desktop Navigation -->
            <ul class="hidden md:flex space-x-8">
                <li>
                    <a href="/" class="relative font-medium transition-colors hover:text-blue-600 {{ request()->is('/') ? 'text-blue-600 after:absolute after:bottom-[-4px] after:left-0 after:right-0 after:h-0.5 after:bg-blue-600' : 'text-gray-700' }}">
                        Trang chủ
                    </a>
                </li>
                <li>
                    <a href="/tours" class="relative font-medium transition-colors hover:text-blue-600 {{ request()->is('tours*') ? 'text-blue-600 after:absolute after:bottom-[-4px] after:left-0 after:right-0 after:h-0.5 after:bg-blue-600' : 'text-gray-700' }}">
                        Tours 
                    </a>
                </li>
                <li>
                    <a href="/posts" class="relative font-medium transition-colors hover:text-blue-600 {{ request()->is('posts*') ? 'text-blue-600 after:absolute after:bottom-[-4px] after:left-0 after:right-0 after:h-0.5 after:bg-blue-600' : 'text-gray-700' }}">
                        Blog
                    </a>
                </li>
                
                <li>
                    <a href="/about" class="relative font-medium transition-colors hover:text-blue-600 {{ request()->is('about') ? 'text-blue-600 after:absolute after:bottom-[-4px] after:left-0 after:right-0 after:h-0.5 after:bg-blue-600' : 'text-gray-700' }}">
                        About me
                    </a>
                </li>
            </ul>
            
            <!-- Auth Buttons -->
            <div class="hidden md:flex space-x-3">
                @auth
                    <!-- User is logged in -->
                    <div class="relative group">
                        <button class="flex items-center space-x-2 px-4 py-2 text-gray-700 hover:text-blue-600 transition-colors">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                            <span>{{ auth()->user()->name }}</span>
                            <i class="fas fa-chevron-down text-sm"></i>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <div class="py-2">
                                <a href="/profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors">
                                    Hồ sơ cá nhân
                                </a>
                                <a href="/posts/create" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors">
                                    Tạo bài viết
                                </a>
                                <div class="border-t border-gray-100 my-1"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors">
                                        Đăng xuất
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- User is not logged in -->
                    <a href="{{ route('register') }}" class="px-4 py-2 border-2 border-gray-300 text-gray-700 rounded-lg font-medium hover:border-cyan-500 hover:text-cyan-500 transition-all duration-300">
                        Đăng ký
                    </a>
                    <a href="{{ route('login') }}" class="px-6 py-2 bg-cyan-500 text-white rounded-lg font-medium hover:bg-cyan-600 hover:-translate-y-0.5 transition-all duration-300 shadow-lg hover:shadow-cyan-500/25">
                        Đăng nhập
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <button class="md:hidden flex items-center justify-center w-10 h-10 text-gray-700 hover:text-blue-600 transition-colors" onclick="toggleMobileMenu()">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="md:hidden hidden border-t border-gray-200 py-4">
            <div class="space-y-2">
                <a href="/" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors {{ request()->is('/') || request()->is('') ? 'bg-blue-50 text-blue-600' : '' }}">
                    Trang chủ
                </a>
                <a href="/tours" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors {{(request()->is('tours*')) || request()->is('') ? 'bg-blue-50 text-blue-600' : '' }}">
                    Tour Bình Định
                </a>
                <a href="/posts" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors {{(request()->is('posts*')) || request()->is('') ? 'bg-blue-50 text-blue-600' : '' }}">
                    Blog
                </a>
                
                <a href="/about" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors {{(request()->is('about')) || request()->is('') ? 'bg-blue-50 text-blue-600' : '' }}">
                    Về chúng tôi
                </a>
                
                @auth
                    <div class="border-t border-gray-200 pt-2 mt-2">
                        <div class="px-4 py-2 text-sm text-gray-500">
                            Xin chào, {{ auth()->user()->name }}
                        </div>
                        <a href="/profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                            Hồ sơ cá nhân
                        </a>
                        <a href="/posts/create" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                            Tạo bài viết
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                                Đăng xuất
                            </button>
                        </form>
                    </div>
                @else
                    <div class="border-t border-gray-200 pt-2 mt-2 space-y-2">
                        <a href="{{ route('register') }}" class="block px-4 py-2 border-2 border-gray-300 text-gray-700 rounded-lg font-medium text-center hover:border-cyan-500 hover:text-cyan-500 transition-all duration-300">
                            Đăng ký
                        </a>
                        <a href="{{ route('login') }}" class="block px-4 py-2 bg-cyan-500 text-white rounded-lg font-medium text-center hover:bg-cyan-600 transition-all duration-300">
                            Đăng nhập
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</header>

<script>
function toggleMobileMenu() {
    const mobileMenu = document.getElementById('mobile-menu');
    mobileMenu.classList.toggle('hidden');
}


document.addEventListener('click', function(event) {
    const mobileMenu = document.getElementById('mobile-menu');
    const menuButton = event.target.closest('button');
    
    if (!menuButton && !mobileMenu.contains(event.target)) {
        mobileMenu.classList.add('hidden');
    }
});
</script>