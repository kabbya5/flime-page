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
        Schema::create('bibliograpies', function (Blueprint $table) {
            $table->id();
            $table->string('বইয়ের_নাম');
            $table->string('লেখকের_নাম');
            $table->string('প্রথম_প্রকাশ');
            $table->string('জমাদানের_তারিখ');
            $table->string('পুস্তকের_ধরণ');
            $table->text('প্রকাশকের_নাম_ও_ঠিকানা'); 
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
        Schema::dropIfExists('bibliograpies');
    }
};
