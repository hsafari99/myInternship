<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('application_id');
            $table->string('office_id');
            $table->string('eye_color');
            $table->string('hair_color');
            $table->string('height');
            $table->string('waist');
            $table->string('bust');
            $table->string('hips');
            $table->string('neck');
            $table->string('sleeve');
            $table->string('jacket');
            $table->string('dress');
            $table->string('shoe');
            $table->string('inseam');
            $table->timestamps();

            $table->foreign('application_id')->references('id')->on('applications');
            $table->foreign('office_id')->references('id')->on('offices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('measurements');
    }
}
