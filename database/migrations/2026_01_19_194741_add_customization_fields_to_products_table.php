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
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('select_size')->default(false)->after('customizable');
            $table->boolean('select_color')->default(false)->after('select_size');
            $table->boolean('select_design_placement')->default(false)->after('select_color');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['select_size', 'select_color', 'select_design_placement']);
        });
    }
};
