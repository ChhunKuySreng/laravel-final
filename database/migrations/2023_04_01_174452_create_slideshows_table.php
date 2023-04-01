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
        Schema::create('slideshows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->default(0);
            $table->foreign('order')->references('id')->on('slideshows')->onDelete('cascade');
            $table->string('title_en', 500);
            $table->string('title_kh', 500);
            $table->string('subtitle_en', 500);
            $table->string('subtitle_kh', 500);
            $table->string('text_en', 500);
            $table->string('text_kh', 500);
            $table->string('link', 500);
            $table->boolean('enabled')->default(0);
            $table->string('img', 500);
            $table->timestamp('add_on')->useCurrent();
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
        Schema::dropIfExists('slideshows');
    }
};
