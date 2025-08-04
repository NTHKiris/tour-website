@extends('layouts.tour')

@section('content')

   

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
            <div class="py-5 ">
                <div class="w-[60%] mx-auto ">
                    <div class="row">
                        <div class="grid grid-cols-3 grid-rows-2 gap-3">
                            @foreach ($tours as $tour)
                                <div class="item border-gray-50 w-[100%] h-[100%]">
                                    <div class="card relative">
                                        <div class="w-[100%] h-[60%]">
                                            <img src="{{ asset('images/bien.webp')}}" alt="" class="w-[100%] h-[100%]">
                                        </div>
                                        @auth
                                            <div class="absolute top-2 right-2">
                                                <span class="dots cursor-pointer text-2xl"
                                                    onclick="toggleDropdown({{ $tour->id }})">⋮</span>
                                                <div class="dropdown hidden absolute right-0 bg-white border border-gray-300 rounded mt-1 z-10"
                                                    id="dropdownMenu{{ $tour->id }}"> <!-- added -->
                                                    <a href="#" onclick="update({{ $tour->id }})"
                                                        class="block px-4 py-2 text-black hover:bg-gray-100">Sửa</a> <!-- added -->
                                                    <a href="#" onclick="deleteItem({{ $tour->id }})"
                                                        class="block px-4 py-2 text-black hover:bg-gray-100">Xóa</a> <!-- added -->
                                                </div>
                                            </div>
                                        @endauth
                                        <div class="py-5 px-2.5 w-[100%] h-[40%]">
                                            <a href="{{ route('tours.show', $tour->id) }}"
                                                class="text-18 text-black font-r_regular">{{ Str::limit($tour->title, 40)}}</a><br>
                                            <span class="sub-item">{{ Str::limit($tour->description, 45) }}</span><br>
                                            <form action="{{ route('tours.show', $tour->id) }}" method="GET">
                                                <button type="submit" class="no-underline hover:underline">Xem chi tiết</button>
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

                    <div>
                        <h1 class="text-3xl leading-9 font-bold">Địa Danh Quy Nhơn</h1>
                    </div>
                    <div class="grid grid grid-cols-2 grid-rows-3  gap-6 px-4 md:grid-cols-2 md:px-0 p-8 mb-16">
                        @foreach ($destinations as $destination)
                            <div class="item border-gray-50 relative">
                                <div class="flex flex-col md:flex-row w-[100%] h-[100%]">
                                    <div class="w-[40%] h-[100%]">
                                        <img src="{{ asset('images/nui.webp')}} " alt="" class="w-[100%] h-[100%]">
                                    </div>
                                    <div class="py-5 px-2.5 w-[60%] h-[100%]">
                                        <a href="{{ route('tours.show', $tour->id) }}"
                                        class="text-18 text-black font-r_regular">{{ Str::limit($destination->name, 45) }}</a><br>
                                        <span class="sub-item">{{ Str::limit($destination->description, 45) }}</span><br>

                                        @auth
                                            <div class="absolute top-2 right-2">
                                                <span class="dots cursor-pointer text-2xl"
                                                    onclick="toggleDropdownDestination({{ $destination->id }})">⋮</span>
                                                <div class="dropdown hidden absolute right-0 bg-white border border-gray-300 rounded mt-1 z-10"
                                                    id="dropdownMenuDestination{{ $destination->id }}">
                                                    <a href="#" onclick="updateDestination({{ $destination->id }})"
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

        @section('scripts')
            <script>
                $('.featured-carousel').owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: true,
                    dots: false,
                    responsive: {
                        0: {
                            items: 0
                        },
                        600: {
                            items: 3
                        },
                        1000: {
                            items: 5
                        }
                    }
                })

            </script>
        @endsection
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

        </script>
@endsection