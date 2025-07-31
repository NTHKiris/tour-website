@props([
    'title' => null,
    'description' => null,
    'image1' => '/images/ky-co.jpg',
    'image2' => '/images/eo-gio.jpg',
    'image3' => '/images/quy-nhon.jpg'
])
<section class="pt-16  min-h-[60vh]">
        <div class="max-w-7xl mx-auto px-4 ">
        <div class="grid lg:grid-cols-2 ">
            <div class="max-w-lg">
                <h1 class="text-4xl lg:text-6xl font-bold italic leading-tight mb-6 text-cyan-600" >{{$title}}</h1>
                <p class="text-gray-600 text-lg leading-relaxed mb-8"  >{{$description}}</p> 
                
                <button class="group relative overflow-hidden rounded-lg py-4 font-medium transition-all duration-350 text-lg px-8 bg-cyan-500 text-white hover:text-black-900 flex justify-center items-center gap-2 hover:text-cyan-500 ">
                    <span class="relative z-20 flex justify-center items-center ">          
                        <span>Khám phá ngay</span>     
                    </span>
                <span class=" duration-[350ms] absolute inset-0 z-10 translate-y-[50%] scale-0 rounded-full transition-transform group-hover:scale-x-[150%] group-hover:scale-y-[220%]  px-6 text-[16px] bg-white flex justify-center items-center gap-2 "></span>
                </button>
            </div>
            <div class="grid grid-cols-2 grid-rows-2 gap-4 h-[500px]">
                <div class="row-span-2 rounded-3xl overflow-hidden shadow-2xl border-4 border-cyan-600 hover:scale-110  duration-700 ">
                    <img src="{{$image2}}" alt="" class="w-full h-full object-cover">
                </div>
                <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-cyan-600 hover:scale-110 duration-700">
                    <img src="{{$image1}}" alt="" class="w-full h-full object-cover">
                </div>
                <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-cyan-600 hover:scale-110 duration-700" >
                    <img src="{{$image3}}" alt="" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>