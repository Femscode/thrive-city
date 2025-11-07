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
        Schema::create('order_requests', function (Blueprint $table) {
            $table->id();
            $table->string('product_type'); // tshirt, sweatshirt, hoodie, founders_bundle
            $table->string('tshirt_type')->nullable(); // basic, premium, vintage (only for t-shirts)
            $table->string('size'); // S, M, L, XL, 2XL, 3XL
            $table->string('color'); // selected color
            $table->json('placements'); // array of selected placement options
            $table->string('design_file')->nullable(); // uploaded design file path
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone')->nullable();
            $table->text('special_instructions')->nullable();
            $table->enum('status', ['pending', 'paid', 'shipped', 'delivered'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_requests');
    }
};
