@extends('layouts.tour')

@section('title', 'Quản lý tour')

@section('content')
    <div class="max-w-7xl mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6 text-cyan-700">Quản lý điểm đến</h1>
        @if(session('success'))
            <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif
        <div class="mb-6 text-right">
            <a href="{{ route('destinations.create') }}"
                class="inline-flex items-center px-4 py-2 bg-cyan-500 text-white rounded hover:bg-cyan-600 text-sm font-semibold">
                <i class="fa-solid fa-plus mr-2"></i> Thêm điểm đến mới
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
                            <a href="{{ route('destinations.show', $destination) }}"
                                class="inline-flex items-center px-3 py-1.5 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">
                                <i class="fa-solid fa-eye mr-2"></i> Xem
                            </a>
                            <a href="{{ route('destinations.edit', $destination) }}"
                                class="inline-flex items-center px-3 py-1.5 bg-cyan-500 text-white rounded hover:bg-cyan-600 text-sm">
                                <i class="fa-solid fa-pen-to-square mr-2"></i> Sửa
                            </a>
                            <form action="{{ route('destinations.destroy', $destination) }}" method="POST"
                                onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center px-3 py-1.5 bg-red-500 text-white rounded hover:bg-red-600 text-sm">
                                    <i class="fa-solid fa-trash mr-2"></i> Xóa
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center text-gray-500 py-12">
                <i class="fa-solid fa-newspaper text-4xl mb-3"></i>
                <div>Chưa có tour nào</div>
            </div>
        @endif
    </div>
@endsection