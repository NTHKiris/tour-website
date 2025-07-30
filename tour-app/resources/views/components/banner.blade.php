@props(['title' => null, 'image' => null])
<div class="relative w-full h-[500px] md:h-[900px] mb-8 overflow-hidden ">
    <img src="{{$image ?? '/images/banner.jpg'}}" alt=""
        class="absolute inset-0 w-full h-full object-cover animate-zoom-in-out">
    <div class="absolute inset-0 bg-black/30"></div>
    <div class="absolute inset-0  flex flex-col items-center justify-center text-center text-white z-10">
        <div><span class="text-lg md:text-2xl font-semibold drop-shadow">{{$title ?? ''}}</span></div>
        <h1 class="text-4xl md:text-6xl font-bold mb-4 drop-shadow-lg" style="font-family: 'Sacramento', cursive;">
            Quy Nhơn</h1>
    </div>
</div>