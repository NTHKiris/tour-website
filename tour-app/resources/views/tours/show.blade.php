@extends('layouts.tour')
@section('title', $tours->title)

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-28 px-[30px]">
        <div class="px-[100px] flex flex-wrap mx-[-15px]">
            <!-- Main Content -->
            <div class="w-full lg:w-8/12 px-[15px]">
                <!-- Tour Title -->
                <div class="mb-6">
                    <h1 class="text-[30px] font-bold leading-[36px] text-accent mb-2">{{ $tours->title }}</h1>
                </div>

                <!-- Tour Image Gallery -->
                <x-tour-image-gallery :tour="$tours" />

                <!-- Tour Information Tabs -->
                <x-tour-info-tabs :tour="$tours" />

                <!-- Tour Highlights -->
                <x-tour-highlights :tour="$tours" />

                <!-- Schedule & Pricing Section -->
                <div class="my-[40px] py-[30px] border-dashed border-t border-r-0 border-b border-l-0">
                    <h2 class="text-xl font-bold text-gray-800 pb-[13px]">Lịch & Giá cả</h2>
                </div>
            </div>

            <!-- Booking Sidebar -->
            <x-booking-form :tour="$tours" />
        </div>
    </div>
@endsection

@stack('scripts')