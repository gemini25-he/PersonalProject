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
        Schema::table('sizes', function (Blueprint $table) {
            $table->dropColumn('is_status'); // Xóa cột is_status
        });
    }

    public function down()
    {
        Schema::table('sizes', function (Blueprint $table) {
            $table->boolean('is_status')->default(true)->after('column_name'); // Thêm lại cột is_status nếu rollback
        });
    }
};
