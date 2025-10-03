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
        Schema::create('book_user', function (Blueprint $table) {
            $table->id();

            // Quan hệ
            $table->foreignId('book_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // Quản lý thời gian mượn/trả
            $table->timestamp('borrow_date')->nullable();   // ngày mượn
            $table->timestamp('due_date')->nullable();      // hạn trả
            $table->timestamp('return_date')->nullable();   // ngày trả thực tế

            // Trạng thái: wait, reading, returned, rejected
            $table->string('status')->default('wait');

            // Thời gian tạo/cập nhật bản ghi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_user');
    }
};