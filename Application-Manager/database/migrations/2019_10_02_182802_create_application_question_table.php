<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->unsignedBigInteger('application_id');
            $table->unsignedBigInteger('question_id');
            $table->text('answer');
            $table->timestamps();

            $table->primary(['application_id', 'question_id']);

            $table->foreign('application_id')->references('id')->on('applications');
            $table->foreign('question_id')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_question');
    }
}
