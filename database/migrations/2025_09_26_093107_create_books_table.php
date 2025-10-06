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
                // $table->string('author')->default('ĐANG CẬP NHẬT');
                $table->integer('author_id');
                $table->string('translator')->default('ĐANG CẬP NHẬT');
                $table->string('publisher')->default('ĐANG CẬP NHẬT');
                $table->string('publish_date')->default('ĐANG CẬP NHẬT');
                $table->integer('pages')->default(0);
                $table->string('size')->default(value: 'ĐANG CẬP NHẬT');
                $table->integer('total_copies');
                $table->integer('available_copies');
                $table->text('description')->nullable();
                $table->text('url')->nullable();
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
