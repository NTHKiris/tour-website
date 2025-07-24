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
            Schema::create('tours', function (Blueprint $table) {
                $table->id(); // Khóa chính
                $table->string('title'); // Tiêu đề tour
                $table->string('slug')->unique(); // Đường dẫn thân thiện (slug)
                $table->text('description'); // Mô tả tour
                $table->json('itinerary'); // Lịch trình trong định dạng JSON
                $table->integer('duration'); // Thời gian (ngày)
                $table->decimal('price', 10, 2); // Giá tour
                $table->integer('max_participants'); // Số người tối đa
                $table->foreignId('destination_id')->constrained('destinations')->onDelete('cascade'); // Khóa ngoại tới bảng destinations
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Khóa ngoại tới bảng users (người sở hữu tour)
                $table->enum('status', ['active', 'inactive', 'draft']); // Trạng thái tour
                $table->boolean('featured')->default(false); // Đánh dấu nổi bật
                $table->timestamps(); // Thời gian tạo và cập nhật
            });
    }

    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
