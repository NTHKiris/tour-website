@extends('layouts.tour')

@section('title', 'Quản lý chuyến du lịch')

@section('content')
    <div class="max-w-7xl mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6 text-cyan-700">Quản lý chuyến du lịch</h1>
        @if(session('success'))
            <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif
        <div class="mb-6 text-right">
            <a href="{{ route('admin.tours.index') }}"
                class="inline-flex items-center px-4 py-2 bg-cyan-500 text-white rounded hover:bg-cyan-600 text-sm font-semibold">
                Quay lại
            </a>
        </div>
        @if($tours->count())
            <div class="space-y-4">
                @foreach($tours as $tour)
                    <div class="flex items-center justify-between bg-white rounded-lg shadow px-5 py-4">
                        <div>
                            <div class="font-semibold text-lg text-gray-900">{{ $tour->title }}</div>
                            <div class="text-sm text-gray-500">
                                <i class="fa-solid fa-folder-open mr-1"></i>
                                {{ $tour->destination->name ?? 'Chưa có điểm đến' }}
                                
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <form action="{{ route('tours.restore', $tour->id) }}"
                                onsubmit="return confirm('Bạn có chắc chắn muốn khôi phục?');" method="tour">
                                @csrf
                                <button type="submit"
                                    class="inline-flex items-center px-3 py-1.5 bg-green-500 text-white rounded hover:bg-green-600 text-sm">
                                    <i class="fa-solid fa-backward mr-2"></i> Khôi phục</button>
                            </form>

                            <form action="{{ route('tours.forceDelete', $tour) }}" method="tour"
                                onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
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
@endsection