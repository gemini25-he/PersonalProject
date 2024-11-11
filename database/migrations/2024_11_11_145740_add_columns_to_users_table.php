<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable();          // Thêm cột phone
            $table->text('address')->nullable();          // Thêm cột address
            $table->string('role')->default('customer');  // Thêm cột role với giá trị mặc định
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'address', 'role']); // Xóa các cột đã thêm
        });
    }
    
};
