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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');//khóa ngoại bảng user
            $table->float('total_price'); // tổng giá trị đơn hàng
            $table->integer('status')->default(1); // Trạng thái mặc định là "pending" (1)
            $table->text('shipping_address'); // địa chỉ giao hàng
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
