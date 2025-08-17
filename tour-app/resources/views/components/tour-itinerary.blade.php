@props(['tour'])

<div id="itinerary-container">
    @php
        $itinerary = isset($tour) ? json_decode($tour->itinerary, true) : [];
    @endphp
    
    @if (is_array($itinerary) && !empty($itinerary))
        @foreach ($itinerary as $day => $activity)
            <div class="flex items-start mb-2">
                <p class="w-1/3 text-sm text-gray-800 font-semibold">{{ $day }}</p>
                <p class="w-2/3 text-sm text-gray-600 ml-2">{{ $activity }}</p>
            </div>
        @endforeach
    @else
        <p class="text-gray-500 italic">Chưa có lịch trình nào.</p>
    @endif
</div>