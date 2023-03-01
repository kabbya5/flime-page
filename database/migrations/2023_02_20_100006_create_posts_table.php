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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('subsection_id');
            $table->string('post_date')->nullable();
            $table->string('post_name');
            $table->string('post_type')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('slug');
            $table->string('file_url');
            $table->text('post_desciption')->nullable();
            $table->string('chief_editor')->nullable();
            $table->string('senior_editor')->nullable();
            $table->string('editor')->nullable();
            $table->text('editorial_associate')->nullable();
            $table->string('director')->nullable();
            $table->string('producer')->nullable();
            $table->string('script_writer')->nullable();
            $table->string('cooperation')->nullable();
            $table->string('copyright')->nullable();
            $table->string('implementation')->nullable();
            $table->string('video_link')->nullable();
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('posts');
    }
};
