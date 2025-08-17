@props(['tour'])

<div class="py-[45px] px-[50px] flex relative min-h-[220px] bg-sky-50 rounded-lg">
    <div class="w-[20%] flex-shrink-0">
        <img src="{{ asset('images/img_single_tour_1.webp') }}" alt="Tour highlights" class="w-full h-auto">
    </div>
    <div class="flex-1 ml-6">
        <h5 class="text-xl font-bold text-gray-800 mb-4">Những Điểm Nổi Bật</h5>
        
        <ul class="space-y-2">
            <li class="flex items-start">
                <span class="pr-[13px] text-green-500 mt-1">
                    <i class="fa fa-check" aria-hidden="true"></i>
                </span>
                <span class="text-gray-700">Tuyến leo núi phổ biến</span>
            </li>
            <li class="flex items-start">
                <span class="pr-[13px] text-green-500 mt-1">
                    <i class="fa fa-check" aria-hidden="true"></i>
                </span>
                <span class="text-gray-700">Chuyến đi {{ $tour->duration }} ngày đến {{ $tour->destination->name ?? 'điểm đến tuyệt vời' }}</span>
            </li>
            <li class="flex items-start">
                <span class="pr-[13px] text-green-500 mt-1">
                    <i class="fa fa-check" aria-hidden="true"></i>
                </span>
                <span class="text-gray-700">Khám phá những địa điểm tuyệt đẹp</span>
            </li>
            <li class="flex items-start">
                <span class="pr-[13px] text-green-500 mt-1">
                    <i class="fa fa-check" aria-hidden="true"></i>
                </span>
                <span class="text-gray-700">Trải nghiệm văn hóa địa phương độc đáo</span>
            </li>
        </ul>
    </div>
</div>