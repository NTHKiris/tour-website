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

    <div>
        <div class="tarticle__title--scrip">
            <div style="margin-left: auto; margin-right: auto;width: 960px;">
                <h1 class = "font-semibold text-[30px]"
                    style="font-family:Time New Roman, Georgia,serif;  margin: 20px; padding-bottom: 5px; text-align: center">
                    Tours</h1>

            </div>
            <div class="py-5 w-[60%] mx-auto ">
                <div class="">
                    <div class="row">
                        <!-- <div class="single-item "> -->
                        <div class="grid grid-flow-col grid-rows-2 gap-3 mb-[40px]">
                            @foreach ($tours as $tour)
                                <div class="item border-gray-50 w-[100%] h-[100%] shadow-md shadow-blue-500/50 p-5">
                                    <div class="card relative ">
                                        <div class="h-56 overflow-hidden">
                                            @if($tour->images && $tour->images->count() > 0)
                                            <img src="{{ asset($tour->images->first()->url) }}" alt="Tour image"
                                                class="w-full h-full object-cover">
                                            @else
                                                <img src="{{ asset('images/bien.webp') }}" alt="Default image"
                                                    class="w-full h-full object-cover">
                                            @endif
                                        @auth
                                            <div class="absolute top-2 right-2">
                                                <span class="dots cursor-pointer text-2xl"
                                                    onclick="toggleDropdown({{ $tour->id }})">⋮</span>
                                                <div class="dropdown hidden absolute right-0 bg-white border border-gray-300 rounded mt-1 z-10"
                                                    id="dropdownMenu{{ $tour->id }}"> <!-- added -->
                                                    <a  onclick="update({{ $tour->id }})"
                                                        class="block px-4 py-2 text-black hover:bg-gray-100">Sửa</a> <!-- added -->
                                                    <a href="#" onclick="deleteItem({{ $tour->id }})"
                                                        class="block px-4 py-2 text-black hover:bg-gray-100">Xóa</a> <!-- added -->
                                                </div>
                                            </div>
                                        @endauth
                                        </div>
                                        
                                        <div class="py-5 px-2.5 w-[100%] h-[40%]">
                                            <a href="{{ route('tours.show', $tour->id) }}"
                                                class="text-18 text-black font-r_regular block font-semibold ">{{ Str::limit($tour->title, 45)}}</a><br>
                                            <span class="sub-item block ">{{ Str::limit($tour->description, 45) }}</span><br>
                                            <form action="{{ route('tours.show', $tour->id) }}" method="GET">
                                                <button type="submit" class="no-underline hover:underline text-sky-500">Xem chi tiết</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <form id="deleteForm" method="POST" style="display:none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mb-4">
                        <h1 class="text-3xl leading-9 font-bold">Địa Danh Quy Nhơn</h1>
                        <form method="GET" action="{{ route('destinations.index') }}" class="flex space-x-2">
                            <input type="text" name="search" placeholder="Nhập địa danh..." class = "rounded-md">
                            <button type="submit"  class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-sky-500" >Tìm kiếm </button>
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
