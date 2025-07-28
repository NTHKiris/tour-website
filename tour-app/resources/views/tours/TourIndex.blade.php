@extends('layouts.tour')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<div>
    <div class= "tarticle__title--scrip">
        <div style = "margin-left: auto; margin-right: auto;width: 960px;">
    <h1 style="font-family:Time New Roman, Georgia,serif; font-size:20px; margin: 20px; padding-bottom: 5px; text-align: center">Tours</h1>
    
    </div>
        <div class = "py-5 ">
            <div class="container_12" >
                <div class="row">
                    <div  class="grid grid-flow-col grid-rows-2 gap-3" >
                        @foreach ($tours as $tour)
                        <div class = "item border-gray-50 w-[100%] h-[100%]">
                            <div class="card ">
                                <div class = "w-[100%] h-[60%]">
                                    <img src="{{ asset('images/bien.webp')}}" alt="" class = "w-[100%] h-[100%]">
                                </div>
                                <div class="py-5 px-2.5 w-[100%] h-[40%]">
                                    <a href="#" class = "text-18 text-black font-r_regular">{{ Str::limit($tour->title, 45)}}</a><br>
                                    <span class = "sub-item">{{ Str::limit($tour->description, 45) }}</span><br>
                                    <form action="{{ route('tours.update', $tour->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type = "submit" class="no-underline hover:underline">Xem chi tiết</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                </div>

                <div>
                    <h1 class="text-3xl leading-9 font-bold">Địa Danh Quy Nhơn</h1>
                </div>
                <div  class="grid grid-col-1 gap-6 px-4 md:grid-cols-2 md:px-0 p-8 mb-16"  >
                        @foreach ($tours as $tour)
                        <div class = "item border-gray-50 ">
                            <div class="flex flex-col md:flex-row w-[100%] h-[100%]">
                                <div class = "w-[40%] h-[100%]">
                                    <img src="{{ asset('images/nui.webp')}} " alt="" class = "w-[100%] h-[100%]">
                                </div>
                                <div class="py-5 px-2.5 w-[60%] h-[100%]">
                                    <a href="#" class = " text-18 text-black font-r_regular">{{ Str::limit($tour->title, 45) }}</a><br>
                                   <span class=" sub-item">{{ Str::limit($tour->description, 45) }}</span><br>
                                    <form action="{{ route('tours.update', $tour->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type = "submit" class="no-underline hover:underline">Xem chi tiết</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                <div>
                    <h1 class="text-3xl leading-9 font-bold">Cẩm Nang Du Lịch Quy Nhơn</h1>
                </div>
                <div class="p-6 md:px-12 md:py-8"   >
                    <div class="w-full">
                        <div class = "flex flex-col-reverse divide-y-4 divide-y-reverse divide-gray- text-base p-4">
                            <a href="#" class= "no-underline hover:underline text-base leading-7">Quy Nhơn có cảnh đẹp nào?</a>
                        </div>
                        <div class = "flex flex-col-reverse divide-y-4 divide-y-reverse divide-gray- text-base p-4">
                            <a href="#" class= "no-underline hover:underline text-base leading-7">Mùa du lịch Quy Nhơn là mùa nào?</a>
                        </div>
                        <div class = "flex flex-col-reverse divide-y-4 divide-y-reverse divide-gray- text-base p-4">
                            <a href="#" class= "no-underline hover:underline text-base leading-7">Món ăn Quy Nhơn nổi tiếng là món nào?</a>
                        </div>
                        <div class = "flex flex-col-reverse divide-y-4 divide-y-reverse divide-gray- text-base p-4">
                            <a href="#" class= "no-underline hover:underline text-base leading-7">Người dân Quy Nhơn như thế nào?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:0
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})

</script>
@endsection

        </div>
            @foreach ($tours as $tour)
                <div class="owl-item active ">
                    <h2>Title: {{ $tour->title }}</h2>
                    <p>id: {{ $tour->id }}</p>
                    <p>Description: {{ $tour->description }}</p>
                    <p>Duration: {{ $tour->duration }} days</p>
                    <p>Price: ${{ $tour->price }}</p>
                    <p>Rating: {{ $tour->average_rating }}</p>
                     <!-- Giả sử bạn có thuộc tính này -->

                    <form action="{{ route('tours.update', $tour->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" name="title" value="{{ $tour->title }}" required>
                        <button type="submit">Update</button>
                    </form>
                    
                    <form action="{{ route('tours.destroy', $tour->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
                @endforeach
                </div>
                </div>
            </div>
        </div>
</div>  