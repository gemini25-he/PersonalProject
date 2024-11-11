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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('brand_id');
            $table->string('name',225);
            $table->text('description')->nullable();
            $table->float('price'); // Giá gốc của sản phẩm
            $table->string('status'); // trạng thái sản phẩm
            $table->boolean('is_featured')->default(false); // đánh dấu sản phẩm có phải là sp nổi bật không. false là chưa đánh dấu
            $table->text('image'); // ảnh gốc của sản phẩm
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
