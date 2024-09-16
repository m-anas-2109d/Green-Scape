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
        Schema::create('flowering_plantmodels', function (Blueprint $table) {
            $table->String('plant_id')->primary();
            $table->String("name");
            $table->String("description",'1000');
            $table->String("price");
            $table->String("quantity");
            $table->String("image1")->nullable();
            $table->String("image2")->nullable();
            $table->String("image3")->nullable();
            $table->String("image4")->nullable();
            $table->String("plant_genes")->nullable();
            $table->String("categories_id")->index(); 
            $table->foreign("categories_id")->on("categories")->references("category_id")->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flowering_plantmodels');
    }
};
