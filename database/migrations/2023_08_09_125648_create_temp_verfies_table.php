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
        Schema::create('temp_verfies', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('profile_image')->nullable();;
            $table->string('contact_no' ,'1000')->nullable();
            $table->string('email')->nullable();
            $table->string('code')->nullable();
            $table->string('password')->nullable();
            $table->integer("status")->nullable();
            // $table->date("date_of_complain")->format('dd/mm/yy')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temp_verfies');
    }
};
