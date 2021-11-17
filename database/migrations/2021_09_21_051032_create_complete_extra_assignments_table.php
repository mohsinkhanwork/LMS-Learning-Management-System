<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompleteExtraAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complete_extra_assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedBigInteger('extraassignment_id');
            $table->text('assignment')->nullable();
            $table->tinyInteger('approved')->default(0);
            $table->integer('marks')->default(0);
            $table->text('comment')->nullable();
            $table->integer('attempt')->default(0);
            $table->timestamps();

            $table->foreign('extraassignment_id')->references('id')->on('extraassignments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complete_extra_assignments');
    }
}
