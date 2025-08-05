@extends('layouts.tour')
@section('title', 'Tạo tour mới - Quy Nhơn Tour')
@section('description', 'Chia sẻ những trải nghiệm du lịch tuyệt vời tại Quy Nhơn')

@section('content')

    <div class="w-[60%] mx-auto mt-20">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                <strong class="font-bold">Thành công!</strong>
                <span class="block">{{ session('success') }}</span>
            </div>
        @endif
        @if($errors->any())
            <div class="bg-red-200 text-red-800 p-2 mb-4">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        <h1 class="des text-sky-500 text-center">
            {{ isset($tour) ? 'CẬP NHẬT TOUR' : 'TOUR MỚI' }}
        </h1>
        @if($tour && $tour->images && $tour->images->count() > 0)
            <div class="space-y-2 pt-8 px-8">
                <label class="flex items-center text-lg font-semibold text-gray-700">

                    Hình ảnh hiện tại
                </label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($tour->images as $image)
                        <div class="relative group">
                            <img src="{{ $image->url }}" alt="{{ $image->alt }}"
                                class="w-full h-48 object-cover rounded-lg shadow-md">
                            <form action="{{ route('images.destroy', $image->id) }}" method="POST" class="absolute top-2 right-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa ảnh này?')"
                                    class="bg-gray-300 bg-opacity-40 hover:bg-red-700 text-white rounded-full p-2 shadow transition duration-200 hover:scale-110">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        <form action="{{ isset($tour) ? route('tours.update', $tour->id) : route('tours.store') }}" method="POST"
            enctype="multipart/form-data" onsubmit="prepareItinerary()">
            @csrf
            @if(isset($tour))
                @method('PUT')
            @endif


            <div class="space-y-2">
                <label for="images" class="flex items-center text-lg font-semibold text-gray-700">

                    Hình ảnh

                </label>
                <input type="file" name="images[]" id="images" multiple accept="image/*"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">

                @error('images')
                    <p class="text-red-500 text-sm mt-1 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
                @error('images.*')
                    <p class="text-red-500 text-sm mt-1 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Tiêu đề</label>
                <input id="title" type="text" name="title" value="{{ isset($tour) ? $tour->title : '' }}"
                    placeholder="Tiêu đề"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" />
            </div>

            <div class="mb-4 ">
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                <input id="slug" type="text" name="slug" value="{{ isset($tour) ? $tour->slug : '' }}" placeholder="Slug"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" />
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
                <textarea id="description" name="description" placeholder="Mô tả"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">{{ isset($tour) ? $tour->description : '' }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Lịch trình</label>
                <div id="itinerary-container">
                    <?php
    $itinerary = isset($tour) ? json_decode($tour->itinerary, true) : []; 
                                                            ?>
                    <?php if (is_array($itinerary) && !empty($itinerary)): ?>
                    <?php    foreach ($itinerary as $day => $activity): ?>
                    <div class="flex items-center mb-2">
                        <input type="text" name="day[]" value="<?= htmlspecialchars($day) ?>"
                            class="mt-1 block w-1/3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
                        <input type="text" name="activity[]" value="<?= htmlspecialchars($activity) ?>"
                            class="mt-1 block w-2/3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 ml-2">
                        <button type="button" onclick="removeItinerary(this)" class="ml-2 text-red-500">Xóa</button>
                    </div>
                    <?php    endforeach; ?>
                    <?php else: ?>
                    <div class="flex items-center mb-2">
                        <input type="text" name="day[]" placeholder="Ngày"
                            class="mt-1 block w-1/3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
                        <input type="text" name="activity[]" placeholder="Hoạt động"
                            class="mt-1 block w-2/3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 ml-2">
                        <button type="button" onclick="removeItinerary(this)" class="ml-2 text-red-500">Xóa</button>
                    </div>
                    <?php endif; ?>
                </div>

                <button type="button" onclick="addItinerary()"
                    class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    Thêm lịch trình
                </button>

                <input type="hidden" name="itinerary" id="itinerary_json">
            </div>

            <div class="mb-4">
                <label for="duration" class="block text-sm font-medium text-gray-700">Thời gian (Ngày)</label>
                <input id="duration" type="text" name="duration" value="{{ isset($tour) ? $tour->duration : '' }}"
                    placeholder="Thời gian"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" />
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Giá</label>
                <input id="price" type="number" name="price" min="0" step="1" value="{{ isset($tour) ? $tour->price : '' }}"
                    placeholder="Giá"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" />
            </div>

            <div class="mb-4">
                <label for="max_participants" class="block text-sm font-medium text-gray-700">Số lượng người tham gia tối
                    đa</label>
                <input id="max_participants" type="number" name="max_participants"
                    value="{{ isset($tour) ? $tour->max_participants : '' }}" placeholder="Số lượng người tham gia tối đa"
                    min="1"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" />
            </div>

            <div class="mb-4">
                <label for="destination_id" class="block text-sm font-medium text-gray-700">Mã điểm đến</label>
                <input id="destination_id" type="text" name="destination_id"
                    value="{{ isset($tour) ? $tour->destination_id : '' }}" placeholder="Mã điểm đến"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" />
            </div>

            <div class="mb-4 hidden">
                <label for="user_id" class="block text-sm font-medium text-gray-700">ID người dùng</label>
                <input id="user_id" type="text" name="user_id" value="{{ isset($tour) ? $tour->user_id : auth()->id() }}"
                    placeholder="ID người dùng" readonly
                    class="mt-1 block w-full border border-gray-100 rounded-md shadow-sm focus:ring focus:ring-blue-500" />
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                <select id="status" name="status"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
                    <option value="" disabled {{ !isset($tour) ? 'selected' : '' }}>Select Status</option>
                    <option value="active" {{ (isset($tour) && $tour->status === 'active') ? 'selected' : '' }}>Hoạt động
                    </option>
                    <option value="inactive" {{ (isset($tour) && $tour->status === 'inactive') ? 'selected' : '' }}>Không hoạt
                        động</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="featured" class="block text-sm font-medium text-gray-700">Đặc sắc</label>
                <input type="hidden" name="featured" value="0">
                <input id="featured" type="checkbox" name="featured" value="1" {{ isset($tour) && $tour->featured ? 'checked' : '' }} />
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
                                                                <input type="text" name="day[]" placeholder="Ngày" class="mt-1 block w-1/3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
                                                                <input type="text" name="activity[]" placeholder="Hoạt động" class="mt-1 block w-2/3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 ml-2">
                                                                <button type="button" onclick="removeItinerary(this)" class="ml-2 text-red-500">Xóa</button>
                                                            `;
            container.appendChild(newItem);
        }

        function removeItinerary(button) {
            button.parentElement.remove();
        }

        function prepareItinerary() {
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
        }
    </script>
@endsection