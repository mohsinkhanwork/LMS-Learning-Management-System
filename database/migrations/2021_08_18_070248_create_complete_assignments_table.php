<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompleteAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complete_assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('assignment_id');
            $table->unsignedInteger('lesson_id');
            $table->text('assignment')->nullable();
            $table->tinyInteger('approved')->default(0);
            $table->integer('marks')->default(0);
            $table->text('comment')->nullable();
            $table->integer('attempt')->default(0);
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
        Schema::dropIfExists('complete_assignments');
    }
}
