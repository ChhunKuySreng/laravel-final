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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prod_name', 500);
            $table->string('prod_description', 500);
            $table->string('prod_size', 500)->nullable();
            $table->double('prod_barcode')->default(0);
            $table->double('prod_price');
            $table->unsignedInteger('prod_qty');
            $table->string('img', 500);
            $table->boolean('prod_status')->default(0);
            $table->integer('cat_id');
            $table->foreign('cat_id')->references('cat_id')->on('categories');
            $table->timestamps ();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
