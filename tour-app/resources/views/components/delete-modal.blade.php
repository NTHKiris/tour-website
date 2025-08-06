@props([
    'id' => 'deleteModal',
    'title' => 'Xác nhận xóa',
    'message' => 'Bạn có chắc chắn muốn xóa mục này không? Hành động này không thể hoàn tác.',
    'confirmText' => 'Xóa',
    'cancelText' => 'Hủy'
])

<!-- Delete Modal -->
<div id="{{ $id }}" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50 hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <!-- Icon -->
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
            </div>
            
            <!-- Title -->
            <h3 class="text-lg font-medium text-gray-900 mt-4">{{ $title }}</h3>
            
            <!-- Message -->
            <div class="mt-2 px-7 py-3">
                <p class="text-sm text-gray-500">{{ $message }}</p>
            </div>
            
            <!-- Buttons -->
            <div class="flex justify-center gap-4 mt-4">
                <button id="{{ $id }}-cancel" 
                        class="px-4 py-2 bg-gray-300 text-gray-800 text-base font-medium rounded-md shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    {{ $cancelText }}
                </button>
                <button id="{{ $id }}-confirm" 
                        class="px-4 py-2 bg-red-600 text-white text-base font-medium rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                    {{ $confirmText }}
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('{{ $id }}');
    const cancelBtn = document.getElementById('{{ $id }}-cancel');
    const confirmBtn = document.getElementById('{{ $id }}-confirm');
    let currentForm = null;

    // Function to show modal
    window.showDeleteModal = function(form, itemName = '') {
        currentForm = form;
        
        // Update message if item name is provided
        if (itemName) {
            const messageElement = modal.querySelector('.text-sm.text-gray-500');
            messageElement.textContent = `Bạn có chắc chắn muốn xóa "${itemName}" không? Hành động này không thể hoàn tác.`;
        }
        
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    };

    // Function to hide modal
    function hideModal() {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
        currentForm = null;
    }

    // Cancel button click
    cancelBtn.addEventListener('click', hideModal);

    // Confirm button click
    confirmBtn.addEventListener('click', function() {
        if (currentForm) {
            currentForm.submit();
        }
        hideModal();
    });

    // Click outside modal to close
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            hideModal();
        }
    });

    // ESC key to close
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            hideModal();
        }
    });
});
</script>