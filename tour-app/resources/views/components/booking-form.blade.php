@props(['tour'])

<div class="border-dashed border border-gray-500 h-full lg:w-4/12 px-[50px] py-[40px]">
    <div class="sidebar">
        <div class="booking">
            <h6 class="text-[20px] leading-[1.3] mb-[16px]">Đặt chuyến</h6>

            @auth
                <form action="{{ route('bookings.store') }}" method="POST" id="bookingForm">
                    @csrf
                    <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                    <input type="hidden" name="redirect_to_payment" value="1">

                    @if ($errors->any())
                        <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                            <ul class="list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Date Selection -->
                    <div class="mb-[10px]">
                        <label for="tour_date" class="block text-sm font-medium text-gray-700 mb-1">Ngày tour</label>
                        <input type="date" name="tour_date" id="tour_date" required min="{{ date('Y-m-d') }}"
                            class="w-full p-2 border border-gray-300 rounded box-border">
                        @error('tour_date')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Participant Selection -->
                    <div class="pb-[30px] border-dashed border-b">
                        <label class="font-bold mb-[14px] block">Số lượng khách</label>

                        <!-- Adults -->
                        <div class="flex flex-row my-[10px] items-end justify-between">
                            <div class="flex-1">
                                <span class="text-sm text-gray-700">Người lớn (18+ tuổi)</span>
                                <div class="font-bold text-sky-600">
                                    {{ number_format($tour->price, 0, ',', '.') }}đ
                                </div>
                            </div>
                            <select name="adults" id="adults" required
                                class="border border-gray-300 rounded box-border leading-[1.5] ml-2">
                                <option value="0">0</option>
                                @for($i = 1; $i <= min(10, $tour->max_participants); $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        @error('adults')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                        <!-- Children -->
                        <div class="flex flex-row my-[10px] items-end justify-between">
                            <div class="flex-1">
                                <span class="text-sm text-gray-700">Trẻ em (0-17 tuổi)</span>
                                <div class="font-bold text-sky-600">
                                    {{ number_format($tour->child_price, 0, ',', '.') }}đ
                                </div>
                            </div>
                            <select name="children" id="children"
                                class="border border-gray-300 rounded box-border leading-[1.5] ml-2">
                                <option value="0">0</option>
                                @for($i = 1; $i <= min(10, $tour->max_participants); $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        @error('children')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Notes -->
                    <div class="pb-[30px] border-dashed border-b pt-[10px]">
                        <label for="note" class="font-bold mb-[14px] block">Ghi chú</label>
                        <textarea name="note" id="note" rows="3" placeholder="Yêu cầu đặc biệt hoặc ghi chú..."
                            class="w-full p-2 border border-gray-300 rounded box-border resize-none"></textarea>
                        @error('note')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Total and Submit -->
                    <div class="flex flex-col items-start mt-[10px]">
                        <div class="flex items-center justify-between w-full mb-2">
                            <h2 class="font-bold text-gray-800">Tổng cộng</h2>
                            <p class="text-xl font-bold text-sky-500" id="totalAmount">0đ</p>
                        </div>
                        <div class="text-sm text-gray-600 mb-4">
                            <span id="participantCount">0</span> khách
                        </div>
                        <button type="submit"
                            class="mt-4 bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded items-center w-full disabled:bg-gray-400 disabled:cursor-not-allowed transition-colors"
                            id="bookButton" disabled>
                            Tiến hành thanh toán
                        </button>
                    </div>
                </form>
            @else
                <div class="text-center py-8">
                    <p class="text-gray-600 mb-4">Vui lòng đăng nhập để đặt tour</p>
                    <a href="{{ route('login') }}"
                        class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded inline-block transition-colors">
                        Đăng nhập
                    </a>
                </div>
            @endauth
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Booking form calculation
            const adultsSelect = document.getElementById('adults');
            const childrenSelect = document.getElementById('children');
            const totalAmountEl = document.getElementById('totalAmount');
            const participantCountEl = document.getElementById('participantCount');
            const bookButton = document.getElementById('bookButton');

            const adultPrice = {{ $tour->price }};
            const childPrice = {{ $tour->child_price }};
            const maxParticipants = {{ $tour->max_participants }};

            function calculateTotal() {
                const adults = parseInt(adultsSelect?.value || 0);
                const children = parseInt(childrenSelect?.value || 0);
                const totalParticipants = adults + children;

                let total = 0;
                if ('{{ $tour->pricing_type }}' === 'per_person') {
                    total = (adults * adultPrice) + (children * childPrice);
                } else {
                    total = adultPrice; // Package pricing
                }

                // Update display
                if (totalAmountEl) {
                    totalAmountEl.textContent = new Intl.NumberFormat('vi-VN').format(total) + 'đ';
                }
                if (participantCountEl) {
                    participantCountEl.textContent = totalParticipants;
                }

                // Enable/disable book button
                if (bookButton) {
                    const isValid = adults > 0 && totalParticipants <= maxParticipants;
                    bookButton.disabled = !isValid;

                    if (totalParticipants > maxParticipants) {
                        bookButton.textContent = `Vượt quá ${maxParticipants} khách`;
                    } else if (adults === 0) {
                        bookButton.textContent = 'Chọn ít nhất 1 người lớn';
                    } else {
                        bookButton.textContent = 'Đặt ngay';
                    }
                }
            }

            // Add event listeners
            if (adultsSelect) adultsSelect.addEventListener('change', calculateTotal);
            if (childrenSelect) childrenSelect.addEventListener('change', calculateTotal);

            // Initial calculation
            calculateTotal();

            // Add form submission debugging
            const form = document.getElementById('bookingForm');
            if (form) {
                form.addEventListener('submit', function (e) {
                    console.log('Form submitted with data:', {
                        tour_id: document.querySelector('input[name="tour_id"]')?.value,
                        tour_date: document.querySelector('input[name="tour_date"]')?.value,
                        adults: document.querySelector('select[name="adults"]')?.value,
                        children: document.querySelector('select[name="children"]')?.value,
                        note: document.querySelector('textarea[name="note"]')?.value
                    });
                });
            }
        });
    </script>
@endpush