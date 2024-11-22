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
            $table->text('description')->nullable()->after('is_active'); // Thêm cột description sau một cột cụ thể
        });
    }

    public function down()
    {
        Schema::table('sizes', function (Blueprint $table) {
            $table->dropColumn('description'); // Xóa cột description nếu rollback
        });
    }
};
