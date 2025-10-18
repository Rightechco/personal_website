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
        Schema::table('settings', function (Blueprint $table) {
            $table->string('banner_top')->after('fax')->nullable();
            $table->string('banner_bottom')->after('banner_top')->nullable();
            $table->tinyInteger('type')->after('banner_bottom')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('banner_top');
            $table->dropColumn('banner_bottom');
            $table->dropColumn('type');
        });
    }
};
