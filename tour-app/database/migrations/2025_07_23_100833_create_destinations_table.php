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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->string('name'); // Tên địa điểm
            $table->string('slug')->unique(); // Đường dẫn thân thiện (slug)
            $table->text('description'); // Mô tả địa điểm
            $table->string('location'); // Vị trí địa điểm
            // Thay thế phương thức point bằng geometry hoặc json
            $table->geometry('coordinates'); // Tọa độ (điểm) - nếu bạn muốn lưu trữ dữ liệu địa lý
            // Hoặc
            // $table->json('coordinates'); // Nếu bạn muốn lưu trữ dưới dạng JSON
            $table->string('featured_image'); // Hình ảnh nổi bật
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
