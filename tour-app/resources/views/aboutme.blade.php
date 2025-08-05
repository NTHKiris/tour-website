@extends('layouts.tour')

@section('title', 'About Us | Quy Nhơn Tour - Khám phá vẻ đẹp Quy Nhơn')
@section('description', 'Khám phá những điểm đến tuyệt vời tại Quy Nhơn với các tour du lịch chất lượng cao. Kỳ Co, Eo Gió, Quy Nhon và nhiều địa điểm hấp dẫn khác.')

@section('content')
    <div class="w-[70%] mx-auto mt-[100px] mb-[60px]">
        <div class="flex flex-row px-[15px]">
            <div style="background:url('/images/quynhonbanner.webp') center/cover; height:683px; with-full"
                class=" w-full md:w-1/2 h-[400px] relative  flex flex-wrap justify-end content-end items-end bg-[url('/images/quynhonbanner.webp')] bg-cover transition-all duration-300">
                <div class="relative w-full flex flex-wrap justify-end content-end items-end transition-all duration-300">
                    <div class="relative w-[410px] max-w-[410px] h-[220px] bg-sky-500">
                        <div class=" ">
                            <div class="relative flex flex-col text-left items-start p-[40px]">
                                <div class="flex text-left items-start mb-[15px]">
                                    <span>
                                        <i class="fa-solid fa-earth-africa fa-3x text-transparent"
                                            style="-webkit-text-stroke: 2px #000;"></i>
                                    </span>
                                </div>
                                <div class="text-left  ">
                                    <h3 class="text-[25px] font-normal leading-[36px] text-white ">Khám phá vẻ đẹp hoang sơ
                                        Quy Nhơn.</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 px-[15px]">
                <div class="ml-[30px] mb-[30px]">
                    <div class="max-w-[415px] mx-auto text-left mt-10">
                        <div
                            class="text-black  text-center text-sm font-semibold uppercase leading-[16px] mb-[50px] transition-all duration-300">
                            Thời gian để khám phá
                        </div>
                        <h2
                            class="mb-[50px] text-black text-[40px] font-normal normal-case leading-[54px] transition-all duration-300 relative">
                            Một cách tốt hơn để du lịch và tham quan Quy Nhơn
                        </h2>
                        <div class="flex flex-row">
                            <div class="w-3/10 mr-[30px] mb-[30px]">
                                <span class="border-t-solid w-[80px]"></span>

                            </div>
                            <div class="w-7/10">
                                <div class="text-left mb-[30px]">
                                    <h2 class="text-[18px]  leading-[28px] text-black mb-[10px]">Quy Nhon Tour là
                                        cổng thông tin đặt tour du lịch toàn cầu, nơi bạn có thể dễ dàng đặt các tour du
                                        lịch trong ngày, khởi hành theo nhóm cố định, kỳ nghỉ và các gói kỳ nghỉ tại Quy
                                        Nhơn, một trong những điểm đến hấp dẫn tại Việt Nam.</h2>
                                    <p>Ngày nay, việc đặt tour du lịch hoặc gói kỳ nghỉ phù hợp đã trở thành một quá trình
                                        tốn thời gian và đau đầu. Nhà điều hành tour nào đủ điều kiện? Giá tour hợp lý là
                                        bao nhiêu? Khi bạn đặt cọc trước cho một nhà điều hành tour không rõ ràng, liệu tiền
                                        của bạn có an toàn không? Liệu những đánh giá trên trang web của nhà điều hành địa
                                        phương có chân thực không?</p>
                                </div>
                            </div>
                        </div>
                        <div class="ml-[110px] text-left ">
                            <a href="#"
                                class="text-[var(--accent)] border border-[var(--accent)] bg-transparent relative leading-[1.71] inline-block text-[14px] font-semibold rounded-[3px] cursor-pointer px-[27px] py-[11px] capitalize transition-all duration-300 ease-in-out appearance-none">
                                <span class="flex flex-row">
                                    <span class="text-center">Liên hệ</span>
                                    <span class="text-center ml-[10px]"><i
                                            class="fa-solid fa-arrow-right-long text-sky-500"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-[100%] mx-auto mt-[80px]">
            <div class="flex flex-row">
                <div class="w-full md:w-1/2 lg:w-1/4 px-[15px]">
                    <div class="border-r-2 border-gray-500 flex text-left items-center">
                        <div class="inline-block mr-[20px]">
                            <span>
                                <i class="fa-solid fa-bag-shopping text-[50px] text-transparent"
                                    style="-webkit-text-stroke: 2px #1e90ff;"></i>
                            </span>
                        </div>
                        <div>
                            <h3 class=" text-[24px] font-semibold leading-[24px] mb-[10px] text-sky-500">
                                <span> 16,284+ </span>
                            </h3>
                            <p class="text-black  font-semibold uppercase leading-[16px] m-0">Tour và ngày lễ</p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4 px-[15px]">
                    <div class="border-r-2 border-gray-500 flex text-left items-center">
                        <div class="inline-block mr-[20px]">
                            <span>
                                <i class="fa-regular fa-star" style="font-size:50px; color:#1e90ff;"></i>
                            </span>
                        </div>
                        <div>
                            <h3 class=" text-[24px] font-semibold leading-[24px] mb-[10px] text-sky-500">
                                <span> 16,284+ </span>
                            </h3>
                            <p class="text-black  font-semibold uppercase leading-[16px] m-0">Đánhh giá chuyến đi
                            </p>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/2 lg:w-1/4 px-[15px]">
                    <div class="border-r-2 border-gray-500 flex text-left items-center">
                        <div class="inline-block mr-[20px]">
                            <span>
                                <i class="fa-solid fa-earth-americas text-[50px] text-transparent"
                                    style="-webkit-text-stroke:2px #1e90ff;"></i>
                            </span>
                        </div>
                        <div>
                            <h3 class=" text-[24px] font-semibold leading-[24px] mb-[10px] text-sky-500">
                                <span> 16,284+ </span>
                            </h3>
                            <p class="text-black  font-semibold uppercase leading-[16px] m-0">Những nơi</p>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/2 lg:w-1/4 px-[15px]">
                    <div class="flex text-left items-center">
                        <div class="inline-block mr-[20px]">
                            <span>
                                <i class="fa-regular fa-user" style="font-size:50px; color:#1e90ff;"></i>
                            </span>
                        </div>
                        <div>
                            <h3 class=" text-[24px] font-semibold leading-[24px] mb-[10px] text-sky-500">
                                <span> 16,284+ </span>
                            </h3>
                            <p class="text-black  font-semibold uppercase leading-[16px] m-0">Nhà Du Lịch</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-title-about smtitle="Tại sao lại đặt chúng tôi" lgtitle="Quy trình đặt thuận tiện và dễ dàng" />
    <div class="flex flex-wrap  ">
        @for($i = 1; $i <= 6; $i++)
            <div class="w-1/3 p-2 ">
                <div class="mb-[50px]">
                    <div class="mb-[15px] flex flex-wrap">
                        <div class="flex items-center">
                            <span class="mr-[20px]">
                                <i class="fa fa-check text-green-500" aria-hidden="true"></i>
                            </span>
                            <h3 class="text-[20px] font-normal">Giá tốt nhất</h3>
                        </div>
                    </div>
                    <div class="text-[16px] leading-[1.375] font-normal text-[var(--text)]  w-full">
                        <p>Du lịch mang lại trải nghiệm vô giá, và chính sách Giá Tốt Nhất giúp bạn tiết kiệm.</p>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    </div>
    <x-title-about smtitle="Gặp gỡ nhóm" lgtitle="Các đại lý du lịch tốt nhất" />
    <div class="w-[70%] mx-auto pb-[80px]">
        <div class="flex flex-wrap">
            @foreach($destinations as $destination)
                <div class="w-1/4 px-[15px] text-center flex flex-col">
                    <div class="mb-[30px]">
                        <img src="{{ $destination->images->first()->url ?? '/images/default.jpg' }}"
                            alt="{{ $destination->name }}" class="w-full h-[200px] object-cover">
                    </div>
                    <div class="pb-[5px] text-[20px] text-gray-700 font-semibold">
                        <span>{{ $destination->name }}</span>
                    </div>
                    <div class="pb-[25px]">
                        <span class="text-sky-500 italic">{{ $destination->type ?? 'Địa Danh' }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <x-title-about smtitle="Đánh giá trải nghiệm" lgtitle="Những trải nghiệm của du khách" />
    <div class="w-[50%] mx-auto pb-[80px]">
        <div class="single-item">
            @for($review = 1; $review <= 4; $review++)
                <div class="text-center p-4  rounded">
                    <div class="text-gray-700 mb-[30px] text-[24px] leading-1.5  font-semibold italic">
                        “Dịch vụ khách hàng rất chuyên nghiệp. Rất đáng để giới thiệu.
                        Thật tuyệt vời! Thời gian lặn biển vừa đủ và một trong những bãi biển đẹp nhất tôi từng thấy.”
                    </div>

                    <div class="mb-[10px]">
                        @for($star = 1; $star <= 5; $star++)
                            <i class="far fa-star text-yellow-500 text-[15px]"></i>
                        @endfor
                    </div>

                    <div class="py-[20px]">
                        <div class="mb-[5px] w-full text-center text-[14px] font-semibold leading-[16px] uppercase text-black">
                            Trương Man Thành
                        </div>
                        <div>Hồ Chí Minh, Việt Nam</div>
                    </div>
                </div>
            @endfor
        </div>


@endsection

    @push('scripts')
        <script>

            $('.single-item').slick({
                slidesToShow: 1,
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
    @endpush