@extends('layouts.tour')

<div class= "mt-[200px] mb-[120px] px-[30px] ">
    <form action="{{ isset($tour) ? route('tours.update', $tour->id) : route('tours.store') }}" method="POST" onsubmit="return prepareItinerary()">
        @csrf
        @if(isset($tour))
            @method('PUT')
        @endif
    
        <h1 class="m-10 p-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-md text-center hover:bg-blue-600 cursor-pointer transition duration-200">
            {{ isset($tour) ? 'Cập nhật' : 'Tạo mới' }}
        </h1>

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Tour Title</label>
            <input 
                id="title" 
                type="text" 
                name="title" 
                value="{{ isset($tour) ? $tour->title : '' }}" 
                placeholder="Tour Title" 
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500"
            />
        </div>

        <div class="mb-4">
            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
            <input 
                id="slug" 
                type="text" 
                name="slug" 
                value="{{ isset($tour) ? $tour->slug : '' }}" 
                placeholder="Slug" 
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500"
            />
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea 
                id="description" 
                name="description" 
                placeholder="Description" 
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500"
            >{{ isset($tour) ? $tour->description : '' }}</textarea>
        </div>

        <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Itinerary</label>
        <div id="itinerary-container">
            <?php
                $itinerary = isset($tour) ? json_decode($tour->itinerary, true) : []; 
            ?>
            <?php if (is_array($itinerary) && !empty($itinerary)): ?>
                <?php foreach ($itinerary as $day => $activity): ?>
                    <div class="flex items-center mb-2">
                        <input type="text" name="day[]" value="<?= htmlspecialchars($day) ?>" class="mt-1 block w-1/3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
                        <input type="text" name="activity[]" value="<?= htmlspecialchars($activity) ?>" class="mt-1 block w-2/3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 ml-2">
                        <button type="button" onclick="removeItinerary(this)" class="ml-2 text-red-500">Remove</button>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="flex items-center mb-2">
                    <input type="text" name="day[]" placeholder="Day" class="mt-1 block w-1/3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
                    <input type="text" name="activity[]" placeholder="Activity" class="mt-1 block w-2/3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 ml-2">
                    <button type="button" onclick="removeItinerary(this)" class="ml-2 text-red-500">Remove</button>
                </div>
            <?php endif; ?>
        </div>
        
        <button type="button" onclick="addItinerary()" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
            Add Itinerary Item
        </button>

        <input type="text" name="itinerary" id="itinerary_json">
            {{-- <label for="itinerary" class="block text-sm font-medium text-gray-700">Itinerary</label>
            <textarea 
                id="itinerary" 
                name="itinerary" 
                placeholder="Itinerary" 
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500"
            >{{ isset($tour) ? $tour->itinerary : '' }}</textarea> --}}
        </div>

        <div class="mb-4">
            <label for="duration" class="block text-sm font-medium text-gray-700">Duration</label>
            <input 
                id="duration" 
                type="text" 
                name="duration" 
                value="{{ isset($tour) ? $tour->duration : '' }}" 
                placeholder="Duration" 
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500"
            />
        </div>

        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input 
                id="price" 
                type="number" 
                name="price" 
                min="0" 
                step="1" 
                value="{{ isset($tour) ? $tour->price : '' }}" 
                placeholder="Price" 
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500"
            />
        </div>

        <div class="mb-4">
            <label for="max_participants" class="block text-sm font-medium text-gray-700">Max Participants</label>
            <input 
                id="max_participants" 
                type="number" 
                name="max_participants" 
                value="{{ isset($tour) ? $tour->max_participants : '' }}" 
                placeholder="Max Participants" 
                min="1"  
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500"
            />
        </div>

        <div class="mb-4">
            <label for="destination_id" class="block text-sm font-medium text-gray-700">Destination ID</label>
            <input 
                id="destination_id" 
                type="text" 
                name="destination_id" 
                value="{{ isset($tour) ? $tour->destination_id : '' }}" 
                placeholder="Destination ID" 
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500"
            />
        </div>

        <div class="mb-4">
            <label for="user_id" class="block text-sm font-medium text-gray-700">User ID</label>
            <input 
                id="user_id" 
                type="text" 
                name="user_id" 
                value="{{ isset($tour) ? $tour->user_id : '' }}" 
                placeholder="User ID" 
                readonly
                class="mt-1 block w-full border border-gray-100 rounded-md shadow-sm focus:ring focus:ring-blue-500"
            />
        </div>

       <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select 
                id="status" 
                name="status" 
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500"
            >
                <option value="" disabled {{ !isset($tour) ? 'selected' : '' }}>Select Status</option>
                <option value="active" {{ (isset($tour) && $tour->status === 'active') ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ (isset($tour) && $tour->status === 'inactive') ? 'selected' : '' }}>Inactive</option>
                <option value="draft" {{ (isset($tour) && $tour->status === 'draft') ? 'selected' : '' }}>Draft</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="featured" class="block text-sm font-medium text-gray-700">Featured</label>
            <input type="hidden" name="featured" value="0">
            <input 
                id="featured" 
                type="checkbox" 
                name="featured" 
                value="1"
                {{ isset($tour) && $tour->featured ? 'checked' : '' }} 
            />
        </div>

        <button type="submit" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-md">
            {{ isset($tour) ? 'Cập nhật' : 'Tạo mới' }}
        </button>
    </form>
</div>



<script>
    function addItinerary() {
        const container = document.getElementById('itinerary-container');
        const newItem = document.createElement('div');
        newItem.className = 'flex items-center mb-2';
        newItem.innerHTML = `
            <input type="text" name="day[]" placeholder="Day" class="mt-1 block w-1/3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
            <input type="text" name="activity[]" placeholder="Activity" class="mt-1 block w-2/3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 ml-2">
            <button type="button" onclick="removeItinerary(this)" class="ml-2 text-red-500">Remove</button>
        `;
        container.appendChild(newItem);
    }

    function removeItinerary(button) {
        button.parentElement.remove();
    }

    function prepareItinerary() {
        try {
            console.log('Preparing itinerary...');
            const days = Array.from(document.getElementsByName('day[]')).map(input => input.value);
            const activities = Array.from(document.getElementsByName('activity[]')).map(input => input.value);
            
            const itinerary = {};
            days.forEach((day, index) => {
                if (day && activities[index]) {
                    itinerary[day] = activities[index];
                }
            });
            const itineraryJson = JSON.stringify(itinerary);
            document.getElementById('itinerary_json').value = itineraryJson;

            // Loại bỏ day[] và activity[] khỏi biểu mẫu
            const dayInputs = document.getElementsByName('day[]');
            const activityInputs = document.getElementsByName('activity[]');
            
            for (let i = dayInputs.length - 1; i >= 0; i--) {
                dayInputs[i].remove();
                activityInputs[i].remove();
            }
            return true; // Cho phép form submit
        } catch (error) {
            console.error('Error preparing itinerary:', error);
            return false; // Ngăn form submit
        }
    }
</script>