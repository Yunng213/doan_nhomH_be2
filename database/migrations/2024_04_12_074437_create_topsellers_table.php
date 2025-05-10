<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topsellers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('topsale_name');
            $table->string('topsale_type');
            $table->integer('topsale_quantity');
            $table->double('topsale_price');
            $table->string('topsale_detail',1000);
            $table->string('topsale_image');
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
        Schema::dropIfExists('topsellers');
    }
};
