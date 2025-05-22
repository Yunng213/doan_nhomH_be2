<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLatestProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('latest_product', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('latestproduct_name', 255); 
            $table->string('latestproduct_type', 255); 
            $table->integer('latestproduct_quantity'); 
            $table->string('latestproduct_price', 255); 
            $table->string('latestproduct_detail', 255); 
            $table->string('latestproduct_image', 255); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('latest_product');
    }
}