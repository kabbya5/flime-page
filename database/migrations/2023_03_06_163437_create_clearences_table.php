<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('clearences', function (Blueprint $table) {
            $table->id();
            $table->string('শিক্ষাসনদ_সবগুলো');
            $table->string('ব্যাংক_আর্থিক_স্বচ্ছলতা_সনদপত্র');
            $table->string('আয়কর_প্রত্যয়নপত্র');
            $table->string('নাগরিক_সনদপত্র');
            $table->string('ব্যাংকের_৬_মাসের_এস্টেটমেন্ট');
            $table->string('ন্যাশনাল_আইডি_কার্ড');
            $table->string('সাংবাদিকতার_অভিজ্ঞতার_সনদপত্র');
            $table->string('প্রেসের_সাথে_চুক্তিপত্র');
            $table->string('ছাপাখানার_ঘোষণাপত্রের_সত্যায়িত_কপি');
            $table->string('বাড়ী_ভাড়া_চুক্তিপত্র');
            $table->string('লোকাল_এমপি’র_প্রত্যয়নপত্র')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clearences');
    }
};
