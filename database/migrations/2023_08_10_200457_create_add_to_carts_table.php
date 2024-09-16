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
        Schema::create('add_to_carts', function (Blueprint $table) {
           
            $table->id();
            $table->String("product_id")->index(); 
            $table->foreign("product_id")->on("flowering_plantmodels")->references("plant_id")->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger("user_id")->index(); 
            $table->foreign("user_id")->on("user_registrations")->references("id")->onUpdate('cascade')->onDelete('cascade');

            
            // $table->integer('product_id')->nullable();
            // $table->integer('user_id')->nullable();
            $table->string('quantity_add')->nullable();
            $table->string('total_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_to_carts');
    }
};
