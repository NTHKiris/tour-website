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
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->string('title'); // Tiêu đề bài viết
            $table->integer('subscribers')->default(0); // Số lượng đăng ký (hoặc có thể là trạng thái)
            $table->string('link'); // Đường dẫn bài viết
            $table->foreignId('category_id')->constrained('category_posts')->onDelete('cascade'); // Khóa ngoại tới category_posts
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade'); // Khóa ngoại tới users
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
