@extends('layouts.tour')

@section('title', 'Blog - Quy Nhơn Tour')

<x-banner title="Tour ">

</x-banner>

@if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded-md mb-4 text-center">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="bg-red-500 text-white p-4 rounded-md mb-4 text-center">
        {{ session('error') }}
    </div>
@endif

<div class="">
    <div class="mx-auto">
        <h1 class=" text-3xl font-bold text-gray-900 mb-4 w-[60%] mx-auto ">
            <i class=" fa-solid fa-umbrella-beach text-cyan-500 mr-4 hover:-translate-y-1 duration-75 drop-shadow-lg
    drop-shadow-cyan-500/50"></i>
            Tour
        </h1>
        <div class="py-5 w-[60%] mx-auto ">
            <div class="">
                <div class="row">
                    <!-- <div class="single-item "> -->
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($tours as $tour)
                            <div
                                class="bg-white  rounded-3xl overflow-hidden border-2 border-cyan-300  hover:shadow-2xl transition-all duration-300">
                                <div class="relative overflow-hidden h-64">
                                    @if ($tour->images && $tour->images->count() > 0)
                                        <img src="{{$tour->images->first()->url}}" alt=""
                                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                    @else
                                        <img src="/Logo.png" alt=""
                                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                    @endif
                                    <div
                                        class="absolute top-4 right-4 bg-black/70 text-white px-3 py-1 rounded-full text-sm font-bold ">
                                        {{number_format($tour->price)}} VND
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-bold text-gray-900  mb-3 line-clamp-1">{{$tour->title}}</h3>
                                    <p class="text-gray-600 leading-relaxed line-clamp-3"> {{$tour->description}}</p>
                                    <div class="flex justify-between items-center mt-4">
                                        <div class="text-cyan-600 font-medium"><i
                                                class="fa-solid fa-clock mr-2"></i>{{$tour->duration}} ngày</div>
                                        <a href="{{ route('tours.show', $tour->id) }}"
                                            class="bg-cyan-500 text-white px-6 py-2 rounded-lg font-semibold hover:bg-cyan-600 hover:-translate-y-0.5 transition-all duration-300">
                                            Đặt ngay
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

            <div class="flex items-center justify-between mb-4 mt-8">
                <h1 class="text-3xl leading-9 font-bold">Địa Danh Quy Nhơn</h1>
                <form method="GET" action="{{ route('destinations.index') }}" class="flex space-x-2">
                    <input type="text" name="search" placeholder="Nhập địa danh..." class="rounded-md">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-sky-500">Tìm kiếm
                    </button>
                </form>

            </div>
            <div class="grid grid-cols-2 grid-rows-3  gap-6 px-4 md:grid-cols-2 md:px-0 p-8 mb-16">
                @foreach ($destinations as $destination)
                    <div class="item border-gray-50 relative shadow-md shadow-blue-500/50">
                        <div class="flex flex-col md:flex-row w-[100%] h-[100%]">
                            <div class="w-[40%] h-[100%]">
                                @if($destination->images && $destination->images->count() > 0)
                                    <img src="{{ asset($destination->images->first()->url) }}" alt="Destination image"
                                        class="w-full h-full object-cover">
                                @else
                                    <img src="{{ asset('images/nui.webp')}}" alt="Default image"
                                        class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div class="py-5 px-2.5 w-[60%] h-[100%]">
                                <a href="{{ route('destinations.show', $destination) }}"
                                    class="text-18 text-black font-r_regular font-bold">{{ Str::limit($destination->name, 45) }}</a><br>
                                <span class="sub-item">{{ Str::limit($destination->description, 45) }}</span><br>

                                @auth
                                    <div class="absolute top-2 right-2">
                                        <span class="dots cursor-pointer text-2xl"
                                            onclick="toggleDropdownDestination({{ $destination->id }})">⋮</span>
                                        <div class="dropdown hidden absolute right-0 bg-white border border-gray-300 rounded mt-1 z-10"
                                            id="dropdownMenuDestination{{ $destination->id }}">
                                            <a onclick="updateDestination({{ $destination->id }})"
                                                class="block px-4 py-2 text-black hover:bg-gray-100">Sửa</a>
                                            <a href="#" onclick="deleteItemDestination({{ $destination->id }})"
                                                class="block px-4 py-2 text-black hover:bg-gray-100">Xóa</a>
                                        </div>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div>
                <h1 class="text-3xl leading-9 font-bold">Cẩm Nang Du Lịch Quy Nhơn</h1>
            </div>
            <div class="p-6 md:px-12 md:py-8">
                <div class="w-full">
                    <div class="flex flex-col-reverse divide-y-4 divide-y-reverse divide-gray- text-base p-4">
                        <a href="#" class="no-underline hover:underline text-base leading-7">Quy Nhơn có cảnh đẹp
                            nào?</a>
                    </div>
                    <div class="flex flex-col-reverse divide-y-4 divide-y-reverse divide-gray- text-base p-4">
                        <a href="#" class="no-underline hover:underline text-base leading-7">Mùa du lịch Quy Nhơn là
                            mùa nào?</a>
                    </div>
                    <div class="flex flex-col-reverse divide-y-4 divide-y-reverse divide-gray- text-base p-4">
                        <a href="#" class="no-underline hover:underline text-base leading-7">Món ăn Quy Nhơn nổi
                            tiếng là món nào?</a>
                    </div>
                    <div class="flex flex-col-reverse divide-y-4 divide-y-reverse divide-gray- text-base p-4">
                        <a href="#" class="no-underline hover:underline text-base leading-7">Người dân Quy Nhơn như
                            thế nào?</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>

    function toggleDropdown(tourId) { <!-- added -->
        const dropdown = document.getElementById('dropdownMenu' + tourId);
        dropdown.classList.toggle('hidden');
    }

    function toggleDropdownDestination(destId) {
        const dropdown = document.getElementById('dropdownMenuDestination' + destId);
        dropdown.classList.toggle('hidden');
    }

    window.onclick = function (event) {
        if (!event.target.matches('.dots')) {
            const dropdowns = document.querySelectorAll('.dropdown');
            dropdowns.forEach(dropdown => dropdown.classList.add('hidden'));
        }
    }

    function update(tourId) {
        window.location.href = "{{ route('tours.create') }}?id=" + tourId;
    }


    function updateDestination(destinationId) {
        window.location.href = "{{ route('destinations.edit', ':id') }}".replace(':id', destinationId);
    }

    function deleteItem(tourId) {
        if (!confirm('Bạn có chắc chắn muốn xóa tour này?')) return;
        let form = document.getElementById('deleteForm');
        form.action = `/tours/${tourId}`;
        form.submit();
    }

    function deleteItemDestination(destinationId) {
        if (!confirm('Bạn có chắc chắn muốn xóa địa danh này?')) return;
        let form = document.getElementById('deleteForm');
        form.action = `/destinations/${destinationId}`;
        form.submit();
    }

    $('.single-item').slick({
        slidesToShow: 3,        // Hiện 3 cái mỗi lần
        slidesToScroll: 3,
        autoplay: true,
        dots: true,
        arrows: true,
        responsive: [
            { breakpoint: 768, settings: { slidesToShow: 1 } }
        ],
        prevArrow: '<button class="absolute left-0 block h-[40px] w-[40px] leading-[0] cursor-pointer top-1/2 -translate-y-1/2 p-0 outline-none z-[9] rounded-full bg-transparent border-0"><i class="fa fa-chevron-left text-[20px]"></i></button>',
        nextArrow: '<button class="absolute right-0 block h-[40px] w-[40px] leading-[0] cursor-pointer top-1/2 -translate-y-1/2 p-0 outline-none z-[9] rounded-full bg-transparent border-0"><i class="fa fa-chevron-right text-[20px]"></i></button>',
    });
</script>