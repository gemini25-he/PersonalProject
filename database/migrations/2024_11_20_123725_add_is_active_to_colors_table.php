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
        Schema::table('colors', function (Blueprint $table) {
            $table->boolean('is_active')->default(true); // Thêm cột is_active
        });
    }
    
    public function down()
    {
        Schema::table('colors', function (Blueprint $table) {
            $table->dropColumn('is_active'); // Xóa cột is_active nếu rollback
        });
    }
    
};
