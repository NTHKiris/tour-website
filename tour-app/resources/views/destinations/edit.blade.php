@extends('layouts.tour')

@section('title', 'Cập nhật điểm đến mới - Bình Định Tour')
@section('description', 'Chia sẻ những trải nghiệm du lịch tuyệt vời tại Bình Định')

@section('content')

    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Cập nhật điểm đến mới</h1>
            </div>
            <!-- Post Form Component -->
            <x-destination-form :action="route('destinations.update', $destination)" :method="'PUT'" :destination="$destination"  title="Thông tin điểm đến"
                submit-text="Cập nhật điểm đến" :cancel-url="route('tours.index')" />
            
        </div>  
    </div>
@endsection 