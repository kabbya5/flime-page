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
        Schema::create('sub_media_inputs', function (Blueprint $table) {
            $table->id();
            $table->string('input_name');
            $table->string('input_position');
            $table->string('slug');
            $table->string('need_file')->default('text');
            $table->unsignedBigInteger('media_input_id');
            $table->timestamps();
            $table->foreign('media_input_id')->references('id')->on('media_inputs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_media_inputs');
    }
};
