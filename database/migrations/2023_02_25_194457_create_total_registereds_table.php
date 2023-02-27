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
        Schema::create('total_registereds', function (Blueprint $table) {
            $table->id();
            $table->string('registered_name');
            $table->string('slug');
            $table->text('description');
            $table->string('pdf_url');
            $table->string('published_date');
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
        Schema::dropIfExists('total_registereds');
    }
};
