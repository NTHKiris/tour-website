@props([
    'action',
    'method' => 'POST',
    'destination' => null,
    'submitText' => 'Thêm điểm đến',
    'title' => 'Thông tin điểm đến',
    'cancelUrl' => null
])

<div class=" rounded-xl overflow-hidden">
    <!-- Error Messages -->
    @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-400 p-6 rounded-lg mt-2">
            <div class="flex items-center mb-3">
                <i class="fas fa-exclamation-triangle text-red-400 mr-2"></i>
                <h3 class="text-lg font-semibold text-red-800">Có lỗi xảy ra</h3>
            </div>
            <ul class="list-disc list-inside text-red-700 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Form -->
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow space-y-5">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif
        <!-- Name -->
        <div>
            <label for="name" class="block font-semibold mb-1">Tên điểm đến</label>
            <input type="text" name="name" id="name"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                value="{{ old('name', $destination->name ?? '') }}" require>
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block font-semibold mb-1">Mô tả</label>
            <textarea name="description" id="description" rows="3"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('name', $destination->description ?? '') }}</textarea>
            @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Location -->
        <div>
            <label for="location" class="block font-semibold mb-1">Vị trí</label>
            <input type="text" name="location" id="location" 
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                value="{{ old('location', $destination->location ?? '') }}"
                required>
            @error('location')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Coordinates --> 
         <!-- xử lý dấu phẩy -->
        @php
            $coords = trim(($destination->lat ?? '') . ', ' . ($destination->lng ?? ''), ', ');
        @endphp
        <div>
            <label for="coordinates" class="block font-semibold mb-1">Tọa độ</label>
            <input type="text" name="coordinates" id="coordinates" 
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                value="{{ old('coordinates', ($destination->lat ?? '') . ', ' . ($destination->lng ?? '')) }}"
                require>
            @error('coordinates')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Featured Image -->
        <div>
            <label for="featured_image" class="block font-semibold mb-1">Ảnh địa danh</label>
            <input type="file" name="images[]" id="featured_image" 
                accept="images/*" multiple
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('featured_image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit -->
        <div class="pt-2">
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition duration-150">
                {{ $submitText }}
            </button>
            <a 
                href="{{ $cancelUrl ?? route('destinations.index') }}"
                class="flex-1 sm:flex-none bg-gray-100 text-gray-700 px-8 py-4 rounded-xl font-semibold text-lg hover:bg-gray-200 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center"
            >
                <i class="fas fa-times mr-2"></i>
                Hủy bỏ
            </a>
        </div>
    </form>
</div>
