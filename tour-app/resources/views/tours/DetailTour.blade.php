@extends('layouts.tour')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class= "mt-[54px] mb-[120px] px-[30px] ">
    <div class="px-[100px] flex flex-wrap mx-[-15px]">
        <div class = "w-full lg:w-8/12 px-[15px] ">
            <div><h1 class = "text-[30px] font-normal leading-[36px] text-accent mb-2">{{$tours->title}}</h1></div>
            <div class = " w-[100%] h-[540px] py-[20px] ">
                <img src="{{ asset('images/Eo-Gio.jpg')}} " alt="" class="object-cover rounded-[3px] w-full h-full">
            </div>
            <div  class="grid grid-flow-col grid-rows-1 gap-6 mb-[40px]" >
                @foreach ($tours as $tour)
                    <div class = "item border-gray-50 w-[100%] h-[100%]">
                        <div class="card ">
                            <div class = "w-[100%] h-[100%]">
                                <img src="{{ asset('images/nui.webp')}}" alt="" class = "w-[100%] h-[100%]">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mb-[35px] ">
                <nav class="border-b border-gray-300">
                    <div class="flex space-x-4">
                        <a class="text-blue-600 hover:text-blue-800 active:text-blue-800 font-semibold border-b-2 border-blue-600 p-2" id="home-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="home" aria-selected="true">
                            Tổng quan
                        </a>
                        <a class="text-gray-600 hover:text-blue-800 font-semibold p-2" id="profile-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="profile" aria-selected="false">
                            Kế hoạch
                        </a>
                        <a class="text-gray-600 hover:text-blue-800 font-semibold p-2" id="messages-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="messages" aria-selected="false">
                            Vị trí
                        </a>
                        <a class="text-gray-600 hover:text-blue-800 font-semibold p-2" id="messages-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="messages" aria-selected="false">
                            Đánh giá
                        </a>
                    </div>
                </nav>
            </div>

            <div class= "py-[10px] flex flex-col">
                <h1 class="des">Description</h1>
                <span>{{$tours->description}}</span>
            </div>
            <div class="py-[45px] px-[50px] flex relative min-h-[220px] bg-sky-50">
                <div class = "w-[20%]">
                    <img src="{{ asset('images/img_single_tour_1.webp')}}" alt="">
                </div>
                <div>
                    <h5 class="des">Những Điểm nối bật</h5>
                
                    <div>
                        <ul class="list-item ">
                            <li >
                                <span class ="pr-[13px] text-green-500"><i class="fa fa-check" aria-hidden="true"></i></span>
                                <span >Tuyến leo núi phổ biến  </span>
                            </li>
                            <li>
                                <span class ="pr-[13px] text-green-500"><i class="fa fa-check" aria-hidden="true"></i></span>
                                <span>Chuyến đi 5 ngày đến Quy Nhơn từ Thành Phố Hồ Chí Minh</span>
                            </li>
                            <li>
                                <span class ="pr-[13px] text-green-500"><i class="fa fa-check" aria-hidden="true"></i></span>
                                <span>Khám phá Công viên Đổi Mới tuyệt đẹp</span>
                            </li>
                            <li>
                                <span class ="pr-[13px] text-green-500"><i class="fa fa-check" aria-hidden="true"></i></span>
                                <span>Trải nghiệm bãi tắm đẹp</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class ="my-[40px] py-[30px] border-dashed border-t border-r-0 border-b border-l-0">
                <div class= "">
                    <h2 class="des pb-[13px]">Lịch & Giá cả</h2>
                </div>
            </div>
        </div> 
        <div class= "border-dashed border border-gray-500 h-full lg:w-4/12  px-[50px] py-[40px]">
        <div class= "sidebar">
            <div class ="booking">
                <h6 class = "text-[20px] leading-[1.3] mb-[16px]">Đặt chuyến</h6>
                <div class="mb-[10px]">
                    <input type="date" placeholder="When (Date)" class="w-full p-2 border border-gray-300 rounded box-border">
                </div>
                <div class="flex flex-wrap py-[16px] mb-[3px] w-full">
                    <label for="" class = "lg:w-4/12">Time</label>
                    <div class = "lg:w-8/12 ">
                        <input type="radio"><label for="">12:00</label>
                        
                        <input type="radio"><label for="">17:00</label>
                    </div>
                </div>
                <div class="pb-[30px] border-dashed border-b">
                    <label for="" class="font-bold mb-[14px]">Tickets</label>
                    <div class="flex flex-row my-[10px]">
                        <div>Adult (18+ years) <span class= "font-bold">$181</span></div>
                        <select id="quantity" name="quantity" class = "border border-gray-300 rounded box-border leading-[1.5]">
                            <option value="0">0</option>
                        </select>
                    </div>

                    <div class="flex flex-row my-[10px]">
                        <div>Youth (13-17 years) <span class= "font-bold">$171</span></div>
                        <select id="quantity1" name="quantity" class = "border border-gray-300 rounded box-border leading-[1.5]">
                            <option value="0">0</option>
                        </select>
                    </div>
                    <div class="flex flex-row my-[10px]">
                        <div>Children (0-12 years) <span class= "font-bold">$161</span></div>
                        <select id="quantity1" name="quantity" class = "border border-gray-300 rounded box-border leading-[1.5]">
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
                    <div  class="flex items-center justify-between w-full">
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
