<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_skill', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            //$table->foreign('course_id')->references('id')->on('courses');
            //$table->foreign('course_id')->references('id')->on('courses');
            $table->unsignedBigInteger('skill_id');
            //$table->foreign('skill_id')->references('id')->on('skills');
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
        Schema::dropIfExists('course_skill');
    }
}
