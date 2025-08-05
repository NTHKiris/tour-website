@extends('layouts.tour')
@section('title', $tours->title)

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="mt-28  px-[30px] ">
    <div class="px-[100px] flex flex-wrap mx-[-15px]">
        <div class="w-full lg:w-8/12 px-[15px] ">
            <div>
                <h1 class="text-[30px] font-bold leading-[36px] text-accent mb-2">{{$tours->title}}</h1>
            </div>
            <div class="w-full py-[20px]">

                @if($tours->images && $tours->images->count() > 0)
                    <img src="{{ asset($tours->images[0]->url) }}" alt="Tour image"
                        class="w-full h-[400px] object-cover rounded mb-4">
                @else
                    <img src="{{ asset('images/Eo-Gio.jpg') }}" alt="Default image"
                        class="w-full h-[400px] object-cover rounded mb-4">
                @endif


                <div class="grid grid-cols-5 gap-4">
                    @for ($i = 1; $i < 6; $i++)
                        <div>
                            @if(isset($tours->images[$i]))
                                <img src="{{ asset($tours->images[$i]->url) }}" alt="Tour image"
                                    class="w-full h-[100px] object-cover rounded">
                            @else
                                <div class="bg-gray-100 w-full h-[100px] rounded"></div>
                            @endif
                        </div>
                    @endfor
                </div>
            </div>


            <div class="mb-[35px] shadow-lg shadow-cyan-500/50 px-[20px] py-[20px] rounded-lg">
                <nav class="border-b border-gray-300 mb-4">
                    <div class="flex space-x-4">
                        <a class="tab-link text-blue-600 hover:text-blue-800 font-semibold border-b-2 border-blue-600 p-2 active"
                            data-tab="tab1">Mô tả</a>
                        <a class="tab-link text-gray-600 hover:text-blue-800 font-semibold p-2"
                            data-tab="tab2">Lịch trình</a>
                        <a class="tab-link text-gray-600 hover:text-blue-800 font-semibold p-2"
                            data-tab="tab3">Vị trí</a>
                        <a class="tab-link text-gray-600 hover:text-blue-800 font-semibold p-2"
                            data-tab="tab4">Đánh giá</a>
                    </div>
                </nav>

                <div class="tab-content">
                    <div id="tab1" class="tab-pane block">
                        <p>✦ {{$tours->description}} </p>
                    </div>
                    <div id="tab2" class="tab-pane hidden">
                        <div id="itinerary-container">
                            <?php
                            $itinerary = isset($tours) ? json_decode($tours->itinerary, true) : []; 
                            
                            ?>
                            <?php if (is_array($itinerary) && !empty($itinerary)): ?>
                                <?php foreach ($itinerary as $day => $activity): ?>
                                    <div class="flex items-start mb-2">
                                        <p class="w-1/3 text-sm text-gray-800 font-semibold"><?= htmlspecialchars($day) ?></p>
                                        <p class="w-2/3 text-sm text-gray-600 ml-2"><?= htmlspecialchars($activity) ?></p>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-gray-500 italic">Chưa có lịch trình nào.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div id="tab3" class="tab-pane hidden">
                        <p>✦ {{$tours->destination->name}}.</p>
                    </div>
                    <div id="tab4" class="tab-pane hidden">
                        <h3 class="text-lg font-bold mb-4">Đánh giá từ khách hàng</h3>

                        <!-- Đánh giá 1 -->
                        <div class="mb-4 border-b pb-4">
                            <p class="font-semibold">Nguyễn Văn Anh</p>
                            <div class="text-yellow-400 mb-1">
                                ★★★★★
                            </div>
                            <p>Chuyến đi tuyệt vời, hướng dẫn viên thân thiện và địa điểm rất đẹp!</p>
                        </div>

                        <!-- Đánh giá 2 -->
                        <div class="mb-4 border-b pb-4">
                            <p class="font-semibold">Trần Thị Bình</p>
                            <div class="text-yellow-400 mb-1">
                                ★★★★★
                            </div>
                            <p>Dịch vụ tốt, đặt tour dễ dàng, tôi sẽ giới thiệu cho bạn bè!</p>
                        </div>

                        <!-- Đánh giá 3 -->
                        <div class="mb-4 border-b pb-4">
                            <p class="font-semibold">Lê Văn Cảnh</p>
                            <div class="text-yellow-400 mb-1">
                                ★★★★★
                            </div>
                            <p>Mọi thứ đều ổn, thời gian hợp lý và được hỗ trợ rất nhanh.</p>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="py-[45px] px-[50px] flex relative min-h-[220px] bg-sky-50">
                <div class="w-[20%]">
                    <img src="{{ asset('images/img_single_tour_1.webp')}}" alt="">
                </div>
                <div>
                    <h5 class="des">Những Điểm nối bật</h5>

                    <div>
                        <ul class="list-item ">
                            <li>
                                <span class="pr-[13px] text-green-500"><i class="fa fa-check"
                                        aria-hidden="true"></i></span>
                                <span>Tuyến leo núi phổ biến </span>
                            </li>
                            <li>
                                <span class="pr-[13px] text-green-500"><i class="fa fa-check"
                                        aria-hidden="true"></i></span>
                                <span>Chuyến đi 5 ngày đến Quy Nhơn từ Thành Phố Hồ Chí Minh</span>
                            </li>
                            <li>
                                <span class="pr-[13px] text-green-500"><i class="fa fa-check"
                                        aria-hidden="true"></i></span>
                                <span>Khám phá Công viên Đổi Mới tuyệt đẹp</span>
                            </li>
                            <li>
                                <span class="pr-[13px] text-green-500"><i class="fa fa-check"
                                        aria-hidden="true"></i></span>
                                <span>Trải nghiệm bãi tắm đẹp</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="my-[40px] py-[30px] border-dashed border-t border-r-0 border-b border-l-0">
                <div class="">
                    <h2 class="des pb-[13px]">Lịch & Giá cả</h2>
                </div>
            </div>
        </div>
        <div class="border-dashed border border-gray-500 h-full lg:w-4/12  px-[50px] py-[40px]">
            <div class="sidebar">
                <div class="booking">
                    <h6 class="text-[20px] leading-[1.3] mb-[16px]">Đặt chuyến</h6>
                    <div class="mb-[10px]">
                        <input type="date" placeholder="When (Date)"
                            class="w-full p-2 border border-gray-300 rounded box-border">
                    </div>
                    <div class="flex flex-wrap py-[16px] mb-[3px] w-full">
                        <label for="" class="lg:w-4/12">Time</label>
                        <div class="lg:w-8/12 space-x-2 ">
                            <input type="radio"><label for="">12:00</label>

                            <input type="radio"><label for="">17:00</label>
                        </div>
                    </div>
                    <div class="pb-[30px] border-dashed border-b">
                        <label for="" class="font-bold mb-[14px]">Tickets</label>
                        <div class="flex flex-row my-[10px] items-end justify-between">
                            <div>Adult (18+ years) <span class="font-bold">$181</span></div>
                            <select id="quantity" name="quantity"
                                class="border border-gray-300 rounded box-border leading-[1.5]">
                                <option value="0">0</option>
                            </select>
                        </div>

                        <div class="flex flex-row my-[10px] items-end justify-between">
                            <div>Youth (13-17 years) <span class="font-bold">$171</span></div>
                            <select id="quantity1" name="quantity"
                                class="border border-gray-300 rounded box-border leading-[1.5]">
                                <option value="0">0</option>
                            </select>
                        </div>
                        <div class="flex flex-row my-[10px] items-end justify-between">
                            <div>Children (0-12 years) <span class="font-bold">$161</span></div>
                            <select id="quantity1" name="quantity"
                                class="border border-gray-300 rounded box-border leading-[1.5]">
                                <option value="0">0</option>
                            </select>
                        </div>
                    </div>
                    <div class="pb-[30px] border-dashed border-b pt-[10px]">
                        <label for="" class="font-bold mb-[14px]">Extra services</label>
                        <div class="flex flex-row my-[5px]">
                            <div class="mt-2">
                                <input type="checkbox" id="servicePerBooking" class="mr-2 ">
                                <label for="servicePerBooking" class="">Service per booking</label>
                                <span class="ml-auto font-bold  rounded pl-[30px]">$30</span>
                            </div>
                        </div>
                        <div class="flex flex-row mb-[10px]">
                            <div class="mt-2">
                                <input type="checkbox" id="servicePerBooking" class="mr-2">
                                <label for="servicePerBooking" class="">Service per booking</label>
                                <p>Adult: <span class="font-bold">$17</span></p>
                                <p>Youth: <span class="font-bold">$14</span></p>
                                <p>Children: <span class="font-bold">free</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col items-start mt-[10px] ">
                        <div class="flex items-center justify-between w-full">
                            <h2 class="font-bold">Total</h2>
                            <p class="text-xl font-bold text-sky-500">$0</p>
                        </div>
                        <button class="mt-4 bg-sky-500 text-white px-4 py-2 rounded  items-center w-full">
                            Book Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const tabLinks = document.querySelectorAll('.tab-link');
        const tabPanes = document.querySelectorAll('.tab-pane');

        tabLinks.forEach(link => {
            link.addEventListener('click', () => {
                const tabId = link.dataset.tab;

                // Ẩn toàn bộ tab content
                tabPanes.forEach(pane => pane.classList.add('hidden'));
                // Gỡ active khỏi các link
                tabLinks.forEach(l => {
                    l.classList.remove('text-blue-600', 'border-b-2', 'border-blue-600');
                    l.classList.add('text-gray-600');
                });

                // Hiện tab được chọn
                document.getElementById(tabId).classList.remove('hidden');
                // Thêm active vào link
                link.classList.add('text-blue-600', 'border-b-2', 'border-blue-600');
                link.classList.remove('text-gray-600');
            });
        });
    });
</script>