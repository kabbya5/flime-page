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
        Schema::create('media_inputs', function (Blueprint $table) {
            $table->id();
            $table->string('input_name');
            $table->string('need_file')->default('text');
            $table->string('slug');
            $table->string('input_position')->nullable();
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
        Schema::dropIfExists('media_inputs');
    }
};
