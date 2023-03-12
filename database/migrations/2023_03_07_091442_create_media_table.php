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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('পত্রিকার_নাম');
            $table->string('জাতীয়_পরিচয়পত্র');
            $table->string('পত্রিকা_প্রকাশের_তারিখ');
            $table->string('পত্রিকার_সাইজ');
            $table->string('কপি_সংখ্যা');
            $table->string('প্রেস_ঠিকানা');
            $table->string('নিউজরিন্ট_সংখ্যা');
            $table->string('ভাউচারের_ফটোকপি');
            $table->string('অফিসের_আয়তন');
            $table->string('ভাড়া_বাড়ি_চুক্তিপত্র');
            $table->string('বিদ্যুৎ_বইলের_কপি');
            $table->string('ল্যাপটপের_সংখ্যা');
            $table->string('ই_টিন_রেজিস্ট্রেশন');
            $table->string('ভ্যাট_রেজিস্ট্রেশন_নাম্বার');
            $table->string('সংবাদপত্র_বিক্রয়বাবদ_আয়');
            $table->string('রিটার্ন_সনদপত্র');
            $table->string('বিজ্ঞাপন_বাবদ_আয়');
            $table->string('অন্যান্য_আয়');
            $table->string('গুদামঘরের_সাইজ');
            $table->string('নিউজপ্রিন্ট_ক্রয়ের_চালানের_কপি');
            $table->string('এজেন্টের_নাম_ঠিকানাসহ_সংখ্যা');
            $table->string('ঘোষণাপত্রের_সত্যায়িত_কপি');
            $table->string('জেলা_প্রশাসকের_প্রত্যয়নপত্র');
            $table->string('সাংবাদিক_কর্মকর্তা_কর্মচারীদের_নাম_ঠিকানা');
            $table->string('সাংবাদিকদের_বেতন_পরিশোধের_সনদপত্র');
            $table->string('বেতন_পরিশোধের_বিবরণী');
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
        Schema::dropIfExists('media');
    }
};
