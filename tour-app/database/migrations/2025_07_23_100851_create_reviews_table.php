<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Khóa ngoại tới bảng users
            $table->foreignId('tour_id')->constrained('tours')->onDelete('cascade'); // Khóa ngoại tới bảng tours
            $table->integer('rating')->unsigned()->default(1); // Đánh giá (1-5)
            $table->text('comment')->nullable(); // Bình luận
            $table->enum('status', ['pending', 'approved', 'rejected']); // Trạng thái
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
