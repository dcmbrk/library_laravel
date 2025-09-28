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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('translator');
            $table->string('publisher');
            $table->string('publish_date');
            $table->integer('pages');
            $table->string('size');
            $table->integer('total_copies');
            $table->integer('available_copies');
            $table->text('description');
            $table->text('url');
            $table->text('image');
            $table->string('slug');
            $table->timestamps(0);

            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
