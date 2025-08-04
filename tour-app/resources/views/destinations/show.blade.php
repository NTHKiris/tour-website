 @extends('layouts.tour')
@section('title', "Tìm kiếm")

@section('content')
   <div class="relative  from-cyan-500 to-blue-700  p-10 max-w-5xl mx-auto">
    @php
        $last = $destination;
        $tours = $last ? $last->tours : collect();
    @endphp

    @php
        $coordValue = old('coordinates', $last->coordinates ?? '');
    @endphp
    @if($last)
    <div class="relative flex ">
        <div class= "w-8/12 p-4" >
            <h2 class="font-semibold text-[30px] mb-[17px] ">{{$last->name}}</h2>
            <h2 class="font-semibold text-[25px] mb-[17px] ">Mô tả</h2>
            <div class = "mb-[50px]"><p>{{$last->description}}</p></div>
            <div class="mb-12 clearfix">
                <img src="http://localhost:8000/images/bien.webp" 
                    alt="" 
                    class="float-left w-[35%] max-w-full mr-6 mb-4 rounded-lg object-cover">
                <p class="text-gray-700 leading-relaxed">
                    West Bengal offers a colorful variety of experiences to the tourist. Its capital, Kolkata, is as cosmopolitan a city as any. In close proximity lie the Sundarbans, a UNESCO World Heritage Site which is home to the Royal Bengal Tiger. Coastal areas like Digha and Mandarmani are popular tourism places in this state which attract their fair share of beach lovers. A different travel experience awaits you in places like Bishnupur, which showcase the rich cultural heritage of the state. Hill stations like Darjeeling, Kalimpong and Labha are exciting getaways from the plains and are known for their distinct culture and lifestyle. Wildlife sanctuaries like Jaldapara and Gorumara draw your attention to its rich wildlife. In pilgrimage destinations like Dakshineswar and Kalighat, you undergo a profound spiritual experience.
                </p>
            </div>
            <div class = "border-dashed ">
                <div class="grid grid-cols-1 sm:grid-cols-1 border border-gray-400 border-dashed p-2">
                    <div class="bg-white/20 p-4 rounded-xl border border-white/30">
                        <p class="text-sm font-semibold text-gray-700">Vị trí</p>
                        <p class="text-lg font-medium mt-1 border border-gray-400 border-dashed p-2"> {{ $last->location }}</p>
                    </div>

                    <div class="bg-white/20 p-4 rounded-xl border border-white/30">
                        <p class="text-sm font-semibold text-gray-700">Tọa độ</p>
                        @php
                            $coords = Illuminate\Support\Facades\DB::selectOne("
                                SELECT ST_X(coordinates) as lat, ST_Y(coordinates) as lng 
                                FROM destinations 
                                WHERE id = ?", 
                                [$last->id ?? null]
                            );

                            $lat = $coords->lat ?? null;
                            $lng = $coords->lng ?? null;
                        @endphp
                        <p class="text-lg font-medium mt-1 border border-gray-400 border-dashed p-2">
                            {{ $lat }}, {{ $lng }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class= "w-4/12 px-[15px] p-4" >
            <div class= " mb-[17px]" >
               <h2 class="font-semibold text-[30px] mb-[17px] ">Hình ảnh</h2>
            </div>
            <div class= " mb-[17px]" >
                <div class="list-gallery__image">
                    <div class="grid grid-cols-3 gap-2 sm:gap-4">
                        @if($last->images && $destination->images->count() > 0)
                            @foreach($last->images as $image)
                                <div class="column-item">
                                    <a href="{{ asset($image->url) }}" data-fancybox="gallery">
                                        <img src="{{ asset($image->url) }}" alt="Ảnh" class="w-full h-auto rounded-lg object-cover">
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <img src="{{ asset('http://localhost:8000/images/bien.webp')}}" alt="Default image"
                                class="w-full h-auto rounded-lg object-cover">
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </div>
        <section class="more-tour py-12 ">
            <div class="relative mx-auto px-4">
                <h2 class="text-3xl font-bold text-left mb-10">Khám Phá Các Chuyến Du Lịch Đến {{$last->name}}</h2>
       
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

    @foreach($tours as $tour)
    <!-- Tour Item -->
    <div class="rounded-2xl shadow hover:shadow-xl transition p-3 flex flex-col">
        <div class="relative">
            <a href="{{ route('tours.show', $tour->id) }}">
                @if($tour->images && $tour->images->count() > 0)
                    <img src="{{ $tour->images->first()->url ?? '/images/default.jpg' }}" alt="" class="w-full h-56 object-cover rounded-xl">
                @else
                    <img src="{{ asset('images/nui.webp')}}" alt="Default image"
                        class="w-full h-56 object-cover rounded-xl">
                @endif
            </a>
            @if($tour->popular)
            <div class="absolute top-3 left-3 bg-red-500 text-xs font-bold px-3 py-1 rounded-full shadow">Popular</div>
            @endif
        </div>
        
        <div class="flex-1 flex flex-col justify-between mt-4">
            <div>
                <p class="text-sm text-gray-500">{{ $last->location }}</p>
                <h3 class="text-lg font-semibold mt-1">
                    <a href="{{ route('tours.show', $tour->id) }}" class="hover:text-blue-600">{{ $tour->title }}</a>
                </h3>

                <!-- Meta -->
                <div class="flex items-center justify-between mt-3 text-gray-600">
                    <span class="flex items-center gap-1 text-sm">
                        <i class="fa-regular fa-clock"></i> {{ $tour->duration ?? 'N/A' }}
                    </span>
                    <div class="flex items-center gap-1">
                        <span class="text-yellow-500 flex">
                            @for ($i = 0; $i < 5; $i++)
                                <i class="fas fa-star {{ $i < floor($tour->rating ?? 0) ? 'text-yellow-500' : 'text-gray-300' }}"></i>
                            @endfor
                        </span>
                        <span class="text-sm font-medium text-gray-800">{{ number_format($tour->rating ?? 0, 2) }}</span>
                        <span class="text-xs text-gray-500">/5</span>
                    </div>
                </div>
            </div>

            <!-- Price + More Info -->
            <div class="flex items-center justify-between mt-4 border-t pt-3">
                <div class="text-lg font-bold text-green-600">${{ $tour->price ?? 0 }}</div>
                <a href="{{ route('tours.show', $tour->id) }}" class="text-sm font-medium text-blue-600 hover:underline flex items-center gap-1">
                    Hiển thị thêm <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- End Tour Item -->
    @endforeach
</div>

    </div>
  </div>
</section>

    </div>
    @else
        <p class="text-center text-gray-300 mt-6">Không tìm thấy dữ liệu.</p>
    @endif
@endsection 