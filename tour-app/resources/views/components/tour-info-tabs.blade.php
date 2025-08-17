@props(['tour'])

<div class="mb-[35px] shadow-lg shadow-cyan-500/50 px-[20px] py-[20px] rounded-lg">
    <nav class="border-b border-gray-300 mb-4">
        <div class="flex space-x-4">
            <a class="tab-link text-blue-600 hover:text-blue-800 font-semibold border-b-2 border-blue-600 p-2 active"
                data-tab="tab1">Mô tả</a>
            <a class="tab-link text-gray-600 hover:text-blue-800 font-semibold p-2" data-tab="tab2">Lịch trình</a>
            <a class="tab-link text-gray-600 hover:text-blue-800 font-semibold p-2" data-tab="tab3">Vị trí</a>
            <a class="tab-link text-gray-600 hover:text-blue-800 font-semibold p-2" data-tab="tab4">Đánh giá</a>
        </div>
    </nav>

    <div class="tab-content">
        <!-- Description Tab -->
        <div id="tab1" class="tab-pane block">
            <p>✦ {{ $tour->description }}</p>
        </div>

        <!-- Itinerary Tab -->
        <div id="tab2" class="tab-pane hidden">
            <x-tour-itinerary :tour="$tour" />
        </div>

        <!-- Location Tab -->
        <div id="tab3" class="tab-pane hidden">
            <p>✦ {{ $tour->destination->name ?? 'Chưa có thông tin điểm đến' }}</p>
        </div>

        <!-- Reviews Tab -->
        <div id="tab4" class="tab-pane hidden">
            <x-tour-reviews :tour="$tour" />
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const tabLinks = document.querySelectorAll('.tab-link');
    const tabPanes = document.querySelectorAll('.tab-pane');

    tabLinks.forEach(link => {
        link.addEventListener('click', () => {
            const tabId = link.dataset.tab;

            // Hide all tab content
            tabPanes.forEach(pane => pane.classList.add('hidden'));
            // Remove active from all links
            tabLinks.forEach(l => {
                l.classList.remove('text-blue-600', 'border-b-2', 'border-blue-600');
                l.classList.add('text-gray-600');
            });

            // Show selected tab
            document.getElementById(tabId).classList.remove('hidden');
            // Add active to selected link
            link.classList.add('text-blue-600', 'border-b-2', 'border-blue-600');
            link.classList.remove('text-gray-600');
        });
    });
});
</script>
@endpush