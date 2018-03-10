<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->mediumInteger('product_id', false, true)->index();
            $table->string('customer');
            $table->text('review')->charset('utf8mb4');
            $table->integer('star');
            $table->timestamps();

        });
        Schema::table('reviews', function (Blueprint $table) {
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
