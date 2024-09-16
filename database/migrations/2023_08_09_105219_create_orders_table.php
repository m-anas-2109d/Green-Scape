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
            $table->String('order_id')->primary();
            $table->unsignedBigInteger("user_registrations_id"); 
            $table->foreign("user_registrations_id")->on("user_registrations")->references("id")->onUpdate('cascade')->onDelete('cascade');
            $table->String('total_quantity');
            $table->String('total_amount');
            $table->date("date_of_reg")->format('dd/mm/yy')->nullable(); 
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
