@props([
    'title' => 'Khách hàng nói gì về chúng tôi',
    'subtitle' => 'Những trải nghiệm thực tế từ khách hàng đã sử dụng dịch vụ',
    'feedbacks' => [],
])

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">{{ $title }}</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">{{ $subtitle }}</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            @foreach($feedbacks as $fb)
                <div class="relative bg-slate-50 rounded-3xl p-8 shadow-lg hover:-translate-y-2 hover:shadow-xl transition-all duration-300">
                    <div class="mb-6">
                        <div class="text-2xl mb-4">⭐⭐⭐⭐⭐</div>
                        <p class="text-gray-700 leading-relaxed italic">
                            "{{ $fb['content'] }}"
                        </p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 {{ $fb['avatar_class'] ?? 'bg-gradient-to-br from-cyan-400 to-blue-500' }} rounded-full flex items-center justify-center text-white font-bold">
                            {{ $fb['initials'] }}
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">{{ $fb['name'] }}</h4>
                            <p class="text-gray-500 text-sm">{{ $fb['location'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>