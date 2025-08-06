@extends('layouts.tour')

@section('title', 'Quản lý điểm đến')

@section('content')
    <div class="max-w-7xl mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6 text-cyan-700">Quản lý điểm đến</h1>
        @if(session('success'))
            <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif
        <div class="mb-6 text-right">
            <a href="{{ route('admin.destinations.index') }}"
                class="inline-flex items-center px-4 py-2 bg-cyan-500 text-white rounded hover:bg-cyan-600 text-sm font-semibold">
                Quay lại
            </a>
        </div>
        @if($destinations->count())
            <div class="space-y-4">
                @foreach($destinations as $destination)
                    <div class="flex items-center justify-between bg-white rounded-lg shadow px-5 py-4">
                        <div>
                            <div class="font-semibold text-lg text-gray-900">{{ $destination->name }}</div>
                            <div class="text-sm text-gray-500">
                                <i class="fa-solid fa-folder-open mr-1"></i>
                                Destination
                                
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <form action="{{ route('destinations.restore', $destination->id) }}" method="POST" class="restore-form">
                                @csrf
                                <button type="button" onclick="showRestoreModal(this.closest('form'), '{{ $destination->name }}')"
                                    class="inline-flex items-center px-3 py-1.5 bg-green-500 text-white rounded hover:bg-green-600 text-sm">
                                    <i class="fa-solid fa-backward mr-2"></i> Khôi phục
                                </button>
                            </form>

                            <form action="{{ route('destinations.forceDelete', $destination) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="showDeleteModal(this.closest('form'), '{{ $destination->name }}')"
                                    class="inline-flex items-center px-3 py-1.5 bg-red-500 text-white rounded hover:bg-red-600 text-sm">
                                    <i class="fa-solid fa-trash mr-2"></i> Xóa vĩnh viễn
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center text-gray-500 py-12">
                <i class="fa-solid fa-newspaper text-4xl mb-3"></i>
                <div>Chưa có chuyến du lịch nào</div>
            </div>
        @endif
    </div>

    <!-- Delete Modal -->
    <x-delete-modal 
        id="deleteModal"
        title="Xác nhận xóa vĩnh viễn"
        message="Bạn có chắc chắn muốn xóa vĩnh viễn điểm đến này không? Hành động này không thể hoàn tác."
        confirmText="Xóa vĩnh viễn"
    />

    <!-- Restore Modal -->
    <x-restore-modal 
        id="restoreModal"
        title="Xác nhận khôi phục điểm đến"
        message="Bạn có chắc chắn muốn khôi phục điểm đến này không?"
    />
@endsection