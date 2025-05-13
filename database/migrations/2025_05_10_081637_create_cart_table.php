<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id('cart_id'); // Khóa chính tùy chỉnh
            $table->unsignedBigInteger('user_id'); // Khóa ngoại đến users
            $table->unsignedBigInteger('product_id'); // Khóa ngoại đến products
            $table->integer('quantity')->default(1); // Thêm giá trị mặc định cho quantity
            $table->timestamp('added_at')->useCurrent(); // Thời gian thêm vào
            $table->timestamps(); // created_at và updated_at

            // Định nghĩa khóa ngoại
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            // Thêm index cho các cột thường xuyên tìm kiếm (tùy chọn)
            $table->index('user_id');
            $table->index('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
}