@props(['tour'])

<div class="w-full py-[20px]">
    @if($tour->images && $tour->images->count() > 0)
        <img src="{{ asset($tour->images[0]->url) }}" alt="Tour image"
            class="w-full h-[400px] object-cover rounded mb-4">
    @else
        <img src="{{ asset('images/Eo-Gio.jpg') }}" alt="Default image"
            class="w-full h-[400px] object-cover rounded mb-4">
    @endif

    <div class="grid grid-cols-5 gap-4">
        @for ($i = 1; $i < 6; $i++)
            <div>
                @if(isset($tour->images[$i]))
                    <img src="{{ asset($tour->images[$i]->url) }}" alt="Tour image"
                        class="w-full h-[100px] object-cover rounded">
                @else
                    <div class="bg-gray-100 w-full h-[100px] rounded"></div>
                @endif
            </div>
        @endfor
    </div>
</div>