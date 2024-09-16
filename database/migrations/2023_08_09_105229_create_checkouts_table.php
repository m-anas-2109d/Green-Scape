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
        Schema::create('checkouts', function (Blueprint $table) {
            // $table->String('checkout_id')->primary();
          $table->id();
            // $table->integer('user_id');
            $table->string('name');
            $table->string('email');
            $table->biginteger('phone');
            $table->string('address', '1000');
            $table->string('payment_method');
            $table->string('order_number');
            $table->string('shipping_number');
            $table->string('grand_total');
            $table->string('sub_total');

            $table->integer('status');

            $table->unsignedBigInteger("user_registrations_id")->index(); 
            $table->foreign("user_registrations_id")->on("user_registrations")->references("id")->onUpdate('cascade')->onDelete('cascade');


            // $table->String("orders_id")->index(); 
            // $table->foreign("orders_id")->on("orders")->references("order_id")->onUpdate('cascade')->onDelete('cascade');

            $table->String("product_id")->index(); 
            $table->foreign("product_id")->on("flowering_plantmodels")->references("plant_id")->onUpdate('cascade')->onDelete('cascade');


            $table->String("country");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
