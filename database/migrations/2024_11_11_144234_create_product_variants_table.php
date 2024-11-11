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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id'); // khóa phụ bảng products
            $table->foreignId('size_id'); // khóa phụ bảng size
            $table->foreignId('color_id'); // khóa phụ bảng color
            $table->string('sku',100); //Mã sản phẩm
            $table->float('price');// giá của biến thể
            $table->integer('quantity'); // số lượng còn lại của biến thể
            $table->boolean('status')->default(true); // trạng thái của biến thể (ẩn hiện)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
