@props([
    'tours' => [],
    'title' => 'Tour nổi bật',
    'subtitle' => 'Khám phá những điểm đến tuyệt vời nhất tại Quy Nhơn'
])

<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center" >
            <h2 class="text-4xl text-cyan-600 mb-4 font-semibold">{{$title}}</h2>
            <p class="text-xl text-gray-600 mb-6">{{$subtitle}}</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($tours as $tour )
                <div class="bg-white  rounded-3xl overflow-hidden border-2 border-cyan-300 hover:-translate-y-3 hover:shadow-2xl transition-all duration-300">
                    <div class="relative overflow-hidden h-64">
                        @if ($tour->images && $tour->images->count() > 0)
                            <img src="{{$tour->images->first()->url}}" alt="" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        @else
                                <img src="/Logo.png" alt="" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        @endif  
                        <div class= "absolute top-4 right-4 bg-black/70 text-white px-3 py-1 rounded-full text-sm font-bold ">{{number_format($tour->price)}} VND </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900  mb-3 line-clamp-1">{{$tour->title}}</h3>
                        <p class="text-gray-600 leading-relaxed line-clamp-3" > {{$tour->description}}</p>
                        <div class="flex justify-between items-center mt-4">
                            <div class="text-cyan-600 font-medium"><i class="fa-solid fa-clock mr-2"></i>{{$tour->duration}} ngày</div>
                            <a href="{{ route('tours.show', $tour->slug) }}"
                                class="bg-cyan-500 text-white px-6 py-2 rounded-lg font-semibold hover:bg-cyan-600 hover:-translate-y-0.5 transition-all duration-300">
                                Đặt tour
                            </a>
                        </div>
                    </div>    
                </div>      
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="/tours"
                class=" inline-block border-2 border-cyan-500 text-cyan-500 px-8 py-3 rounded-lg font-semibold hover:bg-cyan-500 hover:text-white hover:-translate-y-0.5 transition-all duration-300">
                Xem tất cả tour
            </a>
        </div>
    </div>
</section>